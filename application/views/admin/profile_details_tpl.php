<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Profile</li>
        </ul>
        <h3 class="heading">Member's Details</h3>
    </div>
</div>
<div class="row-fluid">
    <div class='w-box-header'>
        <h3>Profile Details</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>
            <form action="" method="POST" id="profile_form" name="profile_form">
                <div class='span12'></div>

                <div class='span12' style="margin-top: 10px">
                    <div class='span3'>
                        <p>Contact Name</p>
                    </div>
                    <div class='span9'>
                        <input type='text' name="contact" id="contact" value='<?= $info->contact; ?>'>
                    </div>
                </div>

                <div class='span12'>
                    <div class='span3'>
                        <p>Business Name</p>
                    </div>
                    <div class='span9'>
                        <input type='text' name="business" id="business" value='<?= $info->business_name; ?>'>
                    </div>
                </div>
                <div class='span12'>
                    <div class='span3'>
                        <p>Email</p>
                    </div>
                    <div class='span9'>
                        <input type='text' name="email" id="email" value='<?= $info->email; ?>'>
                    </div>
                </div>
                <div class='span12'>

                    <input type='submit' class="btn btn-primary" value='Update'>

                </div>
            </form>
        </div>
    </div>
    <hr/>
    <div class='w-box-header'>
        <h3>Update Password</h3>
    </div>

    <div class='w-box-content cnt_a'>
        <a href='<?= site_url('/profile/password/'); ?>' class='btn btn-info' style='margin-left:15px'>Update Password</a>

    </div>

</div>
<script type="text/javascript">
    jQuery("#profile_form").validate({
        rules: {
            contact: "required",
            business: "required",
            email: "required"
        },
        messages: {
            contact: "Please enter a contact name",
            business: "Please enter a business name",
            email: "Please enter an email"
        },
        highlight: function(label) {
            jQuery(label).closest('.span9').addClass('error');
        },
        submitHandler: function(form) {
            jQuery.post('<?= site_url('/profile/save/') ?>',jQuery("#profile_form").serialize(), function(data) {
                
                
                //alert(data);
                //window.location.href = "<?= site_url('/staff/'); ?>";
                
            });
            
            
        }
        
    });
    
</script>


