<!DOCTYPE html>
<?php
    $realm = 'Restricted area';

    //user => password
    $users = array('guest' => 'guest');


    if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Digest realm="'.$realm.
               '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

        die('Back to main page');
    }


    // analyze the PHP_AUTH_DIGEST variable
    if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
        !isset($users[$data['username']]))
        die('Wrong Credentials!');


    // generate the valid response
    $A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
    $A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
    $valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

    if ($data['response'] != $valid_response)
        die('Wrong Credentials!');

    // ok, valid username & password
    echo 'You are logged in as: ' . $data['username'];


    // function to parse the http auth header
    function http_digest_parse($txt)
    {
        // protect against missing data
        $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
        $data = array();
        $keys = implode('|', array_keys($needed_parts));

        preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

        foreach ($matches as $m) {
            $data[$m[1]] = $m[3] ? $m[3] : $m[4];
            unset($needed_parts[$m[1]]);
        }

        return $needed_parts ? false : $data;
    }
?>

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
            
            <a href="index1.html" class="logo"><img src="images/favicon.png" alt="">&nbsp;SOWOOZOO</a>

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
        
        
        <!-- Booking form section -->
        
        <section class="booking" id="booking">
            <div class="content">
                <h1 class="head1">SOWOOZOO Helicopter Experience Booking</h1>
                
                <?php 
                    if(isset($_POST['booking'])){
                       
                       $postfields = array(
                           "email" => $_POST['email'],
                           "name" => $_POST['name'],
                           "package" => $_POST['package'],
                           "phone" => $_POST['phone'],
                           "date" => $_POST['date'],
                           "time" => $_POST['time'],
                           "participants" => $_POST['participants'],
                       );
                       
                       $postfields = json_encode($postfields);
                       $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'http://localhost/WebDevelopment/HTML5Application/public_html/api/booking/create.php',
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
//                  
                        echo'<input type="submit" name="payment" value="Please go to Payment" class="btn" onClick="myFunction()"/>';
                        echo'<script>
                            function myFunction() {
                                window.location.href="payment.php";
                            }
                        </script>';
                    }

                ?>
                
                <form action="bookingform.php" method="POST">
               
                    <label>Name</label><br><input type="text" name="name" placeholder="Enter your name" id="" required class="text"><br>
                    <label>Email address</label><br><input type="email" name="email" placeholder="Enter your email address" id="" required class="text"><br>
                    
                    <div class="row">
                        <div class="column left">
                            <label>Participants (1 to 25)</label><br>
                            <input type="number" id="" name="participants" required placeholder="0" min="1" max="25" class="number" ><br>
                        </div>
                        <div class="column right">
                            <label>Phone number</label><br>
                            <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number" class="text" ><br>
                        </div>
                    </div>
                    
                <label>Select your plan</label><br>
                    <select name="package" required="">
                        <option value="" selected disabled></div>
                        <option value="grandCanyon">Grand Canyon Tour</div>
                        <option value="cityExplorer">City Explorer Private Tour</div>
                        <option value="jungleEscape">Jungle Escape Private Tour</div>
                        <option value="klExpress">KL Express Tour</div>
                        <option value="wondersKl">Wonders of KL Tour</div>
                        <option value="weddingTour">Wedding Tour - Magical KL Private Tour</div>
                    </select>
                    
                    
                    <label>Select a tour date</label><br>
                    <input type="date" name="date" id="demo" class="date" required>
                    
                    <label>Select a tour time (operating hours 10:00 to 17:00)</label><br>
                    <select name="time" required="">
                        <option value="" selected disabled></div>
                        <option value="1030">10:30</div>
                        <option value="1100">11:00</div>
                        <option value="1200">12:00</div>
                        <option value="1500">15:00</div>
                        <option value="1600">16:00</div>
                        <option value="1630">16:30</div>
                        <option value="1700">17:00</div>
                    </select>
                    
                    <input type="submit"  name="booking" value="Book now" class="btn">

                    
                </form>
            </div>
        </section>
        <!-- End contact form section -->
        
        <!-- Contact us section -->
        <section class="contact" id="contact">
            <div class="content">
                <h1 class="heading">Contact Us</h1>
                <form action="bookingform.php" method="POST">
                    
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
                    <input type="submit" value="Send message" name="submit" class="btn">
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
    
    <script>
        //menu-bar
        let navbar = document.querySelector('.header .navbar');

        document.querySelector('#menu-btn').onclick = () =>{
            navbar.classList.add('active');
        };

        document.querySelector('#nav_close').onclick = () =>{
            navbar.classList.remove('active');
        };
        
        //date picker
        var todayDate = new Date();
        var month = todayDate.getMonth() -0; 
        var year = todayDate.getUTCFullYear(); 
        var tdate = todayDate.getDate(); 
        if(month < 10){
          month = "0" + month 
        }
        if(tdate < 10){
          tdate = "0" + tdate;
        }
        var maxDate = year + "-" + month + "-" + tdate;
        document.getElementById("demo").setAttribute("min", maxDate);
        console.log(maxDate);
    
        //send email
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
    </script>
    
    </body>
</html>