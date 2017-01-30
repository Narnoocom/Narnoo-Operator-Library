<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Media Library | <?=$this->config->item('business_name');?></title>

        <!-- Bootstrap framework -->
        <link rel="stylesheet" href="<?= cdn_url('bootstrap/css/bootstrap.min.css') ?>" />
        <link rel="stylesheet" href="<?= cdn_url('bootstrap/css/bootstrap-responsive.min.css'); ?>" />
        <!-- tooltips-->
        <link rel="stylesheet" href="<?= cdn_url('lib/qtip2/jquery.qtip.min.css'); ?>" />

        <!-- gebo color theme-->
        <link rel="stylesheet" href="<?= cdn_url('css/blue.css'); ?>" id="link_theme" />
        <!-- main styles -->
        <link rel="stylesheet" href="<?= cdn_url('css/style.css'); ?>" />
        <!-- splashy icons -->
        <link rel="stylesheet" href="<?= cdn_url('img/splashy/splashy.css'); ?>" />
        <!-- smoke_js -->
        <link rel="stylesheet" href="<?= cdn_url('lib/smoke/themes/gebo.css'); ?>" />


        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= cdn_url('favicon.ico'); ?>" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?= cdn_url('css/ie.css'); ?>" />
            <script src="<?= cdn_url('js/ie/html5.js'); ?>"></script>
            <script src="<?= cdn_url('js/ie/respond.min.js'); ?>"></script>
        <![endif]-->
        <script src="<?= cdn_url('js/jquery.min.js'); ?>"></script>
            <script src="<?= cdn_url('js/jquery-migrate.min.js'); ?>"></script>
            <!-- smart resize event -->
            <script src="<?= cdn_url('js/jquery.debouncedresize.min.js'); ?>"></script>
            <!-- hidden elements width/height -->
            <script src="<?= cdn_url('js/jquery.actual.min.js'); ?>"></script>
            <!-- js cookie plugin -->
            <script src="<?= cdn_url('js/jquery_cookie.min.js'); ?>"></script>
            <!-- main bootstrap js -->
            <script src="<?= cdn_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
            <!-- bootstrap plugins -->
            <script src="<?= cdn_url('js/bootstrap.plugins.min.js'); ?>"></script>
            <!-- tooltips -->
            <script src="<?= cdn_url('lib/qtip2/jquery.qtip.min.js'); ?>"></script>
            <!-- fix for ios orientation change -->
            <script src="<?= cdn_url('js/ios-orientationchange-fix.js'); ?>"></script>
            <!-- scrollbar -->
            <script src="<?= cdn_url('lib/antiscroll/antiscroll.js'); ?>"></script>
            <script src="<?= cdn_url('lib/antiscroll/jquery-mousewheel.js'); ?>"></script>

            <!-- mobile nav -->
            <script src="<?= cdn_url('js/selectNav.js'); ?>"></script>
            <!-- common functions -->
            <script src="<?= cdn_url('js/gebo_common.js'); ?>"></script>
            <!-- WIZZFORM -->
            <script src="<?= cdn_url('lib/tiny_mce/jquery.tinymce.js'); ?>"></script>

            <script>
                $(document).ready(function() {
                    //* show all elements & remove preloader
                    setTimeout('$("html").removeClass("js")', 1000);
                });
            </script>
        <script>
            //* hide all elements & show preloader
            document.documentElement.className += 'js';
        </script>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="<?= cdn_url('img/ajax_loader.gif'); ?>" alt="" /></div>
        <div id="maincontainer" class="clearfix">
            <!-- header -->

            <?php
            // add menu module
            echo Modules::run('header');
            ?>


            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">

                    <?= $body; ?>

                </div>
                <!--<div><small>powered by: <a href="http://www.narnoo.com/" target="_blank">Narnoo</a></small></div>-->
            </div>

            <!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
                            <?php
                            // add menu module
                            echo Modules::run('menu');
                            ?>
                        </div>
                    </div>
                </div>
            </div>



        </div>
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
