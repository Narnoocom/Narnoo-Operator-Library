<!-- Page links -->
<div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
  <div class="container">
    <div class="row" style="margin-bottom:25px">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2 style="color:#fff">Top Favorite Images</h2>                  
        </div>              
    </div>
  </div>
</div>
<!-- END Page links -->
<div class="container">
    <ol class="breadcrumb">
    <li><a href="#">Home</a>
    </li>
    <li><a href="<?=site_url('images')?>">Images</a>
    </li>
    <li class="active">User favorites</li>
</ol>
</div>
<!-- Shots list -->
<section class="no-border-bottom section-sm" style="padding-top:20px">
  <div class="container">
    <div class="row" id="media-list">


      <?php  foreach ($images->distributor_images as $row){ ?>

        <?php if( !empty( $row->success) ) { ?>
            <!-- Shot -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
              <div class="shot shot-small">
                <div class="shot-preview">
                  <a href="<?=site_url('images/details/'.$row->image_id );?>"><img src="<?=$row->xcrop_image_path;?>" alt=""></a>
                 </div>
              </div>
            </div>
            <!-- END Shot -->
        <?php } ?>

      <?php } ?>

    </div>
    
  </div>        
</section>
<!-- END Shots list -->