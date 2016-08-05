<div class="site-main listing-index" id="main">
    <div class="row">
        <?php $this->load->view('layout/left'); ?>
        <div class="col-xs-9 album-list">
            <?php
            successAlert($this->session->flashdata('success'));
            errorAlert($this->session->flashdata('error'));
            ?>

            <h3 class="title">Danh sách album ảnh được tag</h3>
            <ul>
                <?php
                //var_dump($collections); die;
                $user = $this->session->userdata('login_home');
                $alias_name = url_title($user['name'],'-',true);
                if(isset($collections) && count($collections) >0){
                    foreach ($collections as $collection){ ?>
                        <li class="item-album">
                            <div class="photo">
                                <div class="col-xs-3">
                                    <a href="<?php echo site_url("photos/$alias_name/$collection->id_of_img"); ?>">
                                        <img src="<?php echo base_url() . 'timthumb.php?src='.base_url().'uploads/photos/'.$collection->link.'&h=300&w=300'; ?>" alt=""/>
                                    </a>
                                    <div class="row detail">
                                        <div class="col-xs-6 title">"<?php echo $collection->title; ?>"</div>
                                    </div>
                                    <?php if($collection->status_tag == 0){ ?>
                                        <a class="tool-quick-1" href="<?php echo site_url("home/collection/accept/$collection->id_tag/$collection->status_tag"); ?>">Xác nhận</a>
                                    <?php } ?>
                                    <a class="tool-quick-2" href="<?php echo site_url("home/collection/deny/$collection->id_tag"); ?>">Bỏ tag</a>
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