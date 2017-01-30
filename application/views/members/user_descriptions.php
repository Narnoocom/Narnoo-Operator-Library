<!-- Page links -->
      <div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
        <div class="container">
          <header class="section-header" style="color:#fff">
            <h2>Our Descriptions</h2>
            <p><?=$business;?></p>
          </header>



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
      <?php if( !empty($descriptions->count) ){ ?>
          <div class="container">
          <?php echo media_error_handler(); ?>
          <div class="col-lg-12">
              <h5>Total Description Results: <?php echo $descriptions->count;?></h5>
          </div>
          </div>
      <?php } ?>
      <!-- Shots list -->
      <section class="no-border-bottom section-sm" style="padding-top:20px">
        <div class="container">

          <?php if( !empty($descriptions->operator_products) ){ ?>

          <div class="row" id="media-list">

          <?php  foreach ($descriptions->operator_products as $row){ ?>
           <!-- Shot -->
           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
             <div class="shot shot-small">
               <div class="shot-info">
                 <a href="<?=site_url('descriptions/text/'.$row->product_id);?>"><h4><?php echo ucwords( $row->product_title );?></h4></a>
               </div>
             </div>
           </div>
           <!-- END Shot -->

           <?php } ?>

          </div>

          <?php }else{ ?>
            <div class="row">
              <div class="alert alert-info">We do not have any text available at this time!</div>
            </div>
          <?php } ?>

              <?php if(!empty( $videos->total_pages )){ ?>

          <?php if($descriptions->total_pages > 1){ ?>
             <?php if($descriptions->current_page < $images->total_pages){ ?>
             <div id="paging-ajax">
                <!-- Paging Button [start] -->
                <div class="row paging-more-btn">
                 <div class="text-center">
                  <a id="paging-more" class="btn btn-primary btn-round btn-lg" href="javascript:;" data-type="1"  data-page="<?php echo (int) $descriptions->current_page+1; ?>">Load More Text</a>
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
