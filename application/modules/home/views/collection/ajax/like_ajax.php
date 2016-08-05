<script>
    jQuery(document).ready(function () {
        jQuery('#likeaction').click(function () {
            var id = jQuery(this).attr('rel');
            var string_send = "string_name=" + id;
            var like = jQuery("#like-num").text();
            var num_like = parseInt(like) + 1;
            jQuery.ajax({
                url: "<?php echo site_url('home/collection/likeAction'); ?>",
                type: "POST",
                data: string_send,
                success: function (result) {
                    jQuery("#like-num").html(num_like);
                    jQuery(".col-xs-7 #likeaction").unbind('click');
                    jQuery(".col-xs-7 #likeaction").attr('style','font-weight:100');
                }
            });
        });


        jQuery('#dislikeaction').click(function () {
            var id = jQuery(this).attr('rel');
            var string_send = "string_name=" + id;
            var like = jQuery("#dislike-num").text();
            var num_like = parseInt(like) + 1;
            jQuery.ajax({
                url: "<?php echo site_url('home/collection/dislikeAction'); ?>",
                type: "POST",
                data: string_send,
                success: function (result) {
                    jQuery("#dislike-num").html(num_like);
                    jQuery(".col-xs-7 #dislikeaction").unbind('click');
                    jQuery(".col-xs-7 #dislikeaction").attr('style','font-weight:100');
                }
            });
        });


        jQuery('.not-loggin').click(function () {
            alert('Vui lòng đăng nhập để sử dụng chức năng này!')
        });
    });
</script>