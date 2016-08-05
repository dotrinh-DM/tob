<div class="col-xs-3">
    <h3 class="title">Quản lý tài khoản</h3>

    <ul>
        <li><a href="/dang-album">Gửi ảnh mới</a></li>
        <li><a href="/danh-sach-da-dang">Quản lý album ảnh đã đăng</a></li>
        <li><a href="/danh-sach-duoc-tag">Quản lý album ảnh được tag</a></li>
    </ul>

    <h3 class="title">Quản lý thông tin cá nhân</h3>
    <?php
    $id_acc = '';
    $user = $this->session->userdata('login_home');
    if($user != null && $user['id'] != null) {
        $id_acc = $user['id'].'/'.url_title($user['name']);
    }
    ?>
    <ul>
        <li><a href="/u/<?php echo $id_acc; ?>">Đổi email / Mật khẩu</a></li>
        <li><a href="/u/<?php echo $id_acc; ?>">Thay đổi thông tin cá nhân</a></li>
        <li><a href="/u/<?php echo $id_acc; ?>">Thay đổi ảnh đại diện</a></li>
    </ul>

    <h3 class="title">Quy định up ảnh</h3>

    <p> <?php echo $rule_upload; ?> </p>
</div>