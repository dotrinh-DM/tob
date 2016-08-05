<div class="span8">
<?php get_array(); ?>
    <h4 class="widgettitle">Statistics (Top 10)</h4>
    <div class="widgetcontent">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1"><span class="icon-user"></span> New User</a></li>
                <li><a href="#tabs-2"><span class="icon-picture"></span> New Collecion</a></li>
                <li><a href="#tabs-3"><span class="icon-list-alt"></span> New News</a></li>
                <li><a href="#tabs-4"><span class="icon-envelope"></span> New Question</a></li>
            </ul>
            <div id="tabs-1">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('as_user'); ?></th>
                        <th><?php echo $this->lang->line('type_user'); ?></th>
                        <th><?php echo $this->lang->line('email_user'); ?></th>
                        <th><?php echo $this->lang->line('phone_user'); ?></th>
                        <th><?php echo $this->lang->line('date_user'); ?></th>
                        <th class="center"><?php echo $this->lang->line('action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($list_user_new) && count($list_user_new) > 0) {
                    foreach($list_user_new as $key) {
                        $type = '';
                        switch ($key['user_type']) {
                            case 1: $type = $this->lang->line('designer'); break;
                            case 2: $type = $this->lang->line('photographer'); break;
                            case 3: $type = $this->lang->line('modelor'); break;
                            case 4: $type = $this->lang->line('salon'); break;
                        }
                        ?>

                        <tr>
                            <td><a><strong><?php echo decodeStr($key['alias_name']); ?></strong></a></td>
                            <td><a><?php echo $type; ?></a></td>
                            <td><a href="mailto:<?php echo decodeStr($key['email']); ?>"><?php echo $key['email']; ?></a></td>
                            <td><a><?php echo $key['phone']; ?></a></td>
                            <td><a><?php
                                    $time_str = strtotime($key['date_create']);
                                    echo date('d/m/Y - H:m',$time_str);
                                    ?></a></td>
                            <td class="cen  ter"><a href="/admin/users/edit/<?php echo $key['id_user'] ?>" class="btn"><span class="icon-edit"></span> Edit</a></td>
                        </tr>

                    <?php }} ?>
                    </tbody>
                </table>
            </div>
            <div id="tabs-2">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('title_admin'); ?></th>
                        <th><?php echo $this->lang->line('idea_admin'); ?></th>
                        <th><?php echo $this->lang->line('technology_admin'); ?></th>
                        <th class="center"><?php echo $this->lang->line('action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($list_collection_new) && count($list_collection_new) > 0) {
                        foreach($list_collection_new as $key) { ?>
                            <tr>
                                <td><a><strong><?php echo decodeStr($key['title']); ?></strong></a></td>
                                <td><a><?php echo $key['idea']; ?></a></td>
                                <td><a><?php echo $key['technology']; ?></a></td>
                                <td><a><?php
                                        $time_str = strtotime($key['date_create']);
                                        echo date('d/m/Y - H:m',$time_str);
                                        ?></a></td>
                                <td class="cen  ter"><a href="/admin/collection/viewDetail/<?php echo $key['id_collection'] ?>" class="btn"><span class="icon-edit"></span> Edit</a></td>
                            </tr>

                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <div id="tabs-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('title_news'); ?></th>
                        <th><?php echo $this->lang->line('creator_news'); ?></th>
                        <th><?php echo $this->lang->line('date_user'); ?></th>
                        <th class="center"><?php echo $this->lang->line('action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $status = '';
                    if(isset($list_news_new) && count($list_news_new) > 0) {
                        foreach($list_news_new as $key) {
                            switch ($key['status']) {
                                case 1: $status = 'Enable'; $color = 'tomato'; break;
                                default: $status = 'Disable'; $color = 'gray'; break;
                            }
                            ?>
                            <tr>
                                <td><a><strong><?php echo decodeStr($key['title']); ?></strong></a></td>
                                <td><?php
                                    if(isset($list_admins) && count($list_admins) > 0) {
                                        foreach($list_admins as $key_user) {
                                            if($key['creator'] == $key_user['id_admins']) {
                                                echo decodeStr($key_user['name']);
                                            }
                                        }
                                    }
                                    ?></td>
                                <td><a><?php
                                        $time_str = strtotime($key['date_create']);
                                        echo date('d/m/Y - H:m',$time_str);
                                        ?></a></td>
                                <td class="cen  ter"><a href="/admin/news/edit/<?php echo $key['id_news']; ?>" class="btn"><span class="icon-edit"></span> Edit</a></td>
                            </tr>

                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <div id="tabs-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('title_question'); ?></th>
                        <th><?php echo $this->lang->line('creator_news'); ?></th>
                        <th><?php echo $this->lang->line('date_user'); ?></th>
                        <th class="center"><?php echo $this->lang->line('action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $status = '';
                    if(isset($list_question_new) && count($list_question_new) > 0) {
                        foreach($list_question_new as $key) {
                            ?>
                            <tr>
                                <td><a><strong><?php echo decodeStr($key['title']); ?></strong></a></td>
                                <td><?php
                                    if(isset($list_users) && count($list_users) > 0) {
                                        foreach($list_users as $key_user) {
                                            if($key['creator'] == $key_user['id_user']) {
                                                echo decodeStr($key_user['alias_name']);
                                            }
                                        }
                                    }
                                    ?></td>
                                <td><a><?php
                                        $time_str = strtotime($key['date_create']);
                                        echo date('d/m/Y - H:m',$time_str);
                                        ?></a></td>
                                <td class="cen  ter"><a href="/admin/news/edit/<?php echo $key['id_news']; ?>" class="btn"><span class="icon-edit"></span> Edit</a></td>
                            </tr>

                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div><!--#tabs-->
    </div><!--widgetcontent-->


</div><!--span8-->
<div class="span4">

    <h4 class="widgettitle nomargin">Calendar</h4>
    <div class="widgetcontent">
        <div id="calendar" class="widgetcalendar"></div>
    </div><!--widgetcontent-->
</div><!--span4-->