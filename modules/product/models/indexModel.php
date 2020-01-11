<?php
  function show_detail($id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_id` = {$id}");
  }
  function check_remain($id){
    return db_fetch_row("SELECT pro_remain FROM `tbl_products` WHERE `pro_id` = {$id}");
  }
  function get_name($id){
    return db_fetch_row("SELECT pro_name FROM `tbl_products` WHERE `pro_id` = {$id}");
  }
?>
