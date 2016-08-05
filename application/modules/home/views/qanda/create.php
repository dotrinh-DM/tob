<div class="site-main qanda-create-page" id="main">
    <?php if(isset($images_banner) && $images_banner != null) echo $images_banner; ?>

    <h3 class="title">Gửi câu hỏi</h3>
    <div class="row">
        <form action="" method="post" name="frm_qst" id="frm_login">
            <ul class="form-list form-list-login">
                <?php if(isset($wrong) && $wrong != null) echo "<span style='color: red'>".$wrong."</span><br/><br/>"; ?>
                <li class="wide">
                    <label for=""><strong>Nội Dung: </strong><?php echo "<small style='color:tomato; margin-left: 10px;'>".form_error('question')."</small>"; ?></label>

                    <textarea name="question" id="question" onchange="checkpress('question')" ><?php echo set_value('question', ''); ?></textarea>
                    <?php echo "<small style='color:tomato; margin-left: 5px'>".form_error('email')."</small>"; ?>
                </li>
                <li class="wide">
                    <label for=""><strong>Nhập mã xác thực: </strong></label><br/><br/>
                    <input type="text" style="width: 130px;" id="captcha" class="captcha" name="captcha" onchange="checkpress('captcha')" />
                    <div class="captcha"><?php if(isset($image_captcha) && $image_captcha != null) echo $image_captcha; ?></div>
                    <?php if(isset($err_captcha) && $err_captcha != null) echo "<small style='color:tomato'>".$err_captcha."</small>"; ?>
                </li>
                <li class="wide">
                    <button class="btn_send" onclick="return check_text('question,captcha','frm_qst','')" >Gửi câu hỏi</button>
                </li>
            </ul>
        </form>
    </div>

</div>
