<?php 
function get_page_by_id($id){
return db_fetch_row("SELECT * FROM  `tbl_pages` WHERE `page_id` = {$id}");
}
function show_page(){
    $pages = db_fetch_array("SELECT * FROM  `tbl_pages`");
    return $pages;
}

function update_page($data,$id){
    db_update('tbl_pages',$data,"`page_id` = {$id}");
}
?>