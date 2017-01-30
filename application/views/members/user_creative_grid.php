<!-- Page links -->
      <div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
        <div class="container">
        <div class="row" style="margin-bottom:25px">
              <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <h2 style="color:#fff"><?=$photographer;?>'s Images</h2>
                  <form method="GET">
                 <input type="text" class="form-control input-lg tagsearch" name="keywords" placeholder="Add tags to search" data-role="tagsinput" style="display: none;" 
                 <?php 
                  if(!empty($keywords)){
                    echo 'value="'.$keywords.'"';
                  }?>
                 >
                 <?php 
                 if(!empty($location)){
                  echo '<input type="hidden" name="location" value="'.$location.'" />';
                 }
                 ?>
                 <input type="submit" class="btn btn-primary btn-round btn-lg" value="Search Images"/>
                 <form>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <h2 style="color:#fff">Region Search</h2>
              <div class="wrapper-demo">
                  <div id="dd" class="wrapper-dropdown-5" tabindex="1">Select A Region
                    <ul class="dropdown">

                      <?=$loc_html;?>
                    

                    </ul>
                  </div>
                ​</div>
              </div>
          </div>
          <div class="pull-left">
            <ul class="link-list">
              <?=$exp_html;?>
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
      <div class="container">
      <div class="col-lg-12">
          <h5>Total Image Results: <?php echo $images->count;?></h5>
      </div>
      </div>
      <!-- Shots list -->
      <section class="no-border-bottom section-sm" style="padding-top:20px">
        <div class="container">
          <div class="row" id="media-list">

           <?php  foreach ($images->distributor_images as $row){ ?>
            <!-- Shot -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
              <div class="shot shot-small">
                <div class="shot-preview">
                  <a href="<?=site_url('images/details/'.$row->image_id );?>"><img src="<?=$row->xcrop_image_path;?>" alt=""></a>
                  <span class="basket" data-id="<?=$row->image_id;?>" data-type="1"></span>
                 </div>
              </div>
            </div>
            <!-- END Shot -->

            <?php } ?>

            
           
          </div>
          <?php if($images->total_pages > 1){ ?>
             <?php if($images->current_page < $images->total_pages){ ?>
             <div id="paging-ajax">
                <!-- Paging Button [start] -->
                <div class="row paging-more-btn">
                 <div class="text-center">
                  <a id="paging-more-creative" class="btn btn-primary btn-round btn-lg" href="javascript:;" data-name="<?=$photographer;?>" data-page="<?php echo (int) $images->current_page+1; ?>">Load More Images</a>
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
        </div>        
      </section>
      <!-- END Shots list -->