<!-- select all checkbox -->
<?php 
    if (isset($_POST['allcheckboxArray'])) {
        foreach ($_POST['allcheckboxArray'] as $u_id) { 
            if(isset($_POST['alldelete2'])) {
                $sql = "DELETE FROM users WHERE id = $u_id";
                $delete_post = mysqli_query($con,$sql);
                confirm_query($delete_post);
            }           
        }
    }
?>   
        <!-- <div class="card"> -->
            <div class="body">
                <div class="col-lg-12">
                <!-- user permission levels -->
                <?php
                    $user_role = $fetch['user_role'];

                    if ( $user_role == 'Writer') {
                    echo "<script> alert('ONLY ADMIN CAN VIEW USERS');
                    window.location.href='./index.php'; </script>";
                    }
                    else if ($user_role == 'Admin') {
                    ?>
                     
                        <h1><?php $user_role ?></h1>

                <div class="col-xs-12">
                   <form class="search_form" method="get" action="users.php" >
                        <input type="text" name="post_tag" placeholder="What are you looking for?" style="border:solid 1.5px grey;" >
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <br>

                    <form method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="submit" name="alldelete2" value="ALL DELETE" class="btn btn-success" style="color:black;" onclick="return confirm(''Are You Sure You Want To Delete?');');">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10">
                                <!-- selectall  -->
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#js').on('click',function(){
                                            if(this.checked){
                                                $('.ss').each(function(){
                                                    this.checked = true;
                                                });
                                            }else{
                                                 $('.ss').each(function(){
                                                    this.checked = false;
                                                });
                                            }
                                        });
                                        
                                        // $('.checkbox').on('click',function(){
                                        //  if($('.checkbox:checked').length == $('.checkbox').length){
                                        //      $('#select_all').prop('checked',true);
                                        //  }else{
                                        //      $('#select_all').prop('checked',false);
                                        //  }
                                        // });
                                    });
                                </script>

                                <?php
                                $columns = array('username','user_role');

                                // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
                                $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

                                // Get the sort order for the column, ascending or descending, default is ascending.
                                $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                                ?>


                                <?php
                                if (isset($_GET['post_tag'])) {
                                    $post_tag = $_GET['post_tag'];
                                    $sql ="SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM users WHERE username LIKE '%$post_tag%' OR user_role LIKE '%$post_tag%' ORDER BY $column $sort_order";
                                }else{
                                    $sql ="SELECT * ,ROW_NUMBER() OVER (ORDER BY $column $sort_order) AS row_num FROM users ORDER BY $column $sort_order";
                                }

                                $aa = $con->query($sql);
                                    // Get the result...
                                if ($result = $aa ) {
                                    // Some variables we need for the table.
                                    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                                    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                                    $add_class = ' class="highlight"';
                                ?>
                                    
                                <?php
                                $result = mysqli_query($con,$sql);
                                    if(!$result){
                                        die('Query Failed'.mysqli_error($result));
                                }
                                ?>

                                <table class="table table-bordered" style="background-color:#ffffff">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input checkAllBox" type="checkbox" id="js" name="allcheckboxArray" >
                                                        <label class="form-check-label" for="js"></label>
                                                </div>
                                            </th> 
                     
                                            <th>No</th>
                                        
                                            <?php                                           
                                            if (isset($_GET['post_tag'])) {
                                            ?>  
                                            <th><a href="users.php?post_tag=<?php echo $post_tag; ?>&column=username&order=<?php echo $asc_or_desc; ?>">Username<p></p><i class="fa fa-sort<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                            <th><a href="users.php?post_tag=<?php echo $post_tag; ?>&column=user_role&order=<?php echo $asc_or_desc; ?>">User Role<p></p><i class="fa fa-sort<?php echo $column == 'user_role' ? '-' . $up_or_down : ''; ?>"></i></a></th>

                                            <?php 
                                            }else{
                                            ?>
                                             <th><a href="users.php?column=username&order=<?php echo $asc_or_desc; ?>">Username<p></p><i class="fa fa-sort<?php echo $column == 'username' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                            <th><a href="users.php?column=user_role&order=<?php echo $asc_or_desc; ?>">User Role<p></p><i class="fa fa-sort<?php echo $column == 'user_role' ? '-' . $up_or_down : ''; ?>"></i></a></th>

                                            <?php
                                            }
                                            ?>
                                            <th colspan="3">Change User Role</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $result = mysqli_query($con,$sql);
                                    if(!$result){
                                        die('Query Failed'.mysqli_error($result));
                                    }
                                        while($row = mysqli_fetch_assoc($result)){
                                            $row_num = $row['row_num'];
                                            $user_id = $row['id'];
                                            $username = $row['username'];
                                            $user_email = $row['email'];
                                            $user_email_verified = $row['email_verified'];
                                            $user_role = $row['user_role'];
                                        ?>  
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input ss" type="checkbox" id="<?php echo $user_id ?>" name="allcheckboxArray[]" value="<?php echo $user_id ?>">
                                                    <label class="form-check-label" for="<?php echo $user_id ?>">
                                                    </label>
                                                </div>
                                            </td>

                                            <td><?php echo $row_num ?></td>
                                            <td<?php echo $column == 'username' ? $add_class : ''; ?>><?php echo $row['username']; ?></td>

                                            <td<?php echo $column == 'user_role' ? $add_class : ''; ?>><?php echo $row['user_role']; ?></td>         

                                            <td><a href='users.php?Admin=<?php echo $user_id ?>'> Admin</a></td>
                                            <td><a href='users.php?Writer=<?php echo $user_id ?>'> Writer</a></td>
                                            <td><a href='users.php?Public_User=<?php echo $user_id ?>'> Public User</a></td>

                                            <td><a href='users.php?source=edit_user&edit=<?php echo $user_id ?>'><i class="fas fa-edit"></i></a></td>
                                            <td><a href='users.php?delete=<?php echo $user_id ?>' style="color: red;" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                            }
                                            // while end
                                        ?>
                                    </tbody>
                                </table>

                                <?php
                                $result->free();
                                }
                                ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- col-12 -->
                                <?php
                                if(isset($_GET['Admin'])){
                                    $the_user_id = $_GET['Admin'];
                                    $query = "UPDATE users SET user_role='Admin' WHERE id=$the_user_id";
                                    $result = mysqli_query($con,$query);
                                    if(!$result){
                                        die('Query Failed'.mysqli_error($result));
                                    }
                                    header('Location: users.php');
                                }


                                if(isset($_GET['Writer'])){
                                    $the_user_id = $_GET['Writer'];
                                    $query = "UPDATE users SET user_role='Writer' WHERE id=$the_user_id";
                                    $result = mysqli_query($con,$query);
                                    if(!$result){
                                        die('Query Failed'.mysqli_error($result));
                                    }
                                    header('Location: users.php');
                                }

                                if(isset($_GET['Public_User'])){
                                    $the_user_id = $_GET['Public_User'];
                                    $query = "UPDATE users SET user_role='Public User' WHERE id=$the_user_id";
                                    $result = mysqli_query($con,$query);
                                    if(!$result){
                                        die('Query Failed'.mysqli_error($result));
                                    }
                                        header('Location: users.php');
                                }


                                if (isset($_GET['delete'])) {
                                    $the_user_id = (int)$_GET['delete'];
                                    $sql = "DELETE FROM users WHERE id=$the_user_id";
                                    $result = mysqli_query($con,$sql);
                                    confirm_query($result);
                                    header('Location: users.php');//delete data in both web page and database
                                }
                                ?>

                            <?php 
                            }
                            // end of admin
                            ?>    
                </div>
                <!-- col-12 -->
            </div>
            <!-- body -->
        </div>
        <!-- card -->
    </div>
    <!-- container-fluid -->
</section>
<?php include_once "include_admin/lower.php"; ?> 

<script>
        $(function(){
            $('.confirm_delete').click(function(){
                return confirm('Are You Sure You Want To Delete');
            });
        });        
</script>

