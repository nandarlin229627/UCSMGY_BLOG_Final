<?php
    if(isset($_GET['edit'])){
        $user_id = $_GET['edit'];
        $query ="SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($con,$query);
        
        if(!$result){
            die('Query Failed'.mysqli_error($result));
        }
        while($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
            $user_password = $row['password'];
        }
    }

    if(isset($_POST['edit_user'])){
        $username = $_POST['username'];
        //$user_password = $_POST['user_password'];

        $query ="UPDATE users SET username='$username' WHERE id=$user_id";        
        $result = mysqli_query($con,$query);
        //echo "Updated";
        if(!$result){
            die('Query Failed'.mysqli_error($result));
        }
    }
?>

        <?php
        $errors = array();   
        $user_id = $_GET['edit'];        
            if(isset($_POST['edit_user'])){
                //$old_pass = $_POST['old_pass'];
                $update_pass = mysqli_real_escape_string($con, hash('sha256',$_POST['update_pass']));
                $new_pass = mysqli_real_escape_string($con, hash('sha256',$_POST['new_pass']));
                //$confirm_pass = mysqli_real_escape_string($con, hash('sha256',$_POST['confirm_pass']));

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

                if($new_pass != $update_pass){
                    //$message[] = 'new password not matched!';
                    //echo "<script>alert('new password not matched!')</script>";
                    $errors[] = "new password not matched!";
                }else{
                    if(count($errors) == 0) {
                        mysqli_query($con, "UPDATE users SET password = '$new_pass' WHERE id = $user_id") or die(mysqli_error());
                        echo "<p>Updated successfully!</p>";
                    }else{
                ?>
                <div style="color:red">
                    <?php if(count($errors) > 0);?> 
                        <?php foreach ($errors as $error):?>
                            <?= $error?> <br>
                        <?php endforeach;?>                        
                </div>
            
                <?php
                            }//error
                                }
                            }                                          
                ?>       
  
                <?php
                    $query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die(mysqli_error());
                    if(mysqli_num_rows($query) > 0){
                        $fetch = mysqli_fetch_assoc($query);
                    }                
                ?>

    <div class="row" style="padding-left: 30px;">                
        <form id="myform" method="post" enctype="multipart/form-data">                       
            <!-- col-6 -->
            <div class="col-md-7">
                <div class="form-group2">
                    <label for="post_title" style="color:black;">User Name</label>
                    <input type="text" name="username" placeholder="Enter name" class="form-control" style="border:solid 1.5px grey;" value="<?php echo $username ?>">
                </div>
                          
                <p style="color:black; font-size: 10px;" > !Password at least 8 characters.<br>!Consist of lowercase(a-z) + uppercase(A-Z) + numeric(0-9) + special character.</p>
                <!-- <p style="color:red; font-size: 10px;" > </p> -->

                <div class="form-group2">
                    <label for="post_title" style="color:black;">New Password</label>
                    <input type="password" name="update_pass" placeholder="Enter new password" class="form-control" style="border:solid 1.5px grey;"> 
                </div>
                              
                <div class="form-group2">
                    <label for="post_title" style="color:black;">Confirm Password</label>
                    <input type="password" name="new_pass" placeholder="Confirm new password" class="form-control" style="border:solid 1.5px grey;"> 
                </div>
                                                   
                <div class="form-group2" align="right">
                    <input type="submit" name="edit_user" value="Save User" id="save_user" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">
                </div>
            </div>    
        </form>
    </div>
