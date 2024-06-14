<?php
    include_once "include_user/user_header.php";
    include_once "../admin/db.php";
?>
<!-- get form -->
<?php
        if (isset($_GET['post_tag'])) {
            $post_tag = $_GET['post_tag'];
        }
?>

<!-- Right Content -->
  <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <div class="blog-card-group">
                    <?php    
                        // pagination
                         $par_page=10;
                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];
                                    $page_one= ($page * $par_page) -$par_page;
                                    
                                }else{
                                    $page='';
                                    $page_one=0;
                                }
                               $post_tag = $_GET['post_tag'];
                                // $post_count_query = "SELECT * FROM post WHERE post_tag LIKE '%$post_tag%' AND post_status = 'publish' ORDER BY post_id DESC";

                               $post_count_query = "SELECT * FROM post
                                JOIN categories ON post.post_category_id = categories.cat_id
                                JOIN blog_group ON categories.blog_postid = blog_group.Blog_id
                                WHERE post.post_tag LIKE '%$post_tag%' OR categories.cat_title LIKE '%$post_tag%' OR blog_group.BLog_Name LIKE '%$post_tag%' AND post_status = 'publish'
                                ORDER BY post_id DESC";


                                $fine_count = mysqli_query($con,$post_count_query);
                                $count = mysqli_num_rows($fine_count);
                                $count = ceil($count/$par_page);                       
                       
                                $sql = "SELECT * FROM post
                                JOIN users ON users.id = post.user_id 
                                JOIN categories ON post.post_category_id = categories.cat_id
                                JOIN blog_group ON categories.blog_postid = blog_group.Blog_id
                                WHERE post.post_tag LIKE '%$post_tag%' OR categories.cat_title LIKE '%$post_tag%' OR blog_group.BLog_Name LIKE '%$post_tag%' AND post_status = 'publish'
                                ORDER BY post_id DESC LIMIT $page_one,$par_page";

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

                             $ff = $row['Blog_Name'];

                ?>
                <!-- take user image -->
                <?php
                $sql2 = "SELECT * FROM users JOIN post ON post.user_id = users.id WHERE post.post_id = $post_id";
                $result2 = mysqli_query($con,$sql2);
                confirm_query($result2);//function call

                $row2 = mysqli_fetch_assoc($result2);//only one row(no while loop)
                    $user_image = $row2['image'];
                ?>

            <!-- start loop post -->
            <div class="blog-card">
                <div class="blog-card-banner">
                    <?php
                            if($post_image == ''){
                                 echo ' <img src="../img/default_p.jpg"
                                alt="" class="img-responsive"
                                class="blog-banner-img">';
                            }else{
                    ?>            
                                <img src="../img/<?php echo $post_image; ?>"
                                alt="" class="img-responsive"
                                class="blog-banner-img">
                    <?php
                            }
                    ?>
                </div>
                <!-- blog-card-banner -->

                <div class="blog-content-wrapper">
                    <div class="wrapper-flex">
                        <div class="profile-wrapper">                   
                           <?php
                                    if($user_image == ''){
                                         echo ' <img src="../img/default_u.jpg" width="50">';
                                    }else{
                                ?>        
                                                        
                                         <img src="../profile/<?php echo $user_image; ?>" class="rounded-circle" alt="Cinque Terre" width="55" height="55">
                            <?php
                                    }
                            ?>
                        </div>
                        <!--profile-wrapper  -->

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
                }//while
            }else{
                echo "There is no post";
            }
            ?>   
            <!-- end of loop post -->
        </div>
        <!-- blog card  group-->

        <div class="post-navigation">
            <ul>
            <?php
                $post_tag = $_GET['post_tag'];
                for($i=1;$i<=$count;$i++){
                    if($i == $page){
                        echo "<li><a class='active_link' href='search.php?post_tag=$post_tag&page=$i'>$i</a></li>";     
                        }else{
                            echo "<li><a href='search.php?post_tag=$post_tag&page=$i'>$i</a></li>"; 
                        }                        
                    }                
            ?>
            </ul>
        </div>
    </div>
    <!-- row -->
<?php include_once "include_user/user_sidebar_right.php"; ?> 
<?php include_once "include_user/user_footer.php"; ?> 