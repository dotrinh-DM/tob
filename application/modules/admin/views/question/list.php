<h4 class="widgettitle"><?php echo $this->lang->line('question_list');?></h4>
<?php
$top = 71;
if($this->session->flashdata('success') != null || $this->session->flashdata('error') != null) {
    $top = 125;
}
successAlert($this->session->flashdata('success'));
errorAlert($this->session->flashdata('error'));
?>
<form action="" method="post" name="frmlist">
    <input style="top: <?php echo $top; ?>px" type="submit" class="btn btndelall" name="btndelall" onclick="return confirm('Confirm Delete !')" value="<?php echo $this->lang->line('delete'); ?>" />
    <table class="table table-bordered" id="dyntable">
        <colgroup>
            <col class="con0" style="align: center; width: 4%" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
        </colgroup>
        <thead>
        <tr>
            <th class="head0 nosort"><input type="checkbox" class="checkall" onclick="onchecked(1)"/></th>
            <th class="head1"><?php echo $this->lang->line('title_question'); ?></th>
<!--            <th class="head1">--><?php //echo $this->lang->line('content_news'); ?><!--</th>-->
            <th class="head1"><?php echo $this->lang->line('creator_news'); ?></th>
            <th class="head1"><?php echo $this->lang->line('status'); ?></th>
            <th class="head1"><?php echo $this->lang->line('reply_news'); ?></th>
            <th class="head1"><?php echo $this->lang->line('date_user'); ?></th>
            <th class="head0"><?php echo $this->lang->line('action'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($list) && count($list) > 0) {
            $status = $color = $reply = '';
            foreach($list as $key) {
                switch ($key['status']) {
                    case 1: $status = 'Enable'; $color = 'tomato'; break;
                    default: $status = 'Disable'; $color = 'gray'; break;
                }

                if($key['content'] != null) {
                    $reply = 'ok';
                } else $reply = "<a title='Click to reply' href='/admin/question/edit/".$key['id_news']."'>waiting...</a>";
                ?>
                <tr class="gradeX">
                    <td class="aligncenter">
                        <span class="center"><input type="checkbox" class="checks" onclick="onchecked(0)" name="checks[][<?php echo $key['id_news']; ?>]" /></span>
                    </td>
                    <td><a target="_blank" title="<?php echo decodeStr($key['title']); ?>" href="<?php echo base_url().'news/'.$key['alias']; ?>"><?php echo word_limiter(decodeStr($key['title']),22); ?></a></td>
                    <td><?php
                        foreach($list_users as $key_user) {
                            $creator = '-';
                            if($key['creator'] == $key_user['id_user']) {
                                $creator = decodeStr($key_user['alias_name']);
                                break;
                            }
                        }
                        echo $creator;
                        ?></td>
                    <td><?php echo "<a style='color:".$color."' href='".base_url().'admin/question/status/'.$key['id_news']."/".$key['status']."'>$status</a>"; ?></td>
                    <td><?php echo $reply; ?></td>
                    <td style="width: 10% ;word-break: break-all;"><?php
                        $time_str = strtotime($key['date_create']);
                        echo date('d/m/Y - H:m',$time_str);
                        ?></td>
                    <td class="centeralign">
                        <a href="/admin/question/edit/<?php echo $key['id_news']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                        <a href="/admin/question/del/<?php echo $key['id_news']; ?>" title="delete" class="" onclick="return confirm('Confirm Delete!')"><span class="icon-trash"></span></a>
                    </td>
                </tr>
            <?php
            }
        }
        ?>

        </tbody>
    </table>
</form>
