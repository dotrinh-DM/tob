<div class="site-main album-detail" id="main">
    <div class="menu-filter">
        <ul>
            <li>
                <select name="ntm" id="ntm" onchange="load_collection('ntm')">
                    <option value="">Xem theo NTM</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 1) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
            <li>
                <select name="salon" id="salon" onchange="load_collection('salon')">
                    <option value="">Xem theo Salon</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 4) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
            <li>
                <select name="nm" id="nm" onchange="load_collection('nm')">
                    <option value="">Xem theo Người mẫu</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 3) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
            <li>
                <select name="nag" id="nag" onchange="load_collection('nag')">
                    <option value="">Xem theo Nhiếp ảnh gia</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 2) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
        </ul>
    </div>
    <div class="photo-detail-container">
        <div class="col-xs-4 profile">
            <?php
            /*
             * Nhà tạo mẫu > Salon > Người mẫu > Nhiếp ảnh gia
             * Stylist > Salon > Model > Photographer
             * */
            ?>

            <?php if ($stylist_info) : ?>
            <div class="row ntm-profile">
                <div class="col-xs-8">
                    <p>Nhà tạo mẫu: <strong><a href="<?php echo site_url('/u/'.$stylist_info['user_id'].'/'.url_title($stylist_info['user_alias']),'-',true) ?>"><?php echo $stylist_info['user_alias'] ?></a></strong></p>
                    <p>Bộ sưu tập: <?php echo $stylist_info['stat_collection_number'] ?></p>
                    <p>Xem: <?php echo $stylist_info['stat_view_count'] ?></p>
                    <p>Bình chọn: <?php echo $stylist_info['stat_vote_count'] ?></p>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo site_url('/u/'.$stylist_info['user_id'].'/'.url_title($stylist_info['user_alias']),'-',true) ?>"><img src="<?php echo $stylist_info['user_avatar'] ?>" alt="<?php echo $stylist_info['user_alias'] ?>"/></a>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($salon_info) : ?>
                <div class="row ntm-profile">
                    <div class="col-xs-8">
                        <p>Salon: <strong><a href="<?php echo site_url('/u/'.$salon_info['user_id'].'/'.url_title($salon_info['user_alias'],'-',true)) ?>"><?php echo $salon_info['user_alias'] ?></a></strong></p>
                        <p>Bộ sưu tập: <?php echo $salon_info['stat_collection_number'] ?></p>
                        <p>Xem: <?php echo $salon_info['stat_view_count'] ?></p>
                        <p>Bình chọn: <?php echo $salon_info['stat_vote_count'] ?></p>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo site_url('/u/'.$salon_info['user_id'].'/'.url_title($salon_info['user_alias'],'-',true)) ?>"><img src="<?php echo $salon_info['user_avatar'] ?>" alt="<?php echo $salon_info['user_alias'] ?>"/></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($model_info) : ?>
                <div class="row ntm-profile">
                    <div class="col-xs-8">
                        <p>Người mẫu: <strong><a href="<?php echo site_url('/u/'.$model_info['user_id'].'/'.url_title($model_info['user_alias'],'-',true)) ?>"><?php echo $model_info['user_alias'] ?></a></strong></p>
                        <p>Bộ sưu tập: <?php echo $model_info['stat_collection_number'] ?></p>
                        <p>Xem: <?php echo $model_info['stat_view_count'] ?></p>
                        <p>Bình chọn: <?php echo $model_info['stat_vote_count'] ?></p>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo site_url('/u/'.$model_info['user_id'].'/'.url_title($model_info['user_alias'],'-',true)) ?>"><img src="<?php echo $model_info['user_avatar'] ?>" alt="<?php echo $model_info['user_alias'] ?>"/></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($photographer_info) : ?>
                <div class="row ntm-profile">
                    <div class="col-xs-8">
                        <p>Nhiếp ảnh gia: <strong><a href="<?php echo site_url('/u/'.$photographer_info['user_id'].'/'.url_title($photographer_info['user_alias'],'-',true)) ?>"><?php echo $photographer_info['user_alias'] ?></a></strong></p>
                        <p>Bộ sưu tập: <?php echo $photographer_info['stat_collection_number'] ?></p>
                        <p>Xem: <?php echo $photographer_info['stat_view_count'] ?></p>
                        <p>Bình chọn: <?php echo $photographer_info['stat_vote_count'] ?></p>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo site_url('/u/'.$photographer_info['user_id'].'/'.url_title($photographer_info['user_alias'],'-',true)) ?>"><img src="<?php echo $photographer_info['user_avatar'] ?>" alt="<?php echo $photographer_info['user_alias'] ?>"/></a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="thongtin-sanpham">
                <h4>Thông tin sản phẩm</h4>
                <p style="text-align: justify">
                    <?php //var_dump($product_info); die;
                    foreach ($product_info as $pro_item)
                    {
                        if($pro_item->id_category == 1)
                        { ?>
                            <ul class="tooltip_brand">
                                <li>Uốn / Ép: <a href="/uploads/brands/<?php echo $pro_item->image; ?>" class="preview" title="Hãng: <?php echo $pro_item->brand_name; ?>"><?php echo ucfirst($pro_item->product_name); ?></a></li><br/>
                        <?php }elseif($pro_item->id_category == 2){ ?>
                                <li> Màu nhuộm: <a href="/uploads/brands/<?php echo $pro_item->image; ?>" class="preview" title="Hãng: <?php echo $pro_item->brand_name; ?>"><?php echo ucfirst($pro_item->product_name); ?></a></li><br/>
                        <?php }elseif($pro_item->id_category == 3){ ?>
                                <li>Duong: <a href="/uploads/brands/<?php echo $pro_item->image; ?>" class="preview" title="Hãng: <?php echo $pro_item->brand_name; ?>"><?php echo ucfirst($pro_item->product_name); ?></a></li><br/>
                       <?php }else{ ?>
                                <li>Tao kieu: <a href="/uploads/brands/<?php echo $pro_item->image; ?>" class="preview" title="Hãng: <?php echo $pro_item->brand_name; ?>"><?php echo ucfirst($pro_item->product_name); ?></a></li><br/>
                            </ul>
                        <?php }
                    }?>
                    Thuyết minh kỹ thuật: <br/><br/>
                    <?php echo $collections[0]->technology; ?>
                </p>
            </div>
        </div>
        <?php
        $authors = url_title($author[0]->alias_name,'-',true); ?>
        <div class="col-xs-8 album-binhchon ">
            <div class="album-photo">
                <?php if(!$rotate){ ?>
                    <div id="left-detail" >
                        <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[0]->link . '&q=100&w=400&h=600'; ?>"/>
                    </div>
                    <div id="right-detail">
                        <div class="right-sub-img right-sub-img-border-bottom">
                           <a href="<?php $id_of_image = $the_same_images[1]->id_images; echo site_url("photos/$authors/$id_of_image"); ?>">
                               <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[1]->link . '&q=100&w=200&h=200'; ?>"/>
                           </a>
                        </div>
                        <div class="right-sub-img right-sub-img-border-bottom">
                            <a href="<?php $id_of_image = $the_same_images[2]->id_images; echo site_url("photos/$authors/$id_of_image"); ?>">
                               <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[2]->link . '&q=100&w=200&h=200'; ?>"/> </a>
                        </div>
                        <div class="clr"></div>
                        <div class="right-sub-img">
                            <a href="<?php $id_of_image = $the_same_images[3]->id_images; echo site_url("photos/$authors/$id_of_image"); ?>">
                              <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[3]->link . '&q=100&w=200&h=200'; ?>"/></a>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div id="top-detail">
                        <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[0]->link . '&q=100&w=600&h=400'; ?>"/>
                        <!--img src="<?php echo base_url() . 'uploads/photos/' . $the_same_images[0]->link ?>" alt=""/-->
                    </div>
                    <div id="bottom-detail">
                        <div class="sub-images-detail">
                            <a href="<?php $id_of_image = $the_same_images[1]->id_images; echo site_url("photos/$authors/$id_of_image"); ?>">
                                <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[1]->link . '&q=100&w=200&h=200'; ?>"/>
                            </a>
                        </div>
                        <div class="sub-images-detail">
                            <a href="<?php $id_of_image = $the_same_images[2]->id_images; echo site_url("photos/$authors/$id_of_image"); ?>">
                                <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[2]->link . '&q=100&w=200&h=200'; ?>"/> </a>
                        </div>
                        <div class="sub-images-detail">
                            <a href="<?php $id_of_image = $the_same_images[3]->id_images; echo site_url("photos/$authors/$id_of_image"); ?>">
                                <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $the_same_images[3]->link . '&q=100&w=200&h=200'; ?>"/></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="col-xs-7" style="margin-top: 10px;">
                    <div class="fb-like" data-href="<?php echo current_url(); ?>" data-width="200px" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                </div>
                <div class="col-xs-5 binhchon" style="margin-top: 10px;">
                    Bình chọn bằng SMS: TOB 2013 gửi 6335
                </div>
            </div>
        <?php $this->load->view('collection/facebook'); ?>
        </div>
    </div>


</div>