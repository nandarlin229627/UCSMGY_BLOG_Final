<?php
//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=cmsonline", "root", "");

function Count_notification($connect, $receiver_id)
{
	$query = "
	SELECT COUNT(notification_id) as total 
	FROM tbl_notification 
	WHERE notification_receiver_id = '".$receiver_id."' 
	AND read_notification = 'no'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		return $row["total"];
	}
}

function Load_notification($connect, $receiver_id)
{
	$query = "
	SELECT * FROM tbl_notification 
	WHERE notification_receiver_id = '".$receiver_id."' 
	ORDER BY notification_id DESC
	limit 10
	";
	$statement = $connect->prepare($query);

	$statement->execute(); 

	$result = $statement->fetchAll();

	$total_row = $statement->rowCount();

	$output = '';

	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '<li><a href="#">'.$row["notification_text"].'</a></li>';
		}
	}
	return $output;
}

function Get_user_name($connect, $user_id)
{
	$query = "
	SELECT username FROM users 
	WHERE id = '".$_SESSION['USER']->id."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		return $row["username"];
	}
}

function count_retweet($connect, $post_id)
{
	$query = "
	SELECT * FROM tbl_repost 
	WHERE post_id = '".$post_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_comment($connect, $post_id)
{
	$query = "
	SELECT * FROM tbl_comment 
	WHERE post_id = '".$post_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function make_follow_button($connect, $sender_id, $receiver_id)
{
	$query = "
	SELECT * FROM tbl_follow 
	WHERE sender_id = '".$sender_id."' 
	AND receiver_id = '".$receiver_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		  
 		if(!isset($_SESSION['USER']->id)) 
 		{ 		
		$output = '<button type="button" name="follow_button" class="btn btn-warning action_button" data-action="unfollow2" data-sender_id="'.$sender_id.'" disabled> Following</button>';
		}else{
			$output = '<button type="button" name="follow_button" class="btn btn-warning action_button" data-action="unfollow" data-sender_id="'.$sender_id.'"> Following</button>';
		}//not user
	}
	else
	{

		if(!isset($_SESSION['USER']->id)) 
 		{ 
		$output = '<button type="button" name="follow_button" class="btn btn-info action_button" data-action="follow2" data-sender_id="'.$sender_id.'" disabled><i class="glyphicon glyphicon-plus"></i> Follow</button>';
		}else{
			$output = '<button type="button" name="follow_button" class="btn btn-info action_button" data-action="follow" data-sender_id="'.$sender_id.'"><i class="glyphicon glyphicon-plus"></i> Follow</button>';
		}//not user

	}//total row
	return $output;
}

function count_total_post_like($connect, $post_id)
{
	$query = "
	SELECT * FROM tbl_like 
	WHERE post_id = '".$post_id."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

function Get_user_id($connect, $username)
{
	$query = "
	SELECT id FROM users 
	WHERE username = '".$username."'
	";	
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["id"];
	}
}

?>