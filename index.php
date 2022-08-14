<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index/css/bootstrap.min.css">
    <link rel="stylesheet" href="index/css/style.css">

</head>
<body>  

    <!-- Header Section Starts Here -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <img src="index/img/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li class="d-sm-none text-center">
                        <a href="user/login.php" class="header-button">Login</a>
                    </li>
                    <li class="d-sm-none text-center">
                        <a href="user/register.php" class="mb-4">Register</a>
                    </li>
                </ul>
                <div class="header-bar d-lg-none mr-sm-3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="header-right">
                    <a href="user/login.php" class="header-button d-none d-sm-inline-block m-0 active">Login</a>
                    <a href="user/register.php" class="header-button d-none d-sm-inline-block m-0">Register</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section Ends Here -->


    <!-- Banner Section Starts Here -->
    <section class="banner-section">
        <div class="banner-bg bg_img" data-background="index/img/banner/banner-bg.jpg">
            <div class="banner-bg-shape"><img src="index/img/banner/banner-shape.png" alt="banner"></div>
            
        </div>
        <div class="container">
            <div class="banner-content">
                <h3 class="cate">SHORTEN URLS AND</h3>
                <h1 class="title">Earn Money</h1>
                <p>Transforming long, ugly links into Shorten URLs and earn big money. Get paid by every person who visits your URLs.</p>
            </div>
            <div class="banner-form-group">
                <h3 class="subtitle">Shorten URL Is Just Simple</h3>
                <form class="banner-form" action="./user/index.php" method="POST">
                    <?php
                            // session_start();

                            // $userId = $_SESSION["id"];
                            // $userFirst = $_SESSION["first_name"];
                            // $userLast = $_SESSION["last_name"];
                            // $userGp = $_SESSION["group"];
                            // $userEmail = $_SESSION["user_email"];
                            // $userFullName = $userFirst." ".$userLast;




                        

                            //     if(!isset($_SESSION["userIsLoggedIn"])){
                            //         // header("Location: index.php");
                                
                            // }

                            // $login_success = "";


                            // if(isset($_GET["login"])){
                            //     if($_GET["login"] == "success"){
                            //     $login_success = '<div class="alert alert-success" role="alert">
                            //                         <strong>Login successful</strong>
                            //                     </div>';
                            //     }
                            // }
                    ?>
                    <input type="text" class="form-control form-control-sm" name="long_url" placeholder="Your URL here"required>
                    <input type="hidden" class="form-control form-control-xs" name="user_id" value="<?=$userId?>">
                    <button type="submit" name="submit">Shorten <i class="flaticon-startup"></i></button>
                </form>
                <div class="banner-counter">
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter">1,200,000</span>+</h2>
                        <p>Links clicked per day</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter">348,000,000</span>+</h2>
                        <p>Shortened links in total</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter-title"><span class="counter">1,180,000</span>+</h2>
                        <p>Happy users registered</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section Ends Here -->


    <!-- Why Section Starts Here -->
    <section class="why-section padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-lg-100">
                    <div class="section-header left-style mb-lg-0 sticky-header mb-low ml-0">
                        <h2 class="title">
                            Why Join Us?
                        </h2>
                        <p>Cortaly is a completely free tool where you can create short links, which apart from being free, you get paid! So, now you can make money from home, when managing and protecting your links.</p>
                        <a href="#0" class="custom-button active mt-2">Create Your Account</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="index/img/why/01.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">JOIN OUR NETWORK</h5>
                            <p>Signup for an account in just one minute, shorten URLs and 
                                sharing your links to everywhere. And you'll be paid from any views.</p>
                        </div>
                    </div>
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="index/img/why/02.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">HIGHEST RATES</h5>
                            <p>Make the most out of your traffic with our always increasing rates. You are required to earn only $5.00 before you will be paid.</p>
                        </div>
                    </div>
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="index/img/why/03.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">PAYMENTS ON TIME</h5>
                            <p>We provide full mobile supports, you can even shorten the URL, control your account and view the stats on a mobile device.</p>
                        </div>
                    </div>
                    <div class="choose-item">
                        <div class="choose-thumb">
                            <img src="index/img/why/04.png" alt="why">
                        </div>
                        <div class="choose-content">
                            <h5 class="title">RESPONSIVE UI</h5>
                            <p>Request payments whenever you want and get your payments on 1st day and 15th day of every month. Enjoy you Spendings!!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Section Ends Here -->

    

        <!-- feature section starts here -->
        <section class="feature-section padding-top bg_img pos-rel" style="background-color:#005f73;" data-background="./index/img/feature/feature-bg.jpg">
            <div class="top-shape d-none d-md-block">
                <img src="index/css/img/top-shape.png" alt="css">
            </div>
            <div class="bottom-shape d-none d-md-block mw-0">
                <img src="index/css/img/bottom-shape.png" alt="css">
            </div>
            <div class="ball-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal" style="transform: translate(-100px, 0px); transition: transform 0.1s ease 0s; will-change: transform;">
                <img src="index/img/balls/1.png" alt="balls">
            </div>
            <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="horizontal" style="transform: translate(187px, 0px); transition: transform 0.1s ease 0s; will-change: transform;">
                <img src="index/img/balls/2.png" alt="balls">
            </div>
            <div class="ball-4" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="horizontal" style="transform: translate(82px, 0px); transition: transform 0.1s ease 0s; will-change: transform;">
                <img src="index/img/balls/3.png" alt="balls">
            </div>
            <div class="ball-5" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="vertical" style="transform: translate(0px, 76px); transition: transform 0.1s ease 0s; will-change: transform;">
                <img src="index/img/balls/4.png" alt="balls">
            </div>
            <div class="ball-6" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal" style="transform: translate(-175px, 0px); transition: transform 0.1s ease 0s; will-change: transform;">
                <img src="index/img/balls/5.png" alt="balls">
            </div>
            <div class="ball-7" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="vertical" style="transform: translate(0px, -204px); transition: transform 0.1s ease 0s; will-change: transform;">
                <img src="index/img/balls/6.png" alt="balls">
            </div>
            <div class="container">
                <div class="section-header cl-white">
                    <h2 class="title mt-md-0">All Features</h2>
                    <p>
                        Mosto has plans, from free to paid, that scale with your needs. Subscribe to a plan that fits the size of your business.
                    </p>
                </div>
                <div class="tab">
                    <ul class="tab-menu feature-tab">
                        <li>
                            <div class="thumb">
                                <img src="index/img/feature/01.png" alt="feature">
                            </div>
                            <div class="content">%99 Uptime</div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="index/img/feature/02.png" alt="feature">
                            </div>
                            <div class="content">Easy Dashboard</div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="index/img/feature/03.png" alt="feature">
                            </div>
                            <div class="content"> Referral Program</div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="index/img/feature/04.png" alt="feature">
                            </div>
                            <div class="content">1CLICK Script Installs</div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="index/img/feature/05.png" alt="feature">
                            </div>
                            <div class="content">Support</div>
                        </li>
                    </ul>
                    <div class="tab-area">
                        <div class="tab-item active">
                            <div class="feature-item">
                                <h3 class="title"> %99 Uptime</h3>
                                <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                                month. We feel a safety net of .1% each month allows us time for repairs and 
                                unforeseen events that may arise. Furthermore, you can view our network status
                                    24 hours a day 365 days a year.</p>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="feature-item">
                                <h3 class="title">Easy Dashboard</h3>
                                <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                                month. We feel a safety net of .1% each month allows us time for repairs and 
                                unforeseen events that may arise. Furthermore, you can view our network status
                                    24 hours a day 365 days a year.</p>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="feature-item">
                                <h3 class="title">Referral Program</h3>
                                <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                                month. We feel a safety net of .1% each month allows us time for repairs and 
                                unforeseen events that may arise. Furthermore, you can view our network status
                                    24 hours a day 365 days a year.</p>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="feature-item">
                                <h3 class="title">1CLICK Script Installs</h3>
                                <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                                month. We feel a safety net of .1% each month allows us time for repairs and 
                                unforeseen events that may arise. Furthermore, you can view our network status
                                    24 hours a day 365 days a year.</p>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="feature-item">
                                <h3 class="title">Support</h3>
                                <p>We guarantee that our network will be up and functioning 99.9% of the time per 
                                month. We feel a safety net of .1% each month allows us time for repairs and 
                                unforeseen events that may arise. Furthermore, you can view our network status
                                    24 hours a day 365 days a year.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF FEATURE SECTION -->

        <!-- How Section Starts Here -->
    <section class="how-section padding-top padding-bottom pt-md-half pb-max-lg-0">
        <div class="container">
            <div class="section-header mb-low">
                <h2 class="title mb-0">How to start</h2>
            </div>
            <div class="row justify-content-center mb--40">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src="index/img/how/how1.png" alt="how">
                        </div>
                        <div class="how-content">
                            <h6 class="title">CREATE AN ACCOUNT</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src="index/img/how/how2.png" alt="how">
                        </div>
                        <div class="how-content">
                            <h6 class="title">SHORTEN YOUR LINK</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src="index/img/how/how3.png" alt="how">
                        </div>
                        <div class="how-content">
                            <h6 class="title">Earn Money</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How Section Ends Here -->


    <!-- Testimonial Section Starts Here -->
    <section class="testimonial-section padding-top padding-bottom pos-rel oh">
        <div class="ball-3 style2 d-none d-lg-block" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="index/img/client/circle2.png" alt="client">
        </div>
        <div class="ball-6 style2 d-none d-lg-block" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="index/img/client/circle1.png" alt="client">
        </div>
        <div class="container">
            <div class="row justify-content-between flex-wrap-reverse align-items-center">
                <div class="col-lg-7">
                    <div class="testimonial-wrapper style-two">
                        <div class="testimonial-area testimonial-slider owl-carousel owl-theme">
                            <div class="testimonial-item">
                                <div class="testimonial-thumb">
                                    <div class="thumb">
                                        <img src="index/img/client/client1.jpg" alt="client">
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <div class="ratings">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur scing elit. Aliquam in nulla rhoncus, dapibus orci nec, venenatis eros.
                                    </p>
                                    <h5 class="title"><a href="#0">Bela Bose</a></h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5">
                    <div class="testi-wrapper">
                        <div class="testi-header">
                            <div class="section-header left-style mb-lg-0">
                                <h5 class="cate">Testimonials</h5>
                                <h2 class="title">5000+ happy clients all around the world</h2>
                                <a href="#0" class="button-3 active mt-md-2">Leave a review <i class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section Ends Here -->

     <!-- Call In Action Section Starts Here -->
    <section class="call-in-action padding-top padding-bottom section-bg text-center">
        <div class="container">
            <div class="section-header mb-low">
                <h5 class="cate">JOIN US NOW</h5>
                <h2 class="title">Boost Your Earnings</h2>
                <p>Sign up for free and become one of the millions of people around the world
                    who have fallen in love with Cortaly</p>
            </div>
            <a href="#0" class="custom-button">Start earning now!</a>
        </div>
    </section>
    <!-- Call In Action Section Ends Here -->


    <!-- Footer Section Starts Here -->
    <footer class="footer-section padding-top">
        <div class="footer-bg bg_img" data-background="index/img/footer/footer-bg.jpg"></div>
        <div class="footer-bg d-md-block d-none"><img src="index/img/footer/wave.png" alt="footer"></div>
        <div class="container" >
            <div class="section-header cl-white-499">
                <h5 class="cate">Contact Us</h5>
                <h2 class="title">Get in touch!</h2>
                <p>We thrive to ensure that you get the most out of your experience</p>
            </div>
            <form class="contact-form" id="contact_form_submit">
                <div class="form-group">
                    <label for="name">Your Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Full Name">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <div class="form-group check-group">
                    <input type="checkbox" id="check" required>
                    <label for="check">I agree to receive emails, newsletters and promotional messages</label>
                </div>
                <div class="form-group text-center">
                    <button type="submit">Send Message</button>
                </div>
            </form>
            <div class="footer-top" >
                <div class="logo">
                    <a href="index.html">
                        <img src="index/img/logo/footer-logo.png" alt="logo">
                    </a>
                </div>
                <ul class="links">
                    <li>
                        <a href="#0"><img src="index/img/footer/neteller.png" alt="footer"></a>
                    </li>
                    <li>
                        <a href="#0"><img src="index/img/footer/skrill.png" alt="footer"></a>
                    </li>
                    <li>
                        <a href="#0"><img src="index/img/footer/paypal.png" alt="footer"></a>
                    </li>
                </ul>
            </div>
            <div class="footer-bottom" style="background-color: rgb(92, 25, 192);">
                <div class="footer-bottom-area">
                    <div class="left cl-white">
                        <p>&copy; Copyright 2022 | <a href="#0">Cortaly</a> By UIAXIS</p>
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="#0" class="active">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section Ends Here -->
    <script src="index/js/bootstrap.min.js"></script>
    <script src="index/js/jquery-3.3.1.min.js"></script>

</body>
</html>