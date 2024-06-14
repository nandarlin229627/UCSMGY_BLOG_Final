<?php
 include_once "db.php";
$blog_id =  $_POST['blog_data'];

$state = "SELECT * FROM categories WHERE blog_postid = $blog_id";

$state_qry = mysqli_query($con, $state);
// $output="";
$output = '<option value="">Select Sub_category</option>';
while ($state_row = mysqli_fetch_assoc($state_qry)) {
    $output .= '<option name = "sub_category2" value="' . $state_row['cat_id'] . '">' . $state_row['cat_title'] . '</option>';
}
echo $output;
