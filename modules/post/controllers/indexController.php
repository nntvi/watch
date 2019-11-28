<?php
   function construct()
   {
       load_model('index');
       load('helper', 'pagging');
   }
    function indexAction(){
        $num_rows = db_num_rows("SELECT * FROM `tbl_posts`");
        # Số lượng bản ghi trên trang
        $num_per_page = 3;
        $total_row = $num_rows;

        #Tính tổng số trang
        $num_page = ceil($total_row / $num_per_page);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $start = ($page-1) * $num_per_page;
        #Hàm xử lý show toàn bộ info và phân trang
        $list_post = get_post($start,$num_per_page);
        $data['post'] = $list_post;
        $data['page'] = $page;
        $data['num_page'] = $num_page;

        load_view('index',$data);
    }
    function detailAction(){
        $id = $_GET['id'];
        $data = get_post_by_id($id);
        load_view('detail',$data);
    }

?>