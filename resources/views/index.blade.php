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
    <title>My Class | Home</title>
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

        @include('layout.home.header',['logo'=>'logo.png','headerType'=>''])

        <section class="parallax event-section" data-stellar-background-ratio="0.5" style="background-image:url('upload/parallax_01.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message event-title text-center">
                            <h3>My Class Institute - Galle</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="row event-boxes">
                    <div class="col-md-4">
                        <div class="box m30">
                            <img src="upload/blog_01.jpg" alt="" class="img-responsive">
                            <div class="event-desc">
                            <small>Modern</small>
                            <h4>Online classes</h4>
                            <p>Ut volutpat elementum venenatis. In id neque nec tellus iaculis semper. Aenean fringilla velit ut leo luctus, blandit aliquet turpis dictum.</p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="box m30">
                            <img src="upload/blog_02.jpeg" alt="" class="img-responsive">
                            <div class="event-desc">
                            <small>Day 2</small>
                            <h4>Qualified teachers</h4>
                            <p>Morbi nec ornare ipsum. Curabitur tortor sapien, faucibus commodo metus porta, venenatis lobortis nibh. Proin molestie est et nunc aliquam iaculis.</p>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="box m30">
                            <img src="upload/blog_02.jpg" alt="" class="img-responsive">
                            <div class="event-desc">
                            <small>Day 3</small>
                            <h4>Modern class rooms</h4>
                            <p> Mauris cursus, ipsum eget mollis pretium, nisl felis rhoncus nulla, sed dignissim ligula lorem ac enim. Pellentesque quis libero feugiat, lacinia.</p>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <section class="section">
            <div class="container">
                <div class="section-title text-center">
                    <h3>Meet Our Teachers</h3>
                    <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
                </div><!-- end title -->

                <div class="row text-center">
                    <div class="col-md-4 col-sm-6">
                        <div class="teammembers">
                            <div class="entry">
                                <img src="upload/01_team.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="visible-buttons1 teambuttons">
                                        <p>We’re committed to work and play our client meeting room transforms  into a table tennis</p>
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </div><!-- end social -->
                                    </div>
                                </div>
                            </div><!-- end box -->
                            <div class="teamdesc">
                                <h4>Ruben Franklin</h4>
                                <p>ENGLISH / LITERATURE</p>
                            </div><!-- end teamdesc -->
                        </div><!-- end teammembers -->
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6">
                        <div class="teammembers">
                            <div class="entry">
                                <img src="upload/02_team.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="visible-buttons1 teambuttons">
                                        <p>We’re committed to work and play our client meeting room transforms  into a table tennis</p>
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </div><!-- end social -->
                                    </div>
                                </div>
                            </div><!-- end box -->
                            <div class="teamdesc">
                                <h4>Martin Juhnson</h4>
                                <p>BIOLOGY</p>
                            </div><!-- end teamdesc -->
                        </div><!-- end teammembers -->
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6">
                        <div class="teammembers">
                            <div class="entry">
                                <img src="upload/03_team.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="visible-buttons1 teambuttons">
                                        <p>We’re committed to work and play our client meeting room transforms  into a table tennis</p>
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </div><!-- end social -->
                                    </div>
                                </div>
                            </div><!-- end box -->
                            <div class="teamdesc">
                                <h4>Bob Dylean</h4>
                                <p>FRENCH</p>
                            </div><!-- end teamdesc -->
                        </div><!-- end teammembers -->
                    </div><!-- end col -->

                    

                </div><!-- end row -->

                <div class="row text-center" style="padding-top: 30px;">

                    <div class="col-md-4 col-sm-6">
                        <div class="teammembers">
                            <div class="entry">
                                <img src="upload/04_team.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="visible-buttons1 teambuttons">
                                        <p>We’re committed to work and play our client meeting room transforms  into a table tennis</p>
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </div><!-- end social -->
                                    </div>
                                </div>
                            </div><!-- end box -->
                            <div class="teamdesc">
                                <h4>Bob Dylean</h4>
                                <p>FRENCH</p>
                            </div><!-- end teamdesc -->
                        </div><!-- end teammembers -->
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6">
                        <div class="teammembers">
                            <div class="entry">
                                <img src="upload/05_team.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="visible-buttons1 teambuttons">
                                        <p>We’re committed to work and play our client meeting room transforms  into a table tennis</p>
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </div><!-- end social -->
                                    </div>
                                </div>
                            </div><!-- end box -->
                            <div class="teamdesc">
                                <h4>Ruben Franklin</h4>
                                <p>ENGLISH / LITERATURE</p>
                            </div><!-- end teamdesc -->
                        </div><!-- end teammembers -->
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-6">
                        <div class="teammembers">
                            <div class="entry">
                                <img src="upload/06_team.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="visible-buttons1 teambuttons">
                                        <p>We’re committed to work and play our client meeting room transforms  into a table tennis</p>
                                        <div class="social-links">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-skype"></i></a>
                                        </div><!-- end social -->
                                    </div>
                                </div>
                            </div><!-- end box -->
                            <div class="teamdesc">
                                <h4>Martin Juhnson</h4>
                                <p>BIOLOGY</p>
                            </div><!-- end teamdesc -->
                        </div><!-- end teammembers -->
                    </div><!-- end col -->
                </div>
            </div><!-- end container -->
        </section>


        <section class="section bgcolor1">
            <div class="container">
                <a href="#">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h3>2024 </h3>
                        <h4>Start your awesome course today!</h4>
                    </div><!-- end col -->

                    <div class="col-md-8">
                        <p class="lead">Limited time offer! Your profile will be added to our "Students" directory as well. Get the highest marks for A/L and O/L join with the rythem </p>
                    </div>
                </div><!-- end row -->
                </a>
            </div><!-- end container -->  
        </section>

        @include('layout.home.footer')

        
    </div><!-- end wrapper -->

    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="{{URL::asset('home_assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/carousel.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/animate.js')}}"></script>
    <script src="{{URL::asset('home_assets/js/custom.js')}}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{URL::asset('home_assets/js/videobg.js')}}"></script>

</body>
</html>