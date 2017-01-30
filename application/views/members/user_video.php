<div class="page-links background-header-page" style="background-image: url(<?=$video->operator_video->video_pause_image_path;?>)" >
      <div class="container">
        <header class="section-header">
            <?php if(!empty($video->operator_video->caption)){ ?>
                  <h3 style="color:#fff"><?php echo $video->operator_video->caption; ?></h3>
                <?php }else{ ?>
                  <h3 style="color:#fff"><?=$business;?> video</h3>
                <?php } ?>
            <p style="color:#fff">Uploaded on <?php echo time_words($video->operator_video->entry_date); ?> </p>
          </header>
        </div>
</div>
<div class="container">
    <ol class="breadcrumb">
    <li><a href="#">Home</a>
    </li>
    <li><a href="<?=site_url('videos')?>">videos</a>
    </li>
    <li class="active">video details</li>
</ol>
</div>
 <section class="no-border-bottom">

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8">

        <!-- Shot and details -->
        <div class="card no-margin-top">
          <div class="card-block">
          <table width="100%">
          <tr>
             <td align="center">
               <div class="embed-responsive embed-responsive-16by9 text-center" style="max-width:960px;">
                 <video style="width: 100%; height: 100%;" class="progression-single progression-skin" controls="controls" preload="none" poster="<?php echo $video->operator_video->video_pause_image_path; ?>">
                     <source src="<?php echo $video->operator_video->video_stream_path; ?>" type="video/mp4" title="Video Content">
                     <source src="<?php echo $video->operator_video->video_webm_path; ?>" type="video/webm" title="Video Content">
                 </video>
               </div>
             </td>
          </tr>
          <tr>
            <td> <small><em>All videos are copyright of <?=$business;?> and credit must be displayed with usage</em></small></td>
          </tr>
            </table>
          </div>
        </div>
        <!-- END Shot and details -->

      </div>

      <aside class="col-xs-12 col-md-4 shot-sidebar">
        <!-- DOWNLOADS -->
        <div class="sidebar-block text-center">
          <div class="btn-group" role="group" >
            <a class="btn btn-primary" href="<?=site_url('/download/video/'.$id);?>" target="download" >Download Original</a>
          </div>

        </div>
        <!-- END DOWNLOADS -->


        <!-- Details 
        <div class="sidebar-block">
          <h6>Details</h6>
          <dl class="half-half">
            <?php if(!empty($video->operator_video->video_category)){?>
            <dt>Category</dt>
            <dd><?php echo $video->operator_video->video_category; ?></dd>
            <?php }?>
            <?php if(!empty($video->operator_video->video_subcategory)){?>
            <dt>Sub Category</dt>
            <dd><?php echo $video->operator_video->video_subcategory; ?></dd>
            <?php }?>
            <?php if(!empty($video->operator_video->video_location)){?>
            <dt>Location</dt>
            <dd><?php echo $video->operator_video->video_location; ?></dd>
            <?php }?>
          </dl>
        </div>
        END Details -->

        <?php if( !empty($video->operator_video->video_keywords) ){ ?>
        <!-- Tags -->
        <div class="sidebar-block">
          <h6>Keywords</h6>
          <div class="tag-list">
          <?php

          $keys = explode(',', $video->operator_video->video_keywords);
          foreach ($keys as $key ) {
            echo '<a href="'.site_url('videos?keywords='.$key.'').'">'.$key.'</a>';
          }

          ?>
          </div>
        </div>
        <!-- END Tags -->
        <?php } ?>


      </aside>
    </div>

  </div>
  <iframe name="download" frameborder="0" ></iframe>
</section>
