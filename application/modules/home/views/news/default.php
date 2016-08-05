<div class="site-main" id="main">
    <h4>Danh sách tin tức</h4>
    <div class="news-qna">
        <ul>
            <?php
            $i = 0;
            if(isset($news) && count($news) > 0) {
                foreach($news as $key){
                    $i++;
                    $link = '/news/'.$key['alias']; ?>
                    <li><?php echo $i; ?>. <a title="<?php echo decodeStr($key['title']); ?>" href="<?php echo $link; ?>"><?php echo word_limiter(ucfirst(decodeStr($key['title'])),35); ?></a></li>
                <?php }
            } else {
            ?>
                <h3 class="title">Không có tin tức!</h3>
                <p><a style="cursor: pointer" href="<?php echo base_url(); ?>">Trang chủ</a></p>
            <?php } ?>
        </ul>
    </div>

</div>