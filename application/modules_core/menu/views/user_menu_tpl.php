<ul class="nav-menu">
  <li>
    <a href="<?=site_url('dashboard')?>">Home</a>
  </li>
  <li>
    <a href="<?=site_url('images')?>">Images</a>
    <ul>
      <li><a href="<?=site_url('album')?>">Albums</a></li>
    </ul>
  </li>
  <li>
    <a href="<?=site_url('product')?>">Products</a>
  </li>
  <li>
    <a href="<?=site_url('brochures')?>">Brochures</a>
    <?php
          if(!empty($brochures)){
              echo $brochures;
          }
     ?>
  </li>
   </li>
  <li>
    <a href="<?=site_url('videos')?>">Videos</a>
  </li>
  <li>
    <a href="<?=site_url('activity')?>">Timeline</a>
  </li>
</ul>
