<?php

use function JmesPath\search;

function construct()
{
    load_model('index');
    load('helper', 'pagging');
}
# Thêm danh mục
function add_catAction()
{
    global $error, $cat_name;
    if (isset($_POST['btn_add_cat'])) {
        $error = array();
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Không để trống tên danh mục";
        } else {
            $cat_name = $_POST['cat_name'];
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'cat_date' => date("d/m/Y"),
                'parent_cat' => 0
            );
            add_cat($data);
        }
    }
    load_view('add_cat');
}
# Thêm danh mục cha
function add_cat_parentAction()
{
    global $error, $cat_name_parent, $parent_cat;
    if (isset($_POST['btn_cat_parent'])) {
        $error = array();
        if (empty($_POST['cat_name_parent'])) {
            $error['cat_name_parent'] = "Không để trống tên danh mục";
        } else {
            $cat_name_parent = $_POST['cat_name_parent'];
        }

        if (empty($_POST['parent_cat'])) {
            $error['parent_cat'] = "Không để trống tên danh mục";
        } else {
            $parent_cat = $_POST['parent_cat'];
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name_parent,
                'cat_date' => date("d/m/Y"),
                'parent_cat' => $parent_cat,
            );
            add_cat_parent($data);
        }
    }
    load_view('add_cat_parent');
}

# Danh sách danh mục
function list_cat_productAction()
{
    $cat = get_list_cat_product();
    foreach ($cat as &$item) {
        $item['url_update'] = "?mod=product&action=updatecat&id={$item['cat_id']}";
        $item['url_delete'] = "?mod=product&action=deletecat&id={$item['cat_id']}";
    }
    $data['cat_product'] = data_tree($cat);
    load_view('list_cat_product', $data);
}
# Sửa danh mục
function updatecatAction()
{
    $id = $_GET['id'];
    global $error, $new_cat_name;
    if (isset($_POST['btn_update_cat'])) {
        $error = array();

        if (empty($_POST['new_cat_name'])) {
            $error['new_cat_name'] = "Nhập tên danh mục cần thay đổi";
        } else {
            $new_cat_name = $_POST['new_cat_name'];
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $new_cat_name,
                'cat_date' => date("d/m/Y"),
            );
            update_cat_product($id, $data);
        } else {
            $error['fail_update_cat'] = "Cập nhật thất bại";
        }
    }
    $cat = get_cat_by_id($id);
    $data['cat'] = $cat;
    load_view('update_cat', $data);
}
# Xoá danh mục
function deletecatAction()
{
    $id = $_GET['id'];
    foreach (get_cat_by_id($id) as $delete) {

        if ($delete['parent_cat'] == 0) {
            db_delete('tbl_cat_product', "`parent_cat` = '{$id}'");
        } else {
            delete_cat($id);
        }
    }
    redirect("?mod=product&action=list_cat_product");
}
function getSubCatAction()
{
    $id = $_GET['id'];
    $data = get($id);
    echo json_encode($data);
}
# Thêm sản phẩm
function addAction()
{
    global $pro_name, $pro_code, $pro_price,$pro_old_price,
        $pro_desc, $pro_detail, $error, $sub_cat, $gender;
    #Xử lý hình ảnh
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
                    'pro_thumb' =>  $img_new
                );
            } else {
                echo "Upload thất bại";
            }
        } else {
            print_r($error);
        }
    }
    if (isset($_POST['btn_add_product'])) {
        #Xử lý Error
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Không để trống tên sản phẩm";
        } else {
            $pro_name = $_POST['product_name'];
        }

        if (empty($_POST['product_code'])) {
            $error['product_code'] = "Không để trống mã code sản phẩm";
        } else {
            $pro_code = $_POST['product_code'];
        }

        if (empty($_POST['product_price'])) {
            $error['product_price'] = "Không để trống giá sản phẩm";
        } else {
            $pro_price = $_POST['product_price'];
        }

        
        $pro_old_price = $_POST['product_old_price'];
        
        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "Không để trống mô tả ngắn";
        } else {
            $pro_desc = $_POST['product_desc'];
        }

        
        $pro_detail = $_POST['product_detail'];
        

        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = "Bạn chưa chọn danh mục sản phẩm .Mời bạn kiểm tra lại!!!";
        }

        $sub_cat = isset($_POST['sub-cat']) ? $_POST['sub-cat'] : "";
        if (empty($sub_cat)) {
            $error['sub_cat'] = "Danh mục con không được để trống";
        } else {
            $sub_cat = $_POST['sub-cat'];
        }

        if (empty(isset($_POST['gender']))) {
            $error['gender'] = "Không để trống giới tính";
        } else {
            $gender = $_POST['gender'];
        }

        if (empty($error)) {
            $data = array(
                'pro_name' => $pro_name,
                'pro_code' => $pro_code,
                'pro_price' => $pro_price,
                'pro_price_old' => $pro_old_price,
                'pro_desc' => $pro_desc,
                'pro_gender' => $gender,
                'pro_detail' => $pro_detail,
                'pro_time' => date("d/m/Y"),
                'cat_id' => $sub_cat
            );

            $add_pro = array_merge($data, $data_thumb);
            add_product($add_pro);
        }
    }
    load_view('add_product');
}
# Danh sách sản phẩm
function list_productAction()
{
    $num_rows = db_num_rows("SELECT tbl_products.*, tbl_cat_product.cat_name FROM tbl_products INNER JOIN tbl_cat_product ON tbl_products.cat_id = tbl_cat_product.cat_id");
    # Số lượng bản ghi trên trang
    $num_per_page = 5;
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
    load_view('list_product', $data);
}

