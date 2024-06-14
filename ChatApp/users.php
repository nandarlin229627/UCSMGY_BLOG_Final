<?php 
  session_start();
  include_once "php/config.php";

  if(!isset($_SESSION['unique_id'])){
    header("location: ../verify/login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <!-- <a href="../admin/index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp; -->




         





                     <?php
                            if($row['image'] == ''){
                                 echo ' <img src="../img/default_u.jpg">';
                            }else{$row['image']
                        ?>        
                                                
                                <img src="../profile/<?php echo $row['image']; ?>" alt="">

                    <?php
                            }
                    ?>



          <div class="details">
            
            <span><?php echo $row['username'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="../verify/logout.php" class="logout">Logout</a>
        <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
