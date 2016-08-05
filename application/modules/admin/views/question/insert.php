<script type="text/javascript" src="<?php echo base_url() ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: ".news_content",
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
if(isset($create) && count($create) > 0) {
    $creator          = $create['creator'];
}
?>
<h4 class="widgettitle nomargin shadowed"><?php echo $this->lang->line('question_form'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" id="frmuser" method="post" action="">
        <p>
            <label><?php echo $this->lang->line('title_news'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('news_title')."</small>"; ?></label>
            <span class="field"><textarea style="width: 95%" cols="150" rows="5" name="news_title" id="title" class="span5"><?php if(set_value('news_title', '') != null) echo set_value('news_title', ''); else { if($title != null) echo decodeStr($title);} ?></textarea></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('content_news'); ?><?php echo "<small style='color:tomato'>".form_error('news_content')."</small>"; ?></label>
            <span class="field">
                <textarea cols="80"  name="news_content" class="news_content"><?php if(set_value('news_content', '') != null) echo set_value('news_content', ''); else { if($content != null) echo decodeStr($content);} ?></textarea>
            </span>
        </p>

        <p>
            <label><?php echo $this->lang->line('creator_news'); ?></label>
                <span class="field">
                    <select name="creator" id="creator" class="uniformselect">
                        <option value="">---------</option>
                        <?php foreach($list_users as $key) {
                            $id_u = $key['id_user'];
                            $selected = '';
                            if($creator == $id_u) {$selected = "selected='selected'";}
                        ?>
                            <option value="<?php echo $id_u; ?>" <?php if($selected != null ) echo $selected; else echo set_select('creator',$id_u); echo $selected; ?>><?php echo $key['alias_name']; ?></option>
                        <?php } ?>
                    </select>
                </span>
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