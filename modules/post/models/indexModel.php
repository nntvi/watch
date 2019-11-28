<?php
function list_post(){
    return db_fetch_array("SELECT * FROM `tbl_posts`");
}

function get_post_by_id($id){
return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = {$id}");
}


#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_post($start = 1, $num_per_page = 10, $where = "")
{
    $list_post = db_fetch_array("SELECT * FROM `tbl_posts` LIMIT {$start}, {$num_per_page}");
    return $list_post;
}

?>