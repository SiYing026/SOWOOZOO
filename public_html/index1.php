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
            
            <a href="#home" class="logo"><img src="images/favicon.png" alt="">&nbsp;SOWOOZOO</a>

            <nav class="navbar">
                <div id="nav_close" class="fa fa-times" ></div>
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#gallery">Gallery</a>
                <a href="#packages">Packages</a>
                <a href="#clients">Review</a>
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


        <!-- home section starts  -->

        <section class="home" id="home">

            <div class="swiper home-slider">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="box" style="background: url(images/bg_1.jpg) no-repeat;">
                            <div class="content">
                                <span>Your World of</span>
                                <h3>Exploring</h3>
                                <p>From local escapes to far-flung adventures, find what makes you happy anytime, anywhere</p>
                                <a href="#about" class="btn">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="box second" style="background: url(images/bg_2.jpg) no-repeat;">
                            <div class="content">
                                <span>Your World of</span>
                                <h3>Exploring</h3>
                                <p>From local escapes to far-flung adventures, find what makes you happy anytime, anywhere</p>
                                <a href="#about" class="btn">Get Started</a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="box" style="background: url(images/bg_4.jpg) no-repeat;">
                            <div class="content">
                                <span>Your World of</span>
                                <h3>Exploring</h3>
                                <p>From local escapes to far-flung adventures, find what makes you happy anytime, anywhere</p>
                                <a href="#about" class="btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        
        <script>
        //home swiper
	const swiper = new Swiper('.home-slider', {
	loop: true,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true,
	},
	keyboard: true,
	mousewheel: true,

        })
	</script>

    <!-- End home section-->

     <!--category section starts-->

    <section class="category">

        <h1 class="heading">adventure idea</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/category_1.jpg" alt="">
                <h3>Flying Experiences</h3>
                <p>Learn how to take the controls of a helicopter with a flying lesson under 
                    the guidance of experts or simply enjoy a sightseeing helicopter ride with a loved one.</p>
                <a href="bookingform.php" class="btn">Booking now</a>
            </div>

            <div class="box">
                <img src="images/category_2.jpg" alt="">
                <h3>Skydiving</h3>
                    <p>Our classic jump and all-time favorite, as this is the only one that allows you to skydive over Malaysia!</p>
                <a href="bookingform.php" class="btn">Booking now</a>
            </div>

            <div class="box">
                <img src="images/category_3.jpg" alt="">
                <h3>Paragliding</h3>
                    <p>Even in the height of summer, you can be dropped onto a summit by 
                        helicopter, and then experience the flight of your life as you 
                        paraglide over famous places.</p>
                <a href="bookingform.php" class="btn">Booking now</a>
            </div>

            <div class="box">
                <img src="images/category_4.jpg" alt="">
                <h3>Bungee Jump</h3>
                    <p>Bungee jumping probably isn't everyone's cup of tea, but at 
                        least he/she won't forget his big day in a hurry.</p>
                <a href="bookingform.php" class="btn">Booking now</a>
            </div>

        </div>

    </section>

    <!-- category section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <div class="image">
            <?php
                if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                    $sql="SELECT image FROM about WHERE id=1";
                    $result = mysqli_query($dbc,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<img src=\"{$row['image']} \" alt='' />";
                    }
                }
            ?>
        </div>

        <div class="content">
            <?php
                if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                    $sql="SELECT title, content FROM about WHERE id=1";
                    $result = mysqli_query($dbc,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<h3>{$row['title']}</h3>";
                        echo "<p>{$row['content']}</p>";
                    }
                }
            ?>
        </div>
        
        <div class="content">
            <?php
                if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                    $sql="SELECT title, content FROM about WHERE id=2";
                    $result = mysqli_query($dbc,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<h3>{$row['title']}</h3>";
                        echo "<p>{$row['content']}</p>";
                    }
                }
            ?>
        </div>
        
        
        <div class="image">
            <?php
                if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                    $sql="SELECT image FROM about WHERE id=2";
                    $result = mysqli_query($dbc,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<img src=\"{$row['image']} \" alt='' />";
                    }
                }
            ?>
        </div>

    </section>

    <!-- about section ends -->

   

