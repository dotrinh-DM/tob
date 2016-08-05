<?php
successAlert_home($this->session->flashdata('success'));
errorAlert_home($this->session->flashdata('error'));

$district = $city_c = '';
if(isset($dist)) { $district   = $dist;}
if(isset($city)) { $city_c     = $city;}
?>
<script type="text/javascript">
    var ckeck_dist = '<?php echo $district; ?>';
</script>
<div class="site-main user-profile" id="main">
    <div class="row">
        <div class="col-xs-3 profile">
            <div class="row ntm-profile">
                <div class="col-xs-4">
                    <?php if($user_name[0]->avatar != ''){ ?>
                        <img src="<?php echo getPhotoThumbSrc(base_url().'uploads/avatars/'.$user_name[0]->avatar,110,110); ?>"/>
                    <?php }else{ ?>
                        <img src="<?php echo getPhotoThumbSrc(base_url().'uploads/avatars/default.png',110,110); ?>"/>
                    <?php } ?>
                </div>
                <div class="col-xs-8">
                    <p> <?php
                        switch($user_name[0]->user_type){
                            case 1: echo 'Nhà thiết kế: '; break;
                            case 2: echo 'Nhiếp ảnh gia: '; break;
                            case 3: echo 'Người mẫu: '; break;
                            case 4: echo 'Salon: '; break;
                        } ?>
                        <strong><?php echo $user_name[0]->alias_name; ?></strong>
                    </p>
                    <p>Bộ sưu tập: <?php if($user_album[0]->collec_number != ''){echo $user_album[0]->collec_number;}else{echo 0;}; ?></p>
                    <p>Xem: <?php if($user_album[0]->view_user != ''){echo $user_album[0]->view_user;}else{echo 0;}; ?></p>
                    <p>Bình chọn: <?php if($user_album[0]->vote_user != ''){echo $user_album[0]->vote_user;}else{echo 0;}; ?></p>
                </div>
            </div>


            <address>
                <p>Địa chỉ: <?php echo decodeStr($user_name[0]->address); ?></p>
                <p>Điện thoại: <?php echo $user_name[0]->phone; ?></p>
                <p>Email: <?php echo decodeStr($user_name[0]->email); ?></p>
                <p>Facebook: <a class="blueColor" target="_blank"
                   href="http://<?php echo decodeStr($user_name[0]->facebook_link); ?>"><?php echo decodeStr($user_name[0]->facebook_name); ?></a></p>
            </address>

            <div class="rule">
                <p>Tự giới thiệu: <?php echo decodeStr($user_name[0]->introduce); ?></p>
            </div><br/>

            <?php if(isset($id_segment) && isset($id_user) && $id_segment == $id_user) { ?>
                <div id="form_stt" onclick="show_frm('form_stt')"  style="cursor: pointer; text-decoration: underline"><a>Ẩn chỉnh sửa</a></div>
            <form class="frmuser" id="frmuser" method="post" name="frm_register" action="" enctype="multipart/form-data">
                <div style="margin-top: 30px;width: 100%;" class="col-xs-8">
                <ul class="form-list form-list-register">
                    <li class="avatar" style="width: 100%; float: left">
                        <label for="avatar"><img id="img_avatar" src="<?php echo base_url().'uploads/avatars/'.$user_name[0]->avatar; ?>" alt="Avatar"/></label>
                        <input type="file" name="avatar" id="avatar" onchange="PreviewImage();"/>
                        <?php
                        if(isset($avatar_error) && $avatar_error != null) {
                            echo "<small style='color:tomato; padding-top:5px; width:150px ; float: left; clear: left;'>".$avatar_error."</small>";
                        }
                        ?>
                    </li><br/><br/><br/><br/><br/><br/>

                    <li class="fields">
                        <div class="field" style="width: 100%;">
                            <label for="">Mật khẩu: </label>
                            <input type="password" name="pass" id="pass" onchange="checkpress('pass')" />
                            <?php echo "<small style='color:tomato'>".form_error('pass')."</small>"; ?>
                        </div>
                    </li><br/>
                    <li class="fields">
                        <div class="field"  style="width: 100%;">
                            <label for="">Gõ lại mật khẩu: </label>
                            <input type="password" name="repeat_pass" id="repeat_pass" onchange="checkpress('repeat_pass')" />
                            <?php echo "<small style='color:tomato'>".form_error('repeat_pass')."</small>"; ?>
                        </div>
                    </li>
                    <li class="wide">
                        <label for="">Bạn là: </label>
                        <div class="group-radio">
                            <div class="radioitem">
                                <input type="radio" id="rd1" name="select_work" value="1" <?php if(set_radio('select_work', '1') != null) { echo set_radio('select_work', '1'); $user_name[0]->user_type = null; } else {if($user_name[0]->user_type == 1) echo "checked='checked'";} ?> /> <label for="rd1">Nhà tạo mẫu</label>
                            </div>
                            <div class="radioitem">
                                <input type="radio" id="rd2" name="select_work" value="3" <?php if(set_radio('select_work', '3') != null) { echo set_radio('select_work', '3'); $user_name[0]->user_type = null; } else {if($user_name[0]->user_type == 3) echo "checked='checked'";}?> /> <label for="rd2">Người mẫu</label>
                            </div>
                            <div class="radioitem">
                                <input type="radio" id="rd3" name="select_work" value="4" <?php if(set_radio('select_work', '4') != null) { echo set_radio('select_work', '4'); $user_name[0]->user_type = null; } else {if($user_name[0]->user_type == 4) echo "checked='checked'";}?> /> <label for="rd3">Salon tóc</label>
                            </div>
                            <div class="radioitem">
                                <input type="radio" id="rd4" name="select_work" value="2" <?php if(set_radio('select_work', '2') != null) { echo set_radio('select_work', '2'); $user_name[0]->user_type = null; } else {if($user_name[0]->user_type == 2) echo "checked='checked'";}?> /> <label for="rd4">Nhiếp ảnh gia</label>
                            </div>
                        </div>

                    </li>
                    <li class="wide">
                        <label for="" style="width: 288px;">Tên / Nghệ danh (*): </label><br/><br/>
                        <input style="width: 96%;" type="text" name="as" id="as" value="<?php if(set_value('as', '') != null) echo set_value('as', ''); else echo decodeStr($user_name[0]->alias_name);  ?>" onchange="checkpress('as')" />
                        <br/><br/><?php echo "<small style='color:tomato'>".form_error('as')."</small>"; ?>
                    </li><br/>
                    <li class="fields">
                        <div class="field" style="width: 100%;">
                            <label for="">Họ và tên đệm:  </label>
                            <input type="text" name="subname" id="subname" value="<?php if(set_value('subname', '') != null) echo set_value('subname', ''); else echo decodeStr($user_name[0]->last_name); ?>" />
                            <br/><br/><?php echo "<small style='color:tomato'>".form_error('subname')."</small>"; ?>
                        </div><br/><br/><br/><br/>
                    </li>
                    <li class="fields">
                        <div class="field" style="width: 100%;">
                            <label for="">Tên: </label>
                            <input type="text" name="name" id="name" value="<?php if(set_value('name', '') != null) echo set_value('name', ''); else echo decodeStr($user_name[0]->first_name); ?>" style="float: left"/>
                            <br/><br/><?php echo "<small style='color:tomato'>".form_error('name')."</small>"; ?>
                        </div>
                    </li><br/>
                    <li class="fields">
                        <div class="field"  style="width: 100%;">
                            <label for="">Di động (*): </label>
                            <input type="text" name="phone" id="phone" value="<?php if(set_value('phone', '') != null) echo set_value('phone', ''); else echo decodeStr($user_name[0]->phone); ?>" onchange="checkpress('phone')" style="float: left" />
                            <br/><br/><?php echo "<small style='color:tomato'>".form_error('phone')."</small>"; ?>
                        </div>
                    </li><br/>
                    <li class="fields">
                        <div class="field" style="width: 100%;">
                            <label for="">Tên Facebook: </label>
                            <input type="text" name="fbname" id="fbname" value="<?php if(set_value('fbname', '') != null) echo set_value('fbname', ''); else echo decodeStr($user_name[0]->facebook_name); ?>" />
                        </div>
                    </li><br/><br/>
                    <li class="wide">
                        <label for="" style="width: 100%;">Link Facebook: </label>
                        <input style="width: 96%;" type="text" name="fblink" id="fblink" value="<?php if(set_value('fblink', '') != null) echo set_value('fblink', ''); else echo decodeStr($user_name[0]->facebook_link); ?>" />
                    </li>
                    <li class="wide">
                        <label for="" style="width: 288px;">Địa chỉ: </label>
                        <input style="width: 96%;" type="text" name="address" id="address" value="<?php if(set_value('address', '') != null) echo set_value('address', ''); else echo decodeStr($user_name[0]->address); ?>" />
                    </li><br/><br/>
                    <li class="fields">
                        <div class="field" style="width: 100%;">
                            <label for="">Thành phố (*): </label><?php //get_array($user_name[0]) ?>
                            <select name="city" id="city" onchange="loadData(this.value)">
                                <?php
                                if(isset($province_arr) && count($province_arr) > 0) {
                                    foreach($province_arr as $key) {
                                        if($city_c == null ) $city_c = $user_name[0]->city;
                                        ?>
                                        <option value="<?php echo $key['provinceid']; ?>" <?php if($city_c == $key['provinceid']) echo "selected='selected'"; else {echo set_select('city', $key['provinceid']);} ?> ><?php echo $key['name']; ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php echo "<small style='color:tomato'>".form_error('city')."</small>"; ?>
                        </div><br/><br/><br/>
                    </li>
                    <li class="fields">
                        <div class="field" style="width: 100%;">
                            <label for="">Quận (*): </label>
                            <span class="div_dist">
                                <select name="district" id="district" disabled title="Choose One City">
                                    <option id="first_dist" value="" <?php echo set_select('district', ''); ?>>Choose One</option>
                                </select>
                            </span>
                            <?php echo "<small style='color:tomato'>".form_error('district')."</small>"; ?>
                        </div>
                    </li>
                    <li class="field" style="width: 100%;">
                        <label for="">Kỹ thuật thực hiện </label><br/><br/><br/>
                        <textarea style="width: 96%;" name="introduce" id="introduce" cols="30" rows="10"><?php if(set_value('introduce', '') != null) echo set_value('introduce', ''); else echo decodeStr($user_name[0]->introduce); ?></textarea>
                    </li>

                    <li class="wide" style="float: left;">
                        <label for="">&nbsp;</label>
                        <button id="btn_reg" onclick="return check_text('as,phone,city,district','frmuser','')">Xác nhận và tiếp tục</button>
                    </li>

                </ul>
            </div>
            </form>
            <?php }?>
        </div>

        <div class="col-xs-9 ">
            <ul class="nhataomau-list">
                <?php
                if(count($all_user_images) > 0){
                foreach ($all_user_images as $item_album) {?>
                    <li>
                        <a href="<?php echo site_url("photos/$item_album->alias_name/$item_album->id_images"); ?>">
                            <img src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/'.$item_album->link.'&h=300&w=300'; ?>" alt=""/></a>
                    </li>
                <?php } }
                else{ ?>
                    <h4>Không có bộ sưu tập nào.</h4>
                <?php }
                ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">

//    jQuery.noConflict();

    <!--    event when change city-->
    function loadData(id_city)
    {
//        (function($){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url().'user/getDistrict/'; ?>" + id_city,
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
                url: "<?php echo base_url().'user/getDistrict/'; ?>" + value + '/' + ckeck_dist,
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

    /*
    * ẩn hiện form
    * */
    function show_frm(id_click)
    {
        if($('#'+id_click).html() == '<a>Hiện chỉnh sửa</a>') {
            $('#frmuser').show(500);
            $('#'+id_click).html('<a>Ẩn chỉnh sửa</a>');
        } else {
            $('#frmuser').hide(500);
            $('#'+id_click).html('<a>Hiện chỉnh sửa</a>');
        }
    }
 </script>