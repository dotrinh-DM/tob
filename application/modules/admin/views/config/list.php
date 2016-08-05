<h4 class="widgettitle"><?php echo $this->lang->line('config_list');?></h4>
<?php
$top = 71;
if($this->session->flashdata('success') != null || $this->session->flashdata('error') != null) {
    $top = 125;
}
successAlert($this->session->flashdata('success'));
errorAlert($this->session->flashdata('error'));
?>
<form action="" method="post" name="frmlist">
    <input type="submit" style="top: <?php echo $top; ?>px" class="btn btndelall" name="btndelall" onclick="return confirm('Confirm Delete !')" value="<?php echo $this->lang->line('delete'); ?>" />
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
            <th class="head1"><?php echo $this->lang->line('alias_config'); ?></th>
            <th class="head1"><?php echo $this->lang->line('value_config'); ?></th>
            <th class="head0"><?php echo $this->lang->line('action'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(count($list) > 0) {
            foreach($list as $key) {
                ?>
                <tr class="gradeX">
                    <td class="aligncenter">
                        <span class="center"><input type="checkbox" class="checks" onclick="onchecked(0)" name="checks[][<?php echo $key['id_config']; ?>]" /></span>
                    </td>
                    <td><?php echo decodeStr($key['alias']); ?></td>
                    <td><?php echo word_limiter(decodeStr($key['value']),25); ?></td>
                    <td class="centeralign">
                        <a href="/admin/config/edit/<?php echo $key['id_config']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                        <a href="/admin/config/del/<?php echo $key['id_config']; ?>" title="delete" class="" onclick="return confirm('Confirm Delete!')"><span class="icon-trash"></span></a>
                    </td>
                </tr>
            <?php
            }
        }
        ?>

        </tbody>
    </table>
</form>