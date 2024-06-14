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

		$expires = time() + (60 * 1);
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
	<title>Forgot</title>
</head>
<body>

	
<style type="text/css">
/*	
	*{
		font-family: tahoma;
		font-size: 13px;
	}

	form{
		width: 100%;
		max-width: 200px;
		margin: auto;
		border: solid thin #ccc;
		padding: 10px;
	}

	.textbox{
		padding: 5px;
		width: 180px;
	}*/
</style>

<?php include('header.php') ?>

		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
	<div class="container">
				<div class="row">
					<div class="col-md-4 offset-md-4 form-div login">					
						<form method="post" action="forgot.php?mode=enter_email"> 
							<h4 class="text-center">Forgot Password</h4>
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

							<div class="form-group">
								<label for="username">Enter your email below</label>
								<input type="email" name="email" placeholder="Email" class="form-control form-control-lg">
							</div>
<!-- 
	<div class="form-group">
							<label for="username">Email</label>
							<input type="email" name="email" placeholder="Email" class="form-control form-control-lg">
						</div> -->
					
							<input type="submit" value="Next" class="btn btn-primary btn-block btn-md" style="background-color:darkcyan">
							<br>
							<center><a href="login.php">Login</a></center>
						</form>


					</div>
				</div>
	</div>
					<?php				
					break;

				case 'enter_code':
					// code...
					?>



	<div class="container">
				<div class="row">
					<div class="col-md-4 offset-md-4 form-div login">

						<form method="post" action="forgot.php?mode=enter_code"> 
							<h4 class="text-center">Forgot Password</h4>
							<br>
							<!-- <h5>Enter your code sent to your email</h5>
 -->
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<div class="form-group">
								<label for="username">Enter yourcode sent to your email</label>	
								<input type="text" name="code" placeholder="12345"  class="form-control form-control-lg">
							</div>




							<div class="row">

								<div class="col-md-6">
									<a href="forgot.php">
										<input type="button" value="Start Over" class="btn btn-primary btn-block btn-md" style="background-color:darkcyan">
									</a><label for="username"><a href="login.php">Login</a></label>	
								</div>



								<div class="col-md-6">
									<input type="submit" value="Next" class="btn btn-primary btn-block btn-md" style="background-color:darkcyan">

								</div>


							
							</div>
							
							<br>
							<div></div>
						</form>

					</div>
				</div>			
	</div>



					<?php
					break;

				case 'enter_password':
					// code...
					?>






	<div class="container">
				<div class="row">
					<div class="col-md-4 offset-md-4 form-div login">
						<form method="post" action="forgot.php?mode=enter_password"> 
							<h1>Forgot Password</h1>
							<h3>Enter your new password</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>



							<div class="form-group">
							<input type="text" name="password" placeholder="Password" class="form-control form-control-lg" >
							</div>

							<div class="form-group">
							<input type="text" name="password2" placeholder="Retype Password"  class="form-control form-control-lg">
							</div>
							<div class="row">
								<div class="col-md-6">
									<a href="forgot.php">
									<input type="button" value="Start Over" style="background-color:darkcyan" class="btn btn-primary btn-block btn-md">
									</a>
									</a><label for="username"><a href="login.php">Login</a></label>	
								</div>


								<div class="col-md-6">
									<input type="submit" value="Next" style="background-color:darkcyan" class="btn btn-primary btn-block btn-md">
								</div>
						
							</div>
<!-- row -->
						</form>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>


</body>
</html>