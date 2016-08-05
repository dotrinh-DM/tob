<?php
successAlert_home($this->session->flashdata('success'));
errorAlert_home($this->session->flashdata('error'));
$avatar_link = base_url().'uploads/avatars/';
?>
<div class="site-main home-index" id="main">
    <?php if(isset($images_banner) && $images_banner != null) echo $images_banner; ?>

    <div class="row">
        <div class="col-xs-6">
            <div class="item color-violet">
                <div class="title">
                    Gương mặt <br/>
                    <span>Nhà tạo mẫu</span>
                </div>
                <?php
                if(isset($ntm) && $ntm != null) {
                    foreach($ntm as $key) {
                        $name = $key['first_name'].$key['last_name'];
                        if($key['avatar'] != null) {
                            $image = $avatar_link.$key['avatar'];
                        } else {
                            $image = $avatar_link.'default.png';
                        }
                ?>
                        <div class="photo">
                            <a href="/u/<?php echo $key['id_user'].'/'.url_title($key['alias_name']); ?>" title="<?php echo $name; ?>"><img src="<?php echo getPhotoThumbSrc($image, 300, 300) ?>" alt="<?php echo $name ?>" /></a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="item color-pink">
                <div class="title">
                    Gương mặt <br/>
                    <span>Salon tiêu biểu</span>
                </div>
                <?php
                if(isset($slt) && $slt != null) {
                    foreach($slt as $key) {
                        $name = $key['first_name'].$key['last_name'];
                        if($key['avatar'] != null) {
                            $image = $avatar_link.$key['avatar'];
                        } else {
                            $image = $avatar_link.'default.png';
                        }
                        ?>
                        <div class="photo"><a href="/u/<?php echo $key['id_user'].'/'.url_title($key['alias_name']); ?>" title="<?php echo $name; ?>">
                                <img src="<?php echo getPhotoThumbSrc($image, 300, 300) ?>" alt="<?php echo $name ?>"/>
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="item color-lightblue">
                <div class="title">
                    Gương mặt <br/>
                    <span>Người mẫu</span>
                </div>
                <?php
                if(isset($nm) && $nm != null) {
                    foreach($nm as $key) {
                        $name = $key['first_name'].$key['last_name'];
                        if($key['avatar'] != null) {
                            $image = $avatar_link.$key['avatar'];
                        } else {
                            $image = $avatar_link.'default.png';
                        }
                        ?>
                        <div class="photo"><a href="/u/<?php echo $key['id_user'].'/'.url_title($key['alias_name']); ?>" title="<?php echo $name; ?>">
                                <img src="<?php echo getPhotoThumbSrc($image, 300, 300) ?>" alt="<?php echo $name ?>" />
                            </a></div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="item  color-blue">
                <div class="title">
                    Gương mặt <br/>
                    <span>Nhiếp ảnh gia</span>
                </div>
                <?php
                if(isset($nag) && $nag != null) {
                    foreach($nag as $key) {
                        $name = $key['first_name'].$key['last_name'];
                        if($key['avatar'] != null) {
                            $image = $avatar_link.$key['avatar'];
                        } else {
                            $image = $avatar_link.'default.png';
                        }
                        ?>
                        <div class="photo"><a href="/u/<?php echo $key['id_user'].'/'.url_title($key['alias_name']); ?>" title="<?php echo $name; ?>">
                                <img src="<?php echo getPhotoThumbSrc($image, 300, 300) ?>" alt="<?php echo $name ?>" />
                            </a></div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="item color-grey text news_home">
                <?php
                if(isset($news) && count($news) > 0) {
                    foreach($news as $key){
                        $link = 'news/'.$key['alias'];
                        echo "<p>- <a href='$link'>".ucfirst(word_limiter(decodeStr($key['title']),13)).'</a></p>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="item color-red video">
                <div class="title">
                    Chuyện của tóc <br/>
                    <span>Videos</span>
                </div>
                <div class="photo"><a target="_blank" href="<?php echo $link_youtube; ?>"> <img src="<?php echo base_url(); ?>public/home/images/home_21.png" alt=""/></a></div>
                <div class="photo"><a target="_blank" href="<?php echo $link_youtube; ?>"> <img src="<?php echo base_url(); ?>public/home/images/home_22.png" alt=""/></a></div>
            </div>
        </div>
    </div>
</div>