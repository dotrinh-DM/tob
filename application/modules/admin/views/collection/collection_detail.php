<style>
    .mediamgr_content {
        padding: 0;
        margin-right: 0;
        width: 1082px;
    }

    .widthTrash {
        width: 17px;
    }
    .desc-album
    {
        margin-left: 4px !important;
    }
    .desc-album p
    {
        font-weight: bold;
    }
    .listfile li a{
        float: left; padding-left: 10px;
        margin-top: 20px;
    }
</style>
<div class="mediamgr">
    <div class="mediamgr_left">
        <div class="mediamgr_content">
            <ul class="listfile">

                    <?php foreach ($collections as $collection) { ?>
                        <li>
                            <?php if($collection->link !=''){ ?>
                                <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $collection->link . '&q=100&w=300&h=300'; ?>" />
<!--                                <a class="widthTrash btn" onclick="return confirm('Are you sure?')"-->
<!--                                   href="--><?php //echo site_url("admin/collection/deleteImages/".$collection->id_images.'/'.$collection->id_collection); ?><!--">-->
<!--                                    <span class="icon-trash"></span>-->
<!--                                </a>-->
<!--                                <a class="widthTrash btn"-->
<!--                                   href="--><?php //echo site_url("admin/collection/acceptImages/".$collection->id_images.'/'.$collection->id_collection.'/'.$collection->status_img); ?><!--">-->
<!--                                    --><?php //if($collection->status_img){ ?>
<!--                                        <span class="icon-ok"></span>-->
<!--                                    --><?php //}else{ ?>
<!--                                        <span class="icon-remove"></span>-->
<!--                                    --><?php //} ?>
<!--                                </a>-->
                            <?php }else{ ?>
                                    Không có ảnh chi tiết nào!
                            <?php } ?>
                        </li>
                    <?php } ?>

            </ul>
            <br class="clearall"/>
        </div>
        <!--mediamgr_content-->
    </div><!--mediamgr_left -->
    <br class="clearall"/>
</div><!--mediamgr-->
<div class="span4 desc-album">
    <h4 class="widgettitle nomargin"><?php echo $this->lang->line('info') ?></h4>
    <div class="widgetcontent bordered">
        <p>Tên bộ sưu tập: <span class="filename"><?php echo $collection->title; ?></span></p>
        <p>Ý tưởng: <span class="filename"><?php echo $collection->idea; ?></span></p>
        <p>Uốn/Ép: <span class="filename"><?php echo $collection->curly_product; ?></span></p>
        <p>Màu nhuộm: <span class="filename"><?php echo $collection->dye_product; ?></span></p>
        <p>Tạo kiểu: <span class="filename"><?php echo $collection->style_product; ?></span></p>
        <p>Dưỡng: <span class="filename"><?php echo $collection->care_product; ?></span></p>
        <p>Kỹ thuật: <span class="filename"><?php echo $collection->technology; ?></span></p>
    </div><!--widgetcontent-->
</div>

<div class="span4 desc-album" style="width: 220px">
    <h4 class="widgettitle nomargin"><?php echo $this->lang->line('more') ?></h4>
    <div class="widgetcontent bordered">
        <p><i class="iconfa-pencil"></i> <span class="filename">
                <?php
                $time_str = strtotime   ($collection->date_collec);
                echo date('H:i:s d/m/Y',$time_str);
                ?>
            </span>
        </p>
        <p><i class="iconfa-off"> </i> <span class="filename"><?php status($collection->status_collection); ?></span></p>
    </div><!--widgetcontent-->
</div>

<div class="span4 desc-album" style="width: 430px">
    <h4 class="widgettitle nomargin"><?php echo $this->lang->line('user_tag') ?></h4>
    <table class="table table-bordered table-invoice">

        <?php
        if(count($user_tag))
        {
            for ($i=0;$i<count($user_tag);$i++){ ?>
                <tr style="height: 150px;">
                    <td class="width30">
                        <?php if($user_tag[$i]->avatar != ''){ ?>
                            <img src="<?php echo base_url().'uploads/avatars/'.$user_tag[$i]->avatar; ?>" width="120" height="120" />
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'uploads/avatars/default.png'; ?>" width="120" height="120" />
                        <?php } ?>
                    </td>
                    <td class="width70">
                        <strong><?php
                            switch($user_tag[$i]->user_type){
                                case 1: echo 'Designer: '; break;
                                case 2: echo 'Photographer: '; break;
                                case 3: echo 'Model: '; break;
                                case 4: echo 'Salon: '; break;
                            }
                            echo $user_tag[$i]->alias_name ?></strong> <br />
                        Bộ sưu tập: <?php echo $user_info_tag[$user_tag[$i]->id_user][0]->collec_number; ?>  <br />
                        Lượt xem: <?php echo $user_info_tag[$user_tag[$i]->id_user][0]->view_user; ?>  <br />
                        Bình chọn: <?php echo $user_info_tag[$user_tag[$i]->id_user][0]->vote_user; ?>  <br />
                    </td>
                </tr>
            <?php }
        } else

        { ?>
            <tr>
                No user tag!
            </tr>
        <?php }?>

    </table>
</div>




















