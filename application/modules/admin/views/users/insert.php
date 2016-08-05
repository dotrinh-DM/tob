<?php
$email = $type_user = $first_name = $last_name = $alias_name = $phone = $facebook_name = $facebook_link = $address = $city = $district = $status = $introduce = '';
$avatar = base_url().'uploads/avatars/default.png';
if(isset($edit_record) && count($edit_record) > 0) {
    $edit_record    = $edit_record[0];
    $email          = $edit_record['email'];
    $type_user      = $edit_record['user_type'];
    $first_name     = $edit_record['first_name'];
    $last_name      = $edit_record['last_name'];
    $alias_name     = $edit_record['alias_name'];
    $facebook_name  = $edit_record['facebook_name'];
    $facebook_link  = $edit_record['facebook_link'];
    $address        = $edit_record['address'];
    $city           = $edit_record['city'];
    $district       = $edit_record['district'];
    $status         = $edit_record['status'];
    $introduce      = $edit_record['introduce'];
    $phone          = $edit_record['phone'];

    if($edit_record['avatar'] != null) {
        $avatar = base_url().'uploads/avatars/'.$edit_record['avatar'];
    }

}
if(isset($dist)) { $district = $dist;}
?>
<script type="text/javascript">
    var ckeck_dist = '<?php echo $district; ?>';
