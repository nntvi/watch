<?php
function construct()
{
    load_model('index');
}
function addAction()
{
    global $error, $title, $detail, $success,$post_head,$post_status,$poster;
    $status = "Hoạt động";
    if (isset($_POST['btn_upload_post'])) {
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Không để trống tiêu đề";
        } else {
            $title = $_POST['title'];
        }
        if (empty($_POST['post_head'])) {
            $error['post_head'] = "Không để trống dòng giới thiệu";
        } else {
            $post_head = $_POST['post_head'];
        }
        if (empty($_POST['detail'])) {
            $error['detail'] = "Không để trống chi tiết";
        } else {
            $detail = $_POST['detail'];
        }
       
        $post_status = $_POST['status'];
      
        $poster = user_login();
        //File ảnh
        if (empty($_FILES['file'])) {
            $error['file']['thumb'] = "Không được để trống phần ảnh";
        }

        $upload_dir = '../admin/public/uploads/';
        $upload_file = $upload_dir . $_FILES['file']['name'];
        $type_allow = array('png', 'jpg', 'gif', 'jpeg');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($type), $type_allow)) {
            $error['file']['type'] = "Chỉ được upload file có đuôi png, jpg, gif, jpeg";
        }
        #Upload file có kích thước cho phép <20MB ~ (29tr byte)
        $file_size = $_FILES['file']['size'];
        if ($file_size > 29000000) {
            $error['file']['size'] = "Chỉ được upload file bé hơn 20 MB";
        }

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
        
        // print_r($error);
        //Kết luận
        if (empty($error)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $data = array(
                    'post_title' => $title,
                    'post_head' => $post_head,
                    'post_content' => $detail,
                    'post_status' => $status,
                    'post_date' => date("d/m/Y"),
                    'post_thumb' => $img_new,
                    'poster' => $poster,
                    'post_status' =>$post_status
                );
                insert_post($data);
                $success = "Thêm bài viết thành công";
            }
        }
    }
    
    load_view('add');
}

function listAction()
{
    $num_rows = db_num_rows("SELECT * FROM `tbl_posts`");
    # Số lượng bản ghi trên trang
    $num_per_page = 5;
    $total_row = $num_rows; // tổng số hàng đếm được trong cơ sở dữ liệu

    #Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page); // vd đếm được 10 dòng => 10 bài post / theo quy định mỗi trang đc 5 sp => có 2 trang
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // vd nếu chưa có trang thì gọi đó là trang đầu => =1
    $start = ($page - 1) * $num_per_page; // tính số trang bắt đầu / (1-1)* 5 = 0 / (2-1)*5 = 5
    #Hàm xử lý show toàn bộ info và phân trang
    $list_post = get_post($start, $num_per_page);
    foreach ($list_post as &$item) {
        $item['url_update'] = "?mod=posts&action=update&id={$item['post_id']}";
        $item['url_delete'] = "?mod=posts&action=delete&id={$item['post_id']}";
    }
    $data['post'] = $list_post;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['count'] = count_post();
    
    load_view('list', $data);
}

function updateAction()
{
    $id = $_GET['id'];
    global $error, $title, $detail, $success,$status;

    if (isset($_POST['btn_update_post'])) {
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Không để trống trường này";
        } else {
            $title = $_POST['title'];
        }
        if (empty($_POST['detail'])) {
            $error['detail'] = "Không để trống trường này";
        } else {
            $detail = $_POST['detail'];
        }

      
            $status = $_POST['status'];
      
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
                update_post($data, $id);
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
    load_view('update', $data);
}
function list_CatAction()
{
    load_view('list_cat');
}

function deleteAction()
{
    $id = (int) $_GET['id'];
    delete_post($id);
    redirect("?mod=posts&action=list");
}

function searchAction()
{
    global $error, $str,$list_search;
    if (isset($_POST['btn_search'])) {
        $str = '';
        $error = array();
        if (empty($_POST['search'])) {
            $error['search'] = "Nhập từ khoá tìm kiếm";
        } else {
            $str = $_POST['search'];
        }
    }
    
    // nếu tìm kiếm thấy có trong bảng
    if (result_search($str) > 0) { // nghĩa là tìm thấy dữ liệu cần tìm trong bảng
        // lấy dữ liệu tìm thấy ra
        //$list_search = get_list_search($str);
        // gán link để có thể xoá sửa
        //foreach($list_search as &$item){
        // $item['url_update'] = "?mod=post&action=update&id={$item['post_id']}";
        // $item['url_delete'] = "?mod=post&action=delete&id={$item['post_id']}";
        //}

        $list_search = get_search($str);
        //show_array($list_search);
        foreach ($list_search as &$item) {
            $item['url_update'] = "?mod=posts&action=update&id={$item['post_id']}";
            $item['url_delete'] = "?mod=posts&action=delete&id={$item['post_id']}";
        }
        
    }
    $data['list_search'] = $list_search;
    $data['count'] = count_post_search($str);
    load_view('search', $data);
}
