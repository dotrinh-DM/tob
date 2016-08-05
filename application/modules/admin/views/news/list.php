<h4 class="widgettitle"><?php echo $this->lang->line('news_list');?></h4>
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
            <th class="head1"><?php echo $this->lang->line('title_news'); ?></th>
<!--            <th class="head1">--><?php //echo $this->lang->line('content_news'); ?><!--</th>-->
            <th class="head1"><?php echo $this->lang->line('creator_news'); ?></th>
            <th class="head1"><?php echo $this->lang->line('status'); ?></th>
            <th class="head1"><?php echo $this->lang->line('date_user'); ?></th>
            <th class="head0"><?php echo $this->lang->line('action'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(count($list) > 0) {
            $status = $color = '';
            foreach($list as $key) {
                switch ($key['status']) {
                    case 1: $status = 'Enable'; $color = 'tomato'; break;
                    default: $status = 'Disable'; $color = 'gray'; break;
                }
                ?>
                <tr class="gradeX">
                    <td class="aligncenter">
                        <span class="center"><input type="checkbox" class="checks" onclick="onchecked(0)" name="checks[][<?php echo $key['id_news']; ?>]" /></span>
                    </td>
                    <td><a target="_blank" href="<?php echo base_url().'news/'.$key['alias']; ?>"><?php echo decodeStr($key['title']); ?></a></td>
<!--                    <td>--><?php //echo decodeStr($key['content']); ?><!--</td>-->
                    <td><?php
                        foreach($list_admins as $key_user) {
                            if($key['creator'] == $key_user['id_admins']) {
                                echo decodeStr($key_user['name']);
                            }
                        }
                        ?></td>
                    <td><?php echo "<a title='click to change status' style='color:".$color."' href='".base_url().'admin/news/status/'.$key['id_news']."/".$key['status']."'>$status</a>"; ?></td>
                    <td style="width: 10% ;word-break: break-all;"><?php
                        $time_str = strtotime($key['date_create']);
                        echo date('d/m/Y - H:m',$time_str);
                        ?></td>
                    <td class="centeralign">
                        <a href="/admin/news/edit/<?php echo $key['id_news']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                        <a href="/admin/news/del/<?php echo $key['id_news']; ?>" title="delete" class="" onclick="return confirm('Confirm Delete!')"><span class="icon-trash"></span></a>
                    </td>
                </tr>
            <?php
            }
        }
        ?>

        </tbody>
    </table>
</form>
