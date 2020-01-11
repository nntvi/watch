<?php

function get_list_cat_product()
{
    return db_fetch_array("SELECT * FROM `tbl_cat_product`");
}
function update_cat_product($id, $data)
{
    db_update('tbl_cat_product', $data, "`cat_id` = '{$id}'");
}
function get_cat_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_cat_product` WHERE `cat_id` = {$id}");
    return $item;
}
function delete_cat($id)
{
    return db_delete('tbl_cat_product', "`cat_id` = {$id}");
}

function get($id){
    $name = db_fetch_array("SELECT * FROM `tbl_cat_product` WHERE `parent_cat` = {$id}");
    return $name;
}
function get_product_by_id($id){
    return db_fetch_row("SELECT tbl_products.*, tbl_cat_product.cat_name FROM tbl_products INNER JOIN tbl_cat_product ON tbl_products.cat_id = tbl_cat_product.cat_id WHERE `pro_id` = {$id}");
}
function add_product($data){
    db_insert('tbl_products',$data);
}

function update_product($data,$id){
    db_update('tbl_products',$data,"`pro_id` = '{$id}'");
}
function get_name_thumb_by_id($id){
    return db_fetch_row("SELECT `pro_thumb` FROM tbl_products WHERE pro_id = {$id}");
}
#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_name_of_product($start = 1, $num_per_page = 10, $where = "")
{
    $list_post = db_fetch_array("SELECT * FROM tbl_products ORDER BY pro_remain ASC  LIMIT {$start}, {$num_per_page}");
    return $list_post;
}
#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_cat_product($start = 1, $num_per_page = 10, $where = "")
{
    $list_post = db_fetch_array("SELECT * FROM `tbl_cat_product` LIMIT {$start}, {$num_per_page}");
    return $list_post;
}
function delete_product($id){
    db_delete('tbl_products',"`pro_id` = '{$id}'");
}

function get_search($str)
{
    $list_pro = db_fetch_array("SELECT * FROM tbl_products where pro_name like '%{$str}%'");
    return $list_pro;
}
function count_pro_search($str){
    return db_fetch_row("SELECT COUNT(pro_id) as sl FROM `tbl_products` where pro_name like '%{$str}%'");
}
function result_search($str){
    $item = db_num_rows("SELECT * FROM `tbl_products` WHERE `pro_name` LIKE '%{$str}%'");
    return $item;
}

function count_pro(){
    return db_fetch_row("SELECT COUNT(pro_id) as count_id FROM `tbl_products`");
}

function number_old($id){
    return db_fetch_row("SELECT pro_number,pro_remain FROM tbl_products WHERE `pro_id` = $id");
}