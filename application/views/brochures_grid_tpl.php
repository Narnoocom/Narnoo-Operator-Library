<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Promotional Brochures</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>
            <?php
            if ($brochures == FALSE):

                echo '<div class="alert alert-info">There has been an error retreiving the operator\'s brochuress. ' . $message . '</div>';

            else:
                ?>
                <div id='large_grid' class='wmk_grid'>
                    <ul>
                        <?php
                        foreach ($brochures->operator_brochures as $row):



                                    echo "<li class='thumbnail' style='position:relative; display:inline-table; margin-bottom:5px'>
                        <a href='#' rel='gallery' class='cboxElement'>
                            <img src='" . $row->preview_image_path . "' >
                        </a>
                        <p>
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
<iframe id="download" name="download" style="display:none" frameborder="0" width="0" height="0"></iframe>
