<!DOCTYPE html>
<html lang="en">


<!-- munchbox/login.html  05 Dec 2019 10:25:12 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Munchbox | Login</title>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
    <link rel="apple-touch-icon-precomposed" href="#">
    <link rel="shortcut icon" href="#">
    <!-- Bootstrap -->
    <link href="Public/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="Public/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Flaticons -->
    <link href="Public/assets/css/font/flaticon.css" rel="stylesheet">
    <!-- Swiper Slider -->
    <link href="Public/assets/css/swiper.min.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="Public/assets/css/ion.rangeSlider.min.css" rel="stylesheet">
    <!-- magnific popup -->
    <link href="Public/assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Nice Select -->
    <link href="Public/assets/css/nice-select.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="Public/assets/css/style.css" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="Public/assets/css/responsive.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <!-- place -->
</head>

<body>
    <div class="inner-wrapper">
        <div class="container-fluid no-padding">
            <div class="row no-gutters overflow-auto">
                <div class="col-md-6">
                    <div class="main-banner">
                        <img src="Public/assets/img/banner/banner-1.jpg" class="img-fluid full-width main-img" alt="banner">
                        <div class="overlay-2 main-padding">
                            <img src="Public/assets/img/logo-2.jpg" class="img-fluid" alt="logo">
                        </div>
                        <img src="Public/assets/img/banner/burger.png" class="footer-img" alt="footer-img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-2 user-page main-padding">
                        <div class="login-sec">
                            <div class="login-box">
                                <form action="?act=login&xuli=dangnhap" method="post">
                                    <h4 class="text-light-black fw-600">Sign in with your Munchbox account</h4>
                                    <div class="row">
                                        <?php if (isset($_COOKIE['msg'])) { ?>
                                            <div class="alert alert-success">
                                                <strong>Notify:</strong> <?= $_COOKIE['msg'] ?>
                                            </div>
                                        <?php } ?>
                                        <div class="col-12">
                                            <p class="text-light-black">Have a corporate username? <a href="add-restaurant.html">Click here</a>
                                            </p>
                                            <div class="form-group">
                                                <label class="text-light-white fs-14">Username </label>
                                                <input type="email" name="gmail_cus" class="form-control form-control-submit" placeholder="Email I'd" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-light-white fs-14">Password</label>
                                                <input type="password" id="password-field" name="pass_cus" class="form-control form-control-submit" value="password" placeholder="Password" required>
                                                <div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn-second btn-submit full-width">
                                                    <img src="Public/assets/img/M.png" alt="btn logo">Sign in</button>
                                            </div>
                                            <div class="form-group text-center"> <span>or</span>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn-second btn-facebook full-width">
                                                    <img src="Public/assets/img/facebook-logo.svg" alt="btn logo">Continue with Facebook</button>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn-second btn-google full-width">
                                                    <img src="Public/assets/img/google-logo.png" alt="btn logo">Continue with Google</button>
                                            </div>
                                            <div class="form-group text-center mb-0"> <a href="register.html">Create your account</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Place all Scripts Here -->
    <!-- jQuery -->
    <script src="Public/assets/js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="Public/assets/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="Public/assets/js/bootstrap.min.js"></script>
    <!-- Range Slider -->
    <script src="Public/assets/js/ion.rangeSlider.min.js"></script>
    <!-- Swiper Slider -->
    <script src="Public/assets/js/swiper.min.js"></script>
    <!-- Nice Select -->
    <script src="Public/assets/js/jquery.nice-select.min.js"></script>
    <!-- magnific popup -->
    <script src="Public/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
    <!-- sticky sidebar -->
    <script src="Public/assets/js/sticksy.js"></script>
    <!-- Munch Box Js -->
    <script src="Public/assets/js/munchbox.js"></script>
    <!-- /Place all Scripts Here -->
</body>


<!-- munchbox/login.html  05 Dec 2019 10:25:15 GMT -->

</html>