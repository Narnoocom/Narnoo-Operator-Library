<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Library Details</li>
        </ul>
        <h3 class="heading">Library Details</h3>
    </div>
</div>
<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Media Library Information</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class="row-fluid">
        <div class="span12">
            <div class="alert alert-info">This is <strong>version 1.1</strong> of the Narnoo media library CMS</div>
        </div>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Narnoo Account Information</h3>
    </div>
    <form>
    <div class='w-box-content cnt_a'>
        <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid span12"></div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Narnoo Operator ID:</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->operator_id;?>

                </div>
            </div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Business Name:</strong></p>
                </div>
                <div class='span9'>
                   <?=$info->operator_businessname;?>
                </div>
            </div>

            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Contact Name:</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->operator_contactname;?>
                </div>
            </div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Email</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->email;?>
                </div>
            </div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Phone</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->phone;?>
                </div>
            </div>

            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Total Images</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->image_count;?>
                </div>
            </div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Total Brochures</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->brochure_count;?>
                </div>
            </div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Total Videos</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->video_count;?>
                </div>
            </div>
            <div class="row-fluid span12">
                <div class='span3'>
                    <p class="text-info"><strong>Total Products</strong></p>
                </div>
                <div class='span9'>
                    <?=$info->description_count;?>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 well">
        <h5 class="text-info">Media library powered by: <a href="http://www.narnoo.com/" target="_blank" >Narnoo.com</a></h5>
    </div>
</div>
