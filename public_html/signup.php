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


        <!-- Sign-up form section -->
        <section class="signin" id="signin">
            <div class="content">
                <h1 class="head1">Sign-up</h1>
			
      <?php 
               
        if (isset($_POST['signup'])) {

            $problem = FALSE;

            if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])) {

                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (!is_numeric($_POST['username'])) {

                    if (isset($_POST['password'])) {

                        $number = preg_match('@[0-9]@', $password);
                        $uppercase = preg_match('@[A-Z]@', $password);
                        $lowercase = preg_match('@[a-z]@', $password);
                        $specialChars = preg_match('@[^\w]@', $password);

                        if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                            echo "<p style='color:red; font-size: 1.5rem;'><strong>Password must be at least 8 characters and contain at least 
							1 uppercase character, <br>1 lowercase character, 1 number and special character.</strong></p>";
                            $problem = TRUE;
                        } else {
                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                $problem = FALSE;
                            } else {
                                echo "<p style='color:red; font-size: 1.5rem;'><strong>Invalid email address format.</strong></p>";
                                $problem = TRUE;
                            }
                        }
                    }
                } else {
                    echo "<p style='color:red; font-size: 1.5rem;'><strong>The username are NOT numeric. Please enter again.</strong></p>";
                    $problem = TRUE;
                }
            } else {
                echo "<p style='color:red; font-size: 1.5rem;'><strong>Please fill in the blank.</strong></p>";
                $problem = TRUE;
            }

            if (!$problem) {
                $postfields = array(
                           "username" => $_POST['username'],
                           "email" => $_POST['email'],
                           "password" => $_POST['password'],
                           "lastName" => $_POST['lastname'],
                           "firstName" => $_POST['firstname'],
                       );
                       
                       $postfields = json_encode($postfields);
                       $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'http://localhost/WebDevelopment/HTML5Application/public_html/api/user/create.php',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS => $postfields,
                      CURLOPT_HTTPHEADER => array(
                        'Content-Type: text/plain'
                      ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
//                    echo $response;
                    
                    $myfile = fopen("file.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, print_r(json_decode($postfields), true));
                        fwrite($myfile, print_r(json_decode($response), true));
                         fwrite($myfile, print_r(curl_error($curl), true));
               
                    }
//                $query = "INSERT INTO user(username, email, password, lastName, firstName) 
//							VALUES ('$username', '$email', '$password', '$lastname', '$firstname' )";
//                if (mysqli_query($dbc, $query)) {
//                    print "The register entry had been added.";
//                    header("Location:signin.php");
//                    exit();
//                } else {
//                    print "Could not add the entry because: " . mysqli_error($dbc);
//                    print "The query was $query";
//                }
            }
        ?>
               
                <form action="signup.php" method="POST">
                    <div class="row">
                        <div class="column left">
                            <input type="text" name="firstname" placeholder="Enter your firstname" id="" class="text"><br>
                        </div>
                        <div class="column right">
                            <input type="text" name="lastname" placeholder="Enter your lastname" id="" class="text"><br>
                        </div>
                    </div>
                    <input type="text" name="username" placeholder="Enter username" id="" class="text">
                    <input type="email" name="email" placeholder="Enter email address" id="" class="email">
                    <input type="password" name="password" placeholder="Enter password" id="" class="text">
                    <input type="submit" value="Sign-up" class="btn" name="signup" value="true"><br>
                    <a href="signin.php"><input type="button" value="Sign-in here"  class="btn"/></a>
                </form>
            </div>
        </section>
        <!-- End Sign-up form section -->

        <!-- Contact us section -->
        <section class="contact" id="contact">
            <div class="content">
                <h1 class="heading">Contact Us</h1>
                <form action="signup.php" method="POST">
                    
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

            document.querySelector('#menu-btn').onclick = () => {
                navbar.classList.add('active');
            };

            document.querySelector('#nav_close').onclick = () => {
                navbar.classList.remove('active');
            };

            //send email
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </body>
</html>
