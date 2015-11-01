<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bluence aims to bridge the gap between brands and online content creators. Launching late 2015.">

    <title>Bluence</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="http://bluence.com/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Bluence</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="/about">About</a></li> -->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/login">Member Login</a></li>
                        <!-- <li><a href="/register">Register</a></li> -->
                @else <!-- signed in: -->
                    <li><a href="/dashboard">Member Dashboard</a></li>
                </ul>
                @endif
            </div>



        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <div class="intro-message">
                        <h2>Bridging the gap between brands and content creators worldwide.</h2>

                        <hr class="intro-divider">
                        <h4>Get the exclusive first look when we launch!</h4>
                          <!-- Begin MailChimp Signup Form  -->
                            <div id="mc_embed_signup">
                            <form action="//bluence.us10.list-manage.com/subscribe/post?u=000c6d8af1cea455d6791485b&amp;id=17a8236d1b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate align="center">
                                <div id="mc_embed_signup_scroll" style="color:white">
                                <!-- <h4>Get the exclusive first look when we launch!</h4> -->
                            <div class="mc-field-group">
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" style="color: black;" placeholder="john@example.com">
                            </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>   
                                <div style="position: absolute; left: -5000px;"><input type="text" name="b_000c6d8af1cea455d6791485b_17a8236d1b" tabindex="-1" value=""></div>
                                <div class="clear"><input type="submit" value="Get Exclusive Access" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                </div>
                            </form>
                            </div>
                              <!--End mc_embed_signup-->
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="intro-img">
                        <img src="http://bluence.com/img/bluence_mac.png"  height="90%" width="90%">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

     <div class="container ptb">
      <div class="row">
        <h1 class="centered mb">Expand Your Brand Reach</h1>
        <div class="col-md-6">
          <p>There has never been a more important time expand your brands online presence. 300 hours of video are uploaded to YouTube every minute, over 1.5 billion loops a day on Vine, 2.5 billion Instagram likes daily - how is your brand tapping into the content creator explosion?</p>
        </div><!--/col-md-6-->
        <div class="col-md-6">
          <p>Bluence is a free to join platform designed to bridge the gap between brands and content creators. Our platform allows brands to connect with creators around the world and open the discussion of brand integration & sponsored content. You can target various demographics across multiple social networks within minutes.</p>
        </div><!--/col-md-6-->
      </div><!--/row-->
    </div><!-- /.container -->
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <img src="http://bluence.com/img/bluence_main_img.png" class="img-responsive" alt="">
        </div>
      </div><!--/row-->
    </div><!--/.container-->

    <!-- SOCIAL STATS -->
    <section id="join2">
        <div class="container join2">
          <div class="row">
            <h2 class="centered mb">Is your brand tapping into the content creator explosion?</h2>
            <div class="col-md-3" align="center">
                <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
                 <li><i class="fa fa-youtube"></i></li> 
                </ul>
                    <!-- <h1><i class="fa fa-youtube fa-2x"></i> YouTube</h1> -->
                <h3>432,000 hours of video uploaded</h3>
            </div>
            <div class="col-md-3" align="center">
                <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
                 <li> <i class="fa fa-vine"></i></li> 
                </ul>
                    <!-- <h1>Vine</h1> -->
                    <h3>1.5 billion loops</h3>
            </div>
            <div class="col-md-3" align="center">
                <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
                 <li> <i class="fa fa-instagram"></i></li> 
                </ul>
                   <!-- <h1>Instagram</h1>-->
                    <h3>2.5 billion likes</h3>
            </div>
            <div class="col-md-3" align="center">
                <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline">
                 <li><i class="fa fa-twitter"></i></li> 
                </ul>
                   <!--  <h1>Twitter</h1>-->
                    <h3>500 million Tweets</h3>
            </div>


        </div>
        <h4 class="centered mb">Numbers represent the <b>daily activity</b> on each social network</h4>
        </div><!-- /.container -->
    </section>
    <!-- //SOCIAL STATS -->

    <!-- HOW IT WORKS -->

    <div class="container ptb">
      <div class="row">
        <h1 class="centered mb">How it Works</h1>

            <div class="col-sm-3 col-md-3">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fa fa-pencil-square-o fa-3x"></i>
                    </div>

                    <div>
                        <h3>1. Sign up for Free</h3>
                        <p>Both creators and brands can join our platform for free, set up a profile and start connecting within seconds! It really is <a href="http://bluence.com/register/">that easy</a>...</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <div>
                        <h3>2. Connect</h3>
                        <p>Brands and creators from across the world can connect and open discussions surrounding sponsored and branded content creation.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fa fa-comments fa-3x"></i>
                    </div>
                    <div>
                        <h3>3. Collaborate</h3>
                        <p>Brands have the opportunity to work with a wide range of creators to target specific audiences & demographics through content they can trust.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fa fa-line-chart fa-3x"></i>
                    </div>
                    <div>
                        <h3>4. Witness Results</h3>
                        <p>Co-ordinate your branded content with your on-going marketing campaign to target sales objectives, increase brand awareness and gain social recognition.</p>
                    </div>
                </div>
            </div>

        </div>      
    </div>
    <!-- //HOW IT WORKS -->


    <!-- JOIN BLUENCE -->
    <section id="join">
        <div class="container join">
          <div class="row">
            <h1 style="margin-bottom:30px;">Join for Free (Soon!)</h1>
            <div class="col-md-6">
               <a class="btn btn-primary btn-lg btn-block" href="/" role="button" disabled="disabled">Content Creators</a> <!-- temp disabled -->
            </div><!--/col-md-6-->
            <div class="col-md-6">
              <a class="btn btn-success btn-lg btn-block" href="/" role="button" disabled="disabled">Advertisers</a> <!-- temp disabled -->
            </div><!--/col-md-6-->
        </div>

        <div class="row">
            <div class="center-block">
            <h2>Get the exclusive first look when we launch!</h2>
              <!-- Begin MailChimp Signup Form  -->
                <div id="mc_embed_signup">
                <form action="//bluence.us10.list-manage.com/subscribe/post?u=000c6d8af1cea455d6791485b&amp;id=17a8236d1b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate align="center">
                    <div id="mc_embed_signup_scroll" style="color:white">
                    <!-- <h4>Get the exclusive first look when we launch!</h4> -->
                <div class="mc-field-group">
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" style="color: black;" placeholder="john@example.com">
                </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>   
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_000c6d8af1cea455d6791485b_17a8236d1b" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Get Exclusive Access" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
                </div>
                  <!--End mc_embed_signup-->
              </div>
          </div><!--/row-->
        </div><!-- /.container -->
    </section>

    <!-- /JOIN BLUENCE -->


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="privacy-policy.html">Privacy Policy</a>
                        </li>
                        <!-- <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul> -->
                    <p class="copyright text-muted small">Copyright &copy; Bluence 2015. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    @yield('footer')

  	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.js"></script>

    <!-- GA -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-59766298-1', 'auto');
      ga('send', 'pageview');

    </script>


</body>

</html>
