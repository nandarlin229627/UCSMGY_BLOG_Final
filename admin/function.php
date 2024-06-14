<?php
// take connection
	function confirm_query($result){
		global $con;//main
		if (!$result) {
       		die('Connection failed'.mysqli_error($con));
        }                            
	}

	//created categories(insert Category)
	function create_category(){
		global $con;//main
		if (isset($_POST['create'])) { 
		 	//submit name=create
	        //echo "Successfully Connection";
	        $cat_title = $_POST['cat_title'];
	        $sql = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
	        $result = mysqli_query($con,$sql);
	        confirm_query($result);//function call
	    }
	}

	//delete category
	function delete_category(){
		global $con;//main
		if (isset($_GET['delete'])) {//delete line 110= show table
        	$cat_id = $_GET['delete'];
        	$sql = "DELETE FROM categories WHERE cat_id=$cat_id";//test cat_id
        	$result = mysqli_query($con,$sql);
        	confirm_query($result);
        	header('Location: admin_categories.php');//delete data in both web page and database
    	}
	}

	//created blogs(insert BLogs)
	function create_blog(){
		global $con;//main
		if (isset($_POST['create'])) { 
		 	//submit name=create
	        //echo "Successfully Connection";
	        $Blog_Name = $_POST['Blog_Name'];
	        $sql = "INSERT INTO blog_group(Blog_Name) VALUES ('$Blog_Name')";
	        $result = mysqli_query($con,$sql);
	        confirm_query($result);//function call
	    }
	}

	//delete blogs
	function delete_blog(){
		global $con;//main
		if (isset($_GET['delete'])) {//delete line 110= show table
        	$Blog_id = $_GET['delete'];
        	$sql = "DELETE FROM blog_group WHERE Blog_id=$Blog_id";//test cat_id
        	$result = mysqli_query($con,$sql);
        	confirm_query($result);
        	header('Location: admin_blogs.php');//delete data in both web page and database
    	}
	}

	// accept ''"" -database
	function escape($string){
		global $con;
		return mysqli_real_escape_string($con,$string);
	}

	//for username(clean register)
	function clean_input($input){
		$input = trim($input); //delete space
		$input = htmlspecialchars($input); //prevent sqlinjection attack
		return $input;
	}
?>
