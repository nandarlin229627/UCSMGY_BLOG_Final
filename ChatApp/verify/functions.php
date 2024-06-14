<?php

session_start();

function signup($data)
{
	$errors = array();

	
	//validate
	if(!preg_match('/^[a-zA-Z]+$/', $data['username'])){
		$errors[] = "Please enter a valid username";
	}

	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	if(strlen(trim($data['password'])) < 4){
		$errors[] = "Password must be atleast 4 chars long";
	}

	if($data['password'] != $data['password2']){
		$errors[] = "Passwords must match";
	}

	$check = database_run("select * from users where email = :email limit 1",['email'=>$data['email']]);
	if (is_array($check)) 
	{
		$errors[] = "That email already exists";
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
                              
                //                 $insert_query = mysqli_query($con, "INSERT INTO users (unique_id,username ,email, password, date, image, status)
                //                 VALUES ($ran_id,:username,:email,:password,:date,'$new_img_name', '$status')");

                //                 database_run($insert_query,$arr);

                //                 if($insert_query){
                //                     $select_sql2 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                //                     if(mysqli_num_rows($select_sql2) > 0){
                //                         $result = mysqli_fetch_assoc($select_sql2);
                //                         $_SESSION['unique_id'] = $result['unique_id'];
                //                         echo "success";
                //                    }else{
                //                         echo "This email address not Exist!";
                //                     }
                //                 }else{
                //                     echo "Something went wrong. Please try again!";
                //                 }
                //             }
                //         }else{
                //             echo "Please upload an image file - jpeg, png, jpg";
                //         }
                //     }else{
                //         echo "Please upload an image file - jpeg, png, jpg";
                //     }
                // }


	
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














	  // $img_name = $_FILES['image']['name'];
   //                  $img_type = $_FILES['image']['type'];
   //                  $tmp_name = $_FILES['image']['tmp_name'];
                    
   //                  $img_explode = explode('.',$img_name);
   //                  $img_ext = end($img_explode);
    
   //                  $extensions = ["jpeg", "png", "jpg"];
   //                  if(in_array($img_ext, $extensions) === true){
   //                      $types = ["image/jpeg", "image/jpg", "image/png"];
   //                      if(in_array($img_type, $types) === true){
   //                          $time = time();
   //                          $new_img_name = $time.$img_name;
   //                          if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
   //                              $ran_id = rand(time(), 100000000);
   //                              $status = "Active now";
   //                              $encrypt_pass = md5($password);
   //                              $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
   //                              VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");













	// $user_id = escape($_SESSION['USER']->username);
		// $post_status = escape($_POST['post_status']);
		// $post_title = escape($_POST['post_title']);
		


		// $post_image= basename($_FILES['post_image']['name']);//use basename() to prevent sql injection attack
		// $post_image_tmp  = $_FILES['post_image']['tmp_name'];//to store xampp tmp
		// move_uploaded_file($post_image_tmp, '../img/'.$post_image);//to upload img folder

		// $post_tag = escape($_POST['post_tag']);
		// $post_content = escape($_POST['post_content']);
		


//table join
		// 	$id = $_SESSION['USER']->id;
		// 	$post_author = $_SESSION['USER']->username;

		// 	//echo $id;

			

		// $sql = "INSERT INTO post(post_category_id,user_id,post_title, post_author, post_date, post_image,post_tag, post_content, post_status)";
		// $sql .= "VALUES ($post_category_id,$id,'$post_title','$post_author',now(), '$post_image','$post_tag', '$post_content','$post_status')"; //use concatenation
		//'$post_date' equlal to now()


		// $result = mysqli_query($con,$sql);
  //       confirm_query($result);
  //       echo "<p>Post Created</p>";
