<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Followers</li>
        </ul>
        <h3 class="heading">Tourism Distributors</h3>
    </div>
</div>
<div class="row-fluid">
    <div class='w-box-header'>
        <h3>Distributor's List</h3>
    </div>
    <div class='w-box-content'>
        <table class='table table-striped'>
            <thread>
                <tr>
                    <th>Business Name</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Post Code</th>
                    <th>URL</th>
                </tr>
            </thread>
            <body>
                <?php

                if ($info == FALSE):

                    echo '<tr><td colspan="2" class="alert alert-info">There has been an error retreiving the your followers list. </td></tr>';

                else:



                    foreach ($info->distributors as $row):
                        echo '<tr>
                    <td>' . $row->business_name . '</td>
                    <td>' . $row->country . '</td>
                    <td>' . $row->state . '</td>
                    <td>' . $row->postcode . '</td>
                    <td><a href="' . $row->url . '" target="_blank">' . $row->url . '</a></td>
                </tr>';
                    endforeach;

                endif;
                ?>


        </table>
    </div>

    <!--
    <hr/>
    <div class='row-fluid'>
        <div class='w-box-header'>
            <h3><span><i class='icon-list'></i></span>
            <span style='margin-left:10px'>Find More Distributors</span></h3>
        </div>
        <div class='w-box-content cnt_a'>
            <a href='#' class='btn btn-danger' style='margin-left:10px'>Get Distributors</a>
        </div>

    -->

</div>
