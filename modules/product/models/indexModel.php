<?php
  function show_detail($id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_id` = {$id}");
    }
?>
