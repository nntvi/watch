<?php

function get_post_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = $id");
}

function get_name_thumb_by_id($id){
    return db_fetch_array("SELECT `post_thumb` FROM tbl_posts WHERE post_id = {$id}");
}

function update_post($data,$id){
    db_update('tbl_posts',$data,"`post_id` = {$id}");
}

function delete_post($id){
    db_delete('tbl_posts',"`post_id` = '{$id}'");
}

function insert_post($data){
    return db_insert('tbl_posts',$data);
}

function get_pagging($num_page, $page, $base_url = "")
{
    $str_pagging = "<ul class='pagging'>";
    if ($page > 1) {
        $page_prev = $page - 1;
        $str_pagging .= "<li><a href = \"{$base_url}&page={$page_prev}\">Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page) {
            $active = "class = 'active'";
        }
        $str_pagging .= "<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li><a href=\"{$base_url}&page={$page_next}\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}
#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_post($start = 1, $num_per_page = 10, $where = "")
{
    $list_post = db_fetch_array("SELECT * FROM `tbl_posts` LIMIT {$start}, {$num_per_page}");
    return $list_post;
}




#Xử lí tìm kiếm
function result_search($str){
    $item = db_num_rows("SELECT * FROM `tbl_posts` WHERE `post_title` LIKE '%{$str}%'");
    return $item;
}

function get_search($start = 1, $num_per_page = 10,$str)
{
    $list_post = db_fetch_array("SELECT * FROM `tbl_posts` where post_title like '%{$str}%' LIMIT {$start}, {$num_per_page}");
    return $list_post;
}
?>