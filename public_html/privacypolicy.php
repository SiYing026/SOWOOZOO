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
        
        <!-- policy section -->
        <section class="policy" id="policy">
            <h1 class="head1">Privacy Policy</h1>
            <div class="content">
                <p>
                    SOWOOZOO Group is committed to protecting your privacy. 
                    We provide this notice to explain our online practices and 
                    the choices you make about the way information is collected 
                    and used. We will only use the information we collect for the 
                    purpose of enhancing your SOWOOZOO experience. At no time 
                    will we sell, trade or rent your personal information to third parties.
                </p>
                <h3><i class="fas fa-database"></i> What personal data is collected?</h3>
                <p> To help provide you with, and improve our service, we may collect and process the following data about you:</p>
                    <ul>
                        <li>Information you submit via web forms such as your name and email address.</li>
                        <li>Data you submit during activities such as activation, exchange or extension 
                            of vouchers and submission of reviews, which will require you to submit your email address.</li>
                        <li>A record of your correspondence with us via phone, email or other means.</li>
                    </ul>  
                <p>
                   Details of your visits to our website including the following data sets; device information, 
                   location information, third party data (for marketing campaign management).
                <br>
                    Please note we do not share your details with any third parties without your consent.</p>
                
                <h3><i class="fas fa-cookie"></i> Cookies</h3>
                <p>
                   Session cookies are those which expire upon the closing of the web browser and 
                   persistent cookies are those which remain in place after a session has ended.
                </p>
                    <ul>
                        <li>Essential cookies (ecommerce checkout and basket functionality, location targeting, device targeting).</li>
                        <li>Website information cookies (enables us to understand traffic and visitor engagement 
                            levels to improve the quality of the website).</li>
                        <li>Setting cookies (enables an improvement is usability by adapting font size, style and page layout).</li>
                    </ul>
                
                <h3><i class="fas fa-file-export"></i> Data sharing</h3>
                <p>
                   We avoid sharing your personal data with third parties for marketing purposes, 
                   unless you have provided explicit consent for us to do so.
                </p>
                <p>
                   We may disclose your information in the following cases:
                </p>
                    <ul>
                        <li>To develop and create an improved customer experience.  Often, this data is anonymised anyway.</li>
                        <li>For a supplier to fulfil your experience gift operationally.</li>
                        <li>We can disclose it if we have a legal obligation to do so, or to protect your or other people’s property, safety or rights.</li>
                        <li>We can exchange information with specific third parties to protect against fraud or credit risks.</li>
                    </ul>
                <p>
                   Where data is transferred between systems, we ensure an encrypted connection is utilised. 
                   All of our associated websites maintain valid SSL certificates to allow secure connections 
                   from the web server to your browser, you will notice the padlock symbol is present within 
                   your search bar when browsing.
                </p>
            </div>
            
        </section>
        <!-- End policy section -->
        
        <!-- Contact us section -->
        <section class="contact" id="contact">
            <div class="content">
                <h1 class="heading">Contact Us</h1>
                <form action="privacypolicy.php" method="POST">
                    
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
                    <div class="row">
                        <div class="column left">
                            <input type="text" name="name" placeholder="Enter your name" id="" class="text"><br>
                        </div>
                        <div class="column right">
                            <input type="email" name="email" placeholder="Enter your email address" id="" class="email"><br>
                        </div>
                    </div>
                    <input type="text" name="subject" placeholder="Enter a subject for your message" id="" class="text">
                    <textarea name="message" rows="10" cols="30" id="" class="textarea" placeholder="Write your message"></textarea>
                    <input type="submit" value="Send message" name="submit" class="btn" >
                </form>
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
            //send email
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>
</html>
