<?php 
function insert_slide($data){
    return db_insert('tbl_sliders',$data);
}
function get_sliders(){
    return db_fetch_array("SELECT * FROM `tbl_sliders`");
}

function update_slider($data,$id){
    return db_update('tbl_sliders',$data,"`slide_id` = $id");
}
function get_slider_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `slide_id` = {$id}");
}
?>