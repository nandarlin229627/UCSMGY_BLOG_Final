<!-- clone and delete -->
<?php 
if (isset($_POST['checkboxArray'])) {
	foreach ($_POST['checkboxArray'] as $cat_id) { 
		if(isset($_POST['alldelete'])) {
			$sql = "DELETE FROM categories WHERE cat_id = $cat_id";
			$delete_post = mysqli_query($con,$sql);
			confirm_query($delete_post);
		}			
	}
}
?>
<!-- end of clone and delete -->

<!-- <div class="card"> -->
	<div class="body">		
		<!-- select category -->
		<div class="row">
			<form class="search_form" method="get" action="categories.php" >
				<div class="col-md-5">
					<select name="blog_postcategoryid" id="" class="form-control show-tick" style="border:solid 1.5px grey;">
						<option value="">Select Catagory</option>
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

			             	<?php			   
						    if(!empty($_GET['blog_postcategoryid'])) {
						        $selected_blog = $_GET['blog_postcategoryid'];						       
						    }else{
						        echo 'Please select the Blog Group.';
						    }			    
							?>
					</select>		
				</div>
				<!-- col-5 -->

				<div class="col-md-6">
					<input type="submit" name="" value="Apply" class="btn btn-raised" style="background-color:#7ee3c1;">	
				</div>
			</form>
		</div>
		<!-- row -->

		<form method="post">
			<div class="row">
				<div class="col-md-8">
					<input type="submit" name="alldelete" value="ALL DELETE" class="btn btn-success" style="color:black;" onclick="return confirm('Are You Sure You Want To Delete?');">						
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
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

					<table class="table table-bordered" style="background-color:#ffffff">
						<tr>
							<th>
					 			<div class="form-check">
		            					<input class="form-check-input checkAllBox" type="checkbox" id="js" name="checkboxArray" >
		            					<label class="form-check-label" for="js">
		               				</label>
		        				</div>
							</th> 
			 
							<th>No</th>
							<th>Category</th>
							<th>Sub_Categories</th>		
						</tr>

						<!-- show all category -->
							<?php
							if(isset($_GET['blog_postcategoryid'])) {
					            $sql = "SELECT *,ROW_NUMBER() OVER (ORDER BY cat_id DESC) AS row_num FROM categories  WHERE blog_postid = $selected_blog"; 
					        }else{

							$sql = "SELECT *,ROW_NUMBER() OVER (ORDER BY cat_id DESC) AS row_num FROM categories"; 
							}
							$result = mysqli_query($con,$sql);
					        confirm_query($result);

					        while ($row = mysqli_fetch_assoc($result)) {
					        	$row_num = escape($row['row_num']);
					        	$cat_id = escape($row['cat_id']);
					        	$blog_postid = escape($row['blog_postid']);
					        	$cat_title = escape($row['cat_title']);
					    	?>  

						<tr>
							<td>
								<div class="form-check">
			            			<input class="form-check-input ss" type="checkbox" id="<?php echo $cat_id ?>" name="checkboxArray[]" value="<?php echo $cat_id ?>">
			            			<label class="form-check-label" for="<?php echo $cat_id ?>">
			               				</label>
		        				</div>
							</td>

							<td><?php echo $row_num; ?></td>
							<!-- to category table join -->
							<td>
								<?php 							
								$sql ="SELECT * FROM blog_group WHERE Blog_id=$blog_postid";
								$select_category_blog = mysqli_query($con,$sql);
			        			confirm_query($select_category_blog);
			        			$row = mysqli_fetch_assoc($select_category_blog);
			        			echo $row['Blog_Name'];
								?>
								<!--end of to category table join -->
							</td>

							<td><?php echo $cat_title; ?></td>
						
							<!-- edit and delete -->
							<td>
								<a href="categories.php?source=edit_category&cat_id=<?php echo $cat_id ?>"><i class="fas fa-edit"></i></a>
							</td>

							<td>
								<a href="categories.php?delete=<?php echo $cat_id ?>" style="color: red;" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="fas fa-trash"></i></a>
							</td>
							<!-- end of edit and delete -->
						</tr>
						<?php 
						}//while
					 	?>
						<!-- end of show all post -->	
					</table>
				</div>
			</div>
			<!-- row -->
		</form>
	</div>

	<script>
        $(function(){
            $('.confirm_delete').click(function(){
                return confirm('Are You Sure You Want To Delete');
            });
        });        
  	</script>

	<!-- delete post -->
	<?php
	if (isset($_GET['delete'])) {
        $cat_id = (int)$_GET['delete'];
        $sql = "DELETE FROM categories WHERE cat_id=$cat_id";//test p_id
        $result = mysqli_query($con,$sql);
        confirm_query($result);
        header('Location: categories.php');//delete data in both web page and database
    }
	?>
	<!-- end of delete post -->
 