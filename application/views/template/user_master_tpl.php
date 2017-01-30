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
    <link href="<?php echo cdn_url('assets/css/app.css');?>" rel="stylesheet">
    <link href="<?php echo cdn_url('assets/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo cdn_url('assets/css/skins/skin-green.css');?>" rel="stylesheet">
    <?php
         if (isset($css)){
             echo $css;
         }
         ?>

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
          <?php
          // add menu module
          echo Modules::run('menu');
          ?>
        </div>
        <!-- END Logo and navigation links -->

        <!-- User account and action buttons -->
        <div class="pull-right">
          <?php
            // add gravatar module
            echo Modules::run('cart');
            ?>
          <div class="dropdown user-account">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">

            <?php
            // add gravatar module
            echo Modules::run('gravatar');
            ?>


            </a>

            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="<?php echo site_url('login/logout/')?>">Logout</a></li>
            </ul>
          </div>
        </div>
        <!-- END User account and action buttons -->

        <!-- Search screen -->
        <div class="search-screen closed">
          <button class="search-closer"><i class="ti-close"></i></button>
          <form class="search-form" action="page-search.html">
            <input type="text" autocomplete="off" placeholder="Type to search...">
          </form>
        </div>
        <!-- END Search screen -->

      </div>
    </nav>
    <!-- END Navigation bar -->


    <!-- Main container -->
    <main>

    <?php echo $body; ?>

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

          <!-- <div class="col-md-4 col-sm-6 col-xs-12">
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
    <script src="<?php echo cdn_url('assets/js/lockr.js');?>"></script>
    <?php
            //javascripts for the page
            if (isset($jsscripts)){
                echo $jsscripts['loads'];
                if(isset($jsscripts['js'])){
                    echo $jsscripts['js'];
                }
            }
            ?>
  </body>
</html>
