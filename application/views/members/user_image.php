  <div class="page-links background-header-page" style="background-image: url(<?=$image->operator_image->large_image_path;?>)" >
      <div class="container">
        <header class="section-header">
            <?php if(!empty($image->operator_image->image_caption)){ ?>
                  <h3 style="color:#fff"><?php echo $image->operator_image->image_caption; ?></h3>
                <?php }else{ ?>
                  <h3 style="color:#fff"><?=$business;?> Image</h3>
                <?php } ?>
            <p style="color:#fff">Uploaded on <?php echo time_words($image->operator_image->entry_date); ?> </p>
          </header>
        </div>
</div>
<div class="container">
    <ol class="breadcrumb">
    <li><a href="#">Home</a>
    </li>
    <li><a href="<?=site_url('images')?>">Images</a>
    </li>
    <li class="active">Image details</li>
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
             <td align="center"> <img src="<?php echo $image->operator_image->large_image_path; ?>" alt="" data-lity /></td>
          </tr>
          <tr>
            <td> <small><em>All images are copyright of <?=$business;?> and credit must be displayed with usage</em></small></td>
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
            <a class="btn btn-primary" href="<?=site_url('/download/image/'.$id);?>" target="download" >Download Original</a>
          </div>

        </div>
        <!-- END DOWNLOADS -->
         <!-- Shot stats -->
              <div class="sidebar-block">
                <ul class="single-shot-stats">
                  <div id="basket-button" data-id="<?=$id?>" data-type="1"></div>
                  <div id="favorite-button" data-id="<?=$id?>" data-type="1"></div>
                </ul>
              </div>
              <!-- END Shot stats -->

        <!-- Details -->
        <div class="sidebar-block">
          <h6>Details</h6>
          <dl class="half-half">

            <?php if(!empty($image->operator_image->image_size)){?>
            <dt>File Size</dt>
            <dd><?php

           echo round( $image->operator_image->image_size/1024, 2 );

            ?>M</dd>
            <?php }?>

            <?php if(!empty($image->operator_image->image_width) && !empty($image->operator_image->image_height)){?>
            <dt>Size</dt>
            <dd><?php echo $image->operator_image->image_width; ?> x <?php echo $image->operator_image->image_height; ?></dd>
            <?php }?>

            <?php if(!empty($image->operator_image->image_width) && !empty($image->operator_image->orientation)){?>
            <dt>Orientaion</dt>
            <dd> <?php echo lcfirst( $image->operator_image->orientation ); ?> </dd>
            <?php }?>

          </dl>
        </div>
      </aside>
    </div>

  </div>
  <iframe name="download" frameborder="0" ></iframe>
</section>
