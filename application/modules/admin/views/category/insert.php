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
$name = $desc = $status = '';
$avatar = base_url().'public/home/images/default_img_home.png';
if(isset($edit_record) && count($edit_record) > 0) {
    $edit_record    = $edit_record[0];
    $name           = $edit_record['name'];
    $desc           = $edit_record['desc'];
    $status         = $edit_record['status'];

    if($edit_record['image'] != null) {
        $avatar = base_url().'uploads/category/'.$edit_record['image'];
    }

}

?>

<h4 class="widgettitle nomargin shadowed"><?php echo $this->lang->line('cate_form'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <form class="stdform stdform2" id="frmuser" method="post" action="" enctype="multipart/form-data">

        <p>
            <label><?php echo $this->lang->line('category'); ?> (*) <?php echo "<small style='color:tomato'>".form_error('name')."</small>"; ?></label>
            <span class="field"><input type="text" name="name" id="name" class="input-xlarge" value="<?php if(set_value('name', '') != null) echo set_value('name', ''); else { if($name != null) echo decodeStr($name);} ?>" /></span>
        </p>

        <p>
            <label><?php echo $this->lang->line('image_cate'); ?>
                <?php
                if(isset($avatar_error) && $avatar_error != null) {
                    $avatar_error = str_replace('<p>','',$avatar_error);
                    $avatar_error = str_replace('</p>','',$avatar_error);
                    echo "<small style='color:tomato'>".$avatar_error."</small>";
                }
                ?>
            </label>
            <span class="field">
                <input type="file" class="uniform-file" name="image" />
                <img class="image" width="80" title="<?php echo $avatar; ?>" src="<?php echo $avatar; ?>" alt="<?php if($avatar != null)echo $avatar; else echo 'No image.'; ?>">
            </span>
        </p>

        <p>
            <label><?php echo $this->lang->line('desc_cate'); ?></label>
            <span class="field"><textarea cols="80" rows="4" name="desc" id="desc" class="span5"><?php if(set_value('desc', '') != null) echo set_value('desc', ''); else {if($desc != null) echo decodeStr($desc);} ?></textarea></span>
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
