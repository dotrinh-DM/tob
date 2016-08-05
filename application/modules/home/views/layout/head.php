<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?> | Chuyencuatoc.vn</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/home/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/home/css/styles.css?v=2.0" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/general.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/home/js/main.js"></script>

    <?php if (isset($page) && $page == 'photo-listing'): ?>
        <link rel='stylesheet' href='<?php echo base_url(); ?>/public/home/css/justifiedGallery.css' type='text/css' media='all' />
        <script src='<?php echo base_url(); ?>/public/home/js/justifiedGallery.js'></script>
    <?php endif; ?>
    <?php if (isset($page) && $page == 'photo-detail'): ?>
        <script src='<?php echo base_url(); ?>/public/home/js/tooltip.js'></script>
    <?php endif; ?>
</head>
<body>