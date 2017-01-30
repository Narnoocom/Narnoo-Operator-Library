<div class="page-links background-header-page" style="background-image: url(<?=$brochure->preview_image_path;?>)" >
      <div class="container">
        <header class="section-header">
            <?php if(!empty($brochure->brochure_caption)){ ?>
                  <h3 style="color:#fff"><?php echo $brochure->brochure_caption; ?></h3>
                <?php }else{ ?>
                  <h3 style="color:#fff"><?=$business;?> brochure</h3>
                <?php } ?>
            <p style="color:#fff">Uploaded on <?php echo time_words($brochure->entry_date); ?> </p>
          </header>
        </div>
</div>
<div class="container">
    <ol class="breadcrumb">
    <li><a href="#">Home</a>
    </li>
    <li><a href="<?=site_url('brochures')?>">brochures</a>
    </li>
    <li class="active">brochure details</li>
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
            <td align="center"> <img src="<?php echo $brochure->preview_image_path; ?>" alt="" data-lity /></td>
         </tr>
         <tr>
           <td> <small><em>All brochures are copyright of <?=$business;?> and credit must be displayed with usage</em></small></td>
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
           <a class="btn btn-primary" href="<?=site_url('/download/brochure/'.$id);?>" target="_blank">Download Original</a>
         </div>

       </div>
       <!-- END DOWNLOADS -->
        <!-- Shot stats -->

             <!-- END Shot stats -->

       <!-- Details
       <div class="sidebar-block">
         <h6>Details</h6>

       </div>
        END Details -->




     </aside>
   </div>

 </div>
 <iframe name="download" frameborder="0" ></iframe>
</section>
