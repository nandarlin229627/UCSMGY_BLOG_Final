<?php include_once "include_user/user_header.php"; ?>
<?php ob_start(); ?> <!-- Header --> 
<!-- <?php include_once "database_connection.php"; ?> 
 -->

<?php
$p_id = $_GET['p_id'];
?>

<!-- Page Content -->
<section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                <?php 
                $sql = "SELECT * FROM post JOIN users ON post.user_id = users.id WHERE post_id=$p_id"; 
                $result = mysqli_query($con,$sql);
                confirm_query($result);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $post_id = escape($row['post_id']);
                        //$user_id = escape($row['user_id']);
                        $post_category_id = escape($row['post_category_id']);
                        $post_title = escape($row['post_title']);
                        $post_author = escape($row['username']);


                        $files=$row['file_name'];
                        // $pdffiles =$row['PDFname'];
                        $post_image = basename($row['post_image']);
                        $new_video_name = $row['video_url']; 

                                                    
                        $post_date = escape($row['post_date']);
                        $post_tag = escape($row['post_tag']);
                        $post_content = $row['post_content'];
                        $user_id = escape($row['user_id']);
                        $user_id_chat = escape($row['user_id']);
                ?>

                    <p style="text-align:left; font-size: 2.5rem;"><?php echo "$post_title"; ?></p>

                    <!-- Author -->
                    <p style="text-align:left; font-size: 1.5rem;">                         
                        by <a href="search_user2.php?username=<?php echo $post_author ?>"><?php echo "$post_author"; ?></a>
                    </p>

                    <!-- Date/Time -->
                    <p style="text-align:left"><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>

                    <!-- Preview Image -->
                    <img class="img-responsive" src="../img/<?php echo $post_image; ?>" alt="">
                    <br>

                    <!-- Post Content -->         
                     <p style="text-align:left; text-align:justify-all;"><?php echo "$post_content"; ?></p>

                  
                    <!-- Preview File -->               
                    <?php
                    if (!empty($files ))
                    {
                        ?>
                        <a href="../admin/uploadfile/<?php echo $files;?>" download>Download <?php echo $files;?></a>
                        <?php
                    }
                        ?>

                    <?php
                    if(!empty($new_video_name))
                    {
                        ?>
                        <p><?php echo  $new_video_name;?></p>
                        <video src="../admin/upload/<?php echo $new_video_name; ?>" width="350" height="300" controls>
                   
                        </video>
                        <?php
                    }
                        ?>
                
                    <?php 
                            }
                            // end of while
                    ?>

