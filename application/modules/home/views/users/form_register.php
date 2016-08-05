<?php
    $district = '';
    if(isset($dist)) { $district = $dist;}
?>
<script type="text/javascript">
    var ckeck_dist = '<?php echo $district; ?>';
</script>
<div class="site-main register-index">
    <?php if(isset($images_banner) && $images_banner != null) echo $images_banner; ?>
    <h3 class="title">Đăng ký</h3>
    <form class="frmuser" id="frmuser" method="post" name="frm_register" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-8">
                <ul class="form-list form-list-register">
                    <li class="fields">
                        <div class="field">
                            <label for="">Email truy nhập: </label>
                            <input type="text" name="email" id="email" onchange="checkpress('email')" value="<?php echo set_value('email', ''); ?>" /><em>*</em>
                            <?php echo "<small style='color:tomato'>".form_error('email')."</small>"; ?>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Mật khẩu: </label>
                            <input type="password" name="pass" id="pass" onchange="checkpress('pass')" /><em>*</em>
                            <?php echo "<small style='color:tomato'>".form_error('pass')."</small>"; ?>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Gõ lại mật khẩu: </label>
                            <input type="password" name="repeat_pass" id="repeat_pass" onchange="checkpress('repeat_pass')" /><em>*</em>
                            <?php echo "<small style='color:tomato'>".form_error('repeat_pass')."</small>"; ?>
                        </div>
                    </li>
                    <li class="wide">
                        <label for="">Bạn là: </label>
                        <div class="group-radio">
                            <div class="radioitem">
                                <input type="radio" id="rd1" name="select_work" value="1" <?php echo set_radio('select_work', '1',TRUE); ?> /> <label for="rd1">Nhà tạo mẫu</label>
                            </div>
                            <div class="radioitem">
                                <input type="radio" id="rd2" name="select_work" value="3" <?php echo set_radio('select_work', '3'); ?> /> <label for="rd2">Người mẫu</label>
                            </div>
                            <div class="radioitem">
                                <input type="radio" id="rd3" name="select_work" value="4" <?php echo set_radio('select_work', '4'); ?> /> <label for="rd3">Salon tóc</label>
                            </div>
                            <div class="radioitem">
                                <input type="radio" id="rd4" name="select_work" value="2" <?php echo set_radio('select_work', '2'); ?> /> <label for="rd4">Nhiếp ảnh gia</label>
                            </div>
                        </div>

                    </li>
                    <li class="wide">
                        <label for="">Tên / Nghệ danh: </label>
                        <input type="text" name="as" id="as" value="<?php echo set_value('as', ''); ?>" onchange="checkpress('as')" /><em>*</em>
                        <?php echo "<small style='color:tomato'>".form_error('as')."</small>"; ?>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Họ và tên đệm:  </label>
                            <input type="text" name="subname" id="subname" value="<?php echo set_value('subname', ''); ?>" />
                            <?php echo "<small style='color:tomato'>".form_error('subname')."</small>"; ?>
                        </div>
                        <div class="field">
                            <label for="">Tên: </label>
                            <input type="text" name="name" id="name" value="<?php echo set_value('name', ''); ?>" />
                            <?php echo "<small style='color:tomato'>".form_error('name')."</small>"; ?>
                        </div>
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Di động:  </label>
                            <input type="text" name="phone" id="phone" value="<?php echo set_value('phone', ''); ?>" onchange="checkpress('phone')" /><em>*</em>
                            <?php echo "<small style='color:tomato'>".form_error('phone')."</small>"; ?>
                        </div>
                        <div class="field">
                            <label for="">Tên Facebook: </label>
                            <input type="text" name="fbname" id="fbname" value="<?php echo set_value('fbname', ''); ?>" />
                        </div>
                    </li>
                    <li class="wide">
                        <label for="">Link Facebook: </label>
                        <input type="text" name="fblink" id="fblink" value="<?php echo set_value('fblink', ''); ?>" />
                    </li>
                    <li class="wide">
                        <label for="">Địa chỉ: </label>
                        <input type="text" name="address" id="address" value="<?php echo set_value('address', ''); ?>" />
                    </li>
                    <li class="fields">
                        <div class="field">
                            <label for="">Thành phố:  </label>
                            <select name="city" id="city" onchange="loadData(this.value)">
                                <option value="" <?php echo set_select('city', ''); ?>>Choose One</option>
                                <?php
                                if(isset($province_arr) && count($province_arr) > 0) {
                                    foreach($province_arr as $key) {
                                        ?>
                                        <option value="<?php echo $key['provinceid']; ?>" <?php echo set_select('city', $key['provinceid']); ?>><?php echo $key['name']; ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select><em>*</em>
                            <?php echo "<small style='color:tomato'>".form_error('city')."</small>"; ?>
                        </div>

                        <div class="field f-state">
                            <label for="">Quận: </label>
                            <span class="div_dist">
                                <select name="district" id="district" disabled title="Choose One City">
                                    <option id="first_dist" value="" <?php echo set_select('district', ''); ?>>Choose One</option>
                                </select>
                            </span><em>*</em>
                            <?php echo "<small style='color:tomato'>".form_error('district')."</small>"; ?>
                        </div>
                    </li>
                    <li class="wide">
                        <label for="">Kỹ thuật thực hiện </label>
                        <textarea name="introduce" id="introduce" cols="30" rows="10"><?php echo set_value('introduce', ''); ?></textarea>
                    </li>
                    <li class="wide">
                        <label for="">Nhập mã xác thực </label>
                        <input type="text" id="captcha" class="captcha" name="captcha" onchange="checkpress('captcha')" />
                        <div class="captcha" style="margin-top: -1px;"><?php if(isset($image_captcha) && $image_captcha != null) echo $image_captcha; ?></div><br/>
                        <?php if(isset($err_captcha) && $err_captcha != null) echo "<small style='color:tomato'>".$err_captcha."</small>"; ?>
                    </li>
                    <li class="wide">
                        <label for="">&nbsp;</label>
                        <button id="btn_reg" onclick="return check_text('email,pass,repeat_pass,as,phone,city,district,captcha','frmuser','')">Xác nhận và tiếp tục</button>
                    </li>

                    <li class="avatar">
                        <label for="avatar">Ảnh đại diện: &nbsp;&nbsp; <img id="img_avatar" src="<?php echo base_url(); ?>uploads/avatars/default.png" alt="avatar"/></label>
                        <input type="file" name="avatar" id="avatar" onchange="PreviewImage();"/>
                        <?php
                        if(isset($avatar_error) && $avatar_error != null) {
                            echo "<small style='color:tomato; padding-top:5px; width:150px ; float: left; clear: left;'>".$avatar_error."</small>";
                        }
                        ?>
                    </li>

                </ul>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

//    jQuery.noConflict();

    <!--    event when change city-->
    function loadData(id_city)
    {
//        (function($){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url().'register/getDistrict/'; ?>" + id_city,
                data: 'id='+ id_city,
                async:true,
                success: function(result){
                    $(".dist_temp").remove();
                    $(".div_dist").empty();
                    $(".div_dist").append(result);
                    checkpress('city');
                }
            });
//        })(jQuery);
    }

    <!--    event when submit form, get value last-->
//    (function($){
        var value = $("#city option:selected").val();
        if(value != '') {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url().'register/getDistrict/'; ?>" + value + '/' + ckeck_dist,
                data: 'id='+ value,
                async:true,
                success: function(result){
                    $(".dist_temp").remove();
                    $(".div_dist").empty();
                    $(".div_dist").append(result);
                }
            });
        }
//    })(jQuery);

    function PreviewImage() {
//        (function($){
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("avatar").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("img_avatar").src = oFREvent.target.result;
            };
//        })(jQuery);
    };

</script>