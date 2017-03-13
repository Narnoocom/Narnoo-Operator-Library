<!-- TinyMce WYSIWG editor -->
<script src="<?= cdn_url('lib/tiny_mce/jquery.tinymce.js'); ?>"></script>
<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Settings</li>
        </ul>
        <h3 class="heading">Settings Details</h3>
    </div>
</div>
<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Edit Your Login Message</h3>
    </div>
    <form>
        <div class='w-box-content cnt_a'>

            <div class='span12'></div>

            <textarea name="wysiwg_full" id="wysiwg_full" cols="30" rows="10"><?
            if(!empty($info->welcome)){
              echo $info->welcome;
            }
            ?></textarea>

            <div class='row-fluid'>
                <div class='span12'>
                    <buttom class="btn btn-primary" style="margin-top: 10px" id="welcomeMessage">Update Message</buttom>
                </div>
            </div>
    </form>

</div>



</div>
<div class='row-fluid'>
    <div class="alert alert-warning">
        Last edited by: <?=$info->contact;?> on <?=time_words($info->editDate);?>
    </div>
</div>
<script>


    $('textarea#wysiwg_full').tinymce({
        // Location of TinyMCE script
        script_url 							: '<?= cdn_url('/lib/tiny_mce/tiny_mce.js'); ?>',
        // General options
        theme 								: "advanced",
        plugins 							: "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
        // Theme options
        theme_advanced_buttons1 			: "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontsizeselect",
        theme_advanced_buttons2 			: "",
        theme_advanced_buttons3 			: "",
        theme_advanced_toolbar_location 	: "top",
        theme_advanced_toolbar_align 		: "left",
        theme_advanced_statusbar_location 	: "bottom",
        theme_advanced_resizing 			: false,
        font_size_style_values 				: "8pt,10px,12pt,14pt,18pt,24pt,36pt",
        init_instance_callback				: function(){
            function resizeWidth() {
                document.getElementById(tinyMCE.activeEditor.id+'_tbl').style.width='100%';
            }
            resizeWidth();
            $(window).resize(function() {
                resizeWidth();
            })
        }
    });

    //save disclaimer
    $('#welcomeMessage').click(function(e){

      e.preventDefault();
      val = $('textarea#wysiwg_full').val();
      if(val !== ''){

          $.post('<?= site_url('/settings/do_save_message/') ?>',{ t:val })
          .done(function( data ) {
              location.reload();

          });
    }

    });


</script>
