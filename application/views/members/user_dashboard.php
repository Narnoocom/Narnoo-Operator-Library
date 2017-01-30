<div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)" >
    <div class="container">
      <header class="section-header">
        <span style="color:#fff">Welcome</span>
        <h2 style="color:#fff">Our Media Library</h2>
        <p style="color:#fff"><?=$business;?> Digital Library</p>
      </header>
        </header>
      </div>
</div>
<!-- About -->
  <section class="bg-white">
    <div class="container">
      <h5>Introduction</h5>
      <p><?=$disclaimer->disclaimer;?></p>
    </div>
  </section>
  <!-- END About -->

  <!-- Albums -->
  <?php  echo Modules::run('album/widget'); ?>
  <!-- END Albums -->

      <!-- Facts -->
  <section class="section-sm no-border-bottom overlay-black" style="background-image: url(<?=cdn_url('assets/img/large-bg.jpg');?>)">
    <div class="container">

      <div class="row">
        <div class="counter color-alt col-md-3 col-sm-6">
          <a href="<?=site_url('images');?>"><i class="fa fa-camera"></i></a>
          <p><span data-from="0" data-to="<?=$account->image_count;?>"></span>+</p>
          <h6>Images</h6>
        </div>

        <div class="counter color-alt col-md-3 col-sm-6">
          <i class="fa fa-book"></i>
          <p><span data-from="0" data-to="<?=$account->brochure_count;?>"></span>+</p>
          <h6>Brochures</h6>
        </div>

        <div class="counter color-alt col-md-3 col-sm-6">
          <i class="fa fa-video-camera"></i>
          <p><span data-from="0" data-to="<?=$account->video_count;?>"></span>+</p>
          <h6>Videos</h6>
        </div>

        <div class="counter color-alt col-md-3 col-sm-6">
          <i class="fa fa-file-text"></i>
          <p><span data-from="0" data-to="<?=$account->description_count;?>"></span>+</p>
          <h6>Descriptions</h6>
        </div>
      </div>
      <?php //print_r($accountDetails); ?>
    </div>
  </section>
