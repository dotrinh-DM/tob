<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if(isset($title) && $title != null) {echo $title;} else {echo 'System Login';} ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/css/style.default.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>public/backend/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/backend/js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/backend/js/general/general.js"></script>
</head>

<body class="loginbody">
<div class="loginwrapper">
    <div class="loginwrap zindex100 animate2 bounceInDown">
        <h1 class="logintitle"><span class="iconfa-lock"></span><?php echo $this->lang->line('login'); ?><span class="subtitle"><?php echo $this->lang->line('hello_login'); ?></span></h1>
        <div class="loginwrapperinner">

            <form id="loginform" action="/admin/login" name="loginform" method="post">
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" value="<?php echo set_value('username', ''); ?>" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
                <p class="animate6 bounceIn">
                    <input onclick="check_text('username,password','loginform')" class="btn btn-default btn-block btnsub" type="submit" id="btnsub" name="btnsub" value="<?php echo $this->lang->line('btnsubmit'); ?>">
<!--                    <button onclick="check_text()" class="btn btn-default btn-block">--><?php //echo $this->lang->line('btnsubmit'); ?><!--</button>-->
                </p>
                <p class="animate7 fadeIn"><a href=""><span class="icon-question-sign icon-white"></span><?php echo $this->lang->line('Forgot_Password'); ?></a></p>
                <?php if(isset($wrong) && $wrong != null) echo "<span style='color: white'>".$wrong."</span>"; ?>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->
</body>
</html>
