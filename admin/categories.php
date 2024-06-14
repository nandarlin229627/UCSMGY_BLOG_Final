<?php include_once "include_admin/upper.php"; ?> <!-- Header-->
<!-- START CONTENT -->
<section class="content home">
    <div class="container-fluid">        
       <div class="block-header">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h2>Sub_Categories</h2>                
                </div>            
            </div>
        </div>
    
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <!-- user permission levels -->
            <?php
            $user_role = $fetch['user_role'];
            if ( $user_role == 'Author') {
                echo "<script> alert('ONLY ADMIN CAN DO');
                window.location.href='./index.php'; </script>";
            }
            elseif ($user_role == 'Admin') {
            ?> 
                <?php                
                if (isset($_GET['source'])) {
                    $source =$_GET['source'];
                }else{
                    $source ="";
                }

                switch ($source) {
                    case 'add_category':
                    include_once "include_admin/add_category.php";
                    break;

                    case 'edit_category':
                    include_once "include_admin/edit_category.php";
                    break;

                    default:
                    include_once "include_admin/view_all_categories.php";
                    reak;
                }
                ?>
        </div>
        <!-- col-12 -->
            <?php
                }
                // check Admin
            ?>
    </div>
    <!-- end of container-fluid -->
</section>
  <!-- END CONTENT -->
<?php include_once "include_admin/lower.php"; ?> 