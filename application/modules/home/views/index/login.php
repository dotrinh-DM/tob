<div class="site-main login-page" id="main">
    <?php if(isset($images_banner) && $images_banner != null) echo $images_banner; ?>

    <h3 class="title">Đăng nhập</h3>
    <div class="row">
        <div class="col-xs-8">
            <form action="" method="post" name="frm_login" id="frm_login">
                <ul class="form-list form-list-login">
                    <?php if(isset($wrong) && $wrong != null) echo "<span style='color: red'>".$wrong."</span><br/><br/>"; ?>
                    <li class="wide">
                        <label for="">Email truy nhập: </label>
                        <input type="text" name="email" id="email" onchange="checkpress('email')" value="<?php echo set_value('email', ''); ?>"/>
                        <?php echo "<small style='color:tomato; margin-left: 5px'>".form_error('email')."</small>"; ?>
                    </li>
                    <li class="wide">
                        <label for="">Mật khẩu: </label>
                        <input type="password" name="pass" onchange="checkpress('pass')" id="pass"/>
                        <?php echo "<small style='color:tomato; margin-left: 5px'>".form_error('pass')."</small>"; ?>
                    </li>
                    <li class="wide">
                        <label for="">&nbsp; </label>
                        <input type="checkbox" value="1" name=remember id="rememberme-login"/>
                        <label for="rememberme-login"> Ghi nhớ đăng nhập</label>
                    </li>

                    <li class="wide">
                        <label for="">&nbsp; </label>
                        <button onclick="return check_text('email,pass','frm_login','')" >Đăng nhập</button>
                    </li>

                    <li class="wide">
                        <label> <a href="/forgot_password"><u>Quên mật khẩu.</u></a></label>
                    </li>
                </ul>
            </form>
        </div>
    </div>

</div>
