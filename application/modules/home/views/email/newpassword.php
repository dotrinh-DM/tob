<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') ?></title>
    <style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
</head>
<body>
Xin chào, <br /><br />
Bạn đã sử dụng chức năng quên mật khẩu trên Chuyencuatoc.vn. Mật khẩu mới của bạn là: <?php echo $new_password; ?><br />
Vui lòng đăng nhập lại để đổi mật khẩu.
<br /><br />
Trân trọng,<br />
-- Chuyencuatoc.vn team.
</body>
</html>