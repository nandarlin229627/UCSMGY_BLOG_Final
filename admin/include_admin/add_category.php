<!-- insert -->
<?php 
	if (isset($_POST['create_category'])) { //submit name=create_post
		// to join category table
		$blog_postid = escape($_POST['blog_postid']);
		$cat_title = escape($_POST['cat_title']);
		
		$sql = "INSERT INTO categories(blog_postid,cat_title)";
		$sql .= "VALUES ($blog_postid,'$cat_title')"; //use concatenation
		$result = mysqli_query($con,$sql);
        confirm_query($result);
        echo "<p>Sub_Category Created</p>";
	}
?>
<!-- end of insert-->

<div class="card">
	<div class="col-md-6">
	<!-- file format have two type (download and upload) use enctype -->
		<form action=""  method= "post" enctype="multipart/form-data">
			<div class="body">	
				<select name="blog_postid" id="" class="form-control show-tick" style="border:solid 2px grey;">
					<option class="control-label">Select Category</option>
						<?php
						$sql = "SELECT * FROM blog_group";//use order by
			            $result =  mysqli_query($con,$sql);
			            confirm_query($result);//function call
			                while ($row = mysqli_fetch_assoc($result)) {
			                    $Blog_id = $row ['Blog_id'];
			                    $Blog_Name = $row ['Blog_Name'];
						?>
			        <option value="<?php echo $Blog_id?>"><?php echo $Blog_Name?></option>
			        <?php                                                       
			                }
			        ?>
				</select>

				<label for="cat_title">Sub_Category</label>
				<input type="text" name="cat_title" id="cat_title" class="form-control" style="border:solid 1.5px grey;">
	
				<div class="form-group" >
					<input type="submit" name="create_category" value="Create" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
				</div>
			</div>
			<!-- body -->
		</form>
	</div>
	<!-- col-6 -->
</div>
<!-- card -->