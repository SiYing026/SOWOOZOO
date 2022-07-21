<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SOWOOZOO - Helicopter Experience</title>
            <link rel="icon" type="images/x-icon" href="images/favicon.png" sizes="32x32">

        <!-- font  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- swiper  -->
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <!-- css  -->
        <link rel="stylesheet" href="css/style.css">

    </head>
    
    <body>
        <!-- header section -->
        <header class="header">
            
            <a href="index1.php" class="logo"><img src="images/favicon.png" alt="">&nbsp;SOWOOZOO</a>

            <nav class="navbar">
                <div id="nav_close" class="fa fa-times"></div>
                <a href="index1.php">Home</a>
                <a href="index1.php#about">About</a>
                <a href="index1.php#gallery">Gallery</a>
                <a href="index1.php#packages">Packages</a>
                <a href="index1.php#clients">Review</a>
                <a href="contactus.php">Contact</a>
                <a href="signin.php">Sign-in</a>
                
                <?php
                    ini_set('display_errors', 0);
                    error_reporting(E_ERROR | E_WARNING | E_PARSE); 

                    session_start();
                    $identifier=$_SESSION['identifier'];

                    if(!empty($_SESSION['identifier'])){
                        
                       echo("<button onclick=\"location.href='logout.php'\" title=\"Sign-out\" class=\"fa fa-sign-out\" style=\"font-size: 30px; background:transparent; padding-left: 22px;\"></button>");
                    }
                    else{
                        echo "<SCRIPT LANGUAGE='javascript'>disable();</SCRIPT>";
                    }
                ?>
                
                <script language="javascript">
                    function disable()
                    {
                    document.disabled = true;
                    }
                </script>

            </nav>

            <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
            </div>

        </header>
        <script>
            //nav bar
            let navbar = document.querySelector('.header .navbar');

            document.querySelector('#menu-btn').onclick = () =>{
                navbar.classList.add('active');
            };

            document.querySelector('#nav_close').onclick = () =>{
                navbar.classList.remove('active');
            };
        </script>
        <!-- End header section -->
        
        <!-- myaccount section -->
        <section class="account" id="account">
            <div class="content">
            <h1 class="head1">My Account</h1>
                
                <?php				
                    ini_set('display_errors', 0);
                    error_reporting(E_ERROR | E_WARNING | E_PARSE); 

                    session_start();

                    $dbc=mysqli_connect("localhost","root","");
                    mysqli_select_db($dbc, "sowoozoo");

                    $identifier=$_SESSION['identifier'];
                    $query1=mysqli_query($dbc,"SELECT username FROM user WHERE email='$identifier'");
                    $query2=mysqli_query($dbc,"SELECT firstName FROM user WHERE email='$identifier'");	
                    $query3=mysqli_query($dbc,"SELECT lastName FROM user WHERE email='$identifier'");	
                    $query4=mysqli_query($dbc,"SELECT password FROM user WHERE email='$identifier'");	
                    
                    if(!empty($_SESSION['identifier'])){
                        echo'<div class="profile">';
                            echo'<img src="images/profile.jpg" width="80%">';
                                while ($row = $query1->fetch_assoc()) {
                                        echo"<div class=\"container\"><p><b>Username: </b>";
                                        echo $row['username']."</p>";
                                }

                                if(!empty($_SESSION['identifier'])){
                                    echo"<p><b>Email:</b> $identifier</p>";
                                }

                                while ($row = $query2->fetch_assoc()) {
                                        echo"<p><b>First Name:</b> ";
                                        echo $row['firstName']."</p>";
                                }

                                while ($row = $query3->fetch_assoc()) {
                                        echo"<p><b>Last Name:</b> ";
                                        echo $row['lastName']."</p>";
                                }

                                while ($row = $query4->fetch_assoc()) {
                                        echo"<p><b>Password:</b> ";
                                        echo $row['password']."</p></div>";
                                }
                            echo"<br/><br/>";
                        echo "</div>";
                    }
            ?>
            
                <form action="editprofile.php" method="post">
                    <a href="editprofile.php" type="edit" class="btn">Edit Profile</a>
                </form>

                <form action="mybooking.php">
                    <a href="mybooking.php" type="edit" class="btn">Booking History</a>
                </form>
          
        </div>
        </section>
        <!-- End myaccount section -->
        
        <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="index1.php">Home</a>
                <a href="index1.php#about">About</a>
                <a href="index1.php#gallery">Gallery</a>
                <a href="index1.php#packages">Packages</a>
                <a href="index1.php#clients">Review</a>
                <a href="contactus.php">Contact</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="myaccount.php">My Account</a>
                <a href="mybooking.php">My Booking</a>
                <a href="faqs.php">FAQs</a>
                <a href="privacypolicy.php">Privacy Policy</a>
                <a href="termandcondition.php">Terms and Conditions</a>
            </div>

            <div class="boxspecial">
                <h3>contact info</h3>
                <a href="#"><i class="fa fa-phone"></i>+123 5689 2568</a>
                <a href="#"><i class="fa fa-envelope"></i>enquire@sowoozoo.com</a>
                <a href="#"><i class="fa fa-map-maker"></i>804, Jalan Kuantan, Titiwangsa, <br>53200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i>Facebook</a>
                <a href="https://twitter.com/login"><i class="fab fa-twitter"></i>Twitter</a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i>Instagram</a>
                <a href="https://line.worksmobile.com/jp/en/blog/line-account-login/"><i class="fab fa-line"></i>Line</a>
            </div>

        </div>

    </section>

    <!-- footer section ends -->
    
    </body>
</html>
