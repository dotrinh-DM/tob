<h4 class="widgettitle"><?php echo $this->lang->line('pro_list');?></h4>
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
            <col class="con0" />
        </colgroup>
    <thead>
    <tr>
        <th class="head0 nosort"><input type="checkbox" class="checkall" onclick="onchecked(1)" /></th>
        <th class="head1"><?php echo $this->lang->line('product'); ?></th>
        <th class="head0"><?php echo $this->lang->line('category'); ?></th>
        <th class="head1"><?php echo $this->lang->line('brand'); ?></th>
        <th class="head0"><?php echo $this->lang->line('image_pro'); ?></th>
        <th class="head1"><?php echo $this->lang->line('status'); ?></th>
        <th class="head0"><?php echo $this->lang->line('action'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(count($list) > 0) {
        foreach($list as $key) {
            $status = $color = $cate = $brand = '';

            switch ($key['status']) {
                case 1: $status = 'Enable'; $color = 'tomato'; break;
                default: $status = 'Disable'; $color = 'gray'; break;
            }

            $avatar = base_url().'public/home/images/default_img_home.png';
            if($key['image'] != null) {
                $avatar = base_url().'uploads/product/'.$key['image'];
            }

            if(isset($list_cate) && count($list_cate) > 0) {
                foreach($list_cate as $key_cate) {
                    if($key['id_category'] == $key_cate['id_category']) {
                        $cate = $key_cate['name'];
                    }
                }
            }

            if(isset($list_brand) && count($list_brand) > 0) {
                foreach($list_brand as $key_brand) {
                    if($key['id_brand'] == $key_brand['id_brand']) {
                        $brand = $key_brand['name'];
                    }
                }
            }
                ?>
            <tr class="gradeX">
                <td class="aligncenter">
                    <span class="center"><input type="checkbox" class="checks" onclick="onchecked(0)" name="checks[][<?php echo $key['id_product']; ?>]" /></span>
                </td>
                <td><?php echo decodeStr($key['name']); ?></td>
                <td><?php echo decodeStr($cate); ?></td>
                <td><?php echo decodeStr($brand); ?></td>
                <td><img class="avatar" width="50" title="<?php echo $key['image']; ?>" src="<?php echo $avatar; ?>" alt=""></td>
                <td><?php echo "<a title='click to change status' style='color:".$color."' href='".base_url().'admin/product/status/'.$key['id_product']."/".$key['status']."'>$status</a>"; ?></td>
                <td class="centeralign">
                    <a href="/admin/product/edit/<?php echo $key['id_product']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                    <a href="/admin/product/del/<?php echo $key['id_product']; ?>" title="delete" class="" onclick="return confirm('Confirm Delete!')"><span class="icon-trash"></span></a>
                </td>
            </tr>
        <?php
        }
    }
    ?>

    </tbody>
    </table>
</form>