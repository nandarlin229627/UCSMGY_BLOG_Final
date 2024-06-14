<!-- chat room No --> 
<?php 
  // session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: ChatApp/users.php");
  }
?>





<?php

require "functions.php";

$errors = array();
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$errors = login($_POST);

	if(count($errors) == 0) 
	{
		header("Location: profile.php");
		die;
	}

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

	
	<?php include('header.php') ?>
	

	<div>
		<div>
			<?php if(count($errors) > 0);?> 
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>
				<?php endforeach;?>
			
				
		</div>
	


		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4 form-div login">
					<form method="post">
						<h2 class="text-center">Login</h2>
						<br>

						
						<div class="form-group">
							<label for="username">Email</label>
							<input type="email" name="email" placeholder="Email" class="form-control form-control-lg">
						</div>

						<div class="form-group">
							<label for="password">Password</label>	
							<input type="password" name="password" placeholder="Password" class="form-control form-control-lg">
						</div>


					
						<input type="submit" value="Login" class="btn btn-primary btn-block btn-lg" style="background-color:darkcyan" name="Login"><br>
						<p class="text-center">Not yet a member?<a href="signup.php">Sign Up</a><br><br><a href="forgot.php">Forgot password?</a></p>
						
					</form>
				</div>
			</div>	
		</div>


	</div>


	<!-- chat room -->
	<script src="ChatApp/javascript/pass-show-hide.js"></script>
  	<script src="ChatApp/javascript/login.js"></script>

</body>
</html>

<!-- session -->

<?php include_once "../admin/db.php"; ?>



