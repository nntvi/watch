<?php
function get_name_cat()
{
    return db_fetch_array("SELECT * FROM `tbl_cat_product` WHERE `parent_cat` = 0");
}

function get_sub_cat($cat_id)
{
    return db_fetch_array("SELECT * FROM `tbl_cat_product` WHERE `parent_cat` = {$cat_id}");
}
function get_product($cat_id)
{
    return db_fetch_array("SELECT * FROM tbl_products WHERE cat_id = {$cat_id} ORDER BY tbl_products.pro_id DESC");
}

function get_product_cat($id)
{
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE cat_id = {$id}");
}

#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_item($start = 1, $num_per_page = 10, $id)
{
    $list_post = db_fetch_array("SELECT * FROM `tbl_products` WHERE cat_id = {$id} LIMIT {$start}, {$num_per_page}");
    return $list_post;
}

function get_product_hot()
{
    return db_fetch_array("SELECT * FROM `tbl_products` order by pro_view desc limit 7");
}

function result_search($name)
{
    $item = db_num_rows("SELECT * FROM `tbl_products` WHERE `pro_name` LIKE '%{$name}%'");
    return $item;
}
function get_search($name)
{
    $list_search = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_name` LIKE '%{$name}%'");
    return $list_search;
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
function vn_to_str ($str){
 
    $str = array(
     
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
     
    'd'=>'đ',
     
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
     
    'i'=>'í|ì|ỉ|ĩ|ị',
     
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
     
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
     
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     
    'D'=>'Đ',
     
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
     
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
     
    );
}

function show_slide(){
    return db_fetch_array("SELECT * FROM `tbl_sliders`");
}

function check_remain($id){
    return db_fetch_row("SELECT pro_remain FROM `tbl_products` WHERE `pro_id` = {$id}");
  }
  function get_name($id){
    return db_fetch_row("SELECT pro_name FROM `tbl_products` WHERE `pro_id` = {$id}");
  }