# Sửa sản phẩm
function update_productAction()
{
    $id = $_GET['id'];
    // echo $id;
    global $pro_name, $pro_code, $pro_price,
        $pro_desc, $pro_detail, $error, $sub_cat, $gender;
    if (isset($_POST['btn_update_product'])) {
        $error = array();
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Không để trống tên sản phẩm";
        } else {
            $pro_name = $_POST['product_name'];
        }

        if (empty($_POST['product_code'])) {
            $error['product_code'] = "Không để trống tên sản phẩm";
        } else {
            $pro_code = $_POST['product_code'];
        }

        if (empty($_POST['product_price'])) {
            $error['product_price'] = "Không để trống tên sản phẩm";
        } else {
            $pro_price = $_POST['product_price'];
        }

        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "Không để trống tên sản phẩm";
        } else {
            $pro_desc = $_POST['product_desc'];
        }

        if (empty($_POST['product_detail'])) {
            $error['product_detail'] = "Không để trống tên sản phẩm";
        } else {
            $pro_detail = $_POST['product_detail'];
        }

        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = "Bạn chưa chọn danh mục sản phẩm .Mời bạn kiểm tra lại!!!";
        }

        $sub_cat = isset($_POST['sub-cat']) ? $_POST['sub-cat'] : "";
        if (empty($sub_cat)) {
            $error['sub_cat'] = "Danh mục con không được để trống !!! Mời bạn kiểu tra kai5";
        } else {
            $sub_cat = $_POST['sub-cat'];
        }

        
        $gender = $_POST['gender'];
        
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
                    'pro_name' => $pro_name,
                    'pro_code' => $pro_code,
                    'pro_price' => $pro_price,
                    'pro_desc' => $pro_desc,
                    'pro_gender' => $gender,
                    'pro_detail' => $pro_detail,
                    'pro_time' => date("d/m/Y"),
                    'cat_id' => $sub_cat
                );
                if (isset($_FILES['file']) && strlen($_FILES['file']['name']) > 0) {
                    $data['pro_thumb'] =  $img_new;
                }
                //show_array($data);
               update_product($data, $id);
            } else {
                echo "Upload thất bại";
            }
        }else{
            print_r($error);
        }
    }
    $data['item'] = get_product_by_id($id);
    //print_r( $data['item']);
    $data['name'] = get_name_thumb_by_id($id);
    load_view('update_product', $data);
}

# Xóa sản phẩm
function delete_productAction(){
    $id = $_GET['id'];
    delete_product($id);
    redirect("?mod=product&action=list_product");
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
        $search = get_search($str);
        //show_array($list_search);
        foreach ($search as &$item){
            $item['url_update'] = "?mod=product&action=update_product&id={$item['pro_id']}";
            $item['url_delete'] = "?mod=product&action=delete_product&id={$item['pro_id']}";
        }
    }
    $data['search'] = isset($search) ? $search : null;
    load_view('search',$data);
}