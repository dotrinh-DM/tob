<script type="text/javascript" src="<?php echo base_url(); ?>public/backend/js/general/jquery-ui-1.8.2.custom.min.js"></script>
<link href="<?php echo base_url(); ?>public/backend/css/css.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    $(function () {

        $("#designer").autocomplete({
            source: "<?php echo site_url("home/collection/getUserById/1"); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#designer1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });

        $("#photographer").autocomplete({
            source: "<?php echo site_url('home/collection/getUserById/2'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#photographer1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });

        $("#modelor").autocomplete({
            source: "<?php echo site_url('home/collection/getUserById/3'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#modelor1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });

        $("#salon").autocomplete({
            source: "<?php echo site_url('home/collection/getUserById/4'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#salon1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });

        $("#curly").autocomplete({
            source: "<?php echo site_url('home/collection/getProductByCate/1'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#curly1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });

        $("#dye").autocomplete({
            source: "<?php echo site_url('home/collection/getProductByCate/2'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#dye1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });

        $("#style").autocomplete({
            source: "<?php echo site_url('home/collection/getProductByCate/3'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#style1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });
        $("#care").autocomplete({
            source: "<?php echo site_url('home/collection/getProductByCate/4'); ?>",
            minLength: 1,
            select: function (event, ui) {
                var getId = ui.item.id;
                $("#care1").attr('value',getId);
            },
            html: true,

            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000);
            }
        });
//
//        $(".autocomplete_trigger").autocomplete({
//            source: $(this).data("url"),
//            minLength: 1,
//            select: function (event, ui) {
//                var getId = ui.item.id;
//                $(this).next().attr('value',getId);
//            },
//            html: true,
//
//            open: function (event, ui) {
//                $(".ui-autocomplete").css("z-index", 1000);
//            }
//        });

    });
</script>