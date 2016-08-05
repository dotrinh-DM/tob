<?php
    $display_json = array();
    $json_arr = array();

    foreach ($data as $item) {
        $json_arr['id'] = $item['id_user'];
        $info = $item['first_name'].' '. $item['last_name'].' - '. $item['alias_name'];
        $json_arr['value'] = $info;
        array_push($display_json, $json_arr);
    }

    $jsonWrite = json_encode($display_json); //encode that search data
    print $jsonWrite;
?>