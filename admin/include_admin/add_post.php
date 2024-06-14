<!-- insert post -->
<?php 
	if (isset($_POST['create_post'])) { //submit name=create_post
		$post_category_id = escape($_POST['sub_category2']);
		$post_status = escape($_POST['post_status']);
		$post_title = escape($_POST['post_title']);
		$post_content = $_POST['post_content'];

		$id = $_SESSION['USER']->id;
		$post_author = $fetch['username'];

  		$post_tag = $post_title.','.$post_author.','.date("Y/m/d");
		
		//Click the other file button
		if(isset($_FILES['file'])){				   
	 		$files = $_FILES['file']['name'];
	   		$file_loc = $_FILES['file']['tmp_name'];
	 		$file_size = $_FILES['file']['size'];
	 		$file_type = $_FILES['file']['type']; 
	 				
	 		if ($_FILES["file"]["size"] > 10000000){	 					
		 		echo "<script>alert('File Uploading Failed. File size too large (max 10MB)')</script>";
		 						//die('The file you attempted to upload is too large.');
		 		$new_files = '';  
			}else{
				$new_files = $files;  
		 		$folder='../admin/uploadfile/' . $new_files;
				move_uploaded_file( $file_loc, $folder);						
			}								
		}	

		//image
		$post_image= basename($_FILES['post_image']['name']);//use basename() to prevent sql injection attack
		$post_image_tmp  = $_FILES['post_image']['tmp_name'];//to store xampp tmp

		if ($_FILES["post_image"]["size"] > 2000000) {
	 		echo "<script>alert('Image Uploading Failed. Image size too large (max 2MB)')</script>";
	 		$post_image_new = '';
		}else{
			$post_image_new = $post_image;
			move_uploaded_file($post_image_tmp, '../img/'.$post_image_new);//to upload img folder
		}

		//Click the Video button
		if (isset($_FILES['my_video'])){
			$video_name =$_FILES['my_video']['name'];
			$tmp_name =$_FILES['my_video']['tmp_name']; 
			$file_size = $_FILES['my_video']['size'];
		
			if($file_size > 318303192){
				echo "<script>alert('Video Uploading Failed. Video size too large (max 300MB)')</script>";
	 			$new_video_name = '';							
			}else{
	 			$new_video_name = $video_name;   
				$video_upload_path = '../admin/upload/'.$new_video_name;
				move_uploaded_file($tmp_name, $video_upload_path);
			}

			$sql = "INSERT INTO post(post_category_id,user_id,post_title, post_author, post_date, post_image,video_url,file_name,post_tag, post_content, post_status)";
			$sql .= "VALUES ($post_category_id,$id,'$post_title','$post_author',now(), '$post_image_new','$new_video_name','$new_files','$post_tag', '$post_content','$post_status')"; 

			$statement = $con->prepare($sql);
			if($statement->execute()){						
				$sub_query = "UPDATE blog_group JOIN categories ON blog_group.Blog_id = categories.blog_postid  SET Post_Number = Post_Number + 1 WHERE categories.cat_id = '".$post_category_id."'
						";
				$statement = $con->prepare($sub_query);
				$statement->execute();
			}
	         	echo "<p>Post Created</p>";
		}	
 	}//end create post button
?>
<!-- end of insert post -->

<!-- <div class="card"> -->
		<div class="col-md-8">
			<!-- file format have two type (download and upload) use enctype -->
			<form action=""  method= "post" enctype="multipart/form-data">
				<div class="body">
					<select name="Category" id="Category" class="form-control show-tick" style="border:solid 2px grey;">
						<option selected disabled>Select Category</option>
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
			
	                <select class="form-control show-tick" id="sub_category" name="sub_category2" style="border:solid 2px grey;">
	                      <option selected disabled>Select Sub_Category</option>
	                </select>					
		
					<!-- for status -->
					<select name="post_status" id="" class="form-control show-tick" style="border:solid 2px grey;">
						<option value="publish">Select Option</option>
						<option value="publish">Public</option>
						<option value="draft">Draft</option>
					</select>

					<div class="form-group2">
						<label for="post_title">Post Title</label>
						<input type="text" name="post_title" id="post_title" class="form-control" style="border:solid 1.5px grey;">
					</div>

					<div class="form-group2">
						<label for="post_image" class="control-label">Post Image</label>
						<input type="file" id="post_image" name="post_image" accept="image/*">
					</div>

					<div class="form-group2">
						<label for="post_file" class="control-label">Post Other File</label>
						<input type="file" name="file" accept="application/*,.zip,.rar">
					</div>

					<div class="form-group2">
						<label for="post_video" class="control-label">Post Video</label>
						<input type="file" name="my_video" accept="video/*">
					</div>

					<div class="form-group">
						<label for="post_content">Post Content</label>
					    <textarea name="post_content" cols="70" rows="10" id="post_content" type="file"></textarea>
						    <script>
								  CKEDITOR.replace('post_content', {
				    			});
							</script>	
				    </div>

					<div class="form-group">
						<input type="submit" name="create_post" value="Create Post"  class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
					</div>
				</div>
				<!-- body -->
			</form>
		</div>
		<!-- col-8 -->

<script>
    $('#Category').on('change', function() {
        var blog_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'state.php',
            type: "POST",
            data: {
                blog_data: blog_id
            },
            success: function(result) {
                $('#sub_category').html(result);
                // console.log(result);
            }
        })
    });
</script>