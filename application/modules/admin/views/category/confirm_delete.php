<?php
successAlert($this->session->flashdata('success'));
errorAlert($this->session->flashdata('error'));
?>

<div class="alert alert-block notice_conf_del">
    <h4>Warning!</h4>
    <p><?php echo $this->lang->line('notice_confirm_delete_cate');?></p>
</div>

<?php
$id_del = '';
if(isset($id_cate) && $id_cate != null) {$id_del = $id_cate;}
?>
<div class="stdformbutton div_conf_del">
    <a href="<?php echo base_url('index.php/admin/category/del').'/'.$id_del ?>"><input class="btn conf_del yes" type="button" value="<?php echo $this->lang->line('btnyes'); ?>"></a>
    <a href="<?php echo base_url('index.php/admin/category') ?>"><input class="btn conf_del no" type="button" value="<?php echo $this->lang->line('btnback'); ?>"></a>
</div>