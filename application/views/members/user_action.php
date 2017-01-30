<?php //print_r($activity->activity); ?>
<div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)" >
  <div class="container">
    <header class="section-header">
      <h3 style="color:#fff">Activities</h3>
      <p style="color:#fff">The last 30 days of activity</p>
    </header>
  </div>
</div>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="#">Home</a>
      <li class="active">Activity</li>
    </ol>
  </div>
  <div class="container" >
    <div class="row">

    <?php if(!empty($activity->activity)) { ?>

      <div class="timeline-centered">
        <!-- TIME LINE START -->
        <?php
        $count = 1;
        //$colors = array('bg-info','bg-secondary','bg-success','bg-warning','bg-danger','bg-primary');
        //print_r($activity->activity);
        foreach ($activity->activity as $action) {
          $remove = FALSE;
          $upload = FALSE;
          if ($count%2 == 1)
          {
              echo '<article class="timeline-entry left-aligned">';
          }else{
              echo '<article class="timeline-entry">';
          }
        ?>
          <div class="timeline-entry-inner">
            <time class="timeline-time" datetime="<?=$action->timestamp;?>"><span><?php echo time_words_small( $action->timestamp ); ?></span></time>

            <div class="timeline-icon <?php

            if($action->action == 'deleted'){
              echo 'bg-danger';
              $remove = TRUE;
            }elseif($action->action == 'uploaded'){
              echo 'bg-success';
              $upload = TRUE;
            }elseif($action->action == 'edited'){
              echo 'bg-warning';
            }else{
              echo 'bg-info';
            }

            ?>">
              <i class="entypo-feather"></i>
            </div>

            <div class="timeline-label">

              <?php if(!empty($upload)){ ?>
              <a href="<?=site_url($action->media.'s/details/'.$action->media_id);?>"><?=$business;?> <?=$action->action;?> <?=$action->media;?></a>
              <?php }else{ ?>
                <?=$business;?> <?=$action->action;?> <?=$action->media;?>
              <?php } ?>

            </div>
          </div>

        </article>

        <?php
          $count++;
          }
        ?>
        <!-- TIME LINE START left-aligned every second entry -->
      </div>
      <?php }else{ ?>
      <div class="col-lg-12">
          <div class="alert alert-info">
              There has been no activity to report
          </div>
      </div>
      <?php } ?>
    </div>
  </div>
