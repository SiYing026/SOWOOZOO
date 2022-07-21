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
        
        <!-- faq section -->
        <section class="faq" id="faq">
            <h1 class="head1">General Questions</h1>
            
            <div class="questions-container">
                <div class="question">
                    <button>
                        <span>Why should I choose to fly with SOWOOZOO Helicopters?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>SOWOOZOO Helicopters employs the highest qualified pilots in the 
                        industry who have received numerous awards for safety and customer service. 
                        SOWOOZOO Helicopters also has the top safety record of any tourism-based 
                        aviation company in the world. 
                        Furthermore, SOWOOZOO Helicopters flies the premium ECO-Star helicopter, 
                        which is the finest helicopter used in the tourism industry. </p>
                </div>
                
                <div class="question">
                    <button>
                        <span>What type of aircraft does SOWOOZOO Helicopters fly?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>SOWOOZOO Helicopters exclusively flies EC130 & H130 ECO-Star helicopters 
                        at all of our locations. The ECO-Star helicopter was designed and engineered 
                        for the tourism market with comfort and viewing features in mind. 
                        SOWOOZOO showcases the largest and youngest fleet of ECO-Star helicopters 
                        in the world in addition to its experienced flight operations staff.</p>
                </div>
                
                <div class="question">
                    <button>
                        <span>What are the hours of operation?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>SOWOOZOO Helicopters We are open 364 days a year from 9:00 am, 
                        7 days a week (weather permitting). Closing times vary - please contact us for updates. 
                        Unfortunately we cannot fly after dark or in low cloud conditions, 
                        so give us a call if the weather looks questionable! </p>
                </div>
                
                <div class="question">
                    <button>
                        <span>Can I pick my seat?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>SOWOOZOO Helicopters seating is computer generated, 
                        based on weight and balance limits, and is not assigned until check-in is complete. 
                        SOWOOZOO Helicopters does not guarantee seating next to or in the same row of the 
                        rest of the party and pilots have the ability to rearrange seating if needed. </p>
                </div>
                
                <div class="question">
                    <button>
                        <span>Are reservations necessary?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>SOWOOZOO Helicopters do not require reservations as we operate on a first-come, 
                        first-serve basis. However, we do recommend that bus groups book in advance so 
                        that we may space them out and not create a long wait time. </p> 
                </div>
                
                <div class="question">
                    <button>
                        <span>Can I bring a beverage on the flight?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>Guests are allowed to bring bottled water on the flight. 
                        All other beverages will not be allowed in the helicopter. </p>
                </div>
                
                <div class="question">
                    <button>
                        <span>Can pregnant women fly?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>Our flights are safe for mother and child of low-risk pregnancies. 
                        Check with your doctor or midwife for flight recommendations for your specific pregnancy. </p>
                </div>
                
                <div class="question">
                    <button>
                        <span>Can I exit the aircraft as soon as it lands?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>Passengers are prohibited from touching the doors of the aircraft unless given 
                        instruction to do so by the pilot. The pilot will open and close all helicopter doors. </p>
                </div>
                
                <div class="question">
                    <button>
                        <span>Does SOWOOZOO Helicopters have any overnight packages?</span>
                        <i class="far fa-hand-point-down"></i>
                    </button>
                    <p>SOWOOZOO Helicopters does not offer any overnight packages currently.</p>
                </div>
            </div>
        </section>
        <!-- End faq section -->
        
        <!-- Contact us section -->
        <section class="contact" id="contact">
            <div class="content">
                <h1 class="heading">Contact Us</h1>
                <form action="faqs.php" method="POST">
                    
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
    //nav bar
    let navbar = document.querySelector('.header .navbar');

    document.querySelector('#menu-btn').onclick = () =>{
        navbar.classList.add('active');
    };

    document.querySelector('#nav_close').onclick = () =>{
        navbar.classList.remove('active');
    };
    
    //faqs
    const buttons = document.querySelectorAll('button');

    buttons.forEach( button =>{
        button.addEventListener('click',()=>{
            const faq = button.nextElementSibling;
            const icon = button.children[1];

            faq.classList.toggle('show');
            icon.classList.toggle('rotate');
        });
    } );
    
        //send email
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
    </script>


    </body>
</html>
