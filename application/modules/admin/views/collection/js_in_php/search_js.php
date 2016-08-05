<style>
    .mediamgr_content {
        padding: 0;
        margin-right: 0;
        width: 1082px;
    }

    .widthTrash {
        width: 17px;
    }

    .listfile li span {
        float: left;
        margin-left: 8px;
    }

    .listfile li p {
        text-align: center;
    }
</style>
<script>
    jQuery(document).ready(function () {
        jQuery('#filekeyword').on('keyup', function () {
            var value_input = jQuery('#filekeyword').val();
            var string_send = "string_name=" + value_input;
            jQuery.ajax({
                url: "<?php echo site_url('admin/collection/searchCollection'); ?>",
                type: "POST",
                data: string_send,
                success: function (result) {
                    jQuery('.listfile').html(result);
                }
            });
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/backend/js/media.js"></script>