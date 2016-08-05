<?php
    $display_json = array();
    $json_arr = array();
    foreach ($data as $item) {
        $json_arr['id'] = $item['id_product'];
        $json_arr['value'] = $item['name'];
        array_push($display_json, $json_arr);
    }
    $jsonWrite = json_encode($display_json); //encode that search data
    print $jsonWrite;
?>