<div class="site-main" id="main">
    <?php if(isset($news) && $news != null) { ?>
        <h3 style="margin-top: 30px;" class="title"><?php echo ucfirst(decodeStr($news[0]['title'])); ?></h3>
        <p style="margin-top: 20px;"><?php echo ucfirst(decodeStr($news[0]['content'])); ?></p>
        <?php
        $time_str = strtotime($news[0]['date_create']);
        $time_post = date('d/m/Y H:i',$time_str);
        ?>
        <p class="footer_question"><a class="date_question"><strong>Ngày: </strong><?php echo $time_post; ?></a><a class="creator"><strong>Đăng bởi: </strong><?php if(isset($creator)) echo $creator; ?></a></p>
    <?php } else { ?>
        <h3 class="title">Bản tin không tồn tại!</h3>
        <p><a style="cursor: pointer" onclick="window.history.back()">Quay lại</a></p>
    <?php } ?>
    <div class="other_news">
        <ul>
            <?php
            if(isset($other_first_list) && count($other_first_list) > 0) {
                foreach($other_first_list as $key){
                    $link = '/news/'.$key['alias']; ?>
                    <li> - <a title="<?php echo decodeStr($key['title']); ?>" href="<?php echo $link; ?>"><?php echo word_limiter(ucfirst(decodeStr($key['title'])),35); ?></a></li>
                <?php }
            }
            if(isset($other_last_list) && count($other_last_list) > 0) {
                foreach($other_last_list as $key){
                    $link = '/news/'.$key['alias']; ?>
                    <li> - <a title="<?php echo decodeStr($key['title']); ?>" href="<?php echo $link; ?>"><?php echo word_limiter(ucfirst(decodeStr($key['title'])),35); ?></a></li>
                <?php }
            }
            ?>
        </ul>
    </div>
</div>