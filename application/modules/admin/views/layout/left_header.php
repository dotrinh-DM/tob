<div class="leftpanel" xmlns="http://www.w3.org/1999/html">
<div class="logopanel">
    <h1><a href="<?php echo base_url().'admin'; ?>" style="font-family: serif;font-weight: bold;">TOB<span></span></a></h1>
</div><!--logopanel-->
<div class="datewidget">Hôm nay: <?php echo gmdate("D, d M Y H:i:s +7T", time() + 3150 * (+7 + date("I"))); ?></div>
    <div class="searchwidget">
        <?php $txtsearch = ''; if($this->uri->segment(2) == 'search_all') $txtsearch = urldecode($this->uri->segment(3)); ?>
        <form action="/admin" method="post">
            <div class="input-append">
                <input type="text" name="txtsearchall" class="span2 search-query" id="searchall" value="<?php if($txtsearch != null) echo $txtsearch; ?>" placeholder="Search all...">
                <button onclick="check_text('searchall')" type="submit" class="btn"><span class="icon-search"></span></button>
            </div>
        </form>
    </div><!--searchwidget-->