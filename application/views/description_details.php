<? $row = $text->text; ?>
<div class='row-fluid'>
    <div class='w-box-header'>
        <h3><?= $text->product_title; ?> Text</h3>
    </div>

    <div class='w-box-content cnt_a'>

        <div class='row-fluid'>
            <?php
            if ($text == FALSE):

                echo '<div class="alert alert-info">There has been an error retreiving the operator\'s text description. ' . $message . '</div>';

            else:
                ?>
                <div class='span12'></div>

                <h3 class="text-info">50 word description:</h3>
                <hr/>
    <? echo $row->word_50; ?>



                <hr/>
                <h3 class="text-info">100 word description:</h3>
                <hr/>
    <? echo $row->word_100; ?>

                <hr/>

                <h3 class="text-info">150 word description:</h3>
                <hr/>
                <? echo $row->word_150; ?>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>