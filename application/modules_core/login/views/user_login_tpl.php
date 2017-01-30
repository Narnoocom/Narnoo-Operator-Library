<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="theshots is a directory listing template.">
    <meta name="keywords" content="">

    <title>Digital Asset Library</title>

    <!-- Styles -->
    <link href="<?php echo cdn_url('assets/css/app.min.css');?>" rel="stylesheet">
    <link href="<?php echo cdn_url('assets/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo cdn_url('assets/css/skins/skin-green.min.css');?>" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="<?php echo cdn_url('assets/img/logo.png');?>">
  </head>

  <body class="sticky-nav">

    <!-- Navigation bar -->
    <nav class="navbar">
      <div class="container">

        <!-- Logo and navigation links -->
        <div class="pull-left">
          <div class="logo">
            <a href="#"><img src="<?php echo cdn_url('assets/img/logo.png');?>" alt="logo"></a>
          </div>

         
        </div>
        <!-- END Logo and navigation links -->

      </div>
    </nav>
    <!-- END Navigation bar -->


    <!-- Site header -->
    <header class="site-header color-alt overlay-black bg-fixed" style="background-image: url(<?php echo cdn_url('assets/img/bg-header.jpg');?>);background-position: center;">
      <div class="container">
        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
          <h1><strong>Digital Library</strong></h1>
          <h4><?=$business;?>'s <strong>Digial</strong> media!</h4>
          <br>
          <span class="hidden-xs"><?=$disclaimer->disclaimer;?></span>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 header-form-wrapper">
          
          <?php echo media_error_handler(); ?>
          <form action="<?php echo site_url('/login/authenticate/'); ?>" method="post" id="login_form" class="header-form  visible">

            <div class="form-group">
              <input class="form-control input-lg" type="text" name="username" placeholder="Username">
            </div>
            
            <div class="form-group">
              <input class="form-control input-lg" type="password" name="password" placeholder="Password">
            </div>

           <!-- <p><a href="user-forget-pass.html">Forgot your password?</a></p> -->

            <div class="row">

              <div class="col-xs-12 ">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
              </div>
              
            </div>
            
            
          </form>
        </div>

      </div>
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>



      <!-- Album 
      <section>
        <div class="container">
          <header class="section-header">
            <h2>Favorites</h2>
            <p>Some of our favorite shots in the region</p>
          </header>

         

        </div>
      </section>
       END Album -->





    </main>
    <!-- END Main container -->


    <!-- Site footer -->
    <footer class="site-footer no-margin-top">

      <hr/>
      <!-- Bottom section -->
      <div class="container">

        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Tourism digital media powered by <a href="https://www.narnoo.com/">Narnoo</a>.</p>
          </div>

          <!--<div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div> -->

        </div>
      </div>
      <!-- END Bottom section -->

    </footer>
    <!-- END Site footer -->


    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
    <!-- END Back to top button -->

    <!-- Shot description modal -->
    <div id="shot-modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <a class="close-modal" data-dismiss="modal" href="#"><i class="ti-close"></i></a>
        <div class="modal-content"></div>
      </div>
    </div>
    <!-- END Shot description modal -->


    <!-- Scripts -->
    <script src="<?php echo cdn_url('assets/js/app.min.js');?>"></script>
    <script src="<?php echo cdn_url('assets/js/custom.js');?>"></script>

  </body>
</html>
