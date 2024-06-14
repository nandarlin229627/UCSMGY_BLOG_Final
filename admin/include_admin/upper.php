<?php ob_start(); ?> 
<?php require_once 'db.php'; ?>
<?php require_once 'function.php' ?>
<?php session_start(); ?>

<!-- prevent unauthorized users -->
<?php
if(!isset($_SESSION['USER']->id)) 
{
    header('location:../verify/login.php');
}
?>

<?php
$id = $_SESSION['USER']->id;
$query=mysqli_query($con, "SELECT * FROM `users` WHERE id = '$id'") or die(mysqli_error());
if(mysqli_num_rows($query) > 0){
    $fetch = mysqli_fetch_assoc($query);
}                
?>

<!DOCTYPE html>
<html class=" ">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Blog University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />   -->  <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">  <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->

    <!-- CORE CSS FRAMEWORK - START -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

    <!-- CORE CSS TEMPLATE - START -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS TEMPLATE - END -->

    <!-- ckeditor -->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- new dashboard -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="dashboard_assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Custom Css -->
    <link rel="stylesheet" href="dashboard_assets/css/main.css">
    <link rel="stylesheet" href="dashboard_assets/css/themes/all-themes.css"/>        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="dashboard_assets/css/sb-admin.css">
    <!-- end new dashboard -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<!-- END HEAD -->

<body class="theme-cyan">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars --> 

    <div id="morphsearch" class="morphsearch">
        <form class="morphsearch-form">
            <div class="form-group m-0">
                <input value="" type=" " placeholder="" class="morphsearch-input" />
                <button class="morphsearch-submit" type="submit">Search</button>
            </div>
        </form>

        <!-- /morphsearch-content --> 
        <span class="morphsearch-close"></span>
    </div>

    <!-- Top Bar -->
    <nav class="navbar clearHeader">
        <div class="col-12">
            <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html">UCSMGY BLOG</a> </div>
            <ul class="nav navbar-nav navbar-right">
               <li><a href="../Publish_User/index.php" class="js-right-sidebar" data-close="true">News Feed&nbsp;&nbsp;</a></li>
               <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
           </ul>
       </div>
    </nav>
   <!-- #Top Bar -->

<!--Side menu and right menu -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info"> 
            <!-- add default image -->
            <?php  
            if($fetch['image'] == ''){
                ?>      
                <div class="admin-image">  <img src="../img/default_u.jpg" alt="user-image" class="img-circle img-inline"></div>
                <?php
            }else{
                ?>
                <div class="admin-image">  <img src="../profile/<?php echo $fetch['image']; ?>" alt="user-image" class="img-circle img-inline"></div>
                <?php
            }
            ?>

            <div class="admin-action-info"> <span>Welcome</span>
                <h3><span><?php echo $fetch['username']; ?> </span></h3>
                <h3><span><?php echo $fetch['user_role']; ?> </span></h3>
                <ul>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->

        <div class="menu">
            <ul class="list">
                <!-- <li class="header"></li> -->
                <?php
                $id = $_SESSION['USER']->id;
                $sql = "SELECT * FROM users WHERE id=$id";
                $result = mysqli_query($con,$sql);
                confirm_query($result);//function call

                $row = mysqli_fetch_assoc($result);//only one row(no while loop)
                $user_role = $row['user_role'];
                if($user_role == 'Admin'){
                ?>

                <li class="active open"><a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span></a>
                </li>

                <li><a href="admin_blogs.php">
                    <i class="fa fa-list"></i>
                    <span style="color:#999;">Category</span> </a>
                </li>

                <li ><a href="javascript:void(0);" class="menu-toggle">
                    <i class="fa fa-list"></i><span>Sub_Categories</span> </a>
                    <ul class="ml-menu">
                        <li><a class="" href="categories.php" >View All Sub_Categories</a></li>
                        <li><a class="" href="categories.php?source=add_category">Add New Sub_Category</a></li>
                    </ul> 
                </li>  
                <?php                
                    }
                    // chech admin
                ?>

                <?php   
                if($user_role != 'Public User'){
                ?>
                <li><a href="javascript:void(0);" class="menu-toggle">
                    <i class="fa fa-blog"></i><span>Posts</span> </a>
                    <ul class="ml-menu">
                        <li><a class="" href="post.php" >View All Posts</a></li>
                        <li><a class="" href="post.php?source=add_post">Add New Post</a></li>                      
                    </ul>
                </li>                
                <?php
                    }
                ?>

                <?php   
                if($user_role == 'Admin'){
                ?>                          
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                    <i class="fa fa-users"></i><span>Users</span> </a>
                    <ul class="ml-menu">
                        <li><a class="" href="users.php" >View All Users</a></li>
                        <li><a class="" href="users.php?source=add_user">Add New User</a></li>              
                    </ul>
                </li>                
                <?php
                    }
                ?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                    <i class="fa fa-user"></i><span>Profile</span></a>
                    <ul class="ml-menu">
                        <li><a class="" href="change_profile.php" >Change Profile</a></li>
                        <li><a class="" href="change_password.php">Change Password</a></li>                    
                    </ul>
                </li> 
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar --> 

    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li> -->
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red"><div class="red"></div><span>Red</span> </li>
                    <li data-theme="purple"><div class="purple"></div><span>Purple</span> </li>
                    <li data-theme="blue"><div class="blue"></div><span>Blue</span> </li>
                    <li data-theme="cyan" class="active"><div class="cyan"></div><span>Cyan</span> </li>
                    <li data-theme="green"><div class="green"></div><span>Green</span> </li>
                    <li data-theme="deep-orange"><div class="deep-orange"></div><span>Deep Orange</span> </li>
                    <li data-theme="blue-grey"><div class="blue-grey"></div><span>Blue Grey</span> </li>
                    <li data-theme="black"><div class="black"></div><span>Black</span> </li>
                    <li data-theme="blush"><div class="blush"></div><span>Blush</span> </li>
                </ul>
            </div>
        </div>
    </aside>    
    <!-- #END# Right Sidebar --> 
</section>
<!--Side menu and right menu -->