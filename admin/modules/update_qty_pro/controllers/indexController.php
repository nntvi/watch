<?php
    function construct()
    {
        load_model('index');
        load('helper', 'pagging');
    }
    function indexAction()
    {
        $num_rows = db_num_rows("SELECT * FROM tbl_products ORDER BY pro_remain ASC");
        # Số lượng bản ghi trên trang
        $num_per_page = 6;
        $total_row = $num_rows;

        #Tính tổng số trang
        $num_page = ceil($total_row / $num_per_page);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $start = ($page - 1) * $num_per_page;

        $list_pro = get_name_of_product($start, $num_per_page);
        foreach ($list_pro as &$item) {
            $item['pro_update'] = "?mod=product&action=update_product&id={$item['pro_id']}";
            $item['pro_delete'] = "?mod=product&action=delete_product&id={$item['pro_id']}";
        }
        $data['page'] = $page;
        $data['num_page'] = $num_page;
        $data['product'] = $list_pro;
        $data['count'] = count_pro();
        load_view('list_pro', $data);
    }
    function addAction()
    {
        $id = $_GET['id'];
        global $error,$success,$number;
        if (isset($_POST['btn_update_product'])) {
            $old_number = number_old($id); // dựa vào id của sản phẩm, lấy ra cái sl lúc nhập về và sl còn lại
            $data = array(
                'pro_number' => $old_number['pro_remain'] + $_POST['number'], // tổng sl lúc này = còn lại trong kho + thêm cái mới nhập
                'pro_remain' => $old_number['pro_remain'] + $_POST['number'],
                // số lượng còn lại lúc này = tổng kho hiện tại sau khi thêm, trừ cho số sp đã bán được trước đó
                'pro_time' => date("d/m/Y"),
                'pro_day' => date('d'),
                'pro_month' => date('m'),
                'pro_year' => date('Y'),
            );
            db_update('tbl_products',$data,"`pro_id` = '{$id}'");
            $success = "Đã cập nhật số lượng sản phẩm thành công";
        }
        $data['item'] = get_product_by_id($id);
        //print_r( $data['item']);
        $data['name'] = get_name_thumb_by_id($id);

        load_view('add', $data);
    }
    function searchAction(){
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
            $search = get_search($str);
            //show_array($list_search);
           
        }
        $data['search'] = isset($search) ? $search : null;
        $data['count'] = count_pro_search($str);
        load_view('search',$data);
    }