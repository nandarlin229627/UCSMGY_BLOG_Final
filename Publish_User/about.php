 
<?php include_once "include_user/user_header.php"; ?> 
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   

<style type="text/css">

.row{
    
    display: flex;
    flex-wrap: wrap;
    
    
 }

.column{
    width: 100%;
    border: 1px ;
    padding: 0.5em 0;
 }
 .column1{
    width: 100%;
    border: 1px ;
    padding: 0.5em 0;
 margin: auto;
 }

 h1{
    width: 100%;
    text-align: center;
    font-size: 2.5em;
    color: red;
 }
 
 .card{
    box-shadow: 0 0 0.2em rgba(25, 0, 58, 0.15);
    padding: 3.5em 1em;
    border-radius: 0.6em;
    color: #1f003b;
    cursor: pointer;
    transition: 0.3s;
    background-color: #ffffff; }
        
 .cards{
    box-shadow: 0 0 0.2em rgba(25, 0, 58, 0.15);
    padding: 3.5em 1em;
    border-radius: 0.6em;
    color: #1f003b;
    cursor: pointer;
    transition: 0.3s;
    background-color: #ffffff;
    
     }
 .card .img-container{
    width: 8em;
    height: 8em;
    background-color: #a993ff;
    padding: 0.5em;
    border-radius: 50%;
    margin: 0 auto 2em auto;
 }
 .cards .img-container{
    width: 8em;
    height: 8em;
    background-color: #a993ff;
    padding: 0.5em;
    border-radius: 50%;
    margin: 0 auto 2em auto;
 }
 .card img{
    width: 100%;
    border-radius: 50%;
 }
 .cards img{
    width: 100%;
    border-radius: 50%;
 }
 .card h3{
    font-weight: 500;
 }
 .cards h3{
    font-weight: 500;
 }
 .card p {
    font-weight: 300;
    text-transform: uppercase;
    margin: 0.5em 0 2em 0;
    letter-spacing: 2px;
 }
 .cards p {
    font-weight: 300;
    text-transform: uppercase;
    margin: 0.5em 0 2em 0;
    letter-spacing: 2px;
 }
 .icons {
    width: 50%;
    min-width: 180px;
    margin: auto;
    display: flex;
    justify-content: space-between;
 }
 .Icons {
    width: 50%;
    min-width: 180px;
    margin: auto;
    display: flex;
    justify-content: space-between;
 }
 .card a {
    text-decoration: none;
    color: inherit;
    font-size: 1.4em;
 }
 .cards a {
    text-decoration: none;
    color: inherit;
    font-size: 1.4em;
 }
 .card:hover {
    background: linear-gradient( #6045ea, #8567f7);
    color: #ffffff;
 }
 .cards:hover {
    background: linear-gradient( #6045ea, #8567f7);
    color: #ffffff;
 }
 .card:hover .img-container {
    transform: scale(1.15);
 }
  .cards:hover .img-container {
    transform: scale(1.15);
 }
 @media screen and (min-width: 768px){
    section {
        padding: 1em 7em;
    }
 }
 @media screen and (min-width: 992px){
    section {
        padding: 1em;
    }
    .card{
        padding: 5em 1em;
    }
    
    .column{
        flex: 0 0 24.33%;
        max-width: 25.33%;
        padding: 0 1em;
    }
    
 } 
@media screen and (min-width: 992px){
    section {
        padding: 1em;
    }
    .cards{
        padding: 5em 1em;
    }
    
    .column1{
        flex: 0 0 24.33%;
        max-width: 25.33%;
        padding: 0 1em;
    }
    
 } 
</style>

</head>
<body>        
    <section>
        <!-- <div class="row">
            <h1>About Us</h1>
        </div> -->
        <!-- First row -->
        <div class="row" style="text-align: center;padding: 2em 1em;">
            <!-- FirstRow FirstColumn -->        
            <div class="column1">
                <div class="cards">
                    <div class="img-container">
                        <img src="our_profile/my.jpg" />
                    </div>
                    <h3>Dr. Zar Lwin Phyo</h3>
                    <p>Supervisor</p>
                    <!-- <div class="Icons">
                        <a href="https://www.facebook.com/computeruniversitymagway">
                            <i class="fab fa-facebook"></i></a>
                            <a href="mailto:magway.computer@gmail.com">
                            <i class="fab fa-google"></i></a>
                            <a href="#">
                            <i class="fab fa-twitter"></i></a>
                            <a href="#">
                            <i class="fab fa-instagram"></i></a>            
                    </div> -->
                </div>
            </div>
        </div>
        
        <!-- second row -->
        <div class="row" style="text-align: center;padding: 2em 1em;">   
            <!-- column1 -->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="../profile/hnin.jpg" />
                    </div>
                    <h3>Hnin Thidar O၀</h3>
                    <!-- <p>Developer</p> -->
                   <!--  <div class="icons">
                        <a href="#">
                            <i class="fab fa-facebook"></i></a>
                            <a href="#">
                            <i class="fab fa-google"></i></a>
                            <a href="#">
                            <i class="fab fa-twitter"></i></a>
                            <a href="#">
                            <i class="fab fa-instagram"></i></a>
                    </div> -->
                </div>
            </div>

                
            <!-- column2 -->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                    <img src="../profile/nandar.jpg" />
                </div>
                <h3>Nandar Lin</h3>
               <!--  <p>Developer</p>
                <div class="icons">
                    <a href="#">
                        <i class="fab fa-facebook"></i></a>
                        <a href="#">
                        <i class="fab fa-google"></i></a>
                        <a href="#">
                        <i class="fab fa-twitter"></i></a>
                        <a href="#">
                        <i class="fab fa-instagram"></i></a>
                </div> -->
            </div>
        </div>

            <!-- column3 -->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="../profile/htet2.jpg" />
                    </div>
                    <h3>Htet Myat Naing</h3>
                   <!--  <p>Designer</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-facebook"></i></a>
                            <a href="#">
                            <i class="fab fa-google"></i></a>
                            <a href="#">
                            <i class="fab fa-twitter"></i></a>
                            <a href="#">
                            <i class="fab fa-instagram"></i></a>
                    </div> -->
                </div>
            </div>

            <!-- column4 -->
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="../profile/han.jpg" />
                    </div>
                    <h3>Hani Khaing Oo</h3>
                   <!--  <p>Designer</p>
                    <div class="icons">
                        <a href="#">
                            <i class="fab fa-facebook"></i></a>
                            <a href="#">
                            <i class="fab fa-google"></i></a>
                            <a href="#">
                            <i class="fab fa-twitter"></i></a>
                            <a href="#">
                            <i class="fab fa-instagram"></i></a>
                    </div> -->
                </div>
            </div>
        </div>  
        <!-- row -->
    </section>
   <?php include_once "include_user/user_footer.php"; ?>
</body>
</html>