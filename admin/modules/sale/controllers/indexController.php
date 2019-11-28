<?php
    function construct()
    {
        load_model('index');
    }
    
    function list_customerAction(){
        $data['customer'] = get_list_customer();
        load_view('list_customer',$data);
    }

    function list_orderAction(){
        $data['order'] = get_list_order();
        load_view('list_order',$data);
    }

    function detail_orderAction(){
        $id = $_GET['id'];
        if(isset($_POST['btn_update_status'])){
            $data = array(
                'status' => $_POST['status']
            );
            update_status($data,$id);
            redirect("?mod=sale&action=list_order");
        }
        $data['detail_order'] = get_detail_order($id);
        $data['dt_od_product'] = get_detail_order_product($id);
        $data['result_order'] = get_result_order(($id));
        load_view('detail_order',$data);
    }
?>