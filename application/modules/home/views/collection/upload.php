<?php
$this->load->view('collection/ajax/auto_complete');
?>
<style>
    form ul li span {
        color: red;
        font-size: 9px;
    }
    .ui-widget-content{
        width: 187px !important
    }

</style>
<div class="site-main listing-index" id="main">
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

            <form id="form1" class="stdform" method="post" action="<?php echo site_url('home/collection/upload'); ?>"
                  enctype="multipart/form-data">
                <ul class="form-list form-list-post">
                    <li class="wide">
                        <label for="">Ảnh 1 </label>
                        <input type="file" name="img1" id="img1" onchange="checkpress('img1')"/>
                    </li>
                    <li class="wide">
                        <label for="">Ảnh 2 </label>
                        <input type="file" name="img2" id="img2" onchange="check_change_img('img2','img1')" />
                    </li>
                    <li class="wide">
                        <label for="">Ảnh 3 </label>
                        <input type="file" name="img3" id="img3" onchange="check_change_img('img3','img1')" />
                    </li>
                    <li class="wide">
                        <label for="">Ảnh 4 </label>
                        <input type="file" name="img4" id="img4" onchange="check_change_img('img4','img1')" />
                    </li>
                    <li class="wide">
                        <label for="">Tiêu đề album (*)</label>
                        <input type="text" name="title_album" id="title_album" value="<?php echo set_value('title_album'); ?>"
                               placeholder="Nhập tiêu đề album..." onchange="checkpress('title_album')" />
                        <span><?php echo form_error('title_album'); ?></span>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Tên NTM (*)</label>
                            <input type="text" name="designer" id="designer" value="<?php echo set_value('designer'); ?>" placeholder="Tag..." onchange="checkpress('designer')" />
                            <span><?php echo form_error('designer'); ?></span>
                            <?php
                            if(isset($_POST['user_type'])){
                                $keep_user_id = $_POST['user_type'];
                            }
                            ?>
                            <input type="hidden" value="<?php if(isset($_POST['user_type'])) {echo $keep_user_id[0];} ?>" name="user_type[]" id="designer1"/>
                        </div>
                        <div class="field">
                            <label for="">Tên nhiếp ảnh gia</label>
                            <input type="text" name="photographer" value="<?php echo set_value('photographer'); ?>" id="photographer"/>
                            <input type="hidden" value="<?php if(isset($_POST['user_type'])) {echo$keep_user_id[1];} ?>" name="user_type[]" id="photographer1"/>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Tên người mẫu </label>
                            <input type="text" name="modelor" value="<?php echo set_value('modelor'); ?>" id="modelor"/>
                            <input type="hidden" value="<?php if(isset($_POST['user_type'])) {echo $keep_user_id[2];} ?>" name="user_type[]" id="modelor1"/>
                        </div>
                        <div class="field">
                            <label for="">Thực hiện salon (*)</label>
                            <input type="text" name="salon" value="<?php echo set_value('salon'); ?>" id="salon" onchange="checkpress('salon')" />
                            <input type="hidden" value="<?php if(isset($_POST['user_type'])) {echo $keep_user_id[3];} ?>" name="user_type[]" id="salon1"/>
                        </div>
                    </li>
                    <li class="wide">
                        <label for="" class="tmyt">Thuyết minh ý tưởng</label>
                        <textarea cols="30" rows="10" name="idea"><?php echo set_value('idea'); ?></textarea>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Sản phẩm uốn/ép </label>
                            <input type="text" name="curly" id="curly" value="<?php echo set_value('curly'); ?>"/>
                            <input type="hidden" value="<?php if(isset($_POST['curly1'])) {echo $_POST['curly1'];} ?>" name="curly1" id="curly1"/>
                        </div>
                        <div class="field">
                            <label for="">Sản phẩm nhuộm (*) </label>
                            <input type="text" name="dye"  id="dye" value="<?php echo set_value('dye'); ?>" onchange="checkpress('dye')" />
                            <span><?php echo form_error('dye'); ?></span>
                            <input type="hidden" value="<?php if(isset($_POST['dye1'])) {echo $_POST['dye1'];} ?>"  name="dye1" id="dye1"/>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Sản phẩm tạo kiểu (*) </label>
                            <input type="text" name="style" id="style" value="<?php echo set_value('style'); ?>" onchange="checkpress('style')" />
                            <span><?php echo form_error('style'); ?></span>
                            <input type="hidden" value="<?php if(isset($_POST['style1'])) {echo $_POST['style1'];} ?>" name="style1" id="style1"/>
                        </div>
                        <div class="field">
                            <label for="">Sản phẩm dưỡng (*) </label>
                            <input type="text" name="care" id="care" value="<?php echo set_value('care'); ?>" data-url="" onchange="checkpress('care')" />
                            <span><?php echo form_error('care'); ?></span>
                            <input type="hidden" value="<?php if(isset($_POST['care1'])) {echo $_POST['care1'];} ?>" name="care1" id="care1"/>
                        </div>
                    </li>
                    <li class="wide">
                        <label for="">Kỹ thuật thực hiện </label>
                        <textarea cols="30" rows="10" name="technology"><?php echo set_value('technology'); ?></textarea>
                    </li>
                    <li class="wide">
                        <label for="">Nhập mã xác thực </label>
                        <img src="<?php echo base_url() . 'captcha.php'; ?>" alt="captcha"/>
                        <span><?php echo form_error('captcha'); ?></span>
                        <input type="text" class="captcha" name="captcha" id="captcha" onchange="checkpress('captcha')" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br>
                    </li>
                    <li class="wide">
                        <label for="">&nbsp;</label>
                        <button onclick="return check_text('title_album,designer,dye,salon,style,care,captcha','form1','img1,img2,img3')">Xác nhận và up ảnh</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div