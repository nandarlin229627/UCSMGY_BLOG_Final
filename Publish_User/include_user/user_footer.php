<footer id="footer" style="background-color: #f8f8f8;">
  <section class="nb-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-6" >
          <div class="footer-single" style="padding-top:10px ;" >
             <!-- <img src="images/logo.png" class="img-responsive" alt="Logo"> -->
            <!-- This is only for better view of theme if you want your image logo remove div dummy-logo bellow and replace your logo in logo.png and uncomment logo tag above-->
            <div class="dummy-logo">
              <div class="icon pull-left ">
               <img src="../Publish_User/images/crown1.png" width="70px">
              </div>
              <h3 style="color:white">UCSMGY BLOG</h3>             
            </div>
            <p>UCSMGY BLOG System intends for users to be able to look at ucsmgy-related contents and IT-related contents in one place. Moreover, this system is provided to improve communication skills between students and their teachers. </p>
            <a href="" class=""></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="footer-single useful-links">
              <div class="footer-title"><h3>USEFUL LINKS</h3></div>           
                <ul class="list-unstyled">
                  <li><a href="index.php">Home <i class="fa fa-angle-right pull-right"></i></a></li>
                  <li><a href="about.php">About Us <i class="fa fa-angle-right pull-right"></i></a></li>        <li><a href="contact.php">Contact Us <i class="fa fa-angle-right pull-right"></i></a></li>
              </div>
          </div>
        <div class="clearfix visible-sm"></div>

        <div class="col-md-3 col-sm-6">
          <div class="col-sm-12 left-clear right-clear footer-single footer-project">
            <div class="footer-title"><h3>RECENT POSTS</h3></div>
           
            <ul>
               <?php
               $sql = "SELECT * FROM post WHERE post_status='publish' ORDER BY post_id DESC LIMIT 0,5"; 
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

 <div class="col-md-3 col-sm-6">
    <div class="footer-single">
        <div class="footer-title"><h3>CONTACT INFORMATION</h3></div>
          <address>
              <i class="fa-solid fa-location-dot"></i>
                  Magway–Taungdwin Road<br>
                  Between Mile Posts <br>
                  325/2 &amp; 325/5  <br>
                  Magyikan Village<br>
                  Magway Region, Myanmar<br>
                  Postal Code: 04011<br>
                <i class="fa fa-phone " ></i><a href="tel:095342859" style="color:#7BFF00">  +95-9-5342859 </a><br>
                <i class="fa fa-phone"></i><a href="tel:09256578594" style="color:#7BFF00"> +95-9-256578594</a><br>
                <i class="fa fa-phone"></i><a href="tel:09256578595" style="color:#7BFF00"> +95-9-256578595</a> <br>
                <br>
                <i class="fa fa-envelope"></i> <a href="mailto:info@ucsmgy.edu.mm" style="color:#7BFF00"> info@ucsmgy.edu.mm</a><br>
            </address>          
          </div>
        </div>                   
      </div>
    </div>
  </section>  

  <section class="nb-copyright">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-6 copyrt xs-center">
                  2023 © University of Computer Studies (Magway)  
                </div>
                <div class="col-sm-6 text-right xs-center">
                  <ul class="list-inline footer-social">
                      <li><a href="https://www.facebook.com/computeruniversitymagway/"><i class="fa fa-facebook"></i></a></li>                        
                   </ul>
                </div>
          </div>
      </div>
  </section>
</footer>

            <script type="text/template" id="tpl-bubble-left">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15 30" enable-background="new 0 0 15 30" xml:space="preserve">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#000000" stroke-miterlimit="10" d="M0,29.4c0,0,7.5,0,7.5-7c0,0,7,0,7-7c0-0.1,0-0.1,0-0.2c0-0.1,0-0.1,0-0.2c0-7-7-7-7-7c0-7-7.5-7-7.5-7"/>
              </svg>
            </script>
            <script type="text/template" id="tpl-bubble-right">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15 30" enable-background="new 0 0 15 30" xml:space="preserve">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#000000" stroke-miterlimit="10" d="M15,29.4c0,0-7.5,0-7.5-7c0,0-7,0-7-7c0-0.1,0-0.1,0-0.2c0-0.1,0-0.1,0-0.2c0-7,7-7,7-7c0-7,7.5-7,7.5-7"/>
              </svg>
            </script>

            <!-- Include jQuery and Scripts -->
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/jquery.jcarousel.min.js"/script>

              <script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
              <script type="text/javascript" src="vendors/jquery.waypoints.min.js"></script>
              <script type="text/javascript" src="vendors/isotope.pkgd.min.js"></script>
              <!-- Swiper -->
              <script type="text/javascript" src="vendors/swiper/js/swiper.min.js"></script>
              <!-- Magnific-popup -->
              <script type="text/javascript" src="js/scripts.js"></script>
              <script type="text/javascript" src="js/jcarousel.responsive.js"></script>
              <!-- instagram -->
              <script type="text/javascript" src="instafeed/instagramLite.js"></script>
              <script type="text/javascript" src="instafeed/instafeed.min.js"></script>
<!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<!-- Mirrored from template.themeton.com/cloudytown/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Dec 2022 07:52:29 GMT -->
</html>