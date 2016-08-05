<div class="site-main simple-page" id="main">
    <?php if(isset($images_banner) && $images_banner != null) echo $images_banner; ?>

    <h3 class="title"><?php echo decodeStr($titles); ?></h3>
    <p style="margin-top: 20px;"><?php echo decodeStr($content); ?></p>
</div>
