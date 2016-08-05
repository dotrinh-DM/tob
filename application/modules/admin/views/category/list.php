<h4 class="widgettitle"><?php echo $this->lang->line('cate_list');?></h4>
<?php
$top = 71;
if($this->session->flashdata('success') != null || $this->session->flashdata('error') != null) {
    $top = 125;
}
successAlert($this->session->flashdata('success'));
errorAlert($this->session->flashdata('error'));
?>
<form action="" method="post" name="frmlist">

    <table class="table table-bordered" id="dyntable">
        <colgroup>
            <col class="con0" style="align: center; width: 1px;" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
        </colgroup>
    <thead>
    <tr>
        <th class="head0 nosort"></th>
        <th class="head1"><?php echo $this->lang->line('category'); ?></th>
        <th class="head0"><?php echo $this->lang->line('image_cate'); ?></th>
        <th class="head0"><?php echo $this->lang->line('status'); ?></th>
        <th class="head0"><?php echo $this->lang->line('action'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(count($list) > 0) {
        foreach($list as $key) {
            $type = $status = $color = '';

            switch ($key['status']) {
                case 1: $status = 'Enable'; $color = 'tomato'; break;
                default: $status = 'Disable'; $color = 'gray'; break;
            }

            $avatar = base_url().'public/home/images/default_img_home.png';
            if($key['image'] != null) {
                $avatar = base_url().'uploads/category/'.$key['image'];
            }
                ?>
            <tr class="gradeX">
                <td class="aligncenter">
                    <span class="center"></span>
                </td>
                <td><?php echo decodeStr($key['name']); ?></td>
                <td><img class="avatar" width="50" title="<?php echo $key['image']; ?>" src="<?php echo $avatar; ?>" alt=""></td>
                <td><?php echo "<a title='click to change status' style='color:".$color."' href='".base_url().'admin/category/status/'.$key['id_category']."/".$key['status']."'>$status</a>"; ?></td>
                <td class="centeralign">
                    <a href="/admin/category/edit/<?php echo $key['id_category']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                    <a href="/admin/category/confirm_delete/<?php echo $key['id_category']; ?>" title="delete" ><span class="icon-trash"></span></a>
                </td>
            </tr>
        <?php
        }
    }
    ?>

    </tbody>
    </table>
</form>