 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />

<?php

require "functions.php";

$errors = array();
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$errors = signup($_POST);

	if(count($errors) == 0) 
	{
		header("Location: login.php");
		die;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../ChatApp/style.css">
	<title>Signup</title>
</head>
<body>
		<div class="wrapper">
		    <section class="form signup">
				<div style="color:red;">
					<?php if(count($errors) > 0);?> 
						<?php foreach ($errors as $error):?>
							<?= $error?> <br>
						<?php endforeach;?>						
				</div>
			
		    <!--  <header><a href="../Publish_User/index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp; Regristration Form</header> -->
		    <header><center><img src="../Publish_User/images/crown1.png" width="100px">
		     	<h1>UCSMGY BLOG</h1></center></header>

		      	<form action=" " method="post" enctype="multipart/form-data">
		        	<div class="error-text"></div>
		       
			        <div class="field input">
			            <label>Username</label>
			            <input type="text" name="username" placeholder="Username" required>
			        </div>
			         		      
			        <div class="field input">
				         <label>Email Address</label>
				         <input type="text" name="email" placeholder="Enter your email" required>
			        </div>

			       <br>
	                 <p style="color:black; font-size: 10px;" > !Password at least 8 characters.<br>!Consist of lowercase(a-z) + uppercase(A-Z) + numeric(0-9) + special character.</p>
	                                <!-- <p style="color:red; font-size: 10px;" > </p> -->
	                               

			        <div class="field input">
			         	<label>Password</label>
			          	<input type="password" name="password" placeholder="Enter new password" required>		          
			        </div>

			        <div class="field input">
			         	<label>Confirm Password</label>
			          	<input type="password" name="password2" placeholder="Enter confirm password" required>		         
			        </div>

			        <div class="field image">
			          	<label>Select Image</label>
			          	<input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
			        </div>

			        
			        <div class="field button">
			          	<input type="submit" name="next" value="Create Your Account" class="btn btn-success" style="background-color:#208c1c">
			        </div>
		    	</form>
		     	<div class="link">Already have an account? <a href="login.php">Sign in</a></div>
			</section>
		</div>	
</body>
</html>



  
  