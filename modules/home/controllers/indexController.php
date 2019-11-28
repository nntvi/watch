<?php
    function construct()
    {
        load_model('index');
    }
    function indexAction(){
        $data['cat'] = get_name_cat(); // lấy tên danh mục cha
        $data['pro_hot'] = get_product_hot(); // lấy sản phẩm có lượt xem cao
        load_view('index',$data);
    }
  
?>