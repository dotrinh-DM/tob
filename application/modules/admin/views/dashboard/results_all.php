<?php
successAlert($this->session->flashdata('success'));
errorAlert($this->session->flashdata('error'));
?>
<?php
if(isset($search_all)) {
    foreach($search_all as $table) {
        if(count($table['list']) > 0) {
            ?>
            <h4 class="widgettitle"><?php echo $table['table_name']; ?></h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <?php
                        foreach($table['columns'] as $key_columns) {
                            foreach($key_columns as $val_columns) {
                                echo '<th>'.$val_columns.'</th>';
                            }
                        }
                    ?>
                </tr>
                </thead>
                <tbody>
            <?php
            $count = 1;
                foreach($table['list'] as $key) {
                    ?>
                    <tr>
                        <td class='centeralign'><?php echo $count; ?></td>
                        <?php
                        foreach($table['columns_table'] as $key_table) {
                            echo '<td>'.word_limiter(decodeStr($key[$key_table]),25).'</td>';
                        }
                        ?>
                        <td class="centeralign">
                            <a href="<?php echo $table['link_action'].$key[$table['columns_id']]; ?>" title="edit" class=""><span class="icon-edit"></span></a>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
            ?>

                </tbody>
            </table>
            <div class="divider30"></div>
            <?php
        }
    }
}