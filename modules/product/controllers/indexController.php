<?php
    function construct()
    {
        load_model('index');
    }
    function detailAction(){
        $id = $_GET['id'];
        $data['detail'] = show_detail($id); // để xuất chi tiết sản phẩm theo id
        product_cat_view($id); // tính số lượt click
        load_view('detail',$data);
    }
    function categoryAction(){
        load_view('category');
    }
?>