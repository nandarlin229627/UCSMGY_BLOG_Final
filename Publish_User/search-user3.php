<?php
    include_once "include_user/user_header.php";
    include_once "../admin/db.php";
?>
<?php
        if (isset($_GET['post_tag2'])) {
            $post_tag2 = $_GET['post_tag2'];
        }
?>
<!-- Right Content -->
  <section class="section-content">
        <div class="container">
        <!-- start -->                                                                                       
            <div class="col-sm-8 col-md-8">
                <div class="blog-card-group">
                <!-- show post by catagory  - WHERE post_category_id = $cat_id -->
                    <?php
                        // user
                        $post_tag2 = $_GET['post_tag2'];
                        $sql5 = "SELECT * FROM users WHERE username LIKE '%$post_tag2%'"; 
                        $result = mysqli_query($con,$sql5);
                        confirm_query($result);
                            if (mysqli_num_rows($result) > 0) {      
                                 $par_page=10;
                                    if(isset($_GET['page'])){
                                        $page=$_GET['page'];
                                        $page_one= ($page * $par_page) -$par_page;
                                       
                                    }else{
                                        $page='';
                                        $page_one=0;
                                    }
                        
                                    $post_count_query = "SELECT * FROM post JOIN users ON post.user_id = users.id WHERE users.username LIKE '%$post_tag2%' AND post.post_status = 'publish' ORDER BY post_id DESC";
                                    $fine_count = mysqli_query($con,$post_count_query);
                                    $count = mysqli_num_rows($fine_count);
                                    $count = ceil($count/$par_page);

                            $sql = "SELECT * FROM post JOIN users ON post.user_id = users.id WHERE users.username LIKE '%$post_tag2%' AND post.post_status = 'publish' ORDER BY post_id DESC LIMIT $page_one,$par_page";                    

                            $result = mysqli_query($con,$sql);
                            confirm_query($result);
                            if (mysqli_num_rows($result) > 0) {                        
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $post_id = escape($row['post_id']);
                                    $post_category_id = escape($row['post_category_id']);
                                    $post_title = escape($row['post_title']);
                                    $post_author = escape($row['username']);

                                    $post_image = basename($row['post_image']);
                                    
                                    $post_date = escape($row['post_date']);
                                    $post_tag = escape($row['post_tag']);
                                    $post_content = escape($row['post_content']);
                                     $post_status = $row['post_status'];                   
                            ?>

       
                                <?php
                                    $sql2 = "SELECT * FROM users JOIN post ON post.user_id = users.id WHERE post.post_id = $post_id";
                                    $result2 = mysqli_query($con,$sql2);
                                    confirm_query($result2);//function call

                                    $row2 = mysqli_fetch_assoc($result2);//only one row(no while loop)
                                        $user_image = $row2['image'];
                                ?>

                                    <!-- start of loop mpost -->
                                    <div class="blog-card">
                                        <div class="blog-card-banner">
                                            <img src="../img/<?php echo $post_image; ?>"
                                            alt="" class="img-responsive"
                                            class="blog-banner-img">
                                        </div>

                                        <div class="blog-content-wrapper">
                                            <div class="wrapper-flex">
                                                <div class="profile-wrapper">
                                                    <img src="../profile/<?php echo $user_image; ?>" class="rounded-circle" alt="Cinque Terre" width="55" height="55">
                                                </div>

                                                <div class="wrapper">
                                                    <a href="search_user2.php?username=<?php echo $post_author ?>" class="h4"> <?php echo "$post_author"; ?></a>
                                                    <p class="text-sm">
                                                      <time datetime="2021-09-21"><?php echo "$post_date"; ?></time>
                                                      <!-- <span class="separator"></span>
                                                      <ion-icon name="time-outline"></ion-icon>
                                                      <time datetime="PT4M">4 min</time> -->
                                                    </p>
                                                </div>
                                                <!-- wrapper -->
                                            </div>
                                            <!-- wrapper flex -->

                                                <h3><a href="post.php?p_id=<?php echo $post_id ?>" class="h3"><?php echo "$post_title"; ?></a></h3>

                                                <p class="blog-text">
                                                   <?php 
                                                        echo substr($post_content,0,6);
                                                        echo strlen($post_content) > 6 ? '......' : '';
                                                     ?>
                                                </p>

                                                <a class="btn btn-success " href="post.php?p_id=<?php echo $post_id ?>">Read More</a>
                                        </div>
                                            <!-- blog content wrapper -->
                                    </div>
                                    <!-- blog card -->

                            <?php
                                }//while
                            }else{
                            echo "There is no post";
                            }
                            ?>

                        <div class="post-navigation">
                                <ul>
                                    <?php
                                        $post_tag2 = $_GET['post_tag2'];
                                            for($i=1;$i<=$count;$i++){
                                                if($i == $page){
                                                    echo "<li><a class='active_link' href='search-user3.php?post_tag2=$post_tag2&page=$i'>$i</a></li>";     
                                                }else{
                                                    echo "<li><a href='search-user3.php?post_tag2=$post_tag2&page=$i'>$i</a></li>"; 
                                                }                        
                                            }                
                                      ?>
                                </ul>
                        </div>
                            <!-- col 8 -->
                    <?php
                      }else{
                       echo "Thers is no user.";
                      }
                    ?>   
                </div>
                <!-- blog card  group-->
            </div>
            <!-- row -->



