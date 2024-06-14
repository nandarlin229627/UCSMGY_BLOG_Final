<?php include_once "include_admin/upper.php"; ?> <!-- Header-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            <style>
            html {
                font-family: Tahoma, Geneva, sans-serif;
                padding: 10px;
            }
            table {
                border-collapse: collapse;
                width: 500px;
            }
            th {
                background-color: white;
                border: 1px solid #54585d;
            }
            th:hover {
                background-color: lightgray;
            }
            th a {
                display: block;
                text-decoration:none;
                padding: 10px;
                color: black;
                font-weight: bold;
                font-size: 13px;
            }
            th a i {
                margin-left: 5px;
                color: black;
            }
            td {
                padding: 10px;
                color: #636363;
                border: 1px solid #dddfe1;
            }
            tr {
                background-color: #ffffff;
            }
            tr .highlight {
                background-color: #f9fafb;
            }
            </style>
    <!-- START CONTENT -->
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <div class="d-sm-flex justify-content-between">
                    <div>
                        <h2>Posts</h2>
                    </div>                
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-lg-12">
                <br>
                <?php
                if (isset($_GET['source'])) {
                    $source =$_GET['source'];
                }else{
                    $source ="";
                }

                switch ($source) {
                    case 'add_post':
                    include_once "include_admin/add_post.php";
                    break;

                    case 'edit_post':
                    include_once "include_admin/edit_post.php";
                    break;

                    default:
                    include_once "include_admin/view_all_posts.php";
                    break;
                }
                ?>
            </div>
            <!-- col-12 -->
        </div>
         <!-- container fluid -->
    </section>
<?php include_once "include_admin/lower.php"; ?> 
