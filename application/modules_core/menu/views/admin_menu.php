<div class="sidebar_inner">
    <div id="side_accordion" class="accordion">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                    <p><span><i class='icon-home'></i></span>
                        <span style='margin-left:10px'>Dashboard</span></p>
                </a>
            </div>
            <div class="accordion-body collapse" id="collapseOne">
                <div class="accordion-inner">
                    <ul class="nav nav-list">
                        <li><a href="<?= site_url('/dashboard/') ?>">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                    <p><span><i class='icon-user'></i></span>
                        <span style='margin-left:10px'>Member Manager</span></p>
                </a>
            </div>

            <div class="accordion-body collapse" id="collapseTwo">
                <div class="accordion-inner">
                    <ul class="nav nav-list">
                        <li class="nav-header">Members</li>
                        <li><a href="<?= site_url('/members/') ?>">Members</a></li>
                        <li><a href="<?= site_url('/members/add/') ?>">Create Member</a></li>
                        <li><a href="<?= site_url('/members/archived/') ?>">Deleted Members</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                    <p><span><i class='icon-picture'></i></span>
                        <span style='margin-left:10px'>Media Manager</span></p>
                </a>
            </div>

            <div class="accordion-body collapse" id="collapseFive">
                <div class="accordion-inner">
                    <ul class="nav nav-list">
                        <li class="nav-header">View All Media</li>
                        <li><a href="<?= site_url('/images/') ?>">Images</a></li>
                        <li><a href="<?= site_url('/videos/') ?>">Videos</a></li>
                        <li><a href="<?= site_url('/brochures/') ?>">Brochures</a></li>
                        <li><a href="<?= site_url('/descriptions/') ?>">Descriptions</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                    <p><span><i class='icon-globe'></i></span>
                        <span style='margin-left:10px'>Distributors</span></p>
                </a>
            </div>

            <div class="accordion-body collapse" id="collapseThree">
                <div class="accordion-inner">
                    <ul class="nav nav-list">
                        <li><a href="<?= site_url('/followers/') ?>">Followers</a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                    <p><span><i class='icon-info-sign'></i></span>
                        <span style='margin-left:10px'>Analytics</span></p>
                </a>
            </div>

            <div class="accordion-body collapse" id="collapseFour">
                <div class="accordion-inner">
                    <ul class="nav nav-list">
                        <li><a href="<?= site_url('/statistics/') ?>">Reports</a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapseSix" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                    <p><span><i class='icon-cog'></i></span>
                        <span style='margin-left:10px'>Settings</span></p>
                </a>
            </div>

            <div class="accordion-body collapse" id="collapseSix">
                <div class="accordion-inner">
                    <ul class="nav nav-list">
                        <li class="nav-header">Public Pages</li>
                        <li><a href="<?= site_url('/settings/message/') ?>">Opening Message</a></li>
                        <li><a href="<?= site_url('/settings/menu/') ?>">User Menu Options</a></li>
                        <li class="nav-header">Library Information Page</li>
                        <li><a href="<?= site_url('/settings/about/') ?>">Library Information</a></li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div>
