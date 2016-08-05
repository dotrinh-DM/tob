<h4 class="widgettitle"><?php echo $this->lang->line('users_list');?></h4>
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
            <col class="con1" />
        </colgroup>
    <thead>
    <tr>
        <th class="head0 nosort"><input type="checkbox" class="checkall" onclick="onchecked(1)" /></th>
        <th class="head1"><?php echo $this->lang->line('name_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('as_user'); ?></th>
        <th class="head0"><?php echo $this->lang->line('avata_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('email_user'); ?></th>
        <th class="head0"><?php echo $this->lang->line('type_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('phone_user'); ?></th>
        <th class="head0"><?php echo $this->lang->line('namefb_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('linkfb_user'); ?></th>
        <th class="head0"><?php echo $this->lang->line('address_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('city_user'); ?></th>
        <th class="head0"><?php echo $this->lang->line('district_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('date_user'); ?></th>
        <th class="head1"><?php echo $this->lang->line('status'); ?></th>
        <th class="head0"><?php echo $this->lang->line('action'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(count($list) > 0) {
        foreach($list as $key) {
            $type = $status = $color = '';
            switch ($key['user_type']) {
                case 1: $type = $this->lang->line('designer'); break;
                case 2: $type = $this->lang->line('photographer'); break;
                case 3: $type = $this->lang->line('modelor'); break;
                case 4: $type = $this->lang->line('salon'); break;
            }
            switch ($key['status']) {
                case 1: $status = 'Enable'; $color = 'tomato'; break;
                default: $status = 'Disable'; $color = 'gray'; break;
            }
            $avatar = base_url().'uploads/avatars/default.png';
            if($key['avatar'] != null) {
                $avatar = base_url().'uploads/avatars/'.$key['avatar'];
            }
                ?>
            <tr class="gradeX">
                <td class="aligncenter">
                    <span class="center"><input type="checkbox" class="checks" onclick="onchecked(0)" name="checks[][<?php echo $key['id_user']; ?>]" /></span>
                </td>
                <td><?php echo decodeStr($key['first_name']).' '.decodeStr($key['last_name']); ?></td>
                <td style="word-break: break-all;"><?php echo decodeStr($key['alias_name']); ?></td>
                <td><img class="avatar" width="50" title="<?php echo $key['avatar']; ?>" src="<?php echo $avatar; ?>" alt=""></td>
                <td><a style="word-break: break-all;" href="mailto:<?php echo decodeStr($key['email']); ?>" title="<?php echo decodeStr($key['email']); ?>"><?php echo decodeStr($key['email']); ?></a></td>
                <td><?php echo $type; ?></td>
                <td style="word-break: break-all;"><?php echo $key['phone']; ?></td>
                <td style="word-break: break-all;"><?php echo decodeStr($key['facebook_name']); ?></td>
                <td><a style="word-break: break-all;" target="_blank" title="<?php echo decodeStr($key['facebook_link']); ?>" href="<?php echo 'http://www.'.decodeStr($key['facebook_link']); ?>"><?php echo substr(strstr(decodeStr($key['facebook_link']),'.com/'),5); ?></a></td>
                <td style="word-break: break-all;"><?php echo decodeStr($key['address']); ?></td>
                <td><?php
                    foreach($province_arr as $key_city) {
                        if($key['city'] == $key_city['provinceid']) echo $key_city['name'];
                    }
                    ?></td>
                <td><?php
                    foreach($district_arr as $key_district) {
                        if($key['district'] == $key_district['districtid']) echo $key_district['name'];
                    }
                    ?></td>
                <td style="width: 10% ;word-break: break-all;"><?php
                    $time_str = strtotime($key['date_create']);
                    echo date('d/m/Y - H:m',$time_str);
                    ?></td>
                <td><?php echo "<a title='click to change status' style='color:".$color."' href='".base_url().'admin/users/status/'.$key['id_user']."/".$key['status']."'>$status</a>"; ?></td>
                <td class="centeralign">
                    <a href="/admin/users/edit/<?php echo $key['id_user']; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                    <a href="/admin/users/del/<?php echo $key['id_user']; ?>" title="delete" class="" onclick="return confirm('Confirm Delete!')"><span class="icon-trash"></span></a>
                </td>
            </tr>
        <?php
        }
    }
    ?>

    </tbody>
    </table>
</form>