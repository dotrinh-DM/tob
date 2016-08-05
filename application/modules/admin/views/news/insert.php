<script type="text/javascript" src="<?php echo base_url() ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        resize: true,
        width : 700,
        height : 300,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
</script>
<?php
$title = $content = $status = $creator = $date = '';
if(isset($edit_record) && count($edit_record) > 0) {
    $title            = $edit_record[0]['title'];
    $content          = $edit_record[0]['content'];
    $status           = $edit_record[0]['status'];
    $creator          = $edit_record[0]['creator'];
    $date             = $edit_record[0]['date_create'];
}
?>
<h4 class="widgettitle nomargin shadowed"><?php echo $this->lang->line('news_form'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" id="frmuser" method="post" action="">
        <p>
            <label><?php echo $this->lang->line('title_news'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('news_title')."</small>"; ?></label>
            <span class="field">
                <input type="text" name="news_title" id="title" class="input-block-level" value="<?php if(set_value('news_title', '') != null) echo set_value('news_title', ''); else { if($title != null) echo decodeStr($title);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('content_news'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('news_content')."</small>"; ?></label>
            <span class="field">
                <textarea cols="80"  name="news_content"><?php if(set_value('news_content', '') != null) echo set_value('news_content', ''); else { if($content != null) echo decodeStr($content);} ?></textarea>
            </span>
        </p>

        <?php if(isset($edit_record)) {
            $creator_name = '';
            if(isset($list_admins)) {
                foreach($list_admins as $key_user) {
                    if($creator == $key_user['id_admins']) {
                        $creator_name = decodeStr($key_user['name']);
                    }
                }
            }
            ?>
            <p>
                <label><?php echo $this->lang->line('creator_news'); ?></label>
                <span class="field"><input type="text" disabled name="title" id="title" class="input-xlarge" value="<?php echo $creator_name; ?>" /></span>
            </p>
        <?php } ?>
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