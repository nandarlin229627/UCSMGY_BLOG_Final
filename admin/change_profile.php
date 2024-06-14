<?php include_once "include_admin/upper.php"; ?> <!-- Header-->
<!-- START CONTENT -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Change Profile</h2>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
            <?php
            $user_id = $_SESSION['USER']->id;
            if(isset($_POST['update_profile'])){          
                $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
                //$update_email = mysqli_real_escape_string($con, $_POST['update_email']);

                $sql = "UPDATE users SET username = '$update_name' WHERE id = $user_id";
                $result = mysqli_query($con,$sql);
                confirm_query($result);
                // echo "<script>alert('Username Updated')</script>";
                header('location:change_profile.php');
                    
                $update_image = $_FILES['image']['name'];
                // $update_image = imagecrop($update_image2, ['x' => 0, 'y' => 0, 'width' => 50, 'height' => 50]);

                $update_image_size = $_FILES['image']['size'];
                $update_image_tmp_name = $_FILES['image']['tmp_name'];
                //$targetFileForItem = "uploaded_img/$update_image";
                //$target_file = "../uploaded_img/$update_image";
                $update_image_folder = '../profile/'.$update_image;

                if(!empty($update_image)){
                    if($update_image_size > 2000000){
                        $message[] = 'image is too large';
                    }else{
                        $image_update_query = mysqli_query($con, "UPDATE users SET image = '$update_image' WHERE id = $user_id") or die(mysqli_error());

                        if($image_update_query){
                            move_uploaded_file($_FILES['image']['tmp_name'], $update_image_folder);
                        }
                        $message[] = 'image updated successfully!';
                    }
                }//end of profile
                    header('location:change_profile.php');
            }                // end of update profile
            ?>       
  
            <?php
            $query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die(mysqli_error());
                if(mysqli_num_rows($query) > 0){
                    $fetch = mysqli_fetch_assoc($query);
            }                   
            ?>

            <div class="row">
                <form id="myform" method="post" enctype="multipart/form-data">                   
                    <div class="col-md-4">  
                        <?php
                        if($fetch['image'] == ''){
                            echo '<img src="../img/default_u.jpg" style="width:200px;height:200px;margin:10px;">';
                        }else{
                            echo '<img src="../profile/'.$fetch['image'].'" style="width:200px;height:200px;margin:10px;">';
                        }                                
                        ?>
                        <h5>update your pic :</h5>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png"class="box">                     
                    </div>
                       <!-- col-6 -->

                    <div class="col-md-7">
                        <div class="form-group2">
                            <label for="post_title" style="color:black;">Username</label>
                            <input type="text" name="update_name" value="<?php echo $fetch['username'] ?>" class="form-control" style="border:solid 1.5px grey;">
                        </div>    
                           
                        <input type="submit" name="update_profile" value="Update Profile" id="update_profile"class="btn btn-raised waves-effect" style="background-color:#7ee3c1;"><br>
                            If you want to change your password, GO To <a href="change_password.php">Change Password</a>
                    </div>
                    <!-- col-7 -->                             
                </form>
            </div>
            <!-- row -->
        </div>  
    </div>
</section>
<?php include_once "include_admin/lower.php"; ?> 
