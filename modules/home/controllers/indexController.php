<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
   
    $data['cat'] = get_name_cat(); // lấy tên danh mục cha
    $data['pro_hot'] = get_product_hot(); // lấy sản phẩm có lượt xem cao
    $data['slide'] = show_slide();
    
    load_view('index', $data);
}
function categoryAction()
{
    $id = $_GET['id'];
    $num_rows = db_num_rows("SELECT * FROM `tbl_products` WHERE cat_id = {$id}");
    # Số lượng bản ghi trên trang
    $num_per_page = 3;
    $total_row = $num_rows;

    #Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    #Hàm xử lý show toàn bộ info và phân trang
    $list_pro = get_item($start, $num_per_page, $id);

    $data['product'] = $list_pro;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['slide'] = show_slide();

    load_view('category', $data);
}
function filterAction()
{
    // $id_cat = $_GET['id'];
    $data['slide'] = show_slide();
    // xử lý ajax ở main.js
    load_view('filter',$data);
}

function searchfilterAction()
{
    $id_price = $_GET['id_price'];
    if ($id_price == 1) {
        $string = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_price` < 1000000");
    } else if ($id_price == 2) {
        $string = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_price` > 1000000 AND `pro_price` < 2000000");
    } else if ($id_price == 3) {
        $string = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_price` > 2000000 AND `pro_price` < 3000000");
    } else if ($id_price == 4) {
        $string = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_price` > 3000000 AND `pro_price` < 4000000");
    } else if ($id_price == 5) {
        $string = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_price` > 4000000 AND `pro_price` < 5000000");
    } else {
        $string = db_fetch_array("SELECT * FROM `tbl_products` WHERE `pro_price` > 5000000");
    }
    if (!empty($string)) {
        $data = "";
        foreach ($string as $item) {
            $data .= "<li>
                        <a href= '?mod=product&action=detail&id=". $item['pro_id'] ."' title=' class='thumb'>
                            <img src='../watch/admin/public/uploads/" . $item['pro_thumb'] . "'>
                        </a>
                        <a href='?mod=product&action=detail&id=" . ($item['pro_id']) ."' title=' class='product-name'>" . $item['pro_name'] . "</a>
                        <div class='price'>
                            <span class='new'>" . number_format($item['pro_price']).' đ' . "</span>
                        </div>
                        <div class='action clearfix'>
                            <a href='giohang/product-". $item['pro_id'] .".html' title='Thêm giỏ hàng' class='add-cart fl-left'>Thêm giỏ hàng</a>
                            <a href='?mod=cart&action=buyNow&id=" . $item['pro_id'] . "' title='Mua ngay' class='buy-now fl-right'>Mua ngay</a>
                        </div>
                    </li>";
        }
    }
    echo isset($data) ? $data : "";
}

function searchAction()
{
    global $error, $name, $title_search, $none;
    if (isset($_POST['btn_search'])) {
        $name = '';
        $error = array();
        if (!empty($_POST['search'])) {
            $name = $_POST['search'];
            //$s = vn_to_str($name);
            //print_r($s);
            $b = str_replace(' ','%',$name);
        }
    }
    if (isset($b)) {
        $search = get_search($b);
        $title_search = $b;
    }

    $data['search'] = isset($search) ? $search : null;
    $data['name'] = $title_search;
    load_view('search', $data);
}
