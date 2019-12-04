
<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    load_view('index');
}

function loginAction()
{
    //echo time();
    //echo date("d/m/Y h:m:s"); 
    
    global $error, $username, $password;
    if (isset($_POST['btn_login'])) {
        $error = array();
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = "Không để trống tên đăng nhập";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng";
            } else {
                $username = $_POST['username'];
            }
        }
        #Kiểm tra password
        if (empty($_POST['password'])) {
            $error['password'] = "Không để trống tên password";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Password không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }
        #Xử lý đăng nhập 
        if (empty($error)) {
            if (check_login($username, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                if (isset($_POST['remember_me'])) {
                    setcookie('is_login', true, time() + 3600);
                    setcookie('user_login', $username, time() + 3600);
                }

                //header("Location:?page=users&action=index");
                redirect("?page=users&action=index");
            } else {
                if (check_username($username)) {
                    $error['account'] = "Bạn đúng tên đăng nhập nhưng sai password";
                } else
                    $error['account'] = "Tên đăng nhập và mật khẩu không có trong hệ thống";
            }
        }
    }

    load_view('login');
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}
function adduserAction()
{
    global $error, $success, $username, $password, $email, $address, $phone, $role;
    if (isset($_POST['btn_adduser'])) {
        $error = array();
        #Kiểm tra username
        if (empty($_POST['username'])) {
            $error['username'] = "Không để trống tên đăng nhập";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng";
            } else if (check_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập đã có trong hệ thống";
            } else {
                $username = $_POST['username'];
            }
        }

        #Kiểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Không để trống email";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
        }

        #Kiểm tra password
        if (empty($_POST['password'])) {
            $error['password'] = "Không để trống tên password";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Password không đúng định dạng";
            } else {
                $password = $_POST['password'];
            }
        }

        #Kiểm tra address
        if (empty($_POST['address'])) {
            $error['address'] = "Không để trống address";
        } else {
            $address = $_POST['address'];
        }

        #Kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Không để trống tên số điện thoại";
        } else {
            if (!is_phone_number($_POST['phone'])) {
                $error['phone'] = "Số điện thoại không đúng định dạng";
            }
            // else if (strlen($_POST['phone']) > 10 && strlen($_POST['phone']) < 10) {
            //     $error['phone'] = "Số điện thoại không có thực";
            // } 
            else {
                $phone = $_POST['phone'];
            }
        }

        
        
        if(empty($_POST['role1']) && empty($_POST['role2']) && empty($_POST['role3'])){
            $error['role'] = "Bạn phải chọn quyền cho nhân viên";
        }else{
            $role = 0;
            if (isset($_POST['role1'])) $role += 1;
            if (isset($_POST['role2'])) $role += 2;
            if (isset($_POST['role3'])) $role += 4;
        }
        //Regex
        if (empty($error)) {
            $success =  array();
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'number_phone' => $phone,
                'address' => $address,
                'user_role' => $role,
                'time' => date("d/m/Y"),
            );
            //show_array($data);
            insert_user($data);
            $success['account'] = "Bạn thêm thành công";
        } else {
            $error['account'] = "Thêm user thất bại";
        }
    }
    load_view('adduser');
}
function updateAction()
{
    $id = (int) $_GET['id'];
    global $error, $address, $phone;
    if (isset($_POST['btn_update'])) {
        $error = array();
        #Kiểm tra address
        if (empty($_POST['address'])) {
            $error['address'] = "Không để trống address";
        } else {
            $address = $_POST['address'];
        }
        #Kiểm tra phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Không để trống tên số điện thoại";
        } else {
            /*if (!is_phone_number($_POST['phone'])) {
                $error['phone'] = "Số điện thoại không đúng định dạng";
            } else if (strlen($_POST['phone']) >= 12 && strlen($_POST['phone']) < 10) {
                $error['phone'] = "Số điện thoại không có thực";
            } else {*/
            $phone = $_POST['phone'];
        }
        /*}*/
        if (empty($error)) {
            $data = array(
                'address' => $address,
                'number_phone' => $phone,
            );
            update_user($data, $id);
        } else {
            $error['account'] = "Cập nhật thất bại";
        }
    }
    $info_user = get_user_by_id($id);
    $data['info_user'] = $info_user;
    //show_array($info_user); 
    load_view('update', $data);
}
function resetAction()
{
    //1. Nhập lai pass cũ => dựa vào userlogin để lấy ra password
    //2. kiểm tra pass cũ vừa nhập so vs cái đã lấy trong database
    //3. bắt lỗi pass mới , nếu đúng thì gán vào biến
    //4. kiểm tra mk xác nhận có trùng pass mới hay không, nếu đúng
    //5. thực hiện thay đổi

    global $error, $new_pass, $confirm_pass, $old_pass;
    if (isset($_POST['btn_changepassword'])) {
        $info_user = get_user_by_username(user_login());
        $error = array();

        #Kiểm tra password mới
        if (empty($_POST['old_pass'])) {
            $error['old_pass'] = "Không để trống tên password cũ";
        } else {
            $old_pass = md5($_POST['old_pass']);
        }

        if (empty($_POST['new_pass'])) {
            $error['new_pass'] = "Không để trống tên password";
        } else {
            if (!is_password($_POST['new_pass'])) {
                $error['new_pass'] = "Password không đúng định dạng";
            } else {
                $new_pass = $_POST['new_pass'];
            }
        }

        #Kiểm tra xác nhận
        if (empty($_POST['confirm_pass'])) {
            $error['confirm_pass'] = "Không để trống password xác nhận";
        } else {
            $confirm_pass = $_POST['confirm_pass'];
        }
        $info_user['password'];
        if (empty($error)) {
            if ($old_pass == $info_user['password']) {
                if ($new_pass == $confirm_pass) {
                    $data = array(
                        'password' => md5($new_pass)
                    );
                    reset_password($data, $info_user['password']);
                } else {
                    $error['comfirm_pass'] = "Mật khẩu xác nhận không chính xác";
                }
            }
        } else {
            $error['old_pass'] = "Password cũ bạn nhập không đúng";
        }
    }
    /*global $error, $old_pass, $new_pass, $confirm_pass;
    if (isset($_POST['btn_changepassword'])) {
        $info_user = get_user_by_username(user_login());
        $error = array();
        #Kiểm tra password cũ
        if (empty($_POST['old_pass'])) {
            $error['pass_old'] = "Không được để trống tên mật khẩu cũ!!!";
        } else {
            if (!is_password($_POST['old_pass'])) {
                $error['old_pass'] = "Mật khẩu cũ không đúng định dạng";
            } else {
                $old_pass = md5($_POST['old_pass']);
            }
        }
        #Kiểm tra password mới
        if (empty($_POST['new_pass'])) {
            $error['new_pass'] = "Không được để trống tên mật khẩu mới!!!";
        } else {
            if (!is_password($_POST['new_pass'])) {
                $error['new_pass'] = "Mật khẩu mới không đúng định dạng!!!";
            } else {
                $new_pass = $_POST['new_pass'];
            }
        }
        #Kiểm tra password pass nhập lại
        if (empty($_POST['confirm_pass'])) {
            $error['confirm_pass'] = "Không được để trống tên mật khẩu xác nhận lại!!!";
        } else {
            if (!is_password($_POST['confirm_pass'])) {
                $error['confirm_pass'] = "Mật khẩu xác nhận không đúng định dạng";
            } else {
                $confirm_pass = $_POST['confirm_pass'];
            }
        }

        $info_user['password'];

        #Kết luận
        if (empty($error)) {
            if ($old_pass == $info_user['password']) {
                if ($new_pass == $confirm_pass) {
                    $data = array(
                        'password' => md5($new_pass),
                    );
                    reset_password($data,$info_user['password']);
                } else {
                    $error['new_pass'] = "Bạn nhập không mật khẩu mới và mật khẩu xác nhận không trùng nhau!!!";
                }
            } else {
                $error['old_pass'] = "Bạn nhập không đúng mật khẩu cũ!!!";
            }
        }
    }*/
    load_view('reset');
}

function showAction()
{
    $num_rows = db_num_rows("SELECT * from tbl_users");
    #Số lượng bản ghi trên trang
    $num_per_page = 3;
    $total_row = $num_rows;
    // Tính tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    #Hàm xử lý show toàn bộ thông tin và xử lý phân trang
    $list_users = get_users($start, $num_per_page);
    foreach ($list_users as &$link) {
        $link['url_update'] = "?mod=users&action=update&id={$link['user_id']}";
        $link['url_delete'] = "?mod=users&action=delete&id={$link['user_id']}";
    }
    $data['list_users'] = $list_users;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    load_view('show', $data);

    /* $admin = show_admin();
    foreach ($admin as &$link) {
        $link['url_update'] = "?mod=users&action=update&id={$link['user_id']}";
        $link['url_delete'] = "?mod=users&action=delete&id={$link['user_id']}";
    } 
    $data['admin'] = $admin;
    load_view('show',$data);*/
}
function deleteAction()
{
    load_view('delete');
}
