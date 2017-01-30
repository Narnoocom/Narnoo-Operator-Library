<!-- Page links -->
<div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
  <div class="container">
    <div class="row" style="margin-bottom:25px">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2 style="color:#fff">Your Library Basket</h2>
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
    <li class="active">Image cart</li>
</ol>
</div>
<!-- Shots list -->
<section class="no-border-bottom section-sm" style="padding-top:20px">
  <div class="container">
  <div class="alert alert-info">Please note your cart is only active for 1 day</div>
    <div class="row" id="media-list">


      <?php  foreach ($images->operator_images as $row){ ?>

        <?php if( !empty( $row->success) ) { ?>
            <!-- Shot -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
              <div class="shot shot-small">
                <div class="shot-preview">
                  <img src="<?=$row->xcrop_image_path;?>" alt="">
                  <span class="shot-download"><a href="<?=site_url('/download/image/'.$row->image_id);?>" class="btn btn-primary btn-round">Download</a></span>
                  <span class="shot-view"><a href="<?=site_url('images/details/'.$row->image_id );?>" class="btn btn-primary btn-round">View</a></span>
                 </div>
              </div>
            </div>
            <!-- END Shot -->
        <?php } ?>

      <?php } ?>

    </div>

  </div>
  <iframe name="download" frameborder="0" ></iframe> 
</section>
<!-- END Shots list -->
