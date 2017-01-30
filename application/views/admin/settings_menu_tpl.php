<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Menu Settings</li>
        </ul>
        <h3 class="heading">Library Menu Settings</h3>
    </div>
</div>
<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Library Menu Settings</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class="row-fluid">
        <div class="span12">

          <form class="form-horizontal" method="post" id="menu-submit">
            <fieldset>

              <!-- Multiple Checkboxes -->
              <div class="control-group">
                <label class="control-label" for="brochure">Brochure Options</label>
                <div class="controls">
                  <?=$brochure_options;?>
                </div>
              </div>

              <!-- Button -->
              <div class="control-group">
                <div class="controls">
                  <button id="save" class="btn btn-success">Save Options</button>
                </div>
              </div>

            </fieldset>
          </form>


        </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 well">
        <h5 class="text-info">Media library powered by: <a href="http://www.narnoo.com/" target="_blank" >Narnoo.com</a></h5>
    </div>
</div>
