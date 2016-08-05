<div class="site-main forgotpassword-page" id="main">
    <?php if(isset($images_banner) && $images_banner != null) echo $images_banner; ?>

    <h3 class="title">Quên mật khẩu</h3>
    <div class="row">
        <div class="col-xs-8">
            <form action="" method="post" name="frm_login" id="frm_login">
                <ul class="form-list form-list-login">
                    <strong>Xin vui lòng nhập địa chỉ email đăng ký của bạn vào ô dưới đây. Mật khẩu mới sẽ được gửi vào email này.</strong><br/><br/><br/>
                    <li class="wide">
                        <label for="">Email truy nhập (*): </label>
                        <input type="text" name="email" id="email" onchange="checkpress('email')" value="<?php echo set_value('email', ''); ?>"/>
                        <?php echo "<small style='color:tomato; margin-left: 5px'>".form_error('email')."</small>"; ?>
                    </li>

                    <li class="wide">
                        <label for="">Nhập mã xác thực (*): </label>
                        <input type="text" id="captcha" class="captcha" name="captcha" onchange="checkpress('captcha')" />
                        <div class="captcha"><?php if(isset($image_captcha) && $image_captcha != null) echo $image_captcha; ?></div><br/>
                        <?php if(isset($err_captcha) && $err_captcha != null) echo "<small style='color:tomato'>".$err_captcha."</small>"; ?>
                    </li>

                    <li class="wide">
                        <label for="">&nbsp; </label>
                        <button onclick="return check_text('email,captcha','frm_login','')" >Gửi mật khẩu</button>
                    </li>

                </ul>
            </form>
        </div>
    </div>

</div>
