<div class="site-main listing-index" id="main">
    <div class="row">
        <?php $this->load->view('layout/left'); ?>
        <div class="col-xs-9 album-list">
            <?php
            successAlert($this->session->flashdata('success'));
            errorAlert($this->session->flashdata('error'));
            ?>
            <h3 class="title">Danh sách album ảnh đã đăng</h3>
            <ul>
                <?php
                if(isset($collections) && count($collections) >0){
                $author = url_title($collections[0]->alias_name,'-',true);
                foreach ($collections as $collection){ ?>
                    <li class="item-album">
                        <div class="photo">
                            <div class="col-xs-3 style-space-album">
                                <a href="<?php echo site_url("photos/$author/$collection->id_of_img"); ?>">
                                    <img
                                        src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $collection->link . '&h=300&w=300'; ?>" alt=""/>
                                </a>
                                <div class="row detail">
                                    <div class="col-xs-6 title">"<?php echo $collection->title; ?>"</div>
                                    <div class="col-xs-6 view-like"><?php echo $collection->view_of_img; ?>  views </div>
                                </div>
                                <a class="tool-quick" href="<?php echo site_url("home/collection/editCollection/$collection->id_of_collec"); ?>">Sửa</a>
                                <?php if ($collection->status_admin == 1 && $collection->approve == 1) { ?>
                                    <a class="tool-quick" href="<?php echo site_url("home/collection/hideAndShowCollection/$collection->id_of_collec/$collection->approve"); ?>">Tạm ẩn</a>
                                <?php } elseif ($collection->status_admin == 1 && $collection->approve == 0) { ?>
                                    <a class="tool-quick" href="<?php echo site_url("home/collection/hideAndShowCollection/$collection->id_of_collec/$collection->approve"); ?>">Hiện</a>
                                <?php
                                } elseif ($collection->status_admin == 0 && $collection->approve == 1) { ?>
                                    <span title="Album đang chờ admin duyệt">Chờ duyệt</span>
                                <?php } elseif ($collection->status_admin == 0 && $collection->approve == 0) { ?>
                                    <a class="tool-quick" href="<?php echo site_url("home/collection/hideAndShowCollection/$collection->id_of_collec/$collection->approve"); ?>">Hiện</a>
                                <?php } ?>
                                    <a class="tool-quick" onclick="return confirm('Bạn chắc chắn không?');" href="<?php echo site_url("home/collection/delCollection/$collection->id_of_collec"); ?>">Xóa</a>
                            </div>
                        </div>
                    </li>
                <?php }
                    }else{
                    echo 'Không có album nào!';
                } ?>
            </ul>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
