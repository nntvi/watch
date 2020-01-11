<?php
function construct()
{
    load_model('index');
}

function list_customerAction()
{
    $num_rows = db_num_rows("SELECT * FROM `tbl_customers` JOIN tbl_orders ON tbl_customers.cus_id = tbl_orders.cus_id");

    # Số lượng bản ghi trên trang
    $num_per_page = 5;
    $total_row = $num_rows;

    #Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    $list_customer = get_list_customer($start, $num_per_page);
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['customer'] = $list_customer;
    $data['count'] = count_customer();
    load_view('list_customer', $data);
}

function list_orderAction()
{
    // Phải lấy ra được id của đơn hàng, tên kh, số lượng chi tiết sp, tổng giá, ngày hình thành hóa đơn, trạng thái
    $num_rows = db_num_rows("SELECT tbl_orders.order_id,cus_name,detail_qty,order_sub_total, tbl_orders.note,
                                    cus_date, count(tbl_detail_order.order_id) sl, status 
                             FROM tbl_orders 
                             INNER JOIN tbl_customers on tbl_orders.cus_id = tbl_customers.cus_id 
                             INNER JOIN tbl_detail_order on tbl_orders.cus_id = tbl_detail_order.cus_id 
                             GROUP BY tbl_orders.order_id, tbl_customers.cus_name
                             ORDER BY tbl_orders.order_id DESC");

    # Số lượng bản ghi trên trang
    $num_per_page = 5;
    $total_row = $num_rows;

    #Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;

    $list_order = get_list_order($start,$num_per_page);
  
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['order'] = $list_order;
    
    $data['count'] = count_order();
    $data['countNote'] = countannouncenotheader();
    load_view('list_order', $data);
}

function detail_orderAction()
{
    $id = $_GET['id'];
    updateannounce($id); // cập nhật xem admin đã xem xét đơn hàng chưa
    if (isset($_POST['btn_update_status'])) {
        $data = array(
            'status' => $_POST['status'],
            'order_day' => date('d'),
            'order_month' => date('m'),
            'order_year' => date('Y'),
        );
        update_status($data, $id);
        update_pro_remain($id);   // cập nhật lại số lượng còn lại của sản phẩm khi bán
        redirect("?mod=sale&action=list_order");
    }
    $data['detail_order'] = get_detail_order($id);
    $data['dt_od_product'] = get_detail_order_product($id);
    $data['result_order'] = get_result_order(($id));
    $data['note'] = get_note($id);
    load_view('detail_order', $data);
}

function search_orderAction(){
    global $error, $str,$count,$list_search;
  
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
        
        // $count = count_order_search($str);
    }
    $data['list_search'] = $list_search;
    $data['count'] = result_search($str);
    load_view('search_order',$data);
}
function search_customerAction(){
    global $error, $str,$count;
    if(isset($_POST['btn_search'])){
        $str = '';
        $error = array();
        if(empty($_POST['search'])){
            $error['search'] = "Nhập từ khoá tìm kiếm";
        }else{
           $str = $_POST['search'];
        }
    }
   
    //nếu tìm kiếm thấy có trong bảng
    if(result_search($str) > 0){ 
        $list_search = get_customer_search($str);
        $count = count_cus_search($str);
    }
    $data['list_search'] = isset($list_search) ? $list_search : "";
    $data['count'] = $count;
    load_view('search_customer',$data);
}

function deleteorderAction(){
    $id = $_GET['id'];
    db_delete('tbl_orders',"`order_id` = $id ");
    redirect("?mod=sale&action=list_order");
}

function deletecustomerAction(){
    $id = $_GET['id'];
    db_delete('tbl_customers',"`cus_id` = $id");
    redirect("?mod=sale&action=list_customer");
}

function deleteallAction(){
    db_delete_all('tbl_customers');
    redirect("?mod=sale&action=list_customer");
}