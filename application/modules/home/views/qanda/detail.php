<div class="site-main adjust" id="main">
    <?php if(isset($news) && $news != null) { ?>
        <h3 style="margin-top: 30px;" class="title"><?php echo ucfirst(decodeStr($news[0]->title)); ?></h3>
        <p style="margin-top: 20px;"><?php if($news[0]->content != null) echo ucfirst(decodeStr($news[0]->content)); else echo 'Đang chờ trả lời...'; ?></p>
        <?php
        $time_str = strtotime($news[0]->date_create);
        $time_post = date('d/m/Y H:i',$time_str);
        $creator = '';
        if(isset($user_list) && count($user_list) > 0) {
            foreach($user_list as $key) {
                if($news[0]->creator == $key['id_user']) {
                    $creator = $key['alias_name'];
                }
            }
        }

        ?>
        <p class="footer_question"><a class="date_question"><strong>Ngày: </strong><?php echo $time_post; ?></a><a class="creator"><strong>Người hỏi: </strong><?php echo $creator; ?></a></p>
    <?php } else { ?>
        <h3 class="title">Câu hỏi không tồn tại!</h3>
        <p><a style="cursor: pointer" onclick="window.history.back()">Quay lại</a></p>
    <?php } ?>
    <div class="other_news">
        <h4>Các câu hỏi khác:</h4>
        <ul>
            <?php
            if(isset($other_first_list) && count($other_first_list) > 0) {
                foreach($other_first_list as $key){
                    $link = base_url().'qna/'.$key['alias']; ?>
                    <li> - <a title="<?php echo decodeStr($key['title']); ?>" href="<?php echo $link; ?>"><?php echo ucfirst(word_limiter(decodeStr($key['title']),35)); ?></a></li>
                <?php }
            }
            if(isset($other_last_list) && count($other_last_list) > 0) {
                foreach($other_last_list as $key){
                    $link = base_url().'qna/'.$key['alias']; ?>
                    <li> - <a title="<?php echo decodeStr($key['title']); ?>" href="<?php echo $link; ?>"><?php echo word_limiter(ucfirst(decodeStr($key['title'])),35); ?></a></li>
                <?php }
            }
            ?>
        </ul>
    </div>
</div>
<div class="form-list new-question1">
    <?php
    $nologin = '';
    $href    = '/qna/create';
    if(isset($enable) && $enable == null) {
        $nologin = "confirm('Bạn cần đăng nhập để gửi câu hỏi!'); return false;";
        $href    = '';
    }
    ?>
    <button><a href="<?php echo $href; ?>" onclick="<?php echo $nologin; ?>">Gửi câu hỏi</a></button>
</div>