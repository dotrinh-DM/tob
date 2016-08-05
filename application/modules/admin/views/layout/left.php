<div class="leftmenu">
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">Main Navigation</li><!--class="active"-->
        <li><a href="<?php echo site_url('admin'); ?>"><span class="icon-align-justify"></span> Dashboard</a></li>
        <li><a href="<?php echo site_url('home/index')?>" target="_blank"><span class="icon-hand-up"></span>Visit now!</a></li>
        <li class="dropdown"><a href=""><span class="icon-picture"></span><?php echo $this->lang->line('manage_collection'); ?></a>
            <ul>
<!--                <li><a href="--><?php //echo site_url('admin/collection/uploadAlbum'); ?><!--">--><?php //echo $this->lang->line('new'); ?><!--.</a></li>-->
                <li><a href="<?php echo site_url('admin/collection'); ?>">Đang hiện</a></li>
                <li><a href="<?php echo site_url('admin/collection/approve'); ?>"><?php echo $this->lang->line('approve'); ?>.</a></li>
                <li><a href="<?php echo site_url('admin/collection/manageTrash'); ?>"><?php echo $this->lang->line('trash'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-user"></span><?php echo $this->lang->line('manage_users'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/users'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/users/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-list-alt"></span><?php echo $this->lang->line('manage_news'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/news'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/news/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-envelope"></span><?php echo $this->lang->line('manage_question'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/question'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/question/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-align-justify"></span><?php echo $this->lang->line('manage_brand'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/brand'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/brand/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-align-justify"></span><?php echo $this->lang->line('manage_cate'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/category'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/category/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-th-list"></span><?php echo $this->lang->line('manage_product'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/product'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/product/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href=""><span class="icon-cog"></span><?php echo $this->lang->line('manage_config'); ?></a>
            <ul>
                <li><a href="<?php echo site_url('admin/config'); ?>"><?php echo $this->lang->line('list_admin'); ?></a></li>
                <li><a href="<?php echo site_url('admin/config/insert'); ?>"><?php echo $this->lang->line('new'); ?></a></li>
            </ul>
        </li>
    </ul>
</div><!--leftmenu-->
</div>