<!-- packages section starts  -->
    <section class="packages" id="packages">

        <h1 class="heading">popular packages</h1>

        <div class="box-container" >

            <div class="box" >
                <div class="image">
                    <?php
			if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT image FROM packages WHERE id=1";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                            }
			}
                    ?>
                </div>
                <div class="content">
                    
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT name, description, price FROM packages WHERE id=1";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<h3>{$row['name']}</h3>";
                                    echo "<p>{$row['description']}</p>";
                                    echo '<div class="price">';
                                    echo "{$row['price']} ";
                                    echo '<i class="fa fa-tag"></i></div>';
                            }
                        }
                    ?>
                    
                    <a href="grandCanyonTour.php" class="btn" >Explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <?php
			if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT image FROM packages WHERE id=2;";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                            }
			}
                    ?>
                </div>
                <div class="content">
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT name, description, price FROM packages WHERE id=2";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<h3>{$row['name']}</h3>";
                                    echo "<p>{$row['description']}</p>";
                                    echo '<div class="price">';
                                    echo "{$row['price']} ";
                                    echo '<i class="fa fa-tag"></i></div>';

                            }
                        }
                    ?>
                    <a href="cityExplorerTour.php" class="btn">Explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <?php
			if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT image FROM packages WHERE id=3;";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                            }
			}
                    ?>
                </div>
                <div class="content">
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT name, description, price FROM packages WHERE id=3";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<h3>{$row['name']}</h3>";
                                    echo "<p>{$row['description']}</p>";
                                    echo '<div class="price">';
                                    echo "{$row['price']} ";
                                    echo '<i class="fa fa-tag"></i></div>';

                            }
                        }
                    ?>
                    <a href="jungleEscapeTour.php" class="btn">Explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <?php
			if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT image FROM packages WHERE id=4";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                            }
			}
                    ?>
                </div>
                <div class="content">
                   <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT name, description, price FROM packages WHERE id=4";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<h3>{$row['name']}</h3>";
                                    echo "<p>{$row['description']}</p>";
                                    echo '<div class="price">';
                                    echo "{$row['price']} ";
                                    echo '<i class="fa fa-tag"></i></div>';
                            }
                        }
                    ?>
                        <a href="klExpressTour.php" class="btn">Explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <?php
			if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT image FROM packages WHERE id=5";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                            }
			}
                    ?>
                </div>
                <div class="content">
                    <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT name, description, price FROM packages WHERE id=5";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<h3>{$row['name']}</h3>";
                                    echo "<p>{$row['description']}</p>";
                                    echo '<div class="price">';
                                    echo "{$row['price']} ";
                                    echo '<i class="fa fa-tag"></i></div>';

                            }
                        }
                    ?>
                        <a href="wondersKlTour.php" class="btn">Explore now</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <?php
			if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT image FROM packages WHERE id=6";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<img src=\"{$row['image']} \" alt='' />";
                            }
			}
                    ?>
                </div>
                <div class="content">
                     <?php
                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                            $sql="SELECT name, description, price FROM packages WHERE id=6";
                            $result = mysqli_query($dbc,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    echo "<h3>{$row['name']}</h3>";
                                    echo "<p>{$row['description']}</p>";
                                    echo '<div class="price">';
                                    echo "{$row['price']} ";
                                    echo '<i class="fa fa-tag"></i></div>';

                            }
                        }
                    ?>
                        <a href="weddingTour.php" class="btn">Explore now</a>
                </div>
            </div>

        </div>

    </section>

<!-- packages section ends -->

