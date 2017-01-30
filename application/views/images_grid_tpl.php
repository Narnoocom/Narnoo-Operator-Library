<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Image Library</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>
            <?php
            if ($images == FALSE):

                echo '<div class="alert alert-info">There has been an error retreiving the operator\'s images. ' . $message . '</div>';

            else:
                ?>

                <div id='large_grid' class='wmk_grid'>
                    <ul>
                        <?php
                        foreach ($images->operator_images as $row):

            echo "<li class='thumbnail' style='position:relative; display:inline-table; margin-bottom:5px'>
                        <a href='" . checkImage($row->large_image_path) . "' rel='gallery' class='cboxElement'>
                            <img src='" . checkImage($row->image_400_path) . "' >
                        </a>
                        </li>";

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

<?php
function checkImage( $img ){

    $fileTypes = array('.png','.PNG','.gif','.jpeg','.GIF','.JPG','.JPEG' );
    $image = str_replace($fileTypes,'.jpg',$img);
    return $image;

}
?>
