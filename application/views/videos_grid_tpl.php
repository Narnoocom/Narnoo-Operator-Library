<div class="row-fluid">
    <div class="span12 alert alert-warning hidden-desktop hidden-print">
        You can not download videos to mobile devices. Please try from a desktop computer.
    </div>
</div>
<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Promotional Videos</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>
            <?php
            if ($videos == FALSE):

                echo '<div class="alert alert-info">There has been an error retreiving the operator\'s videos. </div>';

            else:
                ?>
                <div id='large_grid' class='wmk_grid'>
                    <ul>
                        <?php
                        foreach ($videos->operator_videos as $row):


                                    echo "<li class='thumbnail' style='position:relative; display:inline-table; margin-bottom:5px'>
                        <a href='#' rel='gallery' class='cboxElement'>
                            <img src='" . $row->video_pause_image_path . "' >
                        </a>
                        </li>
                        ";



                        endforeach;
                        ?>
                    </ul>

                <?php
                endif;
                ?>
            </div>
        </div>


    </div>
</div>
<iframe id="download" name="download" style="display:none" frameborder="0" width="0" height="0"></iframe>
