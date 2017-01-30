<!-- Page links -->
      <div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
        <div class="container">
        <div class="row" style="margin-bottom:25px">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 style="color:#fff">Videos</h2>

              </div>
          </div>
          <div class="pull-left">
            <ul class="link-list">
              <li><a class="active" href="#">Recent</a></li>
              <!--<li><a href="<?=site_url('videos/favorites');?>">Favorites</a></li> -->
            </ul>
          </div>

          <div class="pull-right">
            <!--<ul class="link-list">
              <li><a href="index-style3-cols4.html"><i class="ti-layout-grid4-alt"></i></a></li>
              <li><a href="index-style3-cols3.html"><i class="ti-layout-grid3-alt"></i></a></li>
              <li><a href="index-style3-cols2.html"><i class="ti-layout-grid2-alt"></i></a></li>
            </ul>-->
          </div>


        </div>

      </div>
      <!-- END Page links -->
      <?php if( !empty($videos->count) ){ ?>
      <div class="container">
      <div class="col-lg-12">
          <h5>Total Video Results: <?php echo $videos->count;?></h5>
      </div>
      </div>
      <?php } ?>
      <!-- Shots list -->
      <section class="no-border-bottom section-sm" style="padding-top:20px">
        <div class="container">

          <?php if( !empty($images->operator_images) ){ ?>

          <div class="row" id="media-list">

           <?php  foreach ($videos->operator_videos as $row){ ?>
            <!-- Shot -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
              <div class="shot shot-small">
                <div class="shot-preview">
                  <a href="<?=site_url('videos/view/'.$row->video_id );?>"><img src="<?=$row->video_thumb_image_path;?>" alt=""></a>
                  <!--<span class="basket" data-id="<?=$row->video_id;?>" data-type="3"></span> -->
                 </div>


              </div>
            </div>
            <!-- END Shot -->

            <?php } ?>

          </div>
          <?php }else{ ?>
            <div class="row">
              <div class="alert alert-info">We do not have any videos available at this time!</div>
            </div>
          <?php } ?>

          <?php if(!empty( $videos->total_pages )){ ?>

          <?php if($videos->total_pages > 1){ ?>
             <?php if($videos->current_page < $videos->total_pages){ ?>
             <div id="paging-ajax">
                <!-- Paging Button [start] -->
                <div class="row paging-more-btn">
                 <div class="text-center">
                  <a id="paging-more" class="btn btn-primary btn-round btn-lg" href="javascript:;" data-keywords="<?php if(!empty($keywords)){ echo $keywords;  }?>"  data-type="3" data-location="<?php if(!empty($location)){ echo $location;  }?>" data-page="<?php echo (int) $videos->current_page+1; ?>">Load More videos</a>
                 </div>
                </div>
                <div class="row  paging-more-loader" style="display:none">
                 <div class="text-center">
                  <img src="<?=cdn_url('assets/img/loader.gif');?>" />
                 </div>
                </div>
                <!-- Paging Button [end] -->
             </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
        </div>
      </section>
      <!-- END Shots list -->
