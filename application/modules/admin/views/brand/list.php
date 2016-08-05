<h4 class="widgettitle"><?php echo $this->lang->line('brand_list');?></h4>
<?php
$top = 71;
if($this->session->flashdata('success') != null || $this->session->flashdata('error') != null) {
    $top = 125;
}
successAlert($this->session->flashdata('success'));
errorAlert($this->session->flashdata('error'));
?>
<form action="" method="post" name="frmlist">
<!--    <input type="submit" style="top: --><?php //echo $top; ?><!--px" class="btn btndelall" name="btndelall" onclick="return confirm('Confirm Delete !')" value="--><?php //echo $this->lang->line('delete'); ?><!--" />-->
    <table class="table table-bordered" id="dyntable">
        <colgroup>
            <col class="con0" style="align: center; width: 1px" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
        </colgroup>
    <thead>
    <tr>
        <th class="head0 nosort"></th>
        <th class="head0"><?php echo $this->lang->line('brand'); ?></th>
        <th class="head1"><?php echo $this->lang->line('image_brand'); ?></th>
        <th class="head0"><?php echo $this->lang->line('action'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(count($list) > 0) {
        foreach($list as $key) {
            $type = $color = '';

            $avatar = base_url().'public/home/images/default_img_home.png';
            if($key['image'] != null) {
                $avatar = base_url().'uploads/brands/'.$key['image'];
            }
                ?>
            <tr class="gradeX">
                <td class="aligncenter"></td>
                <td><?php echo decodeStr($key['name']); ?></td>
                <td><img class="avatar" width="50" title="<?php echo $key['image']; ?>" src="<?php echo $avatar; ?>" alt=""></td>
                <td class="centeralign">
                    <a href="/admin/brand/edit/<?php echo $key['id_brand']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                </td>
            </tr>
        <?php
        }
    }
    ?>

    </tbody>
    </table>
</form>