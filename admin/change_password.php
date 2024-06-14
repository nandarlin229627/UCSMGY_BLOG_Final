<?php include_once "include_admin/upper.php"; ?> <!-- Header-->
<!-- START CONTENT -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Change Password</h2>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
          <?php
           $errors = array();
                $user_id = $_SESSION['USER']->id;
                if(isset($_POST['update_profile'])){          
                    $old_pass = $_POST['old_pass'];
                    $update_pass = mysqli_real_escape_string($con, hash('sha256',$_POST['update_pass']));
                    $new_pass = mysqli_real_escape_string($con, hash('sha256',$_POST['new_pass']));
                    $confirm_pass = mysqli_real_escape_string($con, hash('sha256',$_POST['confirm_pass']));

                        if (strlen($_POST['new_pass']) < 8 || strlen($_POST['new_pass']) > 16) {
                            $errors[] = "Password should be min 8 characters and max 16 characters";
                            }
                        if (!preg_match("/\d/", $_POST['new_pass'])) {
                        $errors[] = "Password should contain at least one digit";
                            }
                        if (!preg_match("/[A-Z]/", $_POST['new_pass'])) {
                        $errors[] = "Password should contain at least one Capital Letter";
                            }
                        if (!preg_match("/[a-z]/", $_POST['new_pass'])) {
                        $errors[] = "Password should contain at least one small Letter";
                            }
                        if (!preg_match("/\W/", $_POST['new_pass'])) {
                        $errors[] = "Password should contain at least one special character";
                            }
                        if (preg_match("/\s/", $_POST['new_pass'])) {
                        $errors[] = "Password should not contain any white space";
                            }
                        if($update_pass != $old_pass){
                            //echo "<script>alert('current password not matched!')</script>";
                            $errors[] = "current password not matched!";
                            //$message[] = 'current password not matched!';
                        }else{
                            if($new_pass != $confirm_pass){
                                //$message[] = 'new password not matched!';
                                //echo "<script>alert('new password not matched!')</script>";
                                 $errors[] = "new password not matched!";
                            }else{
                                if(count($errors) == 0) {
                                mysqli_query($con, "UPDATE users SET password = '$confirm_pass' WHERE id = $user_id") or die(mysqli_error());
                                 echo "<p>Password updated successfully!</p>";
                            }
                        }
                    }                          
                }              
                ?>       
  
                <?php
                $query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die(mysqli_error());
                if(mysqli_num_rows($query) > 0){
                    $fetch = mysqli_fetch_assoc($query);
                }                  
                ?>

                <div style="color:red">
                    <?php if(count($errors) > 0);?> 
                        <?php foreach ($errors as $error):?>
                            <?= $error?> <br>
                        <?php endforeach;?>       
                </div>
                <div class="row">
                    <form id="myform" method="post" enctype="multipart/form-data">   
                       <!-- col-6 -->
                        <div class="col-md-7">
                            <input type="hidden" name="old_pass" value="<?php echo $fetch['password'] ?>">

                            <div class="form-group2">
                                <label for="post_title" style="color:black;">Old Password</label>
                                <input type="password" name="update_pass" placeholder="Enter previous password" class="form-control" style="border:solid 1.5px grey;">
                            </div><br>

                            <p style="color:black; font-size: 10px;" > !Password at least 8 characters.<br>!Consist of lowercase(a-z) + uppercase(A-Z) + numeric(0-9) + special character.</p>
                                <!-- <p style="color:red; font-size: 10px;" > </p> -->

                            <div class="form-group2">
                                <label for="post_title" style="color:black;">New Password</label>
                                <input type="password" name="new_pass" placeholder="Enter new password" class="form-control" style="border:solid 1.5px grey;"> 
                            </div>
                              
                            <div class="form-group2">
                               <label for="post_title" style="color:black;">Confirm Password</label>
                                <input type="password" name="confirm_pass" placeholder="Confirm new password" class="form-control" style="border:solid 1.5px grey;"> 
                            </div>
                          
                            <div class="form-group2" align="right">
                               <input type="submit" name="update_profile" value="Update Password" id="update_profile" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;"><br>
                               If you forget old password, GO To <a href="../verify/forgot.php">Forgot Password</a>
                            </div>
                        </div>
                        <!-- flex -->
                        <?php
                        if(isset($message)){
                            foreach($message as $message){
                            echo '<div class="message">'.$message.'</div>';
                            $message = $message;
                        ?>
                        <div id="error" style=""><?php echo '$message' ?></div>
                         <?php
                            }
                        }
                        ?>       
                    </form>
                </div>
                <!-- row -->
            </div>  
            </div>
                <input type="radio" id="radio_chat" name="myradio" style="display: none;">
                <input type="radio" id="radio_contacts" name="myradio" style="display: none;">
                <input type="radio" id="radio_settings" name="myradio" style="display: none;">                
                <div id="inner_right_pannel" style="overflow: hidden;">                   
            </div>
        </div>
    </div>
</section>
<?php include_once "include_admin/lower.php"; ?> 
