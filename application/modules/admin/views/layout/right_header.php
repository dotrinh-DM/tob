<div class="rightpanel">
<div class="headerpanel">
    <a href="" class="showmenu"></a>
    <div class="headerright">
<!--        <div class="dropdown notification">-->
<!--            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">-->
<!--                <span class="iconsweets-globe iconsweets-white"></span>-->
<!--            </a>-->
<!--            <ul class="dropdown-menu">-->
<!--                <li class="nav-header">Notifications</li>-->
<!--                <li>-->
<!--                    <a href="">-->
<!--                        <strong>3 people viewed your profile</strong><br/>-->
<!--                        <img src="img/thumbs/thumb1.png" alt=""/>-->
<!--                        <img src="img/thumbs/thumb2.png" alt=""/>-->
<!--                        <img src="img/thumbs/thumb3.png" alt=""/>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li><a href=""><span class="icon-envelope"></span> New message from <strong>Jack</strong>-->
<!--                        <small class="muted"> - 19 hours ago</small>-->
<!--                    </a></li>-->
<!--                <li><a href=""><span class="icon-envelope"></span> New message from <strong>Daniel</strong>-->
<!--                        <small class="muted"> - 2 days ago</small>-->
<!--                    </a></li>-->
<!--                <li><a href=""><span class="icon-user"></span> <strong>Bruce</strong> is now following you-->
<!--                        <small class="muted"> - 2 days ago</small>-->
<!--                    </a></li>-->
<!--                <li class="viewmore"><a href="">View More Notifications</a></li>-->
<!--            </ul>-->
<!--        </div>-->
        <!--dropdown-->

        <div class="dropdown userinfo">
            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi,
                <?php $username = $this->session->userdata("login_info"); echo  $username['name']; ?></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()."admin/account/edit/".$username['id']; ?>"><span class="icon-wrench"></span> Account Settings</a></li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url() ?>admin/login/logout"><span class="icon-off"></span>
                        Sign Out</a>
                </li>
            </ul>
        </div>
        <!--dropdown-->
    </div>
    <!--headerright-->

</div><!--headerpanel-->
<div class="breadcrumbwidget">
    <ul class="skins">
        <li><a href="default" class="skin-color default"></a></li>
        <li><a href="orange" class="skin-color orange"></a></li>
        <li><a href="dark" class="skin-color dark"></a></li>
        <li>&nbsp;</li>
        <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
        <li class="wide"><a href="" class="skin-layout wide"></a></li>
    </ul>
    <!--skins-->
<!--    <ul class="breadcrumb">-->
<!--        <li><a href="">Trang chủ</a><span class="divider">hhh</span></li>-->
<!--    </ul>-->
</div>

<div class="pagetitle">
    <h1><?php echo $heading; ?></h1>
</div><!--pagetitle-->
    <div class="maincontent">
        <div class="contentinner content-dashboard">
            <div class="row-fluid">