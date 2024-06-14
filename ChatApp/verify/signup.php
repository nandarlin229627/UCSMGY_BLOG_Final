<?php

require "functions.php";

$errors = array();
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$errors = signup($_POST);

	if(count($errors) == 0) 
	{
		header("Location: ../login.php");
		die;
	}

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
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
						<form action="" method="post" enctype="multipart/form-data">
							<h2 class="text-center" style="margin-top:-40px">Regristration</h2>
							<br>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" placeholder="Username" class="form-control form-control-lg">
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" placeholder="Email" class="form-control form-control-lg">
							</div>

							 <div class="form-group">
						          <label>Select Image</label>
						          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required class="form-control form-control-lg">
						      </div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="text" name="password" placeholder="Password" class="form-control form-control-lg">
							</div>

							<div class="form-group">
								<label for="passwordConf">Confirm Password</label>
								<input type="text" name="password2" placeholder="Confirm Password" class="form-control form-control-lg">
							</div>
							
								<input type="submit" value="Signup" name="next" class="btn btn-primary btn-block btn-lg" style="background-color:darkcyan">
								<p class="text-center">Already a Account?<a href="login.php">Sign In</a></p>
						</form>

					</div>
				</div>
		</div>
	</div>
<div>pp</div>
</body>
</html>