<!-- Page links -->
<div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
  <div class="container">
    <div class="row" style="margin-bottom:25px">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h2 style="color:#fff">Our Products</h2>
      </div>
    </div>
  </div>

</div>
<!-- END Page links -->
<div class="container">
  <div class="col-lg-12">
  <h5>Total Product Results: <?=$products->total_products;?></h5>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="well">
      <h1 class="text-center">Product List</h1>

      <div class="list-group">
      <?php foreach ($products->product as $row ) { ?>

        <a href="<?=site_url('product/details/'.$row->product_id .'/'.urlencode($row->product_title));?>" class="list-group-item">
          <div class="media col-md-3">
            <figure class="pull-left">
              <img class="media-object img-rounded img-responsive"  src="<?php
              if(!empty($row->feature_image)){
                echo $row->feature_image->image_200_path .'"';
              }else{
                echo cdn_url('assets/img/error-image-crop.jpg').'" style="width:200px;height:150px" " ';
              }
              ?> />
            </figure>
          </div>
          <div class="col-md-6">
            <h4 class="list-group-item-heading"> <?=$row->product_title;?> </h4>
            <p class="list-group-item-text"><?php
            if(!empty($row->summary)){
              $text = strip_tags( $row->summary->text );
              if( strlen ( $text  ) > 300 ){
                echo substr($text,0,300).'...';
              }else{
                echo $text;
              }

            }
            ?></p>

          </div>
          <div class="col-md-3 text-center">
            <button type="button" class="btn btn-primary btn-lg btn-block"> View Product </button>
          </div>
        </a>

      <?php } ?>

      </div>
    </div>
  </div>
</div>
