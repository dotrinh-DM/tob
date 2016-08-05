<?php
$this->load->view('collection/ajax/auto_complete');
?>
<style>
    form ul li span {
        color: red;
        font-size: 9px;
    }
</style>
<script>
    jQuery(document).ready(function () {
        jQuery('#designer').on('keyup', function () {
            var value_input = jQuery(this).val();
            if(value_input.length == 0)
            {
                jQuery("#designer1").attr('value','');
            }
        });

        jQuery('#photographer').on('keyup', function () {
            var value_input = jQuery(this).val();
            if(value_input.length == 0)
            {
                jQuery("#photographer1").attr('value','');
            }
        });

        jQuery('#modelor').on('keyup', function () {
            var value_input = jQuery(this).val();
            if(value_input.length == 0)
            {
                jQuery("#modelor1").attr('value','');
            }
        });

        jQuery('#salon').on('keyup', function () {
            var value_input = jQuery(this).val();
            if(value_input.length == 0)
            {
                jQuery("#salon1").attr('value','');
            }
        });
    });
</script>
<div class="site-main album-detail" id="main">
<div class="row">
    <?php $this->load->view('layout/left'); ?>
    <div class="col-xs-9 post-image">
        <?php
        successAlert_home($this->session->flashdata('success'));
        errorAlert_home($this->session->flashdata('error'));
        if (isset($error_img)) {
            errorAlert_home($error_img);
        }
        if (isset($chooseImage)) {
            errorAlert_home($chooseImage);
        }
        if (isset($captcha_error)) {
            errorAlert_home($captcha_error);
        }
        ?>
        <h3 class="title">Gửi ảnh mới</h3>
        <p>
            Chú ý: <br/>
            Chiều rộng hình nhỏ nhất là 600 pixels và không vượt quá 1500 pixels. <br/>
            Chiều cao hình nhỏ nhất là: 500 pixels và không vượt quá 1500 pixels. <br/>
            Các định dạng cho phép jpg, jpeg, pjpeg. <br/>
            Một bộ sưu tập gồm 03 ảnh.
        </p>
        <form id="form1" class="stdform" method="post" action="<?php echo site_url('home/collection/updateCollection'); ?>" enctype="multipart/form-data">
            <ul class="form-list form-list-post">
               <?php $i = 0;
                    foreach ($collections as $collection)
                    { $i++; ?>
                        <li class="wide">
                            <label for="">Ảnh <?php echo $i; ?> </label>
                            <img src="<?php echo base_url().'uploads/photos/'.$collection->link; ?>" style="height: 40px;width: 40px;" />
                            <input type="file" name="img<?php echo $i; ?>" style="margin-left: 171px;margin-top: 10px;"/>
                            <input type="hidden" value="<?php echo $collection->id_images; ?>" name="img<?php echo $i; ?>" />
                        </li>
               <?php } ?>
                <input type="hidden" name="id_collection" value="<?php echo $collection->id_collection; ?>" />
                <li class="wide">
                    <label for="">Tiêu đề album (*)</label>
                    <input type="text" name="title_album" value="<?php echo $collection->title;  ?>" placeholder="Nhập tiêu đề album..."/>
                    <span><?php echo form_error('title_album'); ?></span>
                </li>
                 <li class="fields">
                     <div class="field">
                         <?php
                         $name = $id = '';
                         if(isset($user_info) && $user_info){
                             foreach ($user_info as $user_record)
                             {
                                 if(isset($user_record[0]->user_type) && $user_record[0]->user_type == 1)
                                 {
                                     $name = $user_record[0]->first_name.' '.$user_record[0]->last_name.' '.$user_record[0]->alias_name;
                                     $id   = $user_record[0]->id_user;;
                                 }
                             }
                         }
                         ?>
                         <label for="">Tên NTM (*)</label>
                         <input type="text" name="designer" id="designer" value="<?php echo $name; ?>" class="check-null"/>
                         <input type="hidden" value="<?php echo $id; ?>" name="user_type[]" id="designer1"/>
                     </div>

                        <div class="field">
                            <?php
                            if(isset($user_info) && $user_info){
                                $array_id_user_tag = array();
                                foreach ($user_info as $item_user)
                                {
                                    if(count($item_user) > 0) {
                                        $array_id_user_tag[] = $item_user[0]->id_user;
                                    }
                                }
                                $implode = implode($array_id_user_tag,',');
                                ?>
                                <input type="hidden" name="id_array" value="<?php echo $implode; ?>" />
                            <?php }
                            else{ ?>
                                <input type="hidden" name="id_array" value="0" />
                            <?php }
                            $name = $id = '';
                            if(isset($user_info) && $user_info){
                                foreach ($user_info as $user_record)
                                {
                                    if(isset($user_record[0]->user_type) && $user_record[0]->user_type == 2)
                                    {
                                        $name = $user_record[0]->first_name.' '.$user_record[0]->last_name.' '.$user_record[0]->alias_name;
                                        $id   = $user_record[0]->id_user;;
                                    }
                                }
                            }
                            ?>
                            <label for="">Tên nhiếp ảnh gia</label>
                            <input type="text" name="photographer" value="<?php echo $name; ?>" id="photographer"/>
                            <input type="hidden" value="<?php echo $id; ?>" name="user_type[]" id="photographer1"/>
                        </div>
                 </li>
                <li class="fields">

                        <div class="field">
                            <?php
                            $name = $id = '';
                            if(isset($user_info) && $user_info){
                                foreach ($user_info as $user_record)
                                {
                                    if(isset($user_record[0]->user_type) && $user_record[0]->user_type == 3)
                                    {
                                        $name = $user_record[0]->first_name.' '.$user_record[0]->last_name.' '.$user_record[0]->alias_name;
                                        $id   = $user_record[0]->id_user;;
                                    }
                                }
                            }
                            ?>
                            <label for="">Tên người mẫu </label>
                            <input type="text" name="modelor" value="<?php echo $name; ?>" id="modelor"/>
                            <input type="hidden" value="<?php echo $id; ?>" name="user_type[]" id="modelor1"/>
                        </div>

                    <div class="field">
                        <?php
                        $name = $id = '';
                        if(isset($user_info) && $user_info){
                            foreach ($user_info as $user_record)
                            {
                                if(isset($user_record[0]->user_type) && $user_record[0]->user_type == 4)
                                {
                                    $name = $user_record[0]->first_name.' '.$user_record[0]->last_name.' '.$user_record[0]->alias_name;
                                    $id   = $user_record[0]->id_user;
                                }
                            }
                        }
                        ?>
                        <label for="">Thực hiện salon (*)</label>
                        <input type="text" name="salon" value="<?php echo $name; ?>" id="salon"/>
                        <input type="hidden" value="<?php echo $id; ?>" name="user_type[]" id="salon1"/>
                        <span><?php echo form_error('salon'); ?></span>
                    </div>
                </li>
                <li class="wide">
                    <label for="" class="tmyt">Thuyết minh ý tưởng</label>
                    <textarea cols="30" rows="10" name="idea"><?php echo $collection->idea; ?></textarea>
                </li>
                <li class="fields">
                    <div class="field">
                        <?php
                        $curly = $dye = $style = $care = '';
                            foreach ($product_info as $item_product)
                            {
                                if($item_product->id_category == 1)
                                {
                                    $curly = $item_product->product_name;
                                }elseif($item_product->id_category == 2)
                                {
                                    $dye = $item_product->product_name;
                                }elseif($item_product->id_category == 3)
                                {
                                    $style = $item_product->product_name;
                                }else
                                {
                                    $care = $item_product->product_name;
                                }
                            }

                        ?>
                        <label for="">Sản phẩm uốn/ép </label>
                        <input type="text" name="curly" value="<?php echo $curly; ?>" id="curly"/>
                        <input type="hidden" value="<?php echo $collection->curly_product; ?>" name="curly1" id="curly1"/>
                    </div>
                    <div class="field">
                        <label for="">Sản phẩm nhuộm (*) </label>
                        <input type="text" name="dye" value="<?php echo $dye; ?>" id="dye"/>
                        <span><?php echo form_error('dye'); ?></span>
                        <input type="hidden" value="<?php echo $collection->dye_product; ?>"  name="dye1" id="dye1"/>
                    </div>
                </li>
                <li class="fields">
                    <div class="field">
                        <label for="">Sản phẩm tạo kiểu (*) </label>
                        <input type="text" name="style" value="<?php echo $style; ?>" id="style"/>
                        <span><?php echo form_error('style'); ?></span>
                        <input type="hidden" value="<?php echo $collection->style_product; ?>" name="style1" id="style1"/>
                    </div>
                    <div class="field">
                        <label for="">Sản phẩm dưỡng (*) </label>
                        <input type="text" name="care" value="<?php echo $care; ?>"/>
                        <span><?php echo form_error('care'); ?></span>
                        <input type="hidden" value="<?php echo $collection->care_product; ?>" name="care1" id="care1"/>
                    </div>
                </li>
                <li class="wide">
                    <label for="">Kỹ thuật thực hiện </label>
                    <textarea cols="30" rows="10" name="technology"><?php echo $collection->technology; ?></textarea>
                </li>
                <li class="wide">
                    <label for="">Nhập mã xác thực </label>
                    <img src="<?php echo base_url() . 'captcha.php'; ?>" alt="captcha"/>
                    <span><?php echo form_error('captcha'); ?></span>
                    <input type="text" class="captcha" name="captcha"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                </li>
                <li class="wide">
                    <label for="">&nbsp;</label>
                    <button type="submit">Xác nhận và up ảnh</button>
                </li>
            </ul>
        </form>
    </div>
</div>
</div>