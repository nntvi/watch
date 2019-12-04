<?php
    function construct()
    {
        load_model('index');
    }
    function addAction(){
        global $error, $title, $detail, $success;
        $status = "Hoạt động";
        if (isset($_FILES['file'])) {
            $error = array();
            //Thư mục chưa file
            $upload_dir = '../admin/public/uploads/'; //Folder chứa ảnh
            //Đường dẫn của file sau khi upload
            $upload_file = $upload_dir . $_FILES['file']['name'];
    
            //Tạo ra 1 chuỗi tên các đuôi file
            $type_allow = array('png', 'jpg', 'gift', 'jpeg');
            //Hàm lấy đuôi file pathinfo ,PATHINFO_EXTENSION    
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array(strtolower($type), $type_allow)) {
                $error['type'] = "Chỉ được upload những file có đuôi 'png', 'jpg', 'gift', 'jpeg'";
            } else {
    
                //Upload file có kích thước cho phép
                $file_size = $_FILES['file']['size'];
                if ($file_size > 29000000) {
                    $error['file_size'] = "Chỉ được upload file bé hơn 20M";
                }
                //Xử lý đổi tên file tự động
                if (file_exists($upload_file)) {
                    //Lấy tên file
                    $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    
                    //Tạo file mới
                    $new_file_name = $file_name . '-Copy.';
    
                    //Cập nhật đường link của file mới
                    $new_upload_file = $upload_dir . $new_file_name . $type;
    
                    $k = 1;
                    while (file_exists($new_upload_file)) {
    
                        $new_file_name = $file_name . "-Copy({$k}).";
                        $k++;
                        $new_upload_file = $upload_dir . $new_file_name . $type;
                    }
                    $upload_file = $new_upload_file;
                }
                if (preg_match("/\/([^\/]+)$/", $upload_file, $matches)) {
                    $img_new = $matches[1];
                } else {
                    $error['file'] = "Khong lay dc ten file";
                    //$img_new = "noname.jpg";
                }
            }
            if (empty($error)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    $data_thumb = array(
                        'post_thumb' =>  $img_new,
                    );
                    print_r($data_thumb);
                } else {
                    echo "Upload thất bại";
                }
            } else {
                print_r($error);
            }
        }
        if(isset($_POST['btn_upload_post'])){
            $error = array();
            if(empty($_POST['title'])){
                $error['title'] = "Không để trống trường này";
            }else{
                $title = $_POST['title'];
            }
            if(empty($_POST['detail'])){
                $error['detail'] = "Không để trống trường này";
            }else{
                $detail = $_POST['detail'];
            }

            if(empty($error)){
                $data = array(
                    'post_title' => $title,
                    'post_content' => $detail,
                    'post_status' => $status,
                    'post_date' => date("d/m/Y"),
                );
                if(!isset($data_thumb)) $data_thumb = [];
                $combine = array_merge($data,$data_thumb);
                insert_post($combine);
                $success = "Đã thêm thành công";
               
            }else{
                $error['post'] = "Thêm bài viết thất bại";
            }
        }
        load_view('add');
    }  
    
    function listAction(){
        $num_rows = db_num_rows("SELECT * FROM `tbl_posts`");
        # Số lượng bản ghi trên trang
        $num_per_page = 5;
        $total_row = $num_rows;

        #Tính tổng số trang
        $num_page = ceil($total_row / $num_per_page);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $start = ($page-1) * $num_per_page;
        #Hàm xử lý show toàn bộ info và phân trang
        $list_post = get_post($start,$num_per_page);
        foreach ($list_post as &$item){
            $item['url_update'] = "?mod=post&action=update&id={$item['post_id']}";
            $item['url_delete'] = "?mod=post&action=delete&id={$item['post_id']}";

        }
        $data['post'] = $list_post;
        $data['page'] = $page;
        $data['num_page'] = $num_page;
        load_view('list',$data);
    }
    
    function updateAction(){
        $id = $_GET['id'];
        $status = "Đã chỉnh sửa";
        global $error, $title, $detail,$success ;
     
        if(isset($_POST['btn_update_post'])){
            $error = array();
            if(empty($_POST['title'])){
                $error['title'] = "Không để trống trường này";
            }else{
                $title = $_POST['title'];
            }
            if(empty($_POST['detail'])){
                $error['detail'] = "Không để trống trường này";
            }else{
                $detail = $_POST['detail'];
            }
            #Xử lý hình ảnh và upload
            if (isset($_FILES['file']) && strlen($_FILES['file']['name']) > 0) {
                $error = array();
                //Thư mục chưa file
                $upload_dir = '../admin/public/uploads/'; //Folder chứa ảnh
                //Đường dẫn của file sau khi upload
                $upload_file = $upload_dir . $_FILES['file']['name'];
        
                //Tạo ra 1 chuỗi tên các đuôi file
                $type_allow = array('png', 'jpg', 'gift', 'jpeg');
                //Hàm lấy đuôi file pathinfo ,PATHINFO_EXTENSION    
                $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                
                if (!in_array(strtolower($type), $type_allow)) {
                    $error['type'] = "Chỉ được upload những file có đuôi 'png', 'jpg', 'gift', 'jpeg'";
                } else {
        
                    //Upload file có kích thước cho phép
                    $file_size = $_FILES['file']['size'];
                    if ($file_size > 29000000) {
                        $error['file_size'] = "Chỉ được upload file bé hơn 20M";
                    }
                    //Xử lý đổi tên file tự động
                    if (file_exists($upload_file)) {
                        //Lấy tên file
                        $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        
                        //Tạo file mới
                        $new_file_name = $file_name . '-Copy.';
        
                        //Cập nhật đường link của file mới
                        $new_upload_file = $upload_dir . $new_file_name . $type;
        
                        $k = 1;
                        while (file_exists($new_upload_file)) {
        
                            $new_file_name = $file_name . "-Copy({$k}).";
                            $k++;
                            $new_upload_file = $upload_dir . $new_file_name . $type;
                        }
                        $upload_file = $new_upload_file;
                    }
                    if (preg_match("/\/([^\/]+)$/", $upload_file, $matches)) {
                        $img_new = $matches[1];
                    } else {
                        $error['file'] = "Khong lay dc ten file";
                        //$img_new = "noname.jpg";
                    }
                }
            }
            if (empty($error)) {
                if ((isset($_FILES['file']) && strlen($_FILES['file']['name']) > 0 && move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) || strlen($_FILES['file']['name']) <= 0 || !isset($_FILES['file'])) {
                    $data = array(
                        'post_title' => $title,
                        'post_content' => $detail,
                        'post_status' => $status,
                        'post_date' => date("d/m/Y"),
                        //'product_name_thumb' => $img_new,
                        //'cat_id' => $cat_id
                    );
                    if (isset($_FILES['file']) && strlen($_FILES['file']['name']) > 0) {
                        $data['post_thumb'] =  $img_new;
                    }
                    //show_array($data);
                    update_post($data,$id);
                    $success = "Đã chỉnh sửa thành công";
            } else { 
                echo "Upload thất bại";
             }
         } else {
            print_r($error);
        }
        }
        $data['item'] = get_post_by_id($id);
        $data['name'] = get_name_thumb_by_id($id);
        load_view('update',$data);
    }
    function list_CatAction(){
        load_view('list_cat');
    }

    function deleteAction(){
        load_view('delete');
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
        if(result_search($str) > 0){ // nghĩa là tìm thấy dữ liệu cần tìm trong bảng
            // lấy dữ liệu tìm thấy ra
            //$list_search = get_list_search($str);
            // gán link để có thể xoá sửa
            //foreach($list_search as &$item){
               // $item['url_update'] = "?mod=post&action=update&id={$item['post_id']}";
               // $item['url_delete'] = "?mod=post&action=delete&id={$item['post_id']}";
            //}
            
            $num_rows = db_num_rows("SELECT * FROM `tbl_posts` WHERE `post_title` LIKE '%{$str}%'");
            # Số lượng bản ghi trên trang
            $num_per_page = 1;
            $total_row = $num_rows;

            #Tính tổng số trang
            $num_page = ceil($total_row / $num_per_page);
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $start = ($page-1) * $num_per_page;
            #Hàm xử lý show toàn bộ info và phân trang
            $list_search = get_search($start,$num_per_page,$str);
            //show_array($list_search);
            foreach ($list_search as &$item){
                $item['url_update'] = "?mod=post&action=update&id={$item['post_id']}";
                $item['url_delete'] = "?mod=post&action=delete&id={$item['post_id']}";
            }
        }
        $data['list_search'] = $list_search;
        $data['page'] = $page;
        $data['num_page'] = $num_page;
      
        load_view('search',$data);
    }
?>