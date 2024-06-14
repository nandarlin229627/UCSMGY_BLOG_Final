<?php include_once "include_admin/upper.php"; ?> <!-- Header-->
<!-- START CONTENT -->
    <div class="clearfix"></div>
    <?php
    $errors = array();
    ?>
    <?php
    if(isset($_POST['create_user'])){
        $username = $_POST['username'];                
        $user_email = $_POST['user_email'];
        //$user_email_verified = $_POST['user_email_verified'];
        $user_passwordsha= hash('sha256',$_POST['user_password']);
        $user_password = $_POST['user_password'];               
        $user_password2 = $_POST['user_password'];               
        $ran_id = rand(time(), 100000000);
        $status = "Offline now";
                                
        if(!empty($_POST['status'])) {
            $user_role = $_POST['status'];
        } else {
            echo 'Please select the value.';
        }
    ?>

        <!-- constraints -->
        <?php
        //validate
        if(!preg_match('/^[a-zA-Z ]+$/', $username)){
            $errors[] = "Please enter a valid username";
        }
        if(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
            $errors[] = "Please enter a valid email";
        }
        // if(strlen(trim($data['password'])) < 4){
        //  $errors[] = "Password must be atleast 4 chars long";
        // }

        if (strlen($user_password) < 8 || strlen($user_password) > 16) {
        $errors[] = "Password should be min 8 characters and max 16 characters";
            }
        if (!preg_match("/\d/", $user_password)) {
        $errors[] = "Password should contain at least one digit";
            }
        if (!preg_match("/[A-Z]/", $user_password)) {
        $errors[] = "Password should contain at least one Capital Letter";
            }
        if (!preg_match("/[a-z]/", $user_password)) {
        $errors[] = "Password should contain at least one small Letter";
            }
        if (!preg_match("/\W/", $user_password)) {
        $errors[] = "Password should contain at least one special character";
            }
        if (preg_match("/\s/", $user_password)) {
        $errors[] = "Password should not contain any white space";
            }

        if($user_password2 != $user_password){
            $errors[] = "Passwords must match";
        }

        $check = database_run("select * from users where email = :email limit 1",['email'=>$user_email]);
        if (is_array($check)) 
        {
            $errors[] = "That email already exists";
        }

        $check1 = database_run("select * from users where username = :username limit 1",['username'=>$username]);
        if (is_array($check1)) 
        {
            $errors[] = "That Username already exists";
        }

        if(count($errors) == 0) {
            $query ="INSERT INTO users(unique_id,username,email,email_verified, password,user_role,date,status) ";
            $query .="VALUES ($ran_id,'$username','$user_email','$user_email','$user_passwordsha','$user_role',now(),'$status')";                
            $result = mysqli_query($con,$query);                
            if(!$result){
                die('Query Failed'.mysqli_error($result));
            }
                echo "Complete Successfully Created Your Account" . "<a href='users.php'>View All Users</a>";
        }
    }
    ?>
    <div style="color:red">
        <?php if(count($errors) > 0);?> 
        <?php foreach ($errors as $error):?>
            <?= $error?> <br>
        <?php endforeach;?>                       
    </div>
            
    <div class="row" style="padding-left: 30px;">                
         <form id="myform" method="post" enctype="multipart/form-data">                       
            <!-- col-7 -->
            <div class="col-md-7">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password'] ?>">
                <div class="form-group2">
                    <label for="post_title" style="color:black;">User Name</label>
                    <input type="text" name="username" placeholder="Enter name" class="form-control" style="border:solid 1.5px grey;">
                </div>

                <div class="form-group2">
                    <label for="post_title" style="color:black;">Email</label>
                    <input type="text" name="user_email" placeholder="Enter email" class="form-control" style="border:solid 1.5px grey;">
                </div><br>

                <p style="color:black; font-size: 10px;" > !Password at least 8 characters.<br>!Consist of lowercase(a-z) + uppercase(A-Z) + numeric(0-9) + special character.</p>
                                <!-- <p style="color:red; font-size: 10px;" > </p> -->
                               
                <div class="form-group2">
                    <label for="post_title" style="color:black;">New Password</label>
                    <input type="password" name="user_password" placeholder="Enter new password" class="form-control" style="border:solid 1.5px grey;"> 
                </div>

                <div class="form-group2">
                    <label for="post_title" style="color:black;">Confirm Password</label>
                    <input type="password" name="user_password2" placeholder="Confirm new password" class="form-control" style="border:solid 1.5px grey;"> 
                </div>
                          
                <fieldset class="form-group">
                    <div class="row">                                                            
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="Admin">
                                <label class="form-check-label" for="gridRadios1">
                                Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="Writer">
                                <label class="form-check-label" for="gridRadios2">
                                Writer
                                </label>                                    
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="Publish User">
                                <label class="form-check-label" for="gridRadios3">
                                Public User
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group2" align="right">
                    <input type="submit" name="create_user" value="Save User" id="save_user" class="btn btn-raised waves-effect" style="background-color:#7ee3c1;">                               
                </div> 
            </div>                          
        </form>
    </div>
    <!-- row -->
</section>
<?php include_once "include_admin/lower.php"; ?>
