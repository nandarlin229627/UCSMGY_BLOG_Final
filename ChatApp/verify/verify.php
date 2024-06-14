<?php

	require "functions.php";
	require "mail.php";

	check_login();
	$errors = array();

	if ($_SERVER['REQUEST_METHOD'] == "GET" && !check_verified()) 
	{
		//send email
		$vars['code'] = rand(10000,99999); 

		//save to database
		$vars['expires'] = (time() + (60 * 2));
		$vars['email'] = $_SESSION['USER']->email;

		$query = "insert into verify (code,expires,email) values (:code,:expires,:email)";
		// $query = "insert into verify (code,expires,email) values (:code,:expires,:email)";


		// $query = "update verify set code = :code ,expires = :expires,email = :email where email = :email limit 1";


		database_run($query,$vars);

		$message = "your code is" .$vars['code'];
		$subject = "Email verification";
		$recipient = $vars['email'];
		send_mail($recipient,$subject,$message);

	}





	if($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		if (!check_verified()) 
		{
			$query = "select * from verify where code = :code && email = :email";
			$vars = array();
			$vars['email'] = $_SESSION['USER']->email;
			$vars['code'] = $_POST['code'];

			$row = database_run($query,$vars);

			if (is_array($row)) 
			{
				$row = $row[0];
				$time = time();

				if($row->expires > $time)
				{
					$id = $_SESSION['USER']->id;
					$query = "update users set email_verified = email where id ='$id' limit 1";
					
					database_run($query);

					header("Location: ../admin/index.php");
					die;
				}else
					{
						echo "Code expired";
					}
			}else
				{
					echo "wrong code";
				}


		}else
			{
				echo "You're already verified";
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Verify</title>
</head>
<body>
	

	<?php include('header.php');?>


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
						<h4>Paste the code from your email</h4>
						<br>

						<div class="form-group">							
						<input type="text" name="code" placeholder="Enter you Code" class="form-control form-control-lg">
						</div>

						
						<input type="submit" value="Verify" style="background-color:darkcyan" class="btn btn-primary btn-block btn-lg">
					</form>
				</div>
			</div>
		</div>

	</div>

</body>
</html>