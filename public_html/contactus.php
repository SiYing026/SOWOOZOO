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
        
        <!-- Contact us section -->
        <section class="contactus" id="contactus">
            <h1 class="head1">Contact Us</h1>
            <div class="content-container">
                
                <div class="box">
                    
                    <form action="contactus.php" method="POST">
                    
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
                    <input type="text" name="name" placeholder="Enter your name" id="" class="text"><br>
                    <input type="email" name="email" placeholder="Enter your email address" id="" class="email"><br>
                    <input type="text" name="subject" placeholder="Enter a subject for your message" id="" class="text">
                    <textarea name="message" rows="10" cols="30" id="" class="textarea" placeholder="Write your message"></textarea><br>
                    <input type="submit" value="Send message" name="submit" class="btn" >
                </form>
                </div>
                
                <div class="box">
                    <h3>Contact Info</h3>
                    <span>
                        <a href="#map"><i class="fas fa-map-marked-alt"></i> 804, Jalan Kuantan, Titiwangsa, 53200 Kuala Lumpur, 
                            <br>Wilayah Persekutuan Kuala Lumpur</a><br><br>
                        <a href="tel:123-5689-2568"><i class="fa fa-phone"></i> +123 5689 2568</a><br><br>
                        <a href="mailto:enquire@sowoozoo.com"><i class="fa fa-envelope"></i> enquire@sowoozoo.com</a>
                        
                        <div class="socialmedia">
                            <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                            <a href="https://twitter.com/login" class="fab fa-twitter"></a>
                            <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
                            <a href="https://line.worksmobile.com/jp/en/blog/line-account-login/" class="fab fa-line"></a>
                        </div>
                    </span>
                </div>
            </div>
        </section>
        <!-- End contact us section -->
       
        <section class="map" id="map">
            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.6799086403803!2d101.70108181457626!3d3.178665097685573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc481cf7620635%3A0x84f56fe87bcb98c8!2s804%2C%20Jalan%20Kuantan%2C%20Titiwangsa%2C%2053200%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur!5e0!3m2!1szh-CN!2smy!4v1652851759692!5m2!1szh-CN!2smy" 
                       width="100%" height="600" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
        </section>
    
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
                <a href="#"><i class="fas fa-map-marked-alt"></i>804, Jalan Kuantan, Titiwangsa, <br>53200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</a>
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
    
    <script>
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