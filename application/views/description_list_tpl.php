<div class='row-fluid'>
    <div class='w-box-header'>
        <h3>Product Descriptions</h3>
    </div>
    <div class='w-box-content cnt_a'>
                <table class='table table-striped table-bordered'>
            <thread>
                <tr>
                    <th colspan="2">Product Name</th>
                </tr>
            </thread>
            <tbody>
                <?php
                if ($descriptions == FALSE):

                    echo '<tr><td colspan="2" class="alert alert-info">There has been an error retreiving the operator\'s descriptions. ' . $message . '</td></tr>';

                else:

                    foreach ($descriptions->operator_products as $row):

                        echo "<tr>
                    <td>" . $row->product_title . "</td>
                    <td><a href='";
                        echo site_url('/descriptions/text/' . $row->product_title) . "' class='btn btn-info'>View Text</a></td>
                </tr>";

                    endforeach;
                endif;
                ?>

            </tbody>
        </table>
        <?php
        if (isset($pagignation)):
            echo $pagignation;
        endif;
        ?>
    </div>
</div>
