<?php
$alias = $value = $disable = '';
if(isset($edit_record) && count($edit_record) > 0) {
    $alias          = $edit_record[0]['alias'];
    $value          = $edit_record[0]['value'];
    $disable        = 'disabled';
}
?>
<h4 class="widgettitle nomargin shadowed"><?php echo $this->lang->line('config_form'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" id="frmuser" method="post" action="">
<!--            check_text('as,email,pass,repeat_pass,phone,city,district','frmuser')-->
        <p>
            <label><?php echo $this->lang->line('alias_config'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('alias')."</small>"; ?></label>
            <span class="field"><input type="text" name="alias" id="alias" class="input-xlarge" <?php echo $disable; ?> value="<?php if(set_value('alias', '') != null) echo set_value('alias', ''); else { if($alias != null) echo decodeStr($alias);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('value_config'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('value')."</small>"; ?></label>
            <span class="field">
<!--                <input type="text" name="value" id="value" class="input-xxlarge" value="--><?php //if(set_value('value', '') != null) echo set_value('value', ''); else { if($value != null) echo decodeStr($value);} ?><!--" />-->
                <textarea name="value" id="value" rows="5" cols="80"><?php if(set_value('value', '') != null) echo set_value('value', ''); else { if($value != null) echo decodeStr($value);} ?></textarea>
            </span>
        </p>

        <p class="stdformbutton">
            <input class="btn btn-primary" type="submit" name="btnsub" value="<?php echo '     '.$this->lang->line('btnsubmit').'     '; ?>">
            <input class="btn" type="reset" value="<?php echo '     '.$this->lang->line('btnreset').'     '; ?>">
        </p>
    </form>
</div>