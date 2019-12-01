<?php
function construct()
{
    load_model('index');
}

function list_customerAction()
{
    $num_rows = db_num_rows("SELECT * FROM `tbl_customers`");

    # Số lượng bản ghi trên trang
    $num_per_page = 3;
    $total_row = $num_rows;

    #Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    $list_customer = get_list_customer($start, $num_per_page);
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['customer'] = $list_customer;
    load_view('list_customer', $data);
}

function list_orderAction()
{
    $num_rows = db_num_rows("SELECT tbl_orders.order_id,cus_name,detail_qty,order_sub_total,
        cus_date, count(tbl_detail_order.order_id) sl,
        status FROM tbl_orders 
        INNER JOIN tbl_customers on tbl_orders.cus_id = tbl_customers.cus_id 
        INNER JOIN tbl_detail_order on tbl_orders.cus_id = tbl_detail_order.cus_id 
        GROUP BY tbl_orders.order_id, tbl_customers.cus_name");

    # Số lượng bản ghi trên trang
    $num_per_page = 3;
    $total_row = $num_rows;

    #Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    $list_order = get_list_order($start,$num_per_page);
  
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['order'] = $list_order;
    load_view('list_order', $data);
}

function detail_orderAction()
{
    $id = $_GET['id'];
    if (isset($_POST['btn_update_status'])) {
        $data = array(
            'status' => $_POST['status']
        );
        update_status($data, $id);
        redirect("?mod=sale&action=list_order");
    }
    $data['detail_order'] = get_detail_order($id);
    $data['dt_od_product'] = get_detail_order_product($id);
    $data['result_order'] = get_result_order(($id));
    load_view('detail_order', $data);
}

function search_orderAction(){
    global $error, $str;
    if(isset($_POST['btn_search'])){
        $str = '';
        $error = array();
        if(empty($_POST['search'])){
            $error['search'] = "Nhập từ khoá tìm kiếm";
        }else{
            $str = $_POST['search'];
        }
    }
    // nếu tìm kiếm thấy có trong bảng
    if(result_search($str) > 0){ 
        $list_search = get_order_search($str);
    }
    $data['list_search'] = $list_search;
    load_view('search_order',$data);
}
function search_customerAction(){
    global $error, $str;
    if(isset($_POST['btn_search'])){
        $str = '';
        $error = array();
        if(empty($_POST['search'])){
            $error['search'] = "Nhập từ khoá tìm kiếm";
        }else{
           $str = trim($_POST['search']);
        }
    }
   
    //nếu tìm kiếm thấy có trong bảng
    if(result_search($str) > 0){ 
        $list_search = get_customer_search($str);
    }
    $data['list_search'] = isset($list_search) ? $list_search : "";
    load_view('search_customer',$data);
}