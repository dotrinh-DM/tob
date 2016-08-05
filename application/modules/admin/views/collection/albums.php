<?php $this->load->view('collection/js_in_php/search_js'); ?>
<div class="mediamgr">
    <?php
    successAlert($this->session->flashdata('success'));
    errorAlert($this->session->flashdata('error'));
    ?>
    <div class="mediamgr_left">
        <div class="mediamgr_head">
            <ul class="mediamgr_menu">
                <li class="marginleft15 filesearch">
                    <form>
                        <input type="text" value="" name="search_box" id="filekeyword" class="filekeyword" placeholder="Search album here"/>
                    </form>
                </li>
                <li class="right newfilebtn"><a href="<?php echo site_url("admin/collection/manageTrash"); ?>"
                                                class="btn"><span class="icon-trash"></span>Trash</a></li>
<!--                <li class="right newfilebtn"><a href="--><?php //echo site_url("admin/collection/uploadAlbum"); ?><!--"-->
<!--                                                class="btn btn-info"> <i class="icon-circle-arrow-up"></i> Upload New Album</a>&nbsp;&nbsp;&nbsp;</li>-->
            </ul>
            <span class="clearall"></span>
        </div>
        <!--mediamgr_head-->
        <div class="mediamgr_content" style="width: 1050px;">
            <ul class="listfile">
                <?php foreach ($collections as $collection) { ?>
                    <li>
                        <?php if ($collection->link != '') { ?>
                            <a href="<?php echo site_url("admin/collection/viewDetail/" . $collection->id_of_collec); ?>"
                               data-rel="image">
                                <img
                                    src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $collection->link; ?>"
                                    alt="<?php echo $collection->title; ?>"/>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo site_url("admin/collection/viewDetail/" . $collection->id_of_collec); ?>" data-rel="image">
                                <img <?php echo $collection->id_of_collec; ?>
                                    src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/no-img.png'; ?>"/>
                            </a>
                        <?php } ?>
                        <p class="filename"><?php echo word_limiter($collection->title, 3); ?></p>

                        <a onclick="return confirm('Are you sure?')" class="widthTrash"
                        href="<?php
                        if($this->uri->segment(3) == 'manageTrash')
                        {
                            $action = 'restoreCollection';
                            $icon = 'icon-ok';
                            $name_button = 'Restore';
                        }
                        else
                        {
                            $action = 'moveToTrash';
                            $icon = 'icon-trash';
                            $hidden = true;
                            $name_button = 'Move to trash';
                        }
                        echo site_url("admin/collection/$action/$collection->id_of_collec/$collection->status_collection"); ?>">
                         <span class="<?php echo $icon; ?>" title="<?php echo $name_button; ?>"></span>
                        </a>
                        <?php if(isset($hidden) && $hidden){?>
                            <span> Đang: </span>
                            <a href="<?php echo site_url("admin/collection/acceptCollection/$collection->id_of_collec/$collection->status_collection"); ?>">
                                <?php status($collection->status_collection); ?>
                            </a>
                        <?php } ?>

                        <?php
                        if($this->uri->segment(3) == 'manageTrash')
                        { ?>
                        <a onclick="return confirm('Are you sure?')" class="widthTrash"
                           href="<?php echo site_url("admin/collection/delete/$collection->id_of_collec/trash"); ?>" style="float: right">Del</a>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
            <br class="clearall"/>
        </div>
        <!--mediamgr_content-->
    </div>
    <!--mediamgr_left -->
    <br class="clearall"/>
    <?php echo $this->pagination->create_links(); ?>
</div><!--mediamgr-->