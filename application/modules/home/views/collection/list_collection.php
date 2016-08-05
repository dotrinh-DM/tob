<div class="site-main listing-index" id="main">
    <div class="menu-filter">
        <ul>
            <li>
                <select name="ntm" id="ntm" onchange="load_collection('ntm')">
                    <option value="">Xem theo NTM</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 1) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
            <li>
                <select name="salon" id="salon" onchange="load_collection('salon')">
                    <option value="">Xem theo Salon</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 4) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
            <li>
                <select name="nm" id="nm" onchange="load_collection('nm')">
                    <option value="">Xem theo Người mẫu</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 3) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
            <li>
                <select name="nag" id="nag" onchange="load_collection('nag')">
                    <option value="">Xem theo Nhiếp ảnh gia</option>
                    <?php
                    if(isset($list_user) && $list_user != null) {
                        foreach($list_user as $user) {
                            if($user['user_type'] == 2) {
                                echo "<option value='".$user['id_user']."'>".ucfirst($user['alias_name'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </li>
        </ul>
    </div>

    <div class="row">
        <div id="photo_listing">
            <?php
            foreach ($images_list as $img_item){ ?>
                <a href="/photos/<?php echo url_title($img_item->alias_name,'-',true).'/'.$img_item->id_images; ?>" title="">
                    <img alt="" src="<?php echo '/uploads/photos/'.$img_item->link; ?>" />
                    <div class="caption">
                        <h5><?php echo $img_item->title; ?></h5>
                        By <?php echo $img_item->alias_name; ?>
                        <div style="float: right">Xem <?php echo $img_item->viewed; ?> - Thích <?php echo $img_item->liked; ?></div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <input type="hidden" value="<?php if(isset($num_list_show) && $num_list_show != null) echo $num_list_show; ?>" name="input_num_start" id="input_num_start" />

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#photo_listing").justifiedGallery({
            rowHeight: 250,
            fixedHeight: true
        });
    });

    function addSomeImages(limit) {
        var  num_start = $('#input_num_start').val();
        for (var i = 0; i < limit; i++) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url().'xem-binh-chon/get_load_collection/'; ?>",
                data: 'num_start=' + num_start,
                async:true,
                success: function(result){
                    $('#photo_listing').append(result);
                    $('#photo_listing').justifiedGallery('norewind');
                }
            });
        }
    }

    addSomeImages(0);

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            addSomeImages(1);
        }
    });

    function load_collection(val)
    {
        var ntm     = $('#ntm').val(),
            salon   = $('#salon').val(),
            nm      = $('#nm').val(),
            nag     = $('#nag').val(),
            stt     = 0;

        if(ntm == '' && salon == '' && nm == '' && nag == '') {
            stt = 1;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url().'xem-binh-chon/get_list_collection'; ?>",
            data: 'ntm='+ ntm + '&salon=' + salon  + '&nm=' + nm  + '&nag=' + nag + '&stt=' + stt,
            async:true,
            success: function(result){
                /*$('.row').html(result);
                $('.paging').html('');*/
                $('#photo_listing').html(result);
                $("#photo_listing").justifiedGallery({
                    rowHeight: 250,
                    fixedHeight: true
                });
            }
        });
    }
</script>