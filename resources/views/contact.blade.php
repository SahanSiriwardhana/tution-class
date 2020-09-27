<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>My Class | Contact</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
    
    <!-- Custom & Default Styles -->
	<link rel="stylesheet" href="{{URL::asset('home_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home_assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home_assets/css/carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home_assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home_assets/style.css')}}">

    <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>
<body>  

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="What you are looking for?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->
        @include('layout.home.header',['logo'=>'logo-dark.png','headerType'=>'header-normal'])
        

        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <h3>Get In Touch</h3>
                            <ul class="breadcrumb">
                                <li><a href="javascript:void(0)">Edulogy</a></li>
                                <li class="active">Get in touch</li>
                            </ul>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">

                    <div id="map" class="wow slideInUp"></div>

                    <div class="row contactv2 text-center">
                        <div class="col-md-4">
                            <div class="small-box">
                                <i class="flaticon-email wow fadeIn"></i>
                                <h4>Contact us today</h4>
                                <small>Phone: +90 987 665 55 44</small>
                                <small>Fax:  +90 987 665 55 45</small>
                                <p><a href="mail:to">info@yoursite.com</a></p>
                            </div><!-- end small-box -->
                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="small-box">
                                <i class="flaticon-map-with-position-marker wow fadeIn"></i>
                                <h4>Visit Our Office</h4>
                                <small>PO Box 16122 Collins Street West</small>
                                <small>Victoria 8007 Australia</small>
                                <p><a href="#">View on Google Map</a></p>
                            </div><!-- end small-box -->
                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="small-box">
                                <i class="flaticon-share wow fadeIn"></i>
                                <h4>Be Social</h4>
                                <small>Twitter: @yourhandle</small>
                                <small>Facebook: facebook.com/yourhandle</small>
                                <p><a href="#">Email Newsletter</a></p>
                            </div><!-- end small-box -->
                        </div><!-- end col -->
                    </div><!-- end contactv2 -->

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="section-title text-center">
                                <h3>Contact Form</h3>
                                <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis.</p>
                            </div><!-- end title -->
                            
                            <form class="big-contact-form" role="search">
                                <input type="text" class="form-control" placeholder="Enter your name..">
                                <input type="email" class="form-control" placeholder="Enter email..">
                                <input type="text" class="form-control" placeholder="Your phone..">
                                <input type="text" class="form-control" placeholder="Subject..">
                                <textarea class="form-control" placeholder="Message goes here.."></textarea>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div>
        </section>

        @include('layout.home.footer')

       
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="{{URL::asset('home_assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/carousel.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/animate.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/custom.js')}}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAkADq7R0xf6ami9YirAM1N-yl7hdnYBhM "></script>
    <!-- MAP & CONTACT -->
    <script src="{{URL::asset('home_assets/js/map.js')}}"></script>

</body>
</html>