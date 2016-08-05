<?php
$name = $email = $address = $phone = $status = $disable = '';
if(isset($edit_record) && count($edit_record) > 0) {
    $name            = $edit_record[0]['name'];
    $email           = $edit_record[0]['email'];
    $address         = $edit_record[0]['address'];
    $phone           = $edit_record[0]['phone'];
    $status          = $edit_record[0]['status'];
    $disable         = 'disabled';
}
?>
<h4 class="widgettitle nomargin shadowed"><?php echo $this->lang->line('account_form'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" id="frmuser" method="post" action="">
        <p>
            <label><?php echo $this->lang->line('name_user'); ?><?php echo "<small style='color:tomato'>".form_error('name')."</small>"; ?></label>
            <span class="field">
                <input type="text" name="name" id="name" class="input-xlarge" <?php echo $disable; ?> value="<?php if(set_value('name', '') != null) echo set_value('name', ''); else { if($name != null) echo decodeStr($name);} ?>" /></span>
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
            <label><?php echo $this->lang->line('email_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('email')."</small>"; ?></label>
            <span class="field">
                <input type="text" name="email" id="email" class="input-xlarge" value="<?php if(set_value('email', '') != null) echo set_value('email', ''); else { if($email != null) echo decodeStr($email);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('address_user'); ?><?php echo "<small style='color:tomato'>".form_error('address')."</small>"; ?></label>
            <span class="field">
                <input type="text" name="address" id="address" class="input-xlarge" value="<?php if(set_value('address', '') != null) echo set_value('address', ''); else { if($address != null) echo decodeStr($address);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('phone_user'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('phone')."</small>"; ?></label>
            <span class="field">
                <input type="text" name="phone" id="phone" class="input-xlarge" value="<?php if(set_value('phone', '') != null) echo set_value('phone', ''); else { if($phone != null) echo $phone;} ?>" /></span>
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

        <p>
            <label><?php echo $this->lang->line('current_pass'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('current_pass')."</small>"; ?></label>
            <span class="field"><input type="password" name="current_pass" id="current_pass" class="input-xlarge" /></span>
        </p>

        <p class="stdformbutton">
            <input class="btn btn-primary" type="submit" name="btnsub" value="<?php echo '     '.$this->lang->line('btnsubmit').'     '; ?>">
            <input class="btn" type="reset" value="<?php echo '     '.$this->lang->line('btnreset').'     '; ?>">
        </p>
    </form>
</div>