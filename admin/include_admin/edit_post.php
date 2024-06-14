<?php 
	$id = $_SESSION['USER']->id;	
	if(isset($_GET['p_id'])){
		$p_id =(int)$_GET['p_id'];//use int to prevent sql injection		
	}else{
		header('Location: post.php');
	}//check whether edit button click	

// edit post (not include image) view form
	$sql = "SELECT * FROM post WHERE post_id = $p_id";
	$select_post =mysqli_query($con,$sql);
	confirm_query($select_post);
		while($row = mysqli_fetch_assoc($select_post)){

			$post_title = escape($row['post_title']);
			$post_status = escape($row['post_status']);
			$post_author = escape($row['post_author']);
			$post_image= basename($row['post_image']);//use basename() to prevent sql injection attack
			$new_video_name2 = $row['video_url'];
			$files2 =$row['file_name'];
			//$post_tag = escape($row['post_tag']);
			$post_content = $row['post_content'];			
}
// end of edit

// edited data store
		if (isset($_POST['edit_post'])) {
			$post_title = escape($_POST['post_title']);
			$post_status = escape($_POST['post_status']);
			$post_content = escape($_POST['post_content']);

            $query=mysqli_query($con, "SELECT * FROM users WHERE id = $id") or die(mysqli_error());
                if(mysqli_num_rows($query) > 0){
                    $fetch = mysqli_fetch_assoc($query);
                }

				$post_author = $fetch['username'];
				$post_tag = $post_title.','.$post_author.','.date("Y/m/d");

				// if(empty($post_image) || $post_image ==''){
				// 	$sql = "SELECT post_image FROM post WHERE post_id = $p_id";
				// 	$select_image = mysqli_query($con,$sql);
			    //     confirm_query($select_image);
			    //     $post_image = mysqli_fetch_row($select_image)[0];
				// }

				//Click the other file button
				// if(isset($_FILES['file'])){     
	 				$files = $_FILES['file']['name'];
	   				$file_loc = $_FILES['file']['tmp_name'];
	 				$file_size = $_FILES['file']['size'];
	 				$file_type = $_FILES['file']['type']; 
	 				$folder='../admin/uploadfile/' . $files;

	 			if(!empty($files)){	
	 				if ($_FILES["file"]["size"] > 10000000) 
	 					{
		 					echo "<script>alert('File Uploading Failed. File size too large (max 10MB)')</script>";
		 					// $new_files = '';  
						}else{
							
							 $s1 ="UPDATE post SET file_name='$files' WHERE post_id = $p_id";  						
	        				confirm_query(mysqli_query($con,$s1));

                            if($s1){
                                move_uploaded_file( $file_loc, $folder);	
                                // header('location:post.php?source=edit_post&p_id=95');
                            }					
						}								
				}//end	

                    $update_image = $_FILES['post_image']['name'];
                    $update_image_size = $_FILES['post_image']['size'];
                    $update_image_tmp_name = $_FILES['post_image']['tmp_name'];
                    $update_image_folder = '../img/'.$update_image;
                    $p_id =(int)$_GET['p_id'];

                    if(!empty($update_image)){
                        if($update_image_size > 2000000){
                            echo "<script>alert('Image Uploading Failed. Image size too large (max 2MB)')</script>";
                           
                        }else{
                            
                            $s ="UPDATE post SET post_image = '$update_image' WHERE post_id = $p_id";  						
	        				confirm_query(mysqli_query($con,$s));

                            if($s){
                                move_uploaded_file($_FILES['post_image']['tmp_name'], $update_image_folder);
                                // header('location:post.php?source=edit_post&p_id=95');

                            }
                            // $message[] = 'image updated successfully!';

                        }
                    }//end of profile


				//Click the Video button
				// if (isset($_FILES['my_video'])) {
					$video_name =$_FILES['my_video']['name'];
					$tmp_name =$_FILES['my_video']['tmp_name']; 
					$video_size = $_FILES['my_video']['size'];
					$video_upload_path = '../admin/upload/'.$video_name;

				if(!empty($video_name)){
					if($video_size < 318303192) //fileSize< 300MB
					{			
	        			$s3 ="UPDATE post SET video_url='$new_video_name' WHERE post_id = $p_id";  						
	        			confirm_query(mysqli_query($con,$s3));

                            if($s3){
                                move_uploaded_file($_FILES['my_video']['tmp_name'], $video_upload_path);
                                // header('location:post.php?source=edit_post&p_id=95');

                            }
					}else{
						echo "<script>alert('Video Uploading Failed. Video size too large (max 300MB)')</script>";
	 					// $new_video_name = '';
					}
				}	

					$sql ="UPDATE post SET post_title='$post_title' , post_author='$post_author' ,post_date = now(),post_tag='$post_tag',post_content='$post_content',post_status='$post_status'  WHERE post_id = $p_id";	  						
	        		confirm_query(mysqli_query($con,$sql));
			        echo "<p>Post Updated <a href=\"post.php\">Go Back View All Posts</a></p>";
				
 		}//end create post button
?>

<!-- <div class="card"> 
	<div class="col-md-8"> -->
		<!-- file format have two type (download and upload) -->
		<form action=""  method= "post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="post_title">Post Title</label>
				<input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $post_title ?>" style="border:solid 2px grey;">
			</div>

			<label for="">Status</label>
			<select name="post_status" id="" class="form-control show-tick" style="border:solid 2px grey;">
			<!-- <select name="post_status" id="" style="border:solid 2px grey;"> -->
				<option value="<?php echo $post_status ?>">Select Option</option>
				<option value="publish">Public</option>
				<option value="draft">Draft</option>
			</select>

			<!-- different with others -->
			<div class="form-group2">
				<label for="post_image">Post Image</label>
				<input type="file" id="post_image" name="post_image" accept="image/*" >
			</div>

			<div class="form-group2">
				<img width= "100px" src="../img/<?php echo $post_image; ?>" alt="">
			</div>
			<!-- call image related -->

			<div class="form-group2">
				<label for="post_video">Post Video</label>
				<input type="file" name="my_video" accept="video/*"> 				
			</div>

    		<div class="form-group2">
				<label for="post_video" class="control-label"><?php echo $new_video_name2; ?></label>
			</div>
   			 <!-- call video related -->

			<!-- call file related -->
		    <div class="form-group2">
				<label for="post_file">Post File</label>
				<input type="file" name="file" accept="application/*,.zip,.rar">
			</div>

			<div class="form-group2">
				<label for="post_file"><?php echo $files2; ?></label>
			</div>
	
			<div class="form-group">
				<label for="post_content">Post Content</label>
				<textarea name="post_content" id="post_content" cols="70" rows="10" type="file">
					<?php echo $post_content ?>			
				</textarea>
				<script>
			       CKEDITOR.replace('post_content', {
        				// filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        				// filebrowserUploadMethod: 'form'
    				});
				</script>
			</div>

			<input type="submit" name="edit_post" value="Update Post" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
		</form>