</script>
<h4 class="widgettitle nomargin shadowed"><?php echo $this->lang->line('insert_form_user'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" id="frmuser" method="post" action="" enctype="multipart/form-data">
<!--            check_text('as,email,pass,repeat_pass,phone,city,district','frmuser')-->
        <p>
            <label><?php echo $this->lang->line('first_name'); ?></label>
            <span class="field"><input type="text" name="name" id="name" class="input-xlarge" value="<?php if(set_value('name', '') != null) echo set_value('name', ''); else { if($first_name != null) echo decodeStr($first_name);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('subname_user'); ?></label>
            <span class="field"><input type="text" name="subname" id="subname" class="input-xlarge" value="<?php if(set_value('subname', '') != null) echo set_value('subname', ''); else { if($last_name != null) echo decodeStr($last_name);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('as_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('as')."</small>"; ?></label>
            <span class="field"><input type="text" name="as" id="as" class="input-xlarge" value="<?php if(set_value('as', '') != null) echo set_value('as', ''); else { if($alias_name != null) echo decodeStr($alias_name);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('email_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('email')."</small>"; ?></label>
            <span class="field"><input type="text" name="email" id="email" class="input-xlarge" value="<?php if(set_value('email', '') != null) echo set_value('email', ''); else { if($email != null) echo decodeStr($email);} ?>" /></span>
        </p>

        <p>
            <label><?php
                if(!isset($edit_record)) {echo $this->lang->line('pass');  echo ' (*)';}
                else {echo $this->lang->line('new_pass'); }
                ?>
                <?php echo "<small style='color:tomato'>".form_error('pass')."</small>"; ?>
            </label>
            <span class="field"><input type="password" name="pass" id="pass" class="input-xlarge" /></span>
        </p>

        <p>
            <label><?php
                if(!isset($edit_record)) { echo $this->lang->line('repeat_pass');  echo ' (*)';}
                else { echo $this->lang->line('new_repeat_pass');}
                ?>
                <?php echo "<small style='color:tomato'>".form_error('repeat_pass')."</small>"; ?></label>
            <span class="field"><input type="password" name="repeat_pass" id="repeat_pass" class="input-xlarge" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('avata_user'); ?>
                <?php
                if(isset($avatar_error) && $avatar_error != null) {
                        $avatar_error = str_replace('<p>','',$avatar_error);
                        $avatar_error = str_replace('</p>','',$avatar_error);
                        echo "<small style='color:tomato'>".$avatar_error."</small>";
                    }
                ?>
            </label>
            <span class="field">
                <input type="file" class="uniform-file" name="avatar" />
                <img class="avatar" width="80" title="<?php echo $avatar; ?>" src="<?php echo $avatar; ?>" alt="<?php if($avatar != null)echo $avatar; else echo 'No avatar.'; ?>">
            </span>
        </p>

        <p>
            <label><?php echo $this->lang->line('Select_Work'); ?></label>
                <span class="field"><select name="select_work" id="select_work" class="uniformselect">
                        <option value="" <?php echo set_select('select_work', ''); ?>>Choose One</option>
                        <option value="1" <?php if($type_user != '' && $type_user == 1) echo "selected='selected'"; else echo set_select('select_work', '1'); ?>>Nhà tạo mẫu</option>
                        <option value="2" <?php if($type_user != '' && $type_user == 2) echo "selected='selected'"; else echo set_select('select_work', '2'); ?>>Nhiếp ảnh gia</option>
                        <option value="3" <?php if($type_user != '' && $type_user == 3) echo "selected='selected'"; else echo set_select('select_work', '3'); ?>>Người mẫu</option>
                        <option value="4" <?php if($type_user != '' && $type_user == 4) echo "selected='selected'"; else echo set_select('select_work', '4'); ?>>Salon tóc</option>
                </select></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('phone_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('phone')."</small>"; ?></label>
            <span class="field"><input type="text" name="phone" id="phone" class="input-xlarge" value="<?php if(set_value('phone', '') != null) {echo set_value('phone', '');} else { if($phone != null) echo $phone;} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('namefb_user'); ?></label>
            <span class="field"><input type="text" name="fbname" id="fbname" class="input-xlarge" value="<?php if(set_value('fbname', '') != null) echo set_value('fbname', ''); else { if($facebook_name != null) echo decodeStr($facebook_name);}; ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('linkfb_user'); ?><small>Ex: facebook.com/guest</small></label>
            <span class="field"><input type="text" name="fblink" id="fblink" class="input-xxlarge" value="<?php if(set_value('fblink', '') != null) echo set_value('fblink', ''); else { if($facebook_link != null) echo decodeStr($facebook_link); } ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('address_user'); ?></label>
            <span class="field"><input type="text" name="address" id="address" class="input-xxlarge" value="<?php if(set_value('address', '') != null) echo set_value('address', ''); else {if($address != null) echo decodeStr($address);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('city_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('city')."</small>"; ?></label>
                <span class="field">
                    <select name="city" id="city" class="uniformselect" onchange="loadData(this.value)">
                        <option value="" <?php echo set_select('city', ''); ?>>Choose One</option>
                        <?php
                        if(count($province_arr) > 0) {
                            foreach($province_arr as $key) {
                            ?>
                                <option value="<?php echo $key['provinceid']; ?>" <?php if($city != '' && $city == $key['provinceid']) echo "selected='selected'"; else echo set_select('city', $key['provinceid']); ?>><?php echo $key['name']; ?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </span>
        </p>

        <p>
            <label><?php echo $this->lang->line('district_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('district')."</small>"; ?></label>
                <span class="field div_dist">
                    <select name="district" id="district" class="uniformselect dist_temp" >
                        <option id="first_dist" value="" <?php echo set_select('district', ''); ?>>Choose One</option>
                    </select>
                </span>
        </p>

        <p>
            <label><?php echo $this->lang->line('introduce'); ?></label>
            <span class="field"><textarea cols="80" rows="4" name="introduce" id="introduce" class="span5"><?php if(set_value('introduce', '') != null) echo set_value('introduce', ''); else {if($introduce != null) echo decodeStr($introduce);} ?></textarea></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('status'); ?></label>
                <span class="field">
                    <select name="status" id="status" class="uniformselect">
                        <option value="1" <?php if($status != '' && $status == 1) echo "selected='selected'"; else echo set_select('status', '1', TRUE); ?>>Enable</option>
                        <option value="0" <?php if($status != '' && $status == 0) echo "selected='selected'"; else echo set_select('status', '0'); ?>>Disable</option>
                    </select>
                </span>
        </p>

        <p class="stdformbutton">
            <input class="btn btn-primary" type="submit" name="btnsub" value="<?php echo '     '.$this->lang->line('btnsubmit').'     '; ?>">
            <input class="btn" type="reset" value="<?php echo '     '.$this->lang->line('btnreset').'     '; ?>">
        </p>
    </form>
</div>

<script type="text/javascript">

    jQuery.noConflict();

<!--    event when change city-->
        function loadData(id_city)
        {
            (function($){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'admin/users/getDistrict/'; ?>" + id_city,
                    data: 'id='+ id_city,
                    async:true,
                    success: function(result){
                        $(".dist_temp").remove();
                        $(".div_dist").empty();
                        $(".div_dist").append(result);
                        $("#district").on("change", function(event) {
                            change_span();
                        } );
                    }
                });
            })(jQuery);
        }

<!--    event when submit form, get value last-->
        (function($){
            var value = $("#city option:selected").val();
            if(value != '') {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'admin/users/getDistrict/'; ?>" + value + '/' + ckeck_dist,
                    data: 'id='+ value,
                    async:true,
                    success: function(result){
                        $(".dist_temp").remove();
                        $(".div_dist").empty();
                        $(".div_dist").append(result);
                        $("#district").on("change", function(event) {
                            change_span();
                        } );
                    }
                });
            }
        })(jQuery);

<!--    change text span select district-->
        function change_span()
        {
            (function($){
                $(".sp_dist").html($("#district option:selected").text());
            })(jQuery);
        }
</script>