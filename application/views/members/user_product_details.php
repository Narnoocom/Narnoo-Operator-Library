<!-- Page links -->
<div class="page-links background-header-page" style="background-image: url(<?php
if(!empty($product->feature_image)){
  echo $product->feature_image->large_image_path;
}else{
  cdn_url('assets/img/bg-header.jpg');
}
?>)">
  <div class="container">
    <div class="row" style="margin-bottom:25px">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h2 style="color:#fff"><?=$product->product_title?></h2>
      </div>
    </div>
  </div>

</div>
<!-- END Page links -->

<section class="no-border-bottom">
        <div class="container">
          <div class="row">

            <div class="col-xs-12 col-md-8">

              <!-- Shot and details -->
              <div class="card no-margin-top">
                <div class="card-block">
                  <?php if(!empty($product->gallery)){ ?>
                  <ul class="image-gallery">

                    <?php foreach ($product->gallery->image as $row){ ?>

                      <li data-thumb="https:<?=$row->image_800_path;?>" data-src="https:<?=$row->xxlarge_image_path;?>">
                        <img src="<?=$row->image_800_path;?>" alt="thumb" />
                      </li>

                    <?php } ?>

                  </ul>
                  <hr>
                  <?php } ?>

                  <?php
                  echo '<h2>'. $product->product_title . '</h2>';
                  echo $product->description->english->text;
                  ?>

                </div>
              </div>
              <!-- END Shot and details -->

            </div>

            <aside class="col-xs-12 col-md-4 shot-sidebar">
              <!-- User widget -->
              <div class="sidebar-block">
                <div class="shot-by-widget">
                <?php if( !empty($info->logo) ){ ?>
                  <img src="<?=$info->logo->crop;?>" alt="avatar" onError="this.onerror=null;this.src='<?=cdn_url('assets/img/error-image-crop.jpg');?>';"></a>
                <?php } ?>

                </div>
              </div>
              <!-- END User widget -->
              <!-- Details -->
              <div class="sidebar-block">
                <h6>Details</h6>
                <dl class="half-half">
                  <dt>Product Title</dt>
                  <dd><?=$product->product_title;?></dd>
                  <?php if( !empty($product->details->operating_hours) ){ ?>
                  <dt>Product Duration</dt>
                  <dd><?=$product->details->operating_hours;?> hours</dd>
                  <?php } ?>
                  <?php if( !empty($product->details->start_time) ){ ?>
                  <dt>Product Start Time</dt>
                  <dd><?=$product->details->start_time;?></dd>
                  <?php } ?>
                  <?php if( !empty($product->details->end_time) ){ ?>
                  <dt>Product Start Time</dt>
                  <dd><?=$product->details->end_time;?></dd>
                  <?php } ?>
                </dl>
              </div>
              <!-- END Details -->

              <!-- Video if available -->
              <?php if( !empty($product->feature_video) ){ ?>
              <div class="sidebar-block">
              <h6>Video</h6>
                <!-- Business Video -->
                <div class="responsive-wrapper text-center" style="max-width:960px;">
                    <video  class="progression-single progression-skin" controls="controls" preload="none" poster="<?php echo $product->feature_video->video_pause_image_path; ?>">
                        <source src="<?php echo $product->feature_video->video_preview_path; ?>" type="video/mp4" title="Video Content">
                        <source src="<?php //echo $product->feature_video->video_webm_path; ?>" type="video/webm" title="Video Content">
                    </video>
                </div>
                <!-- Business video -->
                <a href="<?=site_url('/download/video/'.$product->feature_video->video_id);?>" target="download" class="btn btn-block btn-success">Download video file</a>
              </div>
              <?php } ?>
               <!-- Video if available -->

               <!-- Video if available -->
               <?php if( !empty($product->feature_print) ){ ?>
               <div class="sidebar-block">
               <h6>Print Item</h6>
                 <!-- Business print -->
                 <img src="<?=$product->feature_print->preview_image_path?>" class="img-responsive" style="width:100%"/>
                 <?php if( !empty($product->feature_print->print_caption) ){ ?>
                 <p><em><?=$product->feature_print->print_caption; ?></em></p>
                 <?php } ?>
                 <!-- /Business print -->
                 <a href="<?=site_url('/download/brochure/'.$product->feature_print->print_id);?>" target="download" class="btn btn-block btn-success">Download print file</a>
               </div>
               <?php print_r($product->feature_print); ?>
               <?php } ?>
                <!-- Video if available -->

              <?php if( !empty( $product->keywords ) ){ ?>
              <!-- Tags -->
              <div class="sidebar-block">
                <h6>Keywords</h6>
                <div class="tag-list">
                <?php

                $keys = explode(',', $product->keywords);
                foreach ($keys as $key ) {
                  echo '<a href="#">'.$key.'</a>';
                }

                ?>
                </div>
              </div>
              <!-- END Tags -->
              <?php } ?>
               <?php if( !empty($info->operator_social->facebook) || !empty($info->operator_social->twiter) || !empty($info->operator_social->tripadvisor_url) || !empty($info->operator_social->instagram)){ ?>
              <!-- Share -->
              <div class="sidebar-block">
                <h6>Members's social channels</h6>
                <ul class="social-icons text-center">
                <?php if(!empty($info->operator_social->facebook) ){ ?>
                  <li><a class="facebook" href="<?=$info->operator_social->facebook;?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if(!empty($info->operator_social->twiter) ){ ?>
                  <li><a class="twitter" href="<?=$info->operator_social->twiter;?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if(!empty($info->operator_social->instagram) ){ ?>
                  <li><a class="instagram" href="<?=$info->operator_social->instagram;?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if(!empty($info->operator_social->tripadvisor_url) ){ ?>
                  <li><a class="instagram" href="<?=$info->operator_social->tripadvisor_url;?>"><i class="fa fa-tripadvisor"></i></a></li>
                <?php } ?>

                </ul>
              </div>
              <!-- END Share -->
              <?php } ?>

            </aside>
          </div>
        </div>
        <!-- album -->

          <div class="container">
            <div class="row" id="media-list">
              <h3>Product Gallery Images</h3>

              <?php  foreach ($product->gallery->image as $row){ ?>


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

            </div>
          </div>


        <!-- /album -->
        <iframe name="download" frameborder="0" ></iframe>
      </section>
