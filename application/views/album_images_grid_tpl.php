<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Promotional Images</h3>
    </div>
    <div class='w-box-content cnt_a'>
        <div class='row-fluid'>
            <?php
            if ($images == FALSE):

                echo '<div class="alert alert-info">There has been an error retreiving the operator\'s images. ' . $message . '</div>';

            else:
                ?>
                <?php
                if (isset($pagignation)):
                    echo $pagignation;
                endif;
                ?>
                <div id='large_grid' class='wmk_grid'>
                    <ul>
                        <?php
                        foreach ($images->operator_albums_images as $row):
                            if ($access == 0):

                                if ($row->image_privileges == 'Public'):

                                    echo "<li class='thumbnail' style='position:relative; display:inline-table; margin-bottom:5px'>
                        <a href='#' rel='gallery' class='cboxElement'>
                            <img src='" . $row->preview_image_path . "' >
                        </a>
                        <p>
                        ";

                                    if ($isAdmin == 2):
                                        echo "<a href='#' class='btn btn-mini' title='Remove'>
                                <i class='icon-trash'></i>
                            </a>";

                                    endif;

                                    echo "<a href='#' class='btn btn-mini' title='download'>
                                <i class='icon-download-alt'></i>
                            </a>
                        </p>
                    </li>";
                                endif;

                            else:
                                echo "<li class='thumbnail' style='position:relative; display:inline-table; margin-bottom:5px'>
                        <a href='#' rel='gallery' class='cboxElement'>
                            <img src='" . $row->preview_image_path . "' >
                        </a>
                        <p>
                        ";

                                if ($isAdmin == 2):
                                    echo "<a href='#' class='btn btn-mini' title='Remove'>
                                <i class='icon-trash'></i>
                            </a>";

                                endif;

                                echo "<a href='#' class='btn btn-mini' title='download'>
                                <i class='icon-download-alt'></i>
                            </a>
                        </p>
                    </li>";
                            endif;


                        endforeach;
                        ?>

                    </ul>
                        <?php
                        if (isset($pagignation)):
                            echo $pagignation;
                        endif;
                        ?>
                <?php
                endif;
                ?>
            </div>
        </div>


    </div>



</div>