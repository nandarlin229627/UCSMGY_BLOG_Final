<?php include_once "include_user/user_header.php"; ?> <!-- Header --> 
<?php require_once "../admin/db.php"; ?>
<?php 
    if (isset($_GET['Blog_id'])) {
        $Blog_id = intval($_GET['Blog_id']); //prevent attack
    }else{
        header('Location: index.php');
    }
?>

<!-- Right Content -->
  <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <div class="blog-card-group">
                        <!-- show post by catagory  - WHERE post_category_id = $cat_id -->
                        <?php 
                            $sql = "SELECT * FROM post WHERE post_category_id = $cat_id ORDER BY post_id DESC"; 
                            $result = mysqli_query($con,$sql);
                            confirm_query($result);
                            if (mysqli_num_rows($result) > 0) {                        
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $post_id = escape($row['post_id']);
                                    $post_category_id = escape($row['post_category_id']);
                                    $post_title = escape($row['post_title']);
                                    $post_author = escape($row['post_author']);

                                    $post_image = basename($row['post_image']);
                                    
                                    $post_date = escape($row['post_date']);
                                    $post_tag = escape($row['post_tag']);
                                    $post_content = $row['post_content'];
                                    $post_status = $row['post_status'];
                                    if ($post_status == 'publish') {
                        ?>
                                   <?php
                                        $sql2 = "SELECT * FROM users JOIN post ON post.user_id = users.id WHERE post.post_id = $post_id";
                                        $result2 = mysqli_query($con,$sql2);
                                        confirm_query($result2);//function call
                                        $row2 = mysqli_fetch_assoc($result2);//only one row(no while loop)
                                        $user_image = $row2['image'];
                                    ?>
                            <div class="blog-card">
                                <div class="blog-card-banner">
                                    <img src="../img/<?php echo $post_image; ?>" alt="" class="img-responsive" class="blog-banner-img">
                                </div>

                                <div class="blog-content-wrapper">
                                    <div class="wrapper-flex">
                                        <div class="profile-wrapper">
                                            <img src="../profile/<?php echo $user_image; ?>" width="50">
                                        </div>

                                        <div class="wrapper">
                                            <a href="#" class="h4"> <?php echo "$post_author"; ?></a>

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
                                            echo substr($post_content,0,50);
                                            echo strlen($post_content) > 50 ? '......' : '';
                                         ?>
                                    </p>

                                    <a class="btn btn-success " href="post.php?p_id=<?php echo $post_id ?>">Read More</a>

                                </div>
                                <!-- blog content wrapper -->
                            </div>
                            <!-- blog card -->

                       <?php
                             }//if  
                                }//while
                            }else{
                                echo "There is no post";
                            }
                        ?>   
                    </div>
                    <!-- blog card  group-->

    <div class="post-navigation">
        <ul>
            <li><span>1</span></li>
            <li><a href="javascript:;">2</a></li>
            <li><a href="javascript:;">3</a></li>
            <li><a href="javascript:;"> <i class="fa fa-chevron-right"></i> </a></li>
        </ul>
    </div>
    <!-- col 8 -->
</div>
<!-- row -->
<?php include_once "include_user/user_sidebar_right.php"; ?> 
<?php include_once "include_user/user_footer.php"; ?> 