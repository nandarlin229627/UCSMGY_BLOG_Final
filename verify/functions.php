<?php
session_start();

function signup($data)
{
	$errors = array();
	
	//validate
	if(!preg_match('/^[a-zA-Z ]+$/', $data['username'])){
		$errors[] = "Please enter a valid username";
	}

	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	// if(strlen(trim($data['password'])) < 4){
	// 	$errors[] = "Password must be atleast 4 chars long";
	// }


	if (strlen($data['password']) < 8 || strlen($data['password']) > 16) {
    $errors[] = "Password should be min 8 characters and max 16 characters";
		}
	if (!preg_match("/\d/", $data['password'])) {
    $errors[] = "Password should contain at least one digit";
		}
	if (!preg_match("/[A-Z]/", $data['password'])) {
    $errors[] = "Password should contain at least one Capital Letter";
		}
	if (!preg_match("/[a-z]/", $data['password'])) {
    $errors[] = "Password should contain at least one small Letter";
		}
	if (!preg_match("/\W/", $data['password'])) {
    $errors[] = "Password should contain at least one special character";
		}
	if (preg_match("/\s/", $data['password'])) {
    $errors[] = "Password should not contain any white space";
		}

	if($data['password'] != $data['password2']){
		$errors[] = "Passwords must match";
	}

	$check = database_run("select * from users where email = :email limit 1",['email'=>$data['email']]);
	if (is_array($check)) 
	{
		$errors[] = "That email already exists";
	}

	$check1 = database_run("select * from users where username = :username limit 1",['username'=>$data['username']]);
	if (is_array($check1)) 
	{
		$errors[] = "That Username already exists";
	}


	//save
	if(count($errors) == 0) {

		$arr['username'] = $data['username'];
		$arr['email'] = $data['email'];
		$arr['password'] = hash('sha256',$data['password']);
		$arr['date'] = date("Y-m-d H:i:s");


		
		if (isset($_POST['next'])) {
			$image= basename($_FILES['image']['name']);//use basename() to prevent sql injection attack
			$image_type = $_FILES['image']['type'];
			$image_tmp  = $_FILES['image']['tmp_name'];//to store xampp tmp

			$img_explode = explode('.',$image);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];


	            if(in_array($image_type, $types) === true){
	                $time = time();
	               	$new_img_name = $time.$image;

	                //move_uploaded_file($image_tmp,"../profile/".$new_img_name);
	                if(move_uploaded_file($image_tmp,"../profile/".$new_img_name)){
	                    $ran_id = rand(time(), 100000000);
	                    $status = "Active now";                            
					}
				}
			}
		}

		$query = "insert into users (unique_id,username,email,password,date,image,status) values 
		($ran_id,:username,:email,:password,:date,'$new_img_name','$status')";
		database_run($query,$arr);
	}//count
	return $errors;
}//sign up


function login($data)
{
	$errors = array();	
	//validate
	
	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
	{
		$errors[] = "Please enter a valid email";
	}

	 if(strlen(trim($data['password'])) < 4)
	{
		$errors[] = "Password must be atleast 4 chars long";
	}

	//check
	if(count($errors) == 0) 
	{		
		$arr['email'] = $data['email'];
		$password = hash('sha256', $data['password']);
		
		$query = "select * from users where email = :email limit 1";
		$row = database_run($query,$arr);

		if (is_array($row)) 
		{
			$row = $row[0];
			if($password === $row->password)
			{
				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
				$_SESSION['unique_id'] = $row->unique_id;
                    
				$status = "Active now";
				$id = $_SESSION['USER']->id;
				define('HOST', 'localhost');
				define('DB_USER', 'root');
				define('DB_PASS', '');
				define('DB_NAME', 'cmsonline');

				$con = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);// take connection
				$query = "UPDATE users SET status = '$status' WHERE id = $id";
				mysqli_query($con,$query);
                //$sql2 = mysqli_query($con, "UPDATE users SET status = '$status' WHERE id = $id");				
			}else
			{
				$errors[] = "wrong email or password";
			}
			
		}else
			{
				$errors[] = "wrong email or password";
			}
	}
	return $errors; 
}


function database_run($query,$vars = array())
{
	$string = "mysql:host=localhost;dbname=cmsonline";
	$con = new PDO($string,'root','');

	if(!$con)
	{
		return false;
	}
	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if($check)
		{
			
		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		if(count($data) > 0)
			{
			return $data;
			}
		}
	return false;
}


function check_login($redirect = true)
	{
		if (isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])) 
		{
			return true;
		}

		if($redirect)
		{
			header("Location: profile.php");
			die;
		}else
			{
		return false;
			}
	}

function check_verified()
	{
		$id = $_SESSION['USER']->id;
		$query = "select * from users where id = '$id' limit 1";
		$row = database_run($query);

		if (is_array($row)) 
		{
				$row = $row[0];
		
				if($row->email == $row->email_verified)
				{
			return true;
				}
		}

		return false;			
	}