<?php
	require "functions.php";
	check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
</head>
<body>
	
	<?php include('header.php');?>
	

	<?php if(check_login(false)):?>
	
	<div style=" margin-top:50px">
	<center>
 		Hello, <?=$_SESSION['USER']->username?>;
		 <br><br>
		<?php if(!check_verified()):?>
			<h2>First Authentication Successful</h2>
		 	<a href="verify.php">
		 		<button type="button" class="btn btn-success">Verify Your Email</button>
		 	</a>
		<?php endif; ?>

		<!-- to test -->

		<?php if(check_verified(true)):?>
			<h2>Authentication Successful</h2>
			<a href="../Publish_User/index.php"><button type="button" class="btn btn-success">GO Your Profile</button></a>
		 	
		 	  header('location:../Publish_User/index.php');
		<?php endif; ?>
	<?php endif;?>	
</center>	
</div>	
</body>
</html>