 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    if(check_verified(true)){
      header("Location: ../Publish_User/index.php");
      die;
    }else{

    header("Location: profile.php");
    die;
    }
    //check verified
	}
  // no error 

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../ChatApp/style.css">
</head>
<body>
	<div class="wrapper"> 
    <section class="form login">
      <div style="color:red">
      <?php if(count($errors) > 0);?> 
        <?php foreach ($errors as $error):?>
          <?= $error?> <br>
        <?php endforeach;?>       
    </div>
      <header><center><img src="../Publish_User/images/crown1.png" width="100px">
          <h1>UCSMGY BLOG</h1></center></header>
      <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
         
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Sign in" style="background-color:#208c1c">
        </div>
        <a href="forgot.php">Forgot password?</a>
      </form>
      <div class="link">Don't have an account? <a href="signup.php">Sign up</a></div>      
    </section>
  </div>
</body>
</html>
<!-- session -->
<?php include_once "../admin/db.php"; ?>