<!-- user engagement system -->
    <div class="post-navigation">
        <!-- Comments Form -->        
        <div class="well">           
            <form action="" method="post">
                    <!-- total like -->
                    <?php                           
                        $sql = "
                        SELECT * FROM post
                        WHERE post_id = $p_id
                        ";
                         
                        $result = mysqli_query($con,$sql);
                        confirm_query($result);//function call

                        $row = mysqli_fetch_assoc($result);//only one row(no while loop)
                        $like_number = $row['like_number'];
                    ?>

                <!-- like button -->
                <?php   
                if(!isset($_SESSION['USER']->id)) 
                 {
                 ?>     
                <button type="button" class="btn" onclick="myFunction2()"><span class="glyphicon glyphicon-thumbs-up"></span> Like <?php echo $like_number ?></button>
                <script>
                    function myFunction2() {
                      
                      if (confirm("You must sign in to like!") == true) {                
                       window.location.href='../verify/login.php';
                      } else {
                        
                      }
                      
                    }
                </script>
                <?php
                }else{
                    // member
                ?>    
                <?php
                $user_id =  $_SESSION['USER']->id;
                $sql = "SELECT * FROM tbl_like WHERE post_id = $p_id AND user_id = $user_id";
                    $result_like = mysqli_query($con,$sql);
                    confirm_query($result_like);
                    $total_row1=mysqli_num_rows($result_like);

                        if($total_row1 > 0)
                        {
                ?>
                             <button type="submit" class="btn like_button2 " data-post_id="<?php echo $post_id ?>" data-original-title="" title="" width=100px value="Like"><i class="fa-solid fa-thumbs-up" style="color:blue;"></i>&nbsp;Liked <?php echo $like_number ?></button>

                    <?php
                        }else{
                    ?>
                             <button type="submit" class="btn  like_button" data-post_id="<?php echo $post_id ?>" data-original-title="" title="" width=100px value="Like"><i class="fa-regular fa-thumbs-up"></i>&nbsp;Like  <?php echo $like_number ?></button>
                    <?php

                        }//change button
                    }//not user
                ?>
                <!-- end of like button -->
                    

                <!-- comment form -->
                <?php 
                if (isset($_POST['submit_comment2'])) { //submit name=create_post

                    $comment = $_POST['comment'];
                    $user_id =  $_SESSION['USER']->id;

                    $sql_limit = "
                    SELECT * FROM tbl_comment 
                    WHERE post_id = $p_id AND user_id = $user_id";

                    $result_comment_count = mysqli_query($con,$sql_limit);
                    confirm_query($result_comment_count);
                    $user_rowcount=mysqli_num_rows($result_comment_count);

                    if($user_rowcount < 30){

                        $sql = "INSERT INTO tbl_comment(post_id, user_id, comment,timestamp)";
                        $sql .= "VALUES ($p_id,$user_id,'$comment',now())"; //use concatenation
                            
                        $result_comment = mysqli_query($con,$sql);
                        confirm_query($result_comment);
                    // noti
                        $notification_query = "
                        SELECT user_id, post_content FROM post 
                        WHERE post_id = '".$p_id."'
                        ";

                        $statement = $connect->prepare($notification_query);

                        $statement->execute();

                        $notification_result = $statement->fetchAll();

                        foreach($notification_result as $notification_row)
                        {
                            $notification_text = '<b>'.Get_user_name($connect, $_SESSION['USER']->id).'</b> has comment on your post - "'.strip_tags(substr($notification_row["post_content"], 0, 15)).'..."';

                            $insert_query = "
                            INSERT INTO tbl_notification 
                            (notification_receiver_id, notification_text, read_notification) 
                            VALUES ('".$notification_row['user_id']."', '".$notification_text."', 'no')
                            ";

                            $statement = $connect->prepare($insert_query);
                            $statement->execute();
                        }

                        }else{

                            $sql = "
                            SELECT * FROM users
                            WHERE id = $user_id_chat
                            ";
                             
                            $result = mysqli_query($con,$sql);
                            confirm_query($result);//function call

                            $row = mysqli_fetch_assoc($result);//only one row(no while loop)
                            $uniqueid = $row['unique_id'];

                            echo "<script> alert('Exceed limitation attempt');
                            window.location.href='../ChatApp/chat.php?user_id=$uniqueid'; </script>";
                        }  //limitation  

                    }//submit

                    ?>

                    <!-- count comment -->
                    <?php
                    $sql = "
                        SELECT * FROM tbl_comment 
                        WHERE post_id = $p_id
                        ";
                        $result_comment_count = mysqli_query($con,$sql);
                        confirm_query($result_comment_count);
                        $rowcount=mysqli_num_rows($result_comment_count);
                    ?>   

                    <!-- comment button -->
                    <?php   
                     if(!isset($_SESSION['USER']->id)) 
                     {
                     ?>            
                    <button type="button" class="btn" onclick="myFunction1()"><i class="fa-solid fa-comment"></i>&nbsp;Comment <?php echo $rowcount ?></button> 
                    <script>
                    function myFunction1() {
                      
                      if (confirm("You must sign in to comment!") == true) {                
                       window.location.href='../verify/login.php';
                      } else {
                        
                      }
                      
                    }
                    </script>

                    <?php
                    }else{
                    ?> 
                         <button type="submit" class="btn  post_comment" id="<?php $post_id ?>" data-user_id="<?php $user_id ?>"><i class="fa-solid fa-comment"></i>&nbsp;Comment <?php echo $rowcount ?></button>  
                    <?php
                    }
                    ?>
                    <!-- end of comment button -->


                    <!-- count share -->
                    <?php

                    $sql = "
                    SELECT * FROM tbl_repost 
                    WHERE post_id = $p_id
                    ";
                    $result_share_count = mysqli_query($con,$sql);
                    confirm_query($result_share_count);
                    $sharerowcount=mysqli_num_rows($result_share_count);

                    ?>    
                    <!-- share button -->
                    <?php   
                     if(!isset($_SESSION['USER']->id)) 
                     {
                     ?>
            
                    <button type="button" class="btn"  onclick="myFunction()"><span class="glyphicon "></span><i class="fas fa-share"></i> Share <?php echo $sharerowcount ?></button>

                    <script>
                        function myFunction() {
                          let text;
                          if (confirm("You must sign in to share a post!") == true) {                
                           window.location.href='../verify/login.php';
                          } else {
                            
                          }
                          document.getElementById("demo").innerHTML = text;
                        }
                    </script>              
                    <?php
                    }else{
                    ?> 
                    <button type="submit" class="btn repost nn" data-post_id="<?php echo $post_id ?>" data-original-title="" title=""><span class="glyphicon "></span><i class="fas fa-share"></i> Share <?php echo $sharerowcount ?></button> 
                   
                    <?php
                    }
                    ?>
                    <!--  end of share button-->

                    <!-- edit comment -->
                    <?php

                    if(isset($_GET['edit'])){
                        $id=$_GET['edit'];

                        $sql="SELECT * FROM tbl_comment WHERE comment_id=$id";
                        $query = mysqli_query($con,$sql);
                        if(mysqli_num_rows($query) > 0){
                            $row = mysqli_fetch_assoc($query);
                        }

                            $u_id=$row['comment_id'];
                            //$u_name=$row['username'];
                            $u_comment=$row['comment'];                                       
                            $update=true;
                    }
                    if(isset($_GET['edit'])){
                        if($u_id === $id ){
                    ?>
                                               
                    <input type="text" name="comment" class="form-control rounded-0" placeholder="Edit your comment!" value="<?php echo $u_comment ?>">

                    <input type="hidden" name="comment_id" class="form-control rounded-0" placeholder="Edit your comment!" value="<?php echo $u_id ?>">

                    <br>
                                                
                    <?php
                        }
                    }else{
                    ?>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" id="comment61" placeholder="What's on your mind?"></textarea>
                    </div>

                    <?php
                        }
                        //end of comment edit
                    ?>

                    <?php                           
                    $sql = "
                    SELECT * FROM users
                    WHERE id = $user_id_chat
                    ";
                             
                    $result = mysqli_query($con,$sql);
                    confirm_query($result);//function call

                    $row = mysqli_fetch_assoc($result);//only one row(no while loop)
                    $uniqueid = $row['unique_id'];
                    ?>

                    <!--chat room  -->
                    <?php   
                    if(isset($_SESSION['USER']->id)) 
                    {
                    ?>
                                    
                    <p style="color:green; font-size:1rem" align="left">You want to more discussion. Go to 
                    <a href="../ChatApp/chat.php?user_id=<?php echo $uniqueid ?>" data-toggle="chatbar" class="toggle_chat">"Chat Room"
                    </a>

                    <?php
                    }else{
                    ?>

                    <p style="color:green; font-size:1rem" align="left">You want to more discussion. Go to 
                    <button type="button" class="btn" style="background-color:darkgray;" onclick="myFunction5()">Chat</button> 
                    <script>
                    function myFunction5() {
                                          
                    if (confirm("You must sign in to join a conversion!") == true) {                
                        window.location.href='../verify/login.php';
                        }
                                          
                    }
                    </script>

                    <?php    
                    }
                    // end of chat room
                    ?>

                    <!-- submit button -->
                    <?php
                    if(isset($_GET['edit'])){
                        if($u_id === $id ){
                    ?>
                    <div class="form-group" align="right">
                        <button type="submit" class="btn btn-success" name="update" >Update</button> 
                             
                    <?php
                        }
                    }else{
                    ?>           
                    <div class="form-group" align="right">
                    <?php   
                    if(!isset($_SESSION['USER']->id)) 
                    {
                    ?>        
                    <button type="button" class="btn btn-success" onclick="myFunction4()"  >Submit</button> 
                    <script>
                        function myFunction4() {
                                              
                            if (confirm("You must sign in to comment!") == true) {                
                                window.location.href='../verify/login.php';
                            } else {
                                                
                            }                                          
                        }
                    </script>

                    <?php
                    }else{
                    ?> 
                    <input type="submit" name="submit_comment2" vlaue="Comment" class="btn btn-primary btn-md" style="background-color:green";>   
                    <?php
                    }
                    // member
                    }
                    // edit comment submit form
                    ?>

                </div>
                <!--end of comment -->
            </form>
        </div>
        <!-- well -->        
    </div>
    <!-- post navigation -->




                        <!-- fetch comment -->
                        <?php
                        $query = "
                        SELECT * FROM tbl_comment 
                        INNER JOIN users 
                        ON users.id = tbl_comment.user_id 
                        WHERE post_id = $p_id 
                        ORDER BY comment_id ASC
                        ";
                        $statement = $connect->prepare($query);
                        $output = '';
                        if($statement->execute())
                        {
                            $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                                $profile_image = '';
                                if($row['image'] != '')
                                {
                                    $profile_image = '<img src="../profile/'.$row["image"].'" class="img-thumbnail img-responsive img-circle" width=70px; />';
                                }
                                else
                                {
                                    $profile_image = '<img src="images/user.jpg" class="img-thumbnail img-responsive img-circle" />';
                                }

                                ?>
                                
                                <div class="row">
                                    <div class="col-md-2">
                                    <?php echo $profile_image ?> 
                                    </div>
                                    <div class="col-md-5" style="margin-top:1px; padding-left:15spx">
                                        <medium>                        
                                            <b>
                                             <a href="search_user2.php?username=<?php echo $row["username"] ?>" class="h4">
                                            <?php echo $row["username"] ?></a></b>


                                             <!-- <?php echo $row["comment"]; ?> -->
                                             <?php
                                             $comment = " ".$row["comment"];

                                             echo censor($comment);  
                                                       // echo $replacewith;
                                            ?>
                                             <p style="text-align:left"><span class="glyphicon glyphicon-time"></span>  <?php echo $row["timestamp"]; ?></p>                                            
                                        </medium>
                                        <p></p>
                                        <medium>
                                        <?php
                                           $user_id = $row['user_id'];
                                            if(isset($_SESSION['USER']->id)) {
                                                $id = $_SESSION['USER']->id;

                                                if($user_id == $id){
                                        ?>
                                                    <a href="post.php?p_id=<?= $row['post_id'] ?>&del=<?= $row['comment_id'] ?>" class="text-danger mr-2 confirm_delete" onclick="return confirm('Do you want to delete this comment?');" title="Delete"><i class="fas fa-trash"></i></a>

                                                    <a href="post.php?p_id=<?= $row['post_id'] ?>&edit=<?= $row['comment_id'] ?>" class="text-success" title="Edit"><i class="fas fa-edit"></i></a>
                                        <?php
                                                }
                                                //same user
                                            }
                                            //member
                                            
                                        ?>
                                        </medium>

                                    </div>
                                    <!-- col-5 -->
                                </div>
                                <!-- row -->
                                <br />
                              
                        <?php        
                            }
                            // for each
                        }
                        //if

