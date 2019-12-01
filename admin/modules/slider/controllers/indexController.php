<?php
    function construct()
    {
        load_model('index');
    }
    function addAction(){
        global $error, $slide_name, $slide_position, $slide_thumb;
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
                        'slide_thumb' =>  $img_new
                    );
                } else {
                    echo "Upload thất bại";
                }
            } else {
                print_r($error);
            }
        }
        if(isset($_POST['btn_add_slide'])){
            $error = array();
            if(empty($_POST['slide_name'])){
                $error['slide_name'] = "Không để trống tên slide";
            }else{
                $slide_name = $_POST['slide_name'];
            }
            if(empty($_POST['slide_position'])){
                $error['slide_position'] = "Vui lòng điền vào thứ tự của slide";
            }else{
                $slide_position = $_POST['slide_position'];
            }

            if(empty($error)){
                $data = array(
                    'slide_name' => $slide_name,
                    'slide_postion' => $slide_position,
                    'slide_date' => date("d/m/Y"),
                );
                $combine = array_merge($data,$data_thumb);
            }
            insert_slide($combine);
        }
        load_view('add');
    }  

    function listAction(){
        load_view('list');
    }

?>