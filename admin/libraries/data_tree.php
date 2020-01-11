<?php
function data_tree($data, $parent_id = 0, $level = 0)
{   
    // data ở đây là bảng danh mục
    $result = array(); // khai mảng
    foreach ($data as $item) {
        if ($item['parent_cat'] == $parent_id) { // nếu trong bảng parent_cat = 0 => nó là danh mục cha
            $item['level'] = $level; // => cấp của danh mục này là 0
            $result[] = $item; // gán qua cho một mảng khác cái vừa xác định được
            unset($data[$item['cat_id']]); // ko xét đến cái vừa xét nữa
            $child = data_tree($data, $item['cat_id'], $level + 1); // gọi lại data_tree, parent_id lúc này = vs id danh mục cha => mức của dm con là 1
            $result = array_merge($result, $child); // kết mảng result và child để xuất menu
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
             $new_data[$c['cat_id']] = $c; // lấy ra id của danh mục cha
        }
        else {
            if (!isset($new_data[$c['cat_parent_id']]['children']))
                $new_data[$c['cat_parent_id']]['children'] = [];

            $new_data[$c['cat_parent_id']]['children'][] = $c;
        }
    }
    return $new_data;
}
