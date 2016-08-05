<!--[if lte IE 7]><div class="alert-ie7">
    The browser you are using is <strong>out of date</strong>. Please <strong><a href="http://browsehappy.com/">update your browser</a></strong> or <strong><a href="http://www.google.com/chromeframe/?redirect=true">enable Google Chrome Frame</a></strong>. </div>
<![endif]-->
<div class="container wrapper">
    <header id="masthead" class="site-header">
        <div class="header-inner">
            <h1 class="site-title">
                <a class="logo text-hide" href="/" rel="home">Chuyencuatoc.vn</a>
            </h1>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <div class="menu-main-nav-container">
                    <ul id="menu-main-nav" class="menu nav-menu">
                        <?php
                        $user = $this->session->userdata('login_home');
                        if($user == null && $user['name'] == null) {
                            echo "<li id='menu-item-1' class='menu-item'><a href='/register'>Đăng ký</a></li>";
                        }
                        ?>
                        <li id="menu-item-2" class="menu-item"><a href="/xem-binh-chon">Xem & Bình chọn</a></li>
                        <li id="menu-item-3" class="menu-item"><a href="/giai-thuong">Giải thưởng</a></li>
                        <li id="menu-item-4" class="menu-item"><a href="/ban-giam-khao">Ban giám khảo</a></li>
                        <li id="menu-item-5" class="menu-item"><a href="/nha-tai-tro">Nhà tài trợ</a></li>
                        <li id="menu-item-6" class="menu-item">
                            <?php
                            if($user != null && $user['name'] != null) {
                                echo "
                            <a style='text-transform: none; padding:0px; padding-top: 3px;' href='/dang-album'>".ucfirst($user['name'])."</a>
                            <a style='padding-left: 3px; padding-right: 3px; margin: 0px; width:0px; text-decoration: none;'>|</a>
                            <a style='text-transform: none;' href='/logout'>Thoát</a>
                            ";
                            } else echo '<a href="/login">Đăng nhập/Up ảnh</a>';
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>