<?php 
	session_start();
	$error = array();
	require "mail.php";
	if(!$con = mysqli_connect("localhost","root","","cmsonline")){
		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){
		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];



				if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 16) {
                    $error[] = "Password should be min 8 characters and max 16 characters";
                    }
                if (!preg_match("/\d/", $_POST['password'])) {
                $error[] = "Password should contain at least one digit";
                    }
                if (!preg_match("/[A-Z]/", $_POST['password'])) {
                $error[] = "Password should contain at least one Capital Letter";
                    }
                if (!preg_match("/[a-z]/", $_POST['password'])) {
                $error[] = "Password should contain at least one small Letter";
                    }
                if (!preg_match("/\W/", $_POST['password'])) {
                $error[] = "Password should contain at least one special character";
                    }
                if (preg_match("/\s/", $_POST['password'])) {
                $error[] = "Password should not contain any white space";
                    }

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: login.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $con;

		$expires = time() + (60 * 5);
		$code = rand(10000,99999);
		$email = addslashes($email);

		//$query = "insert into verify (email,code,expires) value ('$email','$code','$expires')";
		$query = "update verify set code = '$code',expires = '$expires' where email = '$email' limit 1";


		mysqli_query($con,$query);

		//send email here
		send_mail($email,'Password reset',"Your code is " . $code);
	}
	
	function save_password($password){
		
		global $con;

		$password = hash('sha256',$password);

		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update users set password = '$password' where email = '$email' limit 1";
		mysqli_query($con,$query);

	}
	
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from users where email = '$email' limit 1";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expires = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from verify where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expires'] > $expires){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../ChatApp/style.css">
	<title>Forgot</title>

</head>
<body>
<?php include('header.php') ?>
<?php 
	switch ($mode) {
		case 'enter_email':
		// code...
?>
	<div class="wrapper">
		<section class="form">										
			<form method="post" action="forgot.php?mode=enter_email"> 
				<header><center><img src="../Publish_User/images/crown1.png" width="100px">
		     	<h1> Password</h1></center></header>							
				<!-- <h5 class="text-center">Enter your email below</h5> -->
				<br>						
				<span style="font-size: 12px;color:red;">
				<?php 
				foreach ($error as $err) {
				// code...
				echo $err . "<br>";
				}
				?>
				</span>

				<div class="field input">
					<label for="username">Enter your email below</label>
					<input type="email" name="email" placeholder="Email" class="form-control form-control-lg">
				</div>

				<div class="field button">
					<input type="submit" value="Next" class="btn btn-primary btn-block btn-md" style="background-color:#208c1c">
					<br>
					<center><a href="login.php">Sign in</a></center>					
				</div>
			</form>
		</div>
	</div>

		<?php				
		break;
		case 'enter_code':
		// code...
		?>

	<div class="wrapper">
		<section class="form">					
			<form method="post" action="forgot.php?mode=enter_code"> 
				<header><center><img src="../Publish_User/images/crown1.png" width="100px">
		     	<h1>Enter Code</h1></center></header>
				<br>
				<span style="font-size: 12px;color:red;">
				<?php 
				foreach ($error as $err) {
				// code...
				echo $err . "<br>";
				}
				?>
				</span>

				<div class="field input">
					<label for="username">Enter yourcode sent to your email</label>	
					<p style= "color:red; font-size: 10px;">!enter the code that was sent to within 5 minutes</p>
								<input type="text" name="code" placeholder="12345"  class="form-control form-control-lg">
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="field button">
							<a href="forgot.php">
							<input type="button" value="Start Over" class="btn btn-primary btn-block btn-md" style="background-color:#208c1c">
							</a><label for="username"><a href="#"></a></label>	
						</div>
					</div>	

					<div class="col-md-6">
						<div class="field button">
						<input type="submit" value="Next" class="btn btn-primary btn-block btn-md" style="background-color:#208c1c">
					</div>
				</div>	
			</div>								
			<br>
			<div>
			</div>
			</form>					
		</section>			
	</div>
		<?php
		break;

		case 'enter_password':
		// code...
		?>


	<div class="wrapper">
		<section class="form">					
			<form method="post" action="forgot.php?mode=enter_password"> 
				<header><center><img src="../Publish_User/images/crown1.png" width="100px">
		     	<h3>Enter your new password</h3></center></header>
		     	<br>
							
				<span style="font-size: 12px;color:red;">
				<?php 
				foreach ($error as $err) {
				// code...
				echo $err . "<br>";
				}
				?>
				</span>

				<div class="field input">
					<input type="password" name="password" placeholder="Password" class="form-control form-control-lg" >
				</div>
				<br>

				<div class="field input">
					<input type="password" name="password2" placeholder="Retype Password"  class="form-control form-control-lg">
				</div>

				<div class="row">
					<div class="col-md-6">		
						<div class="field button">
							<a href="forgot.php">
								<input type="button" value="Start Over" style="background-color:#208c1c" class="btn btn-primary btn-block btn-md">
							</a>
							<a><label for="username"><a href="#"></a></label>	
						</div>
					</div>
							
					<div class="col-md-6">
						<div class="field button">
							<input type="submit" value="Next" style="background-color:#208c1c" class="btn btn-primary btn-block btn-md">
						</div>
					</div>	
				</div>	
			</form>
		</section>
	</div>
		<?php
		break;				
		default:
		// code...
		break;
		}
		?>
</body>
</html>