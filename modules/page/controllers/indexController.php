<?php
    function construct()
    {
        load_model('index');
    }

    function detailAction(){
        $id = $_GET['id'];
       $data = get_page_by_id($id);
        load_view('detail',$data);
    }
?>