<?php require_once '../admin/db.php'; ?>
<?php include_once '../admin/function.php' ?>
<?php ob_start(); ?>
<?php include_once "database_connection.php"; ?> 
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<!-- Mirrored from template.themeton.com/cloudytown/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Dec 2022 07:51:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>UCSMGY BLOG</title>
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,ThemeTon">
    <meta name="description" content="Cloudy Town - Simple Blog HTML Template">
    <meta name="author" content="ThemeTon">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap-theme.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="vendors/font-awesome/css/font-awesome.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" type="text/css" href="vendors/swiper/css/swiper.min.css">
    <!-- Magnific-popup -->
    <!-- instagram section--> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <link rel="stylesheet" href="./css/text_css.css" />
      <link rel="stylesheet" href="./css/popupstyles.css" />

    <link rel="stylesheet" href="./assets/css/style.css">

    <!--
    - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- dark mode -->
    <script src="../dark-mode.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- footer -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <!-- end footer -->
<!-- all_new -->

    <!-- Add font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</head>
<body>
  
<header id="header">   
    <?php                                
        if(isset($_SESSION['USER']->id)) {
            if(isset($_SESSION['USER']->email_verified)) 
                $id = $_SESSION['USER']->id;                   
                {
    ?>
                <!--noti and profile  -->
                <div class=" col-md-12 h-search">
                   <ul class="nav navbar-nav navbar-right "> 

                        <li class="dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="view_notification"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp;Notification

                            <?php
                                $total_notification = Count_notification($connect, $id);

                                if($total_notification > 0)
                                {
                                    echo '<span class="label label-danger" id="total_notification">'.$total_notification.'</span>';
                                }
                            ?>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    
                                    <?php
                                    echo Load_notification($connect, $id);
                                    ?>
                                </ul>
                                </a>
                        </li>  
                        <?php
                            $id = $_SESSION['USER']->id;
                            $query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$id'") or die(mysqli_error());
                            if(mysqli_num_rows($query) > 0){
                                $fetch = mysqli_fetch_assoc($query);
                            }                
                        ?>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;<?php echo $fetch['username']; ?>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../admin/change_profile.php">Change Profile</a></li>
                                <li><a href="../verify/logout.php">Logout</a></li>
                            </ul>
                        </li>                       
                    </ul>                                       
                </div>   
                <?php
                    }

                }else{
                    // check user login
                ?>
                <div class=" col-md-12 h-search">
                    <ul class="nav navbar-nav navbar-right "> 
                        <p>You are not signed in.<a href="../verify/login.php">(Sign in)</a></p>
                    </ul>
                </div>
                <?php
                    }//end of user login
                ?>

    <div class="logo" data-bg-image="images/girl.jpg">
       <h2> 
            <span>U</span>
            <span>C</span>
            <span>S</span>
            <span>M</span>
            <span>G</span>
            <span>Y</span>
            &nbsp;&nbsp; &nbsp;&nbsp;
            <span>B</span>
            <span>L</span>
            <span>O</span>
            <span>G</span>
            <!-- <span>UCSMGY BLOG</span> -->
        </h2>

        <br>
        <br>      
        <i class="bi bi-brightness-high-fill fa-2x" id="toggleDark"></i>       
    </div>

  <!-- start -->
    <div class="menu-container" >
        <div class="container" >
            <div class="row" >
                <div  class="col-md-5">
                    <nav class="main-nav" >
                        <ul>
                            <li class="current-menu-item"><i class="fa-solid fa-house-chimney fa-2x"></i>
                                <a href="index.php">Home</a>
                            </li>
                            <?php
                                if(isset($_SESSION['USER']->id)) {
                                     $id = $_SESSION['USER']->id;
                                    $query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$id'") or die(mysqli_error());
                                    if(mysqli_num_rows($query) > 0){
                                        $fetch = mysqli_fetch_assoc($query);
                                    } 

                                     if($fetch['user_role'] != 'Public User'){            

                                    ?>
                                        <li><i class="fa-solid fa-pen-to-square fa-2x"></i><a href="../admin/post.php?source=add_post">Write</a></li>
                                    <?php
                                    }
                                }else{
                                        ?>
                                         <li><i class="fa-solid fa-pen-to-square fa-2x"></i><a href="" onclick="Write()" id="myLink">Write</a></li>

                                <?php
                                }
                                ?>


                                <?php
                                    if(isset($_SESSION['USER']->id)) {

                                   ?>    
                                <li><i class="fa-brands fa-facebook-messenger fa-2x"></i> &nbsp;<a href="../ChatApp/users.php">Chat</a></li> 

                                 <?php                                
                                }else{
                                ?> 
                                <li><i class="fa-brands fa-facebook-messenger fa-2x"></i> &nbsp;<a href="" onclick="Conversation()">Chat</a></li> 
                                <?php
                                }
                                ?>  

                                <?php
                                if(!isset($_SESSION['USER']->id)) {
                                    ?>

                                  <li><i class="fa-sharp fa-solid fa-user fa-2x"></i>&nbsp;<a href="../verify/signup.php?source=add_post">Signup</a></li>

                                <?php
                                }
                                ?>  


                            <?php
                                if(isset($_SESSION['USER']->id)) {
                                     $id = $_SESSION['USER']->id;
                                    $query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$id'") or die(mysqli_error());
                                    if(mysqli_num_rows($query) > 0){
                                        $fetch = mysqli_fetch_assoc($query);
                                    } 

                                     if($fetch['user_role'] == 'Admin'){            

                                    ?>
                                        <li><i class="fa-solid fa-user fa-2x"></i><a href="../admin/index.php?source=add_post">Manage</a></li>
                                    <?php
                                    }
                                }
                            ?>
                        </ul>
                        <a href="javascript:;" id="close-menu"> <i class="fa fa-close"></i></a>
                    </nav>
                </div>

                <!-- follow -->
               
              <div class=" col-md-5 h-search">
                    <form class="search_form" method="get" action="search.php" >
                        <input type="text" name="post_tag" placeholder="What are you looking for?">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                 </div>                                      
            </div>
<!-- end -->
        </div>
    </div>
<!-- end -->
               
    </div>
    </div>
</div>
</header>

<?php
include('jquery.php');
?>
    <script>
        function Write() {
            alert("You must sign in with '@ucsmgy.edu.mm' !");               
        }
        function Conversation() {             
            alert("You must sign in to join conversation ! ");                
        }
    </script>