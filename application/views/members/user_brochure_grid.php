<?php //print_r($brochures); ?>
<!-- Page links -->
      <div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
        <div class="container">
        <div class="row" style="margin-bottom:25px">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 style="color:#fff">Brochure</h2>
              </div>
          </div>
          <div class="pull-left">
            <ul class="link-list">
              <li><a class="active" href="#">Recent</a></li>
              <!-- <li><a href="<?=site_url('brochures/favorites');?>">Favorites</a></li> -->
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
      <?php if( !empty($brochures->count) ){ ?>
      <div class="container">
      <div class="col-lg-12">
          <h5>Total brochure Results: <?php echo $brochures->count;?></h5>
      </div>
      </div>
      <?php } ?>
      <!-- Shots list -->
      <section class="no-border-bottom section-sm" style="padding-top:20px">
        <div class="container">

          <?php if( !empty($brochures->operator_brochures) ){ ?>

          <div class="row" id="media-list">

           <?php
           $divcount = 1;
           foreach ($brochures->operator_brochures as $row){

             if ($divcount%4 == 1)
              {
                   echo '<div class="row">';
              }

             ?>
             <!-- Shot -->
             <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
               <div class="shot shot-small">
                 <div class="shot-preview">
                   <a href="<?=site_url('brochures/details/'.$row->brochure_id );?>"><img src="<?=$row->preview_image_path;?>" alt=""></a>
                   <!-- <span class="basket" data-id="<?=$row->brochure_id;?>" data-type="2"></span>  -->
                  </div>
                  <div class="shot-detail">
                    <h6><?php echo ucfirst( $row->brochure_caption ); ?></h6>
                  </div>

               </div>
             </div>
             <!-- END Shot -->

            <?php
            
            if ($divcount%4 == 0)
             {
                  echo '</div>';
             }
             $divcount++;
            }
            if ($divcount%4 != 1) echo "</div>";

            ?>
            <?php }else{ ?>
              <div class="row">
                <div class="alert alert-info">We do not have any brochures available at this time!</div>
              </div>
            <?php } ?>
            </div>
          </div>
          <?php if(!empty( $brochures->total_pages)){ ?>
          <?php if($brochures->total_pages > 1){ ?>
             <?php if($brochures->current_page < $brochures->total_pages){ ?>
             <div id="paging-ajax">
                <!-- Paging Button [start] -->
                <div class="row paging-more-btn">
                 <div class="text-center">
                  <a id="paging-more" class="btn btn-primary btn-round btn-lg" href="javascript:;" data-keywords="<?php if(!empty($keywords)){ echo $keywords;  }?>"  data-type="2" data-location="<?php if(!empty($location)){ echo $location;  }?>" data-page="<?php echo (int) $brochures->current_page+1; ?>">Load More brochures</a>
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
