<!-- jquery flot -->
<script src="<?= cdn_url('lib/flot/jquery.flot.js'); ?>"></script>
<script src="<?= cdn_url('lib/flot/jquery.flot.pie.js'); ?>"></script>
<script>
    $(function() {

		

        var d2 = <?= $stat_downloads; ?>;

	
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
<script>
    $(function() {

		

        var data = <?= $media_downloads; ?>;

	
        $.plot('#pieholder', data, {
            series: {
                pie: { 
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3/4,
                       
                        background: { 
                            opacity: 0.5,
                            color: '#000'
                        }
                    }
                }
            },
            legend: {
                show: false
            }
        });

    });
</script>
<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="<?= site_url('/dashboard/'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Reports</li>
        </ul>
        <h3 class="heading">Analytic Reports - <?=$month?> / <?=$year?></h3>
        <div class="alert alert-info">Sign into your Narnoo.com account for additional detailed statistics.</div>
        <h2>Downloads for the month: <?=$monthCount;?></h2>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Daily downloads for this month</h3>
        <div class="demo-container" >
            <div id="placeholder" class="demo-placeholder" style="height:150px;"></div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <h3 class="heading">Downloads by media types</h3>
        <div id="pieholder" style="height:200px;"></div>
    </div>
    <div class="span6">
        <h3 class="heading">Downloads per user</h3>
        <?= $user_downloads ?>
    </div>
</div>
<div class="row-fluid">
<div class="span12">
    <h3 class="heading">Top 5 downloads</h3>
    <?=$top;?>
</div>
</div>

