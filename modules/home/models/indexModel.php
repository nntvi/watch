<?php 
    function get_name_cat(){
       return db_fetch_array("SELECT * FROM `tbl_cat_product` WHERE `parent_cat` = 0");
    }

    function get_sub_cat($cat_id){
       return db_fetch_array("SELECT * FROM `tbl_cat_product` WHERE `parent_cat` = {$cat_id}");
    }
    function get_product($cat_id)
    {
        return db_fetch_array("SELECT * FROM tbl_products WHERE cat_id = {$cat_id} ORDER BY tbl_products.pro_id DESC");
    }
  
    function get_product_hot()
    {
        return db_fetch_array("SELECT * FROM `tbl_products` order by pro_view desc limit 7");
    }