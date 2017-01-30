<!-- Page links -->
      <div class="page-links background-header-page" style="background-image: url(<?=cdn_url('assets/img/bg-header.jpg');?>)">
        <div class="container">
          <header class="section-header" style="color:#fff">
            <h2>Our Description Text</h2>
            <p><?=$business;?></p>
          </header>
        </div>

      </div>
      <!-- END Page links -->
      <div class="container">
          <ol class="breadcrumb">
          <li><a href="#">Home</a>
          </li>
          <li><a href="<?=site_url('descriptions')?>">Text</a>
          </li>
          <li class="active">Description text</li>
      </ol>
      </div>
      <div class="container">
      <?php echo media_error_handler(); ?>
      </div>
      <!-- description list -->
      <section class="no-border-bottom">
        <div class="container">

              <?php

              if( !empty($text->description_text) ){
              /*
              *
              * Loop through the descriptions and output the desired text
              * @input is API desctiption
              * @output is different text lenghts
              */
              foreach ($text->description_text as $text) {

                if($text->word_no == 50){
                  echo '<div class="row">';
                    echo '<div class="col-lg-8"><h3>Small Description</h3></div><!-- Trigger -->
                    <div class="col-lg-4"><button class="btn clipbtn btn-primary btn-sm" data-clipboard-target="#text-small">
                        Copy to clipboard
                    </button></div>';
                    echo '</div>';
                    echo '<div class="row">
                      <div class="col-lg-12">';
                    echo '<div id="text-small">'.$text->text.'</div>';
                  echo '</div></div><hr/>';
                }

                if($text->word_no == 100){
                  echo '<div class="row">';
                    echo '<div class="col-lg-8"><h3>Medium Description</h3></div><!-- Trigger -->
                    <div class="col-lg-4"><button class="btn clipbtn btn-primary btn-sm" data-clipboard-target="#text-medium">
                        Copy to clipboard
                    </button></div>';
                    echo '</div>';
                    echo '<div class="row">
                      <div class="col-lg-12">';
                    echo '<div id="text-medium">'.$text->text.'</div>';
                  echo '</div></div><hr/>';
                }

                if($text->word_no == 150){
                  echo '<div class="row">';
                    echo '<div class="col-lg-8"><h3>Large Description</h3></div><!-- Trigger -->
                    <div class="col-lg-4"><button class="btn clipbtn btn-primary btn-sm" data-clipboard-target="#text-large">
                        Copy to clipboard
                    </button></div>';
                    echo '</div>';
                    echo '<div class="row">
                      <div class="col-lg-12">';
                    echo '<div id="text-large">'.$text->text.'</div>';
                  echo '</div></div><hr/>';
                }

              }

               }else{
                 
                echo '<div class="row">
                        <div class="alert alert-info">We do not have any text available at this time!</div>
                    </div>';
               }

              ?>
            </div>
          </div>
        </div>
      </section>
      <!-- END Shots list -->
