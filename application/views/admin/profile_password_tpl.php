<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li><a href="<?= site_url('/profile/'); ?>">Profile</a> <span class="divider">/</span></li>
            <li class="active">Password Update</li>
        </ul>
        <h3 class="heading">Edit Password</h3>
    </div>
</div>
<div class="row-fluid">
    <div class='w-box-header'>
        <h3>Edit Details Details</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>
            <form action="" method="POST" id="profile_form" name="password_form">
                <div class='span12'></div>

                <div class='span12' style="margin-top: 10px">
                    <div class='span3'>
                        <p>Current Password</p>
                    </div>
                    <div class='span9'>
                        <input type='text' name="pass" id="pass" placeholder="Enter current password" />
                    </div>
                </div>

                <div class='span12'>
                    <div class='span3'>
                        <p>New Password</p>
                    </div>
                    <div class='span9'>
                        <input type='text' name="newpass" id="newpass" placeholder="Enter new password" />
                    </div>
                </div>
                <div class='span12'>
                    <div class='span3'>
                        <p>Confirm Password</p>
                    </div>
                    <div class='span9'>
                        <input type='text' name="confirmpass" id="confirmpass" placeholder="Confirm new password">
                    </div>
                </div>
                <div class='span12'>

                    <input type='submit' class="btn btn-primary" value='Update Password'>

                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery("#password_form").validate({
        rules: {
            pass: "required",
            newpass: "required",
            confirmpass: "required"
        },
        messages: {
            pass: "Please enter a password",
            newpass: "Please enter a new",
            confirmpas: "Please enter an email"
        },
        highlight: function(label) {
            jQuery(label).closest('.span9').addClass('error');
        },
        submitHandler: function(form) {
            jQuery.post('<?= site_url('/profile/savePassword/') ?>',jQuery("#password_form").serialize(), function(data) {
                
                
                //alert(data);
                //window.location.href = "<?= site_url('/staff/'); ?>";
                
            });
            
            
        }
        
    });
    
</script>


