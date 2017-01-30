<header>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?=site_url('/dashboard/');?>"><span style="font-size:12px"><?=$this->config->item('business_name');?></span></a>
                <ul class="nav user_menu pull-right">
                    <li class="divider-vertical hidden-phone hidden-tablet"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$name?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=site_url('/profile/');?>">Details</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=site_url('/login/logout/')?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</header>
