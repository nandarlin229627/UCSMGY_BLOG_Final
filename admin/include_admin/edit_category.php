<!-- insert  -->
<?php 	
	if(isset($_GET['cat_id'])){
		$cat_id =(int)$_GET['cat_id'];//use int to prevent sql injection		
	}else{
		header('Location: categories.php');
	}//check whether edit button click	

	// edit 
	$sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
	$select_category =mysqli_query($con,$sql);
	confirm_query($select_category);
		while($row = mysqli_fetch_assoc($select_category)){
			$cat_title = escape($row['cat_title']);			
		}
	// end of edit(not include image)view form 


	// edited data store
	if (isset($_POST['edit_category'])) {
		$cat_title = escape($_POST['cat_title']);
		$sql ="UPDATE categories SET cat_title='$cat_title' WHERE cat_id = $cat_id";
		confirm_query(mysqli_query($con,$sql));
		echo "<p>Updated <a href=\"categories.php\">Go Back View All Sub_Categories</a></p>";
	}
	// end of edited data store
?>

<div class="card">	
	<div class="col-md-6">
		<!-- file format have two type (download and upload) -->
		<form action=""  method= "post" enctype="multipart/form-data">
			<div class="body">
				<div class="form-group">
					<label for="cat_title">Edit Sub_Category</label>
					<input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php echo $cat_title ?>" style="border:solid 2px grey;">
				</div>
					<input type="submit" name="edit_category" value="Update" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
			</div>
		</form>
	</div>
</div>