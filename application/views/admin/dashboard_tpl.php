<!-- jquery flot -->
<script src="<?= cdn_url('lib/flot/jquery.flot.js'); ?>"></script>
<script>
    $(function() {



        var d2 = <?=$stat_downloads;?>;


        $.plot("#placeholder", [
            {   color: '#45A7ED',
                label: "Downloads",
                data: d2 ,
                bars: {
                    show: true,

                   fillColor: "rgba(69, 167, 237, 0.8)",
                   align: "center"


                }
            }
        ],{

            yaxis: {
                min: 0
            },
            xaxis: {
                tickSize: 1,
                axisLabel: "Day"
            },
            grid:{

                hoverable: true
            }


        });

    });
</script>
<div class="row-fluid">
    <h3 class="heading"><i class="icon-home"></i> Dashboard</h3>
    <div class="span12">
        <ul class="dshb_icoNav tac">
            <li><a href="<?= site_url('/members/') ?>" style="background-image: url(<?= cdn_url('img/gCons/agent.png') ?>)"><span class="label label-info"><?= $memberCount; ?></span> Users</a></li>
            <li><a href="<?= site_url('/followers/') ?>" style="background-image: url(<?= cdn_url('img/gCons/multi-agents.png') ?>)">Distributors</a></li>
            <li><a href="<?= site_url('/statistics/') ?>" style="background-image: url(<?= cdn_url('img/gCons/pie-chart.png') ?>)">Reports</a></li>
            <li><a href="<?= site_url('/settings/about/') ?>" style="background-image: url(<?= cdn_url('img/gCons/configuration.png') ?>)">Settings</a></li>
        </ul>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Daily Downloads for this month</h3>
        <div class="demo-container" >
            <div id="placeholder" class="demo-placeholder" style="height:150px;"></div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Member's List</h3>
        <div class='w-box-header'>
            <h3><span><i class='icon-list'></i></span>
                <span style='margin-left:10px'>Your Media Library Members</span></h3>
        </div>
        <div class='w-box-content'>
            <table class='table table-striped'>
                <thread>
                    <tr>
                        <th>Name</th>
                        <th>Last Logged In</th>
                        <th>Business Name</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thread>
                <body>
                    <?php
                    if ($memberCount > 0):


                        foreach ($info as $row):
                            if ($row['level'] !== '2'):


                                echo "<tr>
                    <td>" . $row['contact'] . "</td>
                    <td>" . $row['loggedIn'] . "</td>
                    <td>" . $row['business_name'] . "</td>
                    <td>";
                                if ($row['privilege'] == 0):
                                    echo "<span class='label label-info'>Public Access</span>";
                                else:
                                    echo "<span class='label label-info'>Full Access</span>";
                                endif;
                                echo "</td>
                    <td>
                        <a href='";
                                echo site_url('/members/details/' . $row['id']);
                                echo "' style=\"margin-left:5px\"><i class=\"icon-edit\"></i></a>
                        <a href='#' style=\"margin-left:5px\"><i class=\"icon-trash\"></i></a>
                    </td>
                </tr>";

                            endif;


                        endforeach;

                    else:
                        echo "<tr>
                            <td colspan=5>You have no members.</td>
                            </tr>";
                    endif;
                    ?>
            </table>
        </div>
    </div>
