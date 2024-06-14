<?php include_once "include_admin/upper.php"; ?> <!-- Header-->
    <!-- main content -->
<section class="content home">
  <div class="container-fluid">
    <div class="block-header">
      <div class="d-sm-flex justify-content-between">
      <div>
          <h2>Dashboard</h2>
          <small class="text-muted">Welcome to UCSMGY BLOG</small>
      </div>                   
    </div>
  </div>

  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">CATEGORY</span>
          <?php
          $query = "SELECT * FROM blog_group";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
          $categories_num = mysqli_num_rows($result);
          echo "<a href='categories.php'><span class='info-box-number'><span class='info-box-number'>{$categories_num}</span></a>";
          ?>
        </div>
          <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-text"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">POST</span>               
          <?php
          $query = "SELECT * FROM post";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
          $post_num = mysqli_num_rows($result);
          echo "<a href='post.php'><span class='info-box-number'>{$post_num}</span></a>";
          ?>               
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
         

    <!-- fix for small devices only -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">USER</span>
          <?php
          $query = "SELECT * FROM users";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
          $users_num = mysqli_num_rows($result);
          echo "<a href='users.php'><span class='info-box-number'><span class='info-box-number'>{$users_num}</span></a>";
          ?>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->          
  </div>
  <!-- /.row -->

  <!-- Bar Chart -->
  <div class="row clearfix">
    

    <?php
    $qry = "SELECT * FROM users WHERE user_role ='Admin'";
    $result = mysqli_query($con,$qry);
    $admin_num = mysqli_num_rows($result);

    $qry = "SELECT * FROM users WHERE user_role ='Writer'";
    $result = mysqli_query($con,$qry);
    $writer_num = mysqli_num_rows($result);

    $qry = "SELECT * FROM users WHERE user_role ='Public User'";
    $result = mysqli_query($con,$qry);
    $user_num = mysqli_num_rows($result);
    ?>

    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card"> 
        <div class="header">
          <h2> Users Detail</h2> 
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
             ['User in Blog', 'number'],
              ['Admin',   <?php echo $admin_num?>],
              ['Writer',      <?php echo $writer_num?>],
              ['Public User',  <?php echo $user_num?>]
            ]);

            var options = {
              title: '',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
          }
        </script>
        <div class="body"></div>
          <div id="piechart_3d" style="height: 300px; width: 100%;"></div>    
     </div>           
    </div>
  </div>
</section>
<!-- main content -->
<?php include_once "include_admin/lower.php"; ?> 