<!-- Left side bar -->
<div class="col-sm-4 sidebar">

    <div class="widget widget-sub">
      <h5> Search User</h5>
      <p>Click search to view profiles and posts of other members. :)</p>
      <div class="widget-sub-s">
        <form class="sign_up_form" method="get" action="search-user3.php">
          <input type="text" name="post_tag2" placeholder="Search User?">
            <button type="submit" class="button color-y"><i class="fa fa-search"></i></button>
        <!--   <button type="submit" name="search_user">      </button> class="button color-y">sign up</a> -->
        </form>
      </div>
  </div>


<!-- profile -->
<?php
        $post_tag2 = $_GET['post_tag2'];
         $sql5 = "SELECT * FROM users WHERE username LIKE '%$post_tag2%'"; 
            $result = mysqli_query($con,$sql5);
            confirm_query($result);
            if (mysqli_num_rows($result) > 0) {      
   ?>  

        <div class="widget">
                <h3 class="widget-title">About Authors</h3>
                <div class="bubble-line"></div>
                <div class="panel-body">

                    <?php 
                        $post_tag2 = $_GET['post_tag2'];
                        $sql = "SELECT * FROM users WHERE username LIKE '%$post_tag2%'";
                        $result_user = mysqli_query($con,$sql);
                        confirm_query($result_user);
                            // if (mysqli_num_rows($result_user) > 0) {                        
                                while ($row = mysqli_fetch_assoc($result_user)) {
                                    $user_id = escape($row['id']);
                                    $username = escape($row['username']);
                                    $user_image = basename($row['image']);
                                    $follower_number = escape($row['follower_number']);
                                    $user_role = escape($row['user_role']);
                                    $uniqueid = escape($row['unique_id']);   
                                                     ?>  

                                    <div class="row">
                                        <div class="col-md-5">                                                               
                                            <?php
                                                if($user_image == ''){
                                                    echo ' <img src="../img/default_u.jpg" width="100px">';
                                                }else{
                                            ?>   
                                                <img src="../profile/<?php echo $user_image; ?>" width="100px">
                                            <?php
                                                }
                                            ?>
                                        </div>

                                        <div class="col-md-5">
                                            <p><p><p> 

                                            <a href="search_user2.php?username=<?php echo $username ?>" class="h4">            
                                            <h3 class="panel-title"><?php echo '<b>'.$username.'</b>';?> </h3>
                                            </a>
                                            <h5><?php echo $user_role;?></h5>
                                            <h5><?php echo $follower_number;?> followers</h5>
                                        </div> 
                                    </div> 
                                    <br>
                                    <?php
                                        if(isset($_SESSION['USER']->id)) 
                                            {
                                                f($user_id != $_SESSION['USER']->id)
                                                {
                                    ?>
                                    <div class="row"> 
                                        <div class="col-md-6">  
                                        <?php 
                                            echo make_follow_button($connect, $user_id, $_SESSION['USER']->id);
                                        ?>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa-brands fa-facebook-messenger fa-1x"></i> <a href="../ChatApp/chat.php?user_id=<?php echo $uniqueid ?>" style="text_decoration:none;"><b><h4 style="color:darkorange;">Chat</h4><b></a>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <?php
                                                       }
                                                    }
                                                    //if check user                                       
                                                }//while
                                    ?>
                                     <!-- row -->
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
<?php include_once "include_user/user_footer.php"; ?>