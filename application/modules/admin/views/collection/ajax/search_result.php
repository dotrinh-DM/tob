<?php foreach ($collections as $collection) { ?>
    <li>
        <?php if ($collection->link != '') { ?>
            <a href="<?php echo site_url("admin/collection/viewDetail/" . $collection->id_of_collec); ?>"
               data-rel="image">
                <img
                    src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/' . $collection->link; ?>"
                    alt="<?php echo $collection->title; ?>"/>
            </a>
        <?php } else { ?>
            <a href="#" data-rel="image">
                <img <?php echo $collection->id_of_collec; ?>
                    src="<?php echo base_url() . 'timthumb.php?src=' . base_url() . 'uploads/photos/no-img.png'; ?>"/>
            </a>
        <?php } ?>
        <p class="filename"><?php echo word_limiter($collection->title, 3); ?></p>

        <a onclick="return confirm('Are you sure?')" class="widthTrash"
           href="<?php echo site_url("admin/collection/delete/" . $collection->id_of_collec); ?>"><span
                class="icon-trash"></span>
        </a>
        <span> Đang: </span>
        <a href="<?php echo site_url("admin/collection/acceptCollection/" . $collection->id_of_collec . '/' . $collection->status_collection); ?>">
            <?php status($collection->status_collection); ?>
        </a>
    </li>
<?php } ?>