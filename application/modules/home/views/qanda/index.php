<div class="site-main" id="main">
    <h4>Danh sách hỏi đáp</h4>
    <div class="form-list new-question">
        <?php
        $nologin = '';
        $href    = base_url().'qna/create';
        if(isset($enable) && $enable == null) {
            $nologin = "confirm('Bạn cần đăng nhập để gửi câu hỏi!'); return false;";
            $href    = '';
        }
        ?>
        <button><a href="<?php echo $href; ?>" onclick="<?php echo $nologin; ?>">Gửi câu hỏi</a></button>
    </div>
    <div class="news-qna">
        <ul>
            <?php
            $i = 0;
            if(isset($news) && count($news) > 0) {
                foreach($news as $key){
                    $i++;
                    $link = base_url().'qna/'.$key->alias; ?>
                    <li><?php echo $i; ?>. <a href="<?php echo $link; ?>"><?php echo word_limiter(ucfirst(decodeStr($key->title)),35); ?></a></li>
                <?php }
            }
            ?>
        </ul>
    </div>

</div>