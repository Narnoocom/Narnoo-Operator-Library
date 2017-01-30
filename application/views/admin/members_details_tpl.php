<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li><a href="<?= site_url('/members/'); ?>">Members</a> <span class="divider">/</span></li>
            <li class="active">Details</li>
        </ul>
        <h3 class="heading">Member's Details</h3>
    </div>
</div>
<div class="row-fluid">
    <div class='w-box-header'>
        <h3>Member Details</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>

            <div class='span12'></div>
            <?php if ($info->level == 2): ?>
                <div class="alert alert-info">This user is an administrator.</div>
            <?php endif; ?>
            <?php if ($info->isSuspend == 1): ?>
                <div class="alert alert-warning">This user is Suspended.</div>
            <?php endif; ?>
            <div class='span12' style="margin-top: 10px">
                <div class='span3'>
                    <p>Member Since</p>
                </div>
                <div class='span9'>
                    <input type='text' disabled='disabled' placeholder='<?= time_dmy($info->registeredDate); ?>'>
                </div>
            </div>


            <div class='span12'>
                <div class='span3'>
                    <p>Contact Name</p>
                </div>
                <div class='span9'>
                    <input type='text' disabled='disabled' placeholder='<?= $info->contact; ?>'>
                </div>
            </div>

            <div class='span12'>
                <div class='span3'>
                    <p>Business Name</p>
                </div>
                <div class='span9'>
                    <input type='text' disabled='disabled' placeholder='<?= $info->business_name; ?>'>
                </div>
            </div>
            <div class='span12'>
                <div class='span3'>
                    <p>Email</p>
                </div>
                <div class='span9'>
                    <input type='text' disabled='disabled' placeholder='<?= $info->email; ?>'>
                </div>
            </div>
            <div class='span12'>
                <div class='span3'>
                    <p>Country</p>
                </div>
                <div class='span9'>
                    <input type='text' disabled='disabled' placeholder='<?= $info->country; ?>'>
                </div>
            </div>
            <?php if ($info->level == 1): ?>
                <div class='span12'>
                    <div class='span3'>
                        <p>Privileges</p>
                    </div>
                    <div class='span9'>
                        <select id="access" name="access">
                            <option value="0"<?php
            if ($info->privilege == 0):
                echo 'selected="selected"';
            endif;
                ?>>Public Only</option>
                            <option value="1"<?php
                                if ($info->privilege == 1):
                                    echo 'selected="selected"';
                                endif;
                ?>>Public and Private</option>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <hr/>
    <?php if ($info->level == 1): ?>
    <!--<div class="row-fluid">
        <div class="span12">
            <div class='w-box-header'>
                <h3>Assign Image Album</h3>
            </div>

            <div class='w-box-content cnt_a'>


                <?= $albums; ?>


            </div>
        </div>
    </div> -->
    <?  endif;?>
    <?php if ($info->current == 1): ?>
        <div class="row-fluid">
            <div class="span12">
                <div class='w-box-header'>
                    <h3>Reset Password</h3>
                </div>

                <div class='w-box-content cnt_a'>
                    <span class="text-info">This will send an automatic email to the user with a new password.</span>  <a href='#' class='btn btn-danger' style='margin-left:15px'>Reset Member's Password</a>

                </div>
            </div>
        </div>
        <?php if ($info->isSuspend == 0): ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class='w-box-header'>
                        <h3>Suspend Member</h3>
                    </div>

                    <div class='w-box-content cnt_a'>
                        <span class="text-info">This will suspend the member's account and will not let them log in.</span>  <a href='javascript:void()' class='btn btn-danger' style='margin-left:15px' onclick="suspend('1')">Suspend Member's Account</a>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class='w-box-header'>
                        <h3>Reinstate Member</h3>
                    </div>

                    <div class='w-box-content cnt_a'>
                        <span class="text-info">This will reinstate the member's account and they will be able to log in.</span>  <a href='javascript:void()' class='btn btn-success' style='margin-left:15px' onclick="suspend('0')">Reinstate Member's Account</a>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row-fluid">
            <div class="span12">
                <div class='w-box-header'>
                    <h3>Delete Member</h3>
                </div>

                <div class='w-box-content cnt_a'>
                    <span class="text-info">This will delete the member's account and will not let them log in.</span>  <a href='javascript:void()' class='btn btn-danger' style='margin-left:15px' onclick="deleteMember('<?= $info->id; ?>')">Delete Member's Account</a>

                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row-fluid">
            <div class="span12">
                <div class='w-box-header'>
                    <h3>Reinstate Member's Account</h3>
                </div>

                <div class='w-box-content cnt_a'>
                    <span class="text-info">This will reinstate the member's account and they will have access again.</span>  <a href='javascript:void()' class='btn btn-success' style='margin-left:15px' onclick="restoreMember('<?= $info->id; ?>')">Reinstate Member's Account</a>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
<?php if ($info->current == 1): ?>
        $( "#access" ).change(function() {
                        
            val = $('#access').val();
            $.post('<?= site_url('/members/privilege/') ?>',{ i:"<?= $info->id; ?>", p:val });
                        
                    
        });

                
        function suspend(v) {
                    
            $.post('<?= site_url('/members/suspend/') ?>',{i:"<?= $info->id; ?>",t:v})
            .done( function(){
                location.reload();
            });
                
        };
        function deleteMember(v){
        
            $.post('<?= site_url('/members/delete/'); ?>',{i:v}, function(data){
                
                if(data=='success'){
                    location.reload();
                }
                    
                
            });
         
        }
        
        $( "#album_name" ).change(function() {
                        
            val = $('#album_name').val();
            $.post('<?= site_url('/members/album/') ?>',{ i:"<?= $info->id; ?>", a:val });
                       
                    
        });
       
       
        $( "#album_update" ).change(function() {
                        
            val = $('#album_update').val();
            $.post('<?= site_url('/members/albumUpdate/') ?>',{ i:"<?= $info->id; ?>", a:val });
                       
                    
        });
        
            
        $( "#albumChange" ).click(function() {
            
           
            $.ajax({
                type: "POST",
                url: "<?=site_url('/members/getAlbums/')?>"
            })
            .done(function( data ) {
                $('#ajax-album').html(data);
            });
                       
                    
        });
<?php else: ?>    
        function restoreMember(v){
            
            $.post('<?= site_url('/members/restore/'); ?>',{i:v}, function(data){
                    
                if(data=='success'){
                    location.reload();
                }
                        
                    
            });
            
        }
<?php endif; ?>
</script>