<!-- testimonial section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css"/>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
<section class="clients" id="clients">
    <div class="container">
        <div class="section-title">
            <h1 class="heading">client's reviews</h1>
        </div>
    </div>
    
    <div class="testimonials-carousel-wrap">
        <div class="testimonials-carousel">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar">
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT image FROM reviews WHERE id=1";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<img src=\"{$row['image']} \" alt='' />";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o "></i>
                                </div>
                                
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT comments FROM reviews WHERE id=1";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<p>{$row['comments']}</p>";

                                        }
                                    }
                                ?>
                                
                                <div class="testimonials-avatar">
                                    <?php
                                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                            $sql="SELECT name, position FROM reviews WHERE id=1";
                                            $result = mysqli_query($dbc,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<h3>{$row['name']}</h3>";
                                                echo "<span>{$row['position']}</span>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
               
                    <!--second--->
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar">
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT image FROM reviews WHERE id=2";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<img src=\"{$row['image']} \" alt='' />";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT comments FROM reviews WHERE id=2";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<p>{$row['comments']}</p>";

                                        }
                                    }
                                ?>
                               <div class="testimonials-avatar">
                                    <?php
                                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                            $sql="SELECT name, position FROM reviews WHERE id=2";
                                            $result = mysqli_query($dbc,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<h3>{$row['name']}</h3>";
                                                echo "<span>{$row['position']}</span>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--third-->
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar">
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT image FROM reviews WHERE id=3";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<img src=\"{$row['image']} \" alt='' />";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT comments FROM reviews WHERE id=3";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<p>{$row['comments']}</p>";

                                        }
                                    }
                                ?>
                                <div class="testimonials-avatar">
                                    <?php
                                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                            $sql="SELECT name, position FROM reviews WHERE id=3";
                                            $result = mysqli_query($dbc,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<h3>{$row['name']}</h3>";
                                                echo "<span>{$row['position']}</span>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--forth-->
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar">
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT image FROM reviews WHERE id=4";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<img src=\"{$row['image']} \" alt='' />";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT comments FROM reviews WHERE id=4";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<p>{$row['comments']}</p>";

                                        }
                                    }
                                ?>
                                <div class="testimonials-avatar">
                                    <?php
                                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                            $sql="SELECT name, position FROM reviews WHERE id=4";
                                            $result = mysqli_query($dbc,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<h3>{$row['name']}</h3>";
                                                echo "<span>{$row['position']}</span>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--fifth-->
                    <div class="swiper-slide">
                        <div class="testi-item">
                            <div class="testi-avatar">
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT image FROM reviews WHERE id=5";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<img src=\"{$row['image']} \" alt='' />";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="testimonials-text">
                                <div class="listing-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <?php
                                    if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                        $sql="SELECT comments FROM reviews WHERE id=5";
                                        $result = mysqli_query($dbc,$sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                                echo "<p>{$row['comments']}</p>";
                                        }
                                    }
                                ?>
                                <div class="testimonials-avatar">
                                    <?php
                                        if ($dbc = mysqli_connect('localhost','root','','sowoozoo')){
                                            $sql="SELECT name, position FROM reviews WHERE id=5";
                                            $result = mysqli_query($dbc,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<h3>{$row['name']}</h3>";
                                                echo "<span>{$row['position']}</span>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--testi end-->

                </div>
            </div>
        </div>

    </div>
</section>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
  <script>
	//   all ------------------
    function initParadoxWay() {
        "use strict";

        if ($(".testimonials-carousel").length > 0) {
            var j2 = new Swiper(".testimonials-carousel .swiper-container", {
                preloadImages: false,
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                grabCursor: true,
                mousewheel: false,
                centeredSlides: true,
                pagination: {
                    el: '.tc-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.listing-carousel-button-next',
                    prevEl: '.listing-carousel-button-prev',
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3,
                    },

                }
            });
        }

    // bubbles -----------------
    
    
    setInterval(function () {
        var size = randomValue(sArray);
        $('.bubbles').append('<div class="individual-bubble" style="left: ' + randomValue(bArray) + 'px; width: ' + size + 'px; height:' + size + 'px;"></div>');
        $('.individual-bubble').animate({
            'bottom': '100%',
            'opacity': '-=0.7'
        }, 4000, function () {
            $(this).remove()
        });
    }, 350);
    
}

    //   Init All ------------------
    $(document).ready(function () {
        initParadoxWay();
    });
  </script>
  <!-- testimonial section ends -->
    
    
<!--     contact section  -->

    <section class="contact">

        <div class="content">
            <h1 class="heading">Contact Us</h1>
            
            <form action="index1.php#contact" method="POST">
			
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



<!--     footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#gallery">Gallery</a>
                <a href="#packages">Packages</a>
                <a href="#clients">Review</a>
                <a href="#contact">Contact</a>
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
                <a href="tel:123-5689-2568"><i class="fa fa-phone fa-lg"></i>+123 5689 2568</a>
                <a href="mailto:enquire@sowoozoo.com"><i class="fa fa-envelope fa-lg"></i>enquire@sowoozoo.com</a>
                <a href="contactus.html#map"><i class="fas fa-map-marked-alt fa-lg"></i>804, Jalan Kuantan, Titiwangsa, 
                    53200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f fa-lg"></i>Facebook</a>
                <a href="https://twitter.com/login"><i class="fab fa-twitter fa-lg"></i>Twitter</a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg"></i>Instagram</a>
                <a href="https://line.worksmobile.com/jp/en/blog/line-account-login/"><i class="fab fa-line fa-lg"></i>Line</a>
            </div>

        </div>

    </section>

<!--     footer section ends -->
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        
    <script>
    //client review
        var swiper = new Swiper(".review-slider", {
        loop:true, 
        grabCursor:true,
        spaceBetween: 20,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
              slidesPerView: 1,
            },
            640: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
            },
        },
    });
        
        //send email
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
    </script>


    </body>
</html>
