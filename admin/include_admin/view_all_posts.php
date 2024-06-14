<!-- selectall delete -->
<?php 
if (isset($_POST['checkboxArray'])) {
	foreach ($_POST['checkboxArray'] as $p_id) { 
		$sql_new1 ="SELECT * FROM post WHERE post_id=$p_id";
		$delete_result1 = mysqli_query($con,$sql_new1);
	    confirm_query($delete_result1);
	    $row3 = mysqli_fetch_assoc($delete_result1);
	    $post_category_id3 = $row3['post_category_id'];

		if(isset($_POST['alldelete'])) {
			$sql = "DELETE FROM post WHERE post_id = $p_id";
			$delete_post = mysqli_query($con,$sql);
			confirm_query($delete_post);
        	$statement = $con->prepare($sql);
		}	

		if($statement->execute()){
			$sub_query1 = "UPDATE blog_group JOIN categories ON blog_group.Blog_id = categories.blog_postid  SET Post_Number = Post_Number - 1 WHERE categories.cat_id = '".$post_category_id3."'
						";
			$statement = $con->prepare($sub_query1);
			$statement->execute();
		}	        			
	}
}
?>

<!-- <div class="card"> -->
<div class="body">
	<form method="get" action="post.php">
	<?php
	$user_role = $fetch['user_role'];
	if ( $user_role == 'Admin') {    
	?>

	<!-- select user -->
		<div class="row">
			<div class="col-md-3">
				<select name="sub_user_id" id="" class="form-control" style="border:solid 2px grey;">
					<option value="">&nbsp;Select User</option>
					<?php
					$sql = "SELECT * FROM users ORDER BY username";//use order by //error
		            $result =  mysqli_query($con,$sql);
		             confirm_query($result);//function call
		                while ($row = mysqli_fetch_assoc($result)) {
		                    $select_id = $row ['id'];
		                    $username = $row ['username'];
					?>
		            <option value="<?php echo $select_id?>"><?php echo $username?></option>
		            <?php                                                       
		                }
		             ?>

		            <?php			   
					if(!empty($_GET['sub_user_id'])) {
						$selected_user = $_GET['sub_user_id'];						       
					}else{
						echo 'Please select the username.';
					}			    
					?>		             
				</select>	
			</div>

			<div class="col-md-8">
				<input type="submit" name="" value="Apply" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;" >
			</div>
		</div>
		<?php
		}
			//user control
		?>
	</form>
	<!-- end user-->


	<!-- select category -->
	<form method="get" action="post.php">
		<div class="row">
			<div class="col-md-3">	
				<select name="submit_blog" id="" class="form-control show-tick" style="border:solid 2px grey;">
					<option value="">Select Catagory</option>
					<?php
					$sql = "SELECT * FROM blog_group ORDER BY Blog_Name";//use order by
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

			        <?php						   
					if(!empty($_GET['submit_blog'])) {
						$selected_blog = $_GET['submit_blog'];							       
					} else {
						echo 'Please select the Blog Group.';
					}						    
					?>
				</select>
			</div>

			<div class="col-md-8">
				<input type="submit" name="" value="Apply" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
			</div>
		</div>
	</form>	
	<!-- end of selected category -->

	<!-- select sub category -->
	<form method="get" action="post.php">
		<div class="row">
			<div class="col-md-3">	
				<select name="submit_category" id="" class="form-control show-tick" style="border:solid 2px grey;">
					<option value="">Select Sub Catagory</option>
					<?php
					$sql = "SELECT * FROM categories WHERE blog_postid='$selected_blog' ORDER BY cat_title";//use order by //error
			        $result =  mysqli_query($con,$sql);
			        confirm_query($result);//function call
			            while ($row = mysqli_fetch_assoc($result)) {
			                $cat_id = $row ['cat_id'];
			                $cat_title = $row ['cat_title'];
					?>
			        <option value="<?php echo $cat_id?>"><?php echo $cat_title?></option>
			        <?php                                                       
			              }
			        ?>

			        <?php			   
					if(!empty($_GET['submit_category'])) {
						$selected_sub = $_GET['submit_category'];				       
					} else {
						echo 'Please select the Sub Category.';
					}			    
					?>
				</select>
			</div>

			<div class="col-md-8">
				<input type="submit" name="" value="Apply" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
			</div>
		</div>
	</form>
	<!-- end of select sub category -->
	<br>

	<!-- date search -->
	<form method="get" action="post.php">
		<!-- start date -->
		<div class="row">
			<div class="col-md-4">
			    <label for="post_title" style="color:black;">From</label>
			    <input type="date" name="from_date" id="from_date" class="form-control dateFilter" placeholder="From Date" style="border:solid 2px grey;"/>
			</div>
			<div class="col-md-4">
			    <label for="post_title" style="color:black;">To</label>
			    <input type="date" name="to_date" id="to_date" class="form-control dateFilter" placeholder="To Date" style="border:solid 2px grey;" />
			</div>
			 <br>
			<div class="col-md-3">
			    <input type="submit" name="" id="btn_search" value="Search" class="btn btn-success" style="color: black;" />
			</div>
		</div>
		</br>
	</form>
	<!--end of date search -->


	<!-- all delete -->
	<form method="post">
		<div class="row">
			<div class="col-md-8">
				<input type="submit" name="alldelete" value="ALL DELETE" class="btn btn-success" style="color:black;" onclick="return confirm('Do you want to delete this post?');">
			</div>
		</div>

	    <div class="row">
	      	<div class="col-md-10">
	        	<div id="purchase_order">
					<script type="text/javascript">
						$(document).ready(function(){
						    $('#js').on('click',function(){
						        if(this.checked){
						            $('.ss').each(function(){
						                this.checked = true;
						            });
						        }else{
						             $('.ss').each(function(){
						                this.checked = false;
						            });
						        }
						    });
							
							// $('.checkbox').on('click',function(){
							// 	if($('.checkbox:checked').length == $('.checkbox').length){
							// 		$('#select_all').prop('checked',true);
							// 	}else{
							// 		$('#select_all').prop('checked',false);
							// 	}
							// });
						});
					</script>

					<!-- sorting -->
					<?php
					$columns = array('cat_title','post_title','username','post_date');

					// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
					$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

					// Get the sort order for the column, ascending or descending, default is ascending.
					$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
					?>

					<?php

					// user permission
					$id = $_SESSION['USER']->id;
					$user_role = $fetch['user_role'];
						if ( $user_role == 'Admin') {
							if(isset($_GET['sub_user_id'])) {
				            	$sql = "SELECT *,ROW_NUMBER() OVER (ORDER BY  $column $sort_order) AS row_num FROM post JOIN users ON post.user_id = users.id JOIN categories ON post.post_category_id = categories.cat_id WHERE user_id = $selected_user ORDER BY $column $sort_order"; 

				        	}elseif(isset($_GET['submit_blog'])) {				            				
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id WHERE blog_postid = $selected_blog ORDER BY $column $sort_order"; 

				        	}elseif(isset($_GET['submit_category'])) {
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id WHERE post_category_id = $selected_sub ORDER BY $column $sort_order";

				        	}elseif(isset($_GET['post_tag9'])) {
				            	$post_tag = $_GET['post_tag9'];
				            	$sql = "SELECT * FROM post ,ROW_NUMBER() OVER (ORDER BY post_id DESC) AS row_num
										JOIN users ON users.id = post.user_id
										JOIN categories ON post.post_category_id = categories.cat_id
										WHERE users.username LIKE '%$post_tag%' OR users.email_verified LIKE '%$post_tag%' OR users.user_role LIKE '%$post_tag%' OR post.post_title '%$post_tag%' OR categories.cat_title LIKE '%$post_tag%'";

				        	}elseif(isset($_GET['from_date'])) {
				        		if(isset($_GET['to_date'])){
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id WHERE post_date BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."' ORDER BY $column $sort_order";
				            	}

				       		}else{
								$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id ORDER BY $column $sort_order";
							}

						}elseif ($user_role == 'Writer') {
							if(isset($_GET['submit_blog'])) {				            				
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id WHERE blog_postid = $selected_blog AND user_id = $id ORDER BY $column $sort_order"; 

				        	}elseif(isset($_GET['submit_category'])) {
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id WHERE post_category_id = $selected_sub AND user_id = $id ORDER BY $column $sort_order"; 

				        	}elseif(isset($_GET['post_tag9'])) {
				            	$post_tag = $_GET['post_tag9'];
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post
										JOIN users ON users.id = post.user_id
										JOIN categories ON post.post_category_id = categories.cat_id
										WHERE users.username LIKE '%$post_tag%' OR users.email_verified LIKE '%$post_tag%' OR users.user_role LIKE '%$post_tag%' OR post.post_title '%$post_tag%' OR categories.cat_title LIKE '%$post_tag%' AND user_id = $id ";

				        	}elseif(isset($_GET['from_date'])) {
				        		if(isset($_GET['to_date'])){
				            	$sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN users ON post.user_id = users.id JOIN categories ON post.post_category_id = categories.cat_id WHERE user_id = $id AND post_date BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."' ORDER BY $column $sort_order";

				            	}
				        	}else{
							    $sql = "SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM post JOIN categories ON post.post_category_id = categories.cat_id JOIN users ON post.user_id = users.id WHERE user_id = $id ORDER BY $column $sort_order";
							}							    
						}

						$aa = $con->query($sql);
						// Get the result...
						if ($result = $aa ) {
							// Some variables we need for the table.
							$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
							$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
							$add_class = ' class="highlight"';
						?>


					<table class="table table-bordered table-hover" style="background-color:#ffffff" >
						<thead>
						<tr>
							<th>
								<div class="form-check">
					            	<input class="form-check-input checkAllBox" type="checkbox" id="js" name="checkboxArray" >
					            	<label class="form-check-label" for="js">
					               </label>
					        	</div>
							</th> 						 			        			
							<th><a href="#">No<p></p><i class="fas fa"></i></a></th>
						
							<?php
							if(isset($_GET['sub_user_id'])) {
								$s = $_GET['sub_user_id'];
							?>
							<th style="width:100px;"><a href="post.php?sub_user_id=<?php echo $s; ?>&column=cat_title&order=<?php echo $asc_or_desc; ?>">Sub_Category<p></p><i class="fa fa-sort<?php echo $column == 'cat_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?sub_user_id=<?php echo $s; ?>&column=post_title&order=<?php echo $asc_or_desc; ?>">Title<p></p><i class="fa fa-sort<?php echo $column == 'post_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?sub_user_id=<?php echo $s; ?>&column=username&order=<?php echo $asc_or_desc; ?>">Author<p></p><i class="fas fa-<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?sub_user_id=<?php echo $s; ?>&column=post_date&order=<?php echo $asc_or_desc; ?>">Date<p></p><i class="fas fa-sort<?php echo $column == 'post_date' ? '-' . $up_or_down : ''; ?>"></i></a></th>	

							<?php
							}elseif(isset($_GET['submit_blog'])) {
								$s = $_GET['submit_blog'];
							?>
							<th><a href="post.php?submit_blog=<?php echo $s; ?>&column=cat_title&order=<?php echo $asc_or_desc; ?>">Sub_Category<p></p><i class="fa fa-sort<?php echo $column == 'cat_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?submit_blog=<?php echo $s; ?>&column=post_title&order=<?php echo $asc_or_desc; ?>">Title<p></p><i class="fa fa-sort<?php echo $column == 'post_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?submit_blog=<?php echo $s; ?>&column=username&order=<?php echo $asc_or_desc; ?>">Author<p></p><i class="fas fa-sort<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?submit_blog=<?php echo $s; ?>&column=post_date&order=<?php echo $asc_or_desc; ?>">Date<p></p><i class="fas fa-sort<?php echo $column == 'post_date' ? '-' . $up_or_down : ''; ?>"></i></a></th>

							<?php
							}elseif(isset($_GET['submit_category'])) {
								$s = $_GET['submit_category'];
							?>

							<th><a href="post.php?submit_category=<?php echo $s; ?>&column=cat_title&order=<?php echo $asc_or_desc; ?>">Sub_Category<p></p><i class="fa fa-s<?php echo $column == 'cat_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?submit_category=<?php echo $s; ?>&column=post_title&order=<?php echo $asc_or_desc; ?>">Title<p></p><i class="fa fa-sort<?php echo $column == 'post_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?submit_category=<?php echo $s; ?>&column=username&order=<?php echo $asc_or_desc; ?>">Author<p></p><i class="fas fa-sort<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?submit_category=<?php echo $s; ?>&column=post_date&order=<?php echo $asc_or_desc; ?>">Date<p></p><i class="fas fa-sort<?php echo $column == 'post_date' ? '-' . $up_or_down : ''; ?>"></i></a></th>	

							<?php
							}elseif(isset($_GET['from_date'])) {
								if(isset($_GET['to_date'])) {
								$s = $_GET['from_date'];
								$s1 = $_GET['to_date'];
							?>

							<th><a href="post.php?from_date=<?php echo $s; ?>&to_date=<?php echo $s1; ?>&column=cat_title&order=<?php echo $asc_or_desc; ?>">Sub_Category<p></p><i class="fa fa-sort<?php echo $column == 'cat_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?from_date=<?php echo $s; ?>&to_date=<?php echo $s1; ?>&column=post_title&order=<?php echo $asc_or_desc; ?>">Title<p></p><i class="fa fa-sort<?php echo $column == 'post_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?from_date=<?php echo $s; ?>&to_date=<?php echo $s1; ?>&column=username&order=<?php echo $asc_or_desc; ?>">Author<p></p><i class="fas fa-sort<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?from_date=<?php echo $s; ?>&to_date=<?php echo $s1; ?>&column=post_date&order=<?php echo $asc_or_desc; ?>">Date<p></p><i class="fas fa-sort<?php echo $column == 'post_date' ? '-' . $up_or_down : ''; ?>"></i></a></th>	

							<?php
							}
							}else{
							?>							
							<th><a href="post.php?column=cat_title&order=<?php echo $asc_or_desc; ?>">Sub_Category<p></p><i class="fa fa-sort<?php echo $column == 'cat_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?column=post_title&order=<?php echo $asc_or_desc; ?>">Title<p></p><i class="fa fa-sort<?php echo $column == 'post_title' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?column=username&order=<?php echo $asc_or_desc; ?>">Author<p></p><i class="fas fa-sort<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<th><a href="post.php?column=post_date&order=<?php echo $asc_or_desc; ?>">Date<p></p><i class="fas fa-sort<?php echo $column == 'post_date' ? '-' . $up_or_down : ''; ?>"></i></a></th>
							<?php
							}
							?>
							<th colspan="2"></th>				
						</tr>
						</thead>
						<!-- show all post -->
						
						<?php
				        while ($row = mysqli_fetch_assoc($result)) {
				        	$row_num = escape($row['row_num']);
				        	$post_id = escape($row['post_id']);

				        	$post_category_id = escape($row['post_category_id']);
				        	$post_title = escape($row['post_title']);
				        	$post_author = escape($row['username']);

				        	$post_image = basename($row['post_image']);
				        	
				        	$new_video_name = $row['video_url'];  
				        	$files=$row['file_name'];

				        	$post_date = escape($row['post_date']);
				        	$post_tag = escape($row['post_tag']);
				        	// $post_content =$row['post_content'];
				    	?>   
						<tr>
							<td>
								<div class="form-check">
					            	<input class="form-check-input ss" type="checkbox" id="<?php echo $post_id ?>" name="checkboxArray[]" value="<?php echo $post_id ?>">
					            	<label class="form-check-label" for="<?php echo $post_id ?>">
					               </label>
				        		</div>
							</td>

							<td><?php echo $row_num; ?></td>
							<td<?php echo $column == 'cat_title' ? $add_class : ''; ?>><?php echo $row['cat_title']; ?></td>
							<td<?php echo $column == 'post_title' ? $add_class : ''; ?>><?php echo $row['post_title']; ?></td>
							<td<?php echo $column == 'post_author' ? $add_class : ''; ?>><?php echo $row['username']; ?></td>
							<td<?php echo $column == 'post_date' ? $add_class : ''; ?>><?php echo $row['post_date']; ?></td>
								
							<!-- edit and delete -->
							<td>
								<a href="post.php?source=edit_post&p_id=<?php echo $post_id ?>"><i class="fas fa-edit"></i></a>
							</td>

							<td>
								<a href="post.php?delete=<?php echo $post_id ?>" onclick="return confirm('Are You Sure You Want To Delete?');" style="color: red;"><i class="fas fa-trash"></i></a>
							</td>
							<!-- end of edit and delete -->
						</tr>
						<?php 
							}
						?>
					<!-- end of show all post -->	
					</table>
				<?php
					$result->free();
				}
				?>
				<script>
			        $(function(){
			            $('.confirm_delete3').click(function(){
			                return confirm('Are You Sure You Want To Delete');
			            });
			        });        
			  	</script>          
        	</div>
      	</div>
  	</form>

	<script>
	    $(document).ready(function () {

	      $('.dateFilter').datepicker({
	        dateFormat: "yy-mm-dd"
	      });

	     
	    });
	</script>

	<!-- delete post -->
	<?php
	if (isset($_GET['delete'])) {//delete line 58= show table
        $p_id = (int)$_GET['delete'];

        $sql_new ="SELECT * FROM post WHERE post_id=$p_id";
		$delete_result = mysqli_query($con,$sql_new);
	    confirm_query($delete_result);
	   	$row2 = mysqli_fetch_assoc($delete_result);
	    $post_category_id2 = $row2['post_category_id'];

        $sql = "DELETE FROM post WHERE post_id=$p_id";//test p_id
        $result = mysqli_query($con,$sql);
        confirm_query($result);

        $statement = $con->prepare($sql);
		$statement->execute();
		if($statement->execute()){							
			$sub_query = "UPDATE blog_group JOIN categories ON blog_group.Blog_id = categories.blog_postid  SET Post_Number = Post_Number - 1 WHERE categories.cat_id = '".$post_category_id2."'
						";
			$statement = $con->prepare($sub_query);
			$statement->execute();

		}	
        	header('Location: post.php');//delete data in both web page and database
    }
	?>
	<!-- end of delete post -->

	
	<script type="text/javascript">
		$(document).ready(function(){
		    $('#js').on('click',function(){
		        if(this.checked){
		            $('.ss').each(function(){
		                this.checked = true;
		            });
		        }else{
		             $('.ss').each(function(){
		                this.checked = false;
		            });
		        }
		    });
			
			// $('.checkbox').on('click',function(){
			// 	if($('.checkbox:checked').length == $('.checkbox').length){
			// 		$('#select_all').prop('checked',true);
			// 	}else{
			// 		$('#select_all').prop('checked',false);
			// 	}
			// });
		});
	</script>