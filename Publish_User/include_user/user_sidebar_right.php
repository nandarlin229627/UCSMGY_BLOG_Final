<!-- Left side bar -->
<div class="col-sm-4 sidebar">
    <div class="widget widget-sub">
        <h5>Search Users</h5>
        <p>Click search to view profiles and posts of other members.</p>
        
        <div class="widget-sub-s">
            <form class="sign_up_form" method="get" action="search-user3.php">
              <input type="text" name="post_tag2" placeholder="Search User?">
                <button type="submit" class="button color-y"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
       
   <div class="widget">
        <h3 class="widget-title">Top Writers</h3>
            <div class="bubble-line"></div>
                <div class="panel-body">
                    <div id="user_list"></div>
                </div>  
            </div>
     
  <!-- start post -->
    <div class="widget">
        <h3 class="widget-title">Top Trends News</h3>
        <div class="bubble-line"></div>
            <div class="widget-content">
                <ul>
                     <?php
                        $sql = "SELECT * FROM post WHERE post_status = 'publish' ORDER BY like_number DESC LIMIT 0,7"; 
                        // show 5 posts
                        $result = mysqli_query($con,$sql);
                        confirm_query($result);

                    while ($row = mysqli_fetch_assoc($result)) {
                            $post_id = escape($row['post_id']);                
                            $post_title = escape($row['post_title']);               
                            $post_image = basename($row['post_image']);
                            $post_status = $row['post_status'];                           
                    ?>

                    <li>
                        <a href="post.php?p_id=<?php echo $post_id ?>">
                        <?php echo $post_title; ?>
                        </a>
                    </li>    
                    <?php
                        }//while
                    ?>            
                </ul>
            </div>
    </div>
    <!-- widget -->
<!-- end of posts -->

    <div class="widget">
        <h3 class="widget-title">Category</h3>
        <div class="bubble-line"></div>
        <div class="widget-content">
            <form action="index_category.php"  method= "get" enctype="multipart/form-data">
                <select name="blog_postcategoryid" id="" class="form-control">
                <option value="category">Select Catagory</option>
                    <?php
                        $sql = "SELECT * FROM blog_group";//use order by
                        $result =  mysqli_query($con,$sql);
                        confirm_query($result);//function call
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Blog_id = $row ['Blog_id'];
                                $Blog_Name = $row ['Blog_Name'];
                    ?>
                                <option value="<?php echo $Blog_id?>" style=text_transform:lowercase;><?php echo $Blog_Name?></option>
                               
                    <?php                                                       
                            }
                     ?>

                      <?php                  
                            if(!empty($_GET['blog_postcategoryid'])) {
                                $selected = $_GET['blog_postcategoryid'];
                               //echo '$selected';
                            } else {
                                echo 'Please select the Blog Group.';
                            }                   
                        ?>
                </select>
                <br>
                <div class="form-group" align="right">
                    <input type="submit" vlaue="Choose">
                    <!-- <button type="button" class="btn btn-warning">Warning</button> -->
                </div>    
            </form>
        </div>
    </div>
    <!-- widget -->

    <div class="widget">
        <h3 class="widget-title">Related Topics</h3>
        <div class="bubble-line"></div>
        <div class="widget-content">
         <div class="widget-tags">
           <!-- show categories -->
                        <?php
                            if(!isset($_GET['blog_postcategoryid'])) {
                                 $sql = "SELECT * FROM categories ORDER BY cat_id DESC";
                             }else{
                                 $selected = $_GET['blog_postcategoryid'];
                            $sql = "SELECT * FROM categories WHERE blog_postid='$selected' ORDER BY cat_id DESC";
                            }
                                $result = mysqli_query($con,$sql);
                                confirm_query($result);
                                while($row = mysqli_fetch_assoc($result)){
                                    $cat_id =$row['cat_id'];
                                    $cat_title =$row['cat_title'];
                        ?>                                 
                                    <!-- call individual category -->
                                    <a href="post_category.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?>
                              
                        <?php
                                }//while
                        ?>
                <!-- end of show categories -->    
            </div>
        </div>
    </div>
<!-- Categories -->

</div>			
</div>
</div>
</section>