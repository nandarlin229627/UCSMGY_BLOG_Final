<?php require_once '../admin/db.php'; ?>
<?php

	session_start();

	if(isset($_SESSION['USER']))
	{	
		$id = $_SESSION['USER']->id;
		$status = "Offline now";
        $sql = "UPDATE users SET status = '{$status}' WHERE id=$id";
        $result = mysqli_query($con,$sql);
        // confirm_query($result);

		unset($_SESSION['USER']);

	}
	if(isset($_SESSION['LOGGED_IN']))
	{
		unset($_SESSION['LOGGED_IN']);
	}

	if(isset($_SESSION['unique_id']))
	{
		unset($_SESSION['unique_id']);
	}
	header("Location: login.php");
	die;
