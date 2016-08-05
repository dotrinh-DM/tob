<?php $this->load->view('collection/js_in_php/autocomplete_js'); ?>
<h4 class="widgettitle nomargin shadowed"><?php echo  $this->lang->line('required_cus'); ?></h4>
<div class="widgetcontent bordered shadowed nopadding">
    <?php
    successAlert($this->session->flashdata('success'));
    errorAlert($this->session->flashdata('error'));
    if (isset($error_img)) {
        divAlert($error_img);
    }
    if(isset($chooseImage))
    {
        divAlert($chooseImage);
    }
    ?>
    <form id="form1" class="stdform" method="post" action="" enctype="multipart/form-data">

        <div class="par">
            <label><?php echo  $this->lang->line('img'); ?>  1</label>

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input span3">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
				<span class="btn btn-file"><span class="fileupload-new">Select file</span>
				<span class="fileupload-exists">Change</span>
				<input name="img1" type="file"></span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>

        <div class="par">
            <label><?php echo  $this->lang->line('img'); ?>  2</label>

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input span3">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
				<span class="btn btn-file"><span class="fileupload-new">Select file</span>
				<span class="fileupload-exists">Change</span>
				<input name="img2" type="file"></span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>

        <div class="par">
            <label><?php echo  $this->lang->line('img'); ?>  3</label>

            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input span3">
                        <i class="icon-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
				<span class="btn btn-file"><span class="fileupload-new">Select file</span>
				<span class="fileupload-exists">Change</span>
				<input name="img3" type="file"></span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>

        <div class="par control-group">
            <label class="control-label" for="firstname"><?php echo  $this->lang->line('title_album'); ?>  (*) </label>

            <div class="controls">
                <input type="text" name="title_album" class="span4" id="inputWarning"
                       value="<?php echo set_value('title_album'); ?>" class="input-xxlarge"/>
                <span class="help-inline"><?php echo form_error('title_album'); ?></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo  $this->lang->line('designer'); ?> (*) </label>
            <div class="controls">
                <input type="text" name="designer" id="designer"
                value="<?php echo set_value('designer'); ?>"
                class="input-large" />
                <span class="help-inline"><?php echo form_error('designer'); ?></span>
            </div>
            <input type="hidden" value="" name="user_type[]" id="designer1"/>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('photographer'); ?> </label>
            <div class="controls">
                <input type="text"
                       name="photographer"
                       value="<?php echo set_value('photographer'); ?>" id="photographer" class="input-large"/>
            </div>
            <input type="hidden" value="" name="user_type[]" id="photographer1"/>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('modelor'); ?> </label>

            <div class="controls">
                <input type="text" name="modelor" value="<?php echo set_value('modelor'); ?>"
                class="input-large" id="modelor"/>
            </div>
            <input type="hidden" value="" name="user_type[]" id="modelor1"/>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('salon'); ?>  (*) </label>
            <div class="controls">
                <input type="text" name="salon" value="<?php echo set_value('salon'); ?>"
                 class="input-large" id="salon"/>
                <span class="help-inline"><?php echo form_error('salon'); ?></span>
            </div>
            <input type="hidden" value="" name="user_type[]" id="salon1"/>
        </div>

        <div class="par control-group">
            <label class="control-label" for="location"><?php echo $this->lang->line('idea'); ?> </label>

            <div class="controls">
                <textarea cols="80" rows="5" name="idea" class="input-xxlarge"><?php echo set_value('idea'); ?></textarea></div>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('curly'); ?> </label>

            <div class="controls"><input type="text" name="curly" value="<?php echo set_value('curly'); ?>"
                                         class="input-large"/></div>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('dye'); ?> (*) </label>

            <div class="controls"><input type="text" name="dye" value="<?php echo set_value('dye'); ?>"
                                         class="input-large"/>
                <span class="help-inline"><?php echo form_error('dye'); ?></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('style'); ?> (*) </label>

            <div class="controls"><input type="text" name="style" value="<?php echo set_value('style'); ?>"
                                         class="input-large"/>
                <span class="help-inline"><?php echo form_error('style'); ?></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('care'); ?> (*) </label>

            <div class="controls"><input type="text" name="care" value="<?php echo set_value('care'); ?>"
                                         class="input-large"/>
                <span class="help-inline"><?php echo form_error('care'); ?></span>
            </div>
        </div>

        <div class="par control-group">
            <label class="control-label" for="location"><?php echo $this->lang->line('technology'); ?></label>

            <div class="controls">
                <textarea cols="80" rows="5" name="technology"
                          class="input-xxlarge"><?php echo set_value('technology'); ?></textarea></div>
        </div>

        <p class="stdformbutton">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </p>
    </form>
</div>