function censor($comment)
{
    if ($comment)
    {
        $badwords = file_get_contents("badwords.txt");
        $badwords = explode(",", $badwords);
        $replacewith = array();
        $index = 0;
        foreach ($badwords as $value) {
            $lengthOfStars = strlen($badwords[$index])-2;
            $replacewith[$index] = substr($badwords[$index], 0, 1).str_repeat("*", 5);
            $index++;
        }
        $newstring = str_ireplace($badwords, $replacewith, $comment);
        return $newstring;
    }
}

                        
// comment delete
 if(isset($_GET['del'])){
        $id=$_GET['del'];
        $sql="DELETE FROM tbl_comment WHERE comment_id=$id";
       

        if($connect->query($sql)){
            
            $pp = $row['post_id'];
            //header('Location:post.php?p_id=.$pp');
            header('Location: post.php?p_id='.$pp);

        }
}

// comment update
    if(isset($_POST['update'])){
        $id=$_POST['comment_id'];
        //$name=$_POST['name'];
        $comment=$_POST['comment'];
       // $date=date("Y-m-d");
        //echo "$comment";
        $sql="UPDATE tbl_comment SET comment='$comment' WHERE comment_id=$id";

        if($connect->query($sql)){
            
            $pp = $row['post_id'];
            //header('Location:post.php?p_id=.$pp');
            header('Location: post.php?p_id='.$pp);

        }
    }
                               
 ?>                  

</div>
<!-- col-8 -->
<?php include_once "include_user/user_sidebar_right.php"; ?> 
<?php include_once "include_user/user_footer.php"; ?> 