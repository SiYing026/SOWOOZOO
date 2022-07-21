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
            </nav>

            <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
            </div>

        </header>
        <!-- End header section -->
        
        
        <!-- information section -->
        <section class="information" id="information">
            <h1 class="head1">
                <?php
                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                        $sql="SELECT name FROM packages WHERE id=1";
                        $result = mysqli_query($dbc,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                                echo "{$row['name']}";
                        }
                    }
                ?>
            </h1>
            
                <video controls autoplay>
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT video FROM packages WHERE id=1";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<source src=\"{$row['video']} \" type='video/mp4' />";
                            }
                        }
                    ?>
                </video>

            <section class="details" id="details">
                <div class="content">
                    <h3 class="head3">
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT price FROM packages WHERE id=1";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "From: {$row['price']}";
                            }
                        }
                    ?>
                    </h3>
                    <h3>Overview</h3>
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT description FROM packages WHERE id=1";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<p>{$row['description']}</p>";
                            }
                        }
                    ?>
                </div>
            </section>
            
            <div class="content">
                    <div class="infobox">
                        <div class="highlight">
                            <h3>Tour Highlights</h3>
                            <span id="break">
                            <?php
                                if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                    $sql="SELECT tourHighlights FROM packages WHERE id=1";
                                    $result = mysqli_query($dbc,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            echo "{$row['tourHighlights']}";
                                    }
                                }
                            ?>
                            </span>
                            
                        </div>

                        <div class="highlight">
                            <h3>Tour Information</h3>
                            <span id="break">
                            <?php
                                if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                    $sql="SELECT tourInfo FROM packages WHERE id=1";
                                    $result = mysqli_query($dbc,$sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            echo "{$row['tourInfo']}";
                                    }
                                }
                            ?>
                            </span>
                        </div>

                        <div class="highlight">
                            <h3>Additional Information</h3>
                            <table>
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT addInfo FROM packages WHERE id=1";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "{$row['addInfo']}";
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End information section -->
        
        <div class="tourbutton">
            <a href="bookingform.php" class="btn">Booking now</a>
        </div>
        
        <!-- Contact us section -->
        <section class="contact" id="contact">
            <div class="content">
                <h1 class="heading">Contact Us</h1>
                <form action="grandCanyonTour.php" method="POST">
                    
            <?php
                    use PHPMailer\PHPMailer\PHPMailer;

                    require_once 'phpmailer/Exception.php';
                    require_once 'phpmailer/PHPMailer.php';
                    require_once 'phpmailer/SMTP.php';

                    $mail = new PHPMailer(true);

                    $alert = '';

                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];

                        if (!empty($_POST['name']) && !empty($_POST['email']) & !empty($_POST['subject']) & !empty($_POST['message'])){

                            try{
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username = 'siying060202@gmail.com'; // Gmail address which you want to use as SMTP server
                                $mail->Password = 'tnuccpcuysckrzxl'; // Gmail address Password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = '587';

                                $mail->setFrom('siying060202@gmail.com'); // Gmail address which you used as SMTP server
                                $mail->addAddress('siying060202@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

                                $mail->isHTML(true);
                                $mail->Subject = "SOWOOZOO : $subject";
                                $mail->Body = "<h4>Name : $name <br>Email: $email </h4><h4><br>Message : </h4><p>$message</p>";

                                $mail->send();
                                echo "<p style='color:black; text-align: left;'><strong>Message Sent! Thank you for contacting us.</strong></p>";
                                
                            }catch (Exception $e){
                                $alert = '<div class="alert-error">
                                <span>'.$e->getMessage().'</span>
                                </div>';
                            }
                        }
                        else {
                                echo "<p style='color:red; text-align: left;'><strong>Please fill in.</strong></p>";
                        }
                    } 
            ?>

                    
                </form>
            </div>
        </section>
        <!-- End contact us section -->
            </div>
        </section>
        <!-- End contact us section -->
        
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
    
    <script type="text/javascript">
            //menu-bar
            let navbar = document.querySelector('.header .navbar');

            document.querySelector('#menu-btn').onclick = () =>{
                navbar.classList.add('active');
            };

            document.querySelector('#nav_close').onclick = () =>{
                navbar.classList.remove('active');
            };
        
            //send email
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
        </script>

    
    </body>
</html>
