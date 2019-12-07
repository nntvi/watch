<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $data['cat'] = get_name_cat(); // lấy tên danh mục cha
    $data['pro_hot'] = get_product_hot(); // lấy sản phẩm có lượt xem cao
    load_view('index', $data);
}
function categoryAction()
{
    $id = $_GET['id'];
    $data['product'] = get_product_cat($id);
    load_view('category', $data);
}
function filterAction()
{
    // $id_cat = $_GET['id'];

    load_view('filter');
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
                        <a href='?page=detail_product' title=' class='thumb'>
                            <img src='../project/admin/public/uploads/" . $item['pro_thumb'] . "'>
                        </a>
                        <a href='?page=detail_product' title=' class='product-name'>" . $item['pro_name'] . "</a>
                        <div class='price'>
                            <span class='new'>" . $item['pro_price'] . "</span>
                        </div>
                        <div class='action clearfix'>
                            <a href='?page=cart' title='Thêm giỏ hàng' class='add-cart fl-left'>Thêm giỏ hàng</a>
                            <a href='?page=checkout' title='Mua ngay' class='buy-now fl-right'>Mua ngay</a>
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
        }
    }
    if (result_search($name) > 0) {
        $search = get_search($name);
        $title_search = $name;
    }

    $data['search'] = isset($search) ? $search : null ;
    $data['name'] = $title_search;
    load_view('search',$data);
}
