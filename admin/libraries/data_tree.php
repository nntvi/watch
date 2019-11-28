<?php
function data_tree($data, $parent_id = 0, $level = 0)
{
    $result = array();
    foreach ($data as $item) {
        if ($item['parent_cat'] == $parent_id) {
            $item['level'] = $level;
            $result[] = $item;
            unset($data[$item['cat_id']]);
            $child = data_tree($data, $item['cat_id'], $level + 1);
            $result = array_merge($result, $child);
        }
    }
    return $result;
}




function menu_two()
{
    $data = db_fetch_array("SELECT * FROM tbl_cat_product");
    $new_data = [];
    foreach ($data as $c) {
        if ($c['cat_parent_id'] == 0){
             $new_data[$c['cat_id']] = $c;
        }
        else {
            if (!isset($new_data[$c['cat_parent_id']]['children']))
                $new_data[$c['cat_parent_id']]['children'] = [];

            $new_data[$c['cat_parent_id']]['children'][] = $c;
        }
    }
    return $new_data;
}
