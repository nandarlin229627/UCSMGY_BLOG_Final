<?php include_once "include_admin/upper.php"; ?> <!-- Header-->

<!-- START CONTENT -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Category</h2>                       
                </div>                   
            </div>
        </div>

        <div class="clearfix"></div>
            <div class="card">
                <div class="body"> 
                    <div class="col-lg-12 ">
                        <!-- user permission levels -->
                        <?php
                        $user_role = $fetch['user_role'];
                        if ( $user_role == 'Author') {
                            echo "<script> alert('ONLY ADMIN CAN DO');
                            window.location.href='./index.php'; </script>";
                        }
                        elseif ($user_role == 'Admin') {
                        ?> 

                        <?php 
                        create_blog();
                        ?>

                    <div class="col-md-6">
                        <form action="" method="post">                           
                            <label for="">New Category</label>
                                <input type="text" name="Blog_Name" class="form-control" style="border:solid 1.5px grey;">     <input type="submit" name="create" value="Create" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
                        </form>

                        <!-- edit category -->
                        <?php 
                        if (isset($_GET['edit'])) {
                            $Blog_id = $_GET['edit'];
                            $sql = "SELECT * FROM blog_group WHERE Blog_id=$Blog_id";
                            $result = mysqli_query($con,$sql);
                            confirm_query($result);//function call

                            $row = mysqli_fetch_assoc($result);//only one row(no while loop)
                            $Blog_Name = $row['Blog_Name'];

                            if (isset($_POST['edit'])) {
                                $Blog_Name = $_POST['Blog_Name'];
                                $sql = "UPDATE blog_group SET Blog_Name='$Blog_Name' WHERE Blog_id=$Blog_id";
                                $result = mysqli_query($con,$sql);
                                confirm_query($result);//function call                                        
                            }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Edit Category</label>
                                <input type="text" name="Blog_Name" class="form-control" value="<?php echo $Blog_Name ?>" style="border:solid 1.5px grey;">
                            </div>
                            <input type="submit" name="edit" value="Update" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
                        </form>  

                        <?php
                        }
                                    //end of get(edit)
                        ?>
                    </div>                      
                    <!-- col-md-6 -->
                    <!-- end of edit category -->

                    <!-- show table -->
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                            </tr>
                            <?php  
                            $sql = "SELECT *,ROW_NUMBER() OVER (ORDER BY Blog_id DESC) AS row_num FROM blog_group";

                            $result =  mysqli_query($con,$sql);
                            confirm_query($result);//function call
                            $rowcount=mysqli_num_rows($result);
                                        
                            while ($row = mysqli_fetch_assoc($result)) {
                                            
                                $Blog_id = $row ['Blog_id'];
                                $Blog_Name = $row ['Blog_Name'];   
                                $row_num = $row ['row_num'];                                
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row_num ?>
                                </td>

                                <td>
                                    <?php echo $Blog_Name ?>
                                </td>

                                <td>
                                    <a href="admin_blogs.php?edit=<?php echo $Blog_id ?>"><i class="fas fa-edit"></i></a>
                               </td>

                                <td>
                                    <a href="admin_blogs.php?delete=<?php echo $Blog_id ?>" style="color: red;" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="fas fa-trash "></i></a>
                                </td>
                            </tr>                                            
                            <?php                                                                         
                                }//for
                            ?>
                        </table>                           
                    </div>                             
                </div>
                <!-- col-12 -->
            </div>
            <!-- body -->
        </div>
        <!-- card -->
    </div>
    <!-- container-fluid -->
</section>
<!-- end of content -->

    <!-- delete category-->
    <?php 
        delete_blog();
    ?>
    <?php include_once "include_admin/lower.php"; ?> 

    <script>
        $(function(){
            $('.confirm_delete').click(function(){
                return confirm('Are You Sure You Want To Delete');
            });
        });        
    </script>

    <?php
        }
        //end of check admin
    ?>