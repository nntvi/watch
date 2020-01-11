<?php
function construct()
{
    load_model('index');
}
function indexAction()
{
    #Lấy id sản phẩm từ url
    $id = (int) $_GET['id'];
    #Lấy thông tin sản phẩm từ id
    $item = get_product_by_id($id);
    //show_array($item);
    // Mặc định số lượng mỗi lần thêm vào là 1
    $qty = 1;
    // Nếu tồn tại giỏ hàng VÀ sản phẩm này đã có trong giỏ. Thì số lượng bằng cũ +1
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        // $done = "Sản phẩm đã có trong giỏ";
    }
    // lưu vào session cart buy với những thông tin sp theo id vừa lấy
    $_SESSION['cart']['buy'][$id] = array(
        'product_id' => $item['pro_id'],
        'name' => $item['pro_name'],
        'code' => $item['pro_code'],
        'price' => $item['pro_price'],
        'thumb_img' => $item['pro_thumb'],
        'qty' => $qty,
        'sub_total' => $qty * $item['pro_price'],
        'limit' => $item['pro_remain']
    );
    $data['list_cart'] = $_SESSION['cart']['buy']; // đổ session vừa lưu vào mảng khác để xuất ra giao diện
    update_info_cart();
    load_view('index', $data);
}

function updateAction()
{
    if (isset($_POST['btn_update'])) {
        update_cart($_POST['qty']);
    }
    // update xong chuyển hướng về trang show, trang show i hệt trang index, chỉ khác là chứa thông tin khi cập nhật lại thôi :))
    redirect("?mod=cart&action=show");
}

function deleteAction()
{
    $id = $_GET['id'];
    if (isset($_SESSION['cart'])) {
        // unset chính id cần xóa
        unset($_SESSION['cart']['buy'][$id]);
        // sau khi xóa phải update lại giỏ hàng
        update_info_cart();
    }
    redirect("?mod=cart&action=show");
}
function deleteallAction()
{
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
    redirect("?mod=cart&action=show");
}
function showAction()
{
    load_view('show');
}
function checkoutAction()
{
    global $error, $fullname, $email, $address, $phone, $note, $payment_method;
    if (isset($_POST['checkout'])) {
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không để trống tên họ và tên";
        } else {
            $fullname = $_POST['fullname'];
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Không để trống email";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
        }
        if (empty($_POST['address'])) {
            $error['address'] = "Không để trống address";
        } else {
            $address = $_POST['address'];
        }

        if (empty($_POST['phone'])) {
            $error['phone'] = "Không để trống tên số điện thoại";
        } else {
            if (!is_phone_number($_POST['phone'])) {
                $error['phone'] = "Số điện thoại không đúng định dạng";
            } else {
                $phone = $_POST['phone'];
            }
        }

        if (empty($_POST['payment_method'])) {
            $error['payment_method'] = "Vui lòng chọn phương thức thanh toán";
        } else {
            $payment_method = $_POST['payment_method'];
        }

        $note = $_POST['note'];

        //    show_array($_SESSION['cart']['buy']);
        // lưu dữ liệu đơn hàng vào csdl
        if (empty($error)) {
            // lưu thông tin khách hàng
            $data_customer = array(
                'cus_name' => $fullname,
                'cus_email' => $email,
                'cus_phone' => $phone,
                'cus_address' => $address,
                'cus_note' => $note,
                'cus_date' => date("d/m/Y"),
            );
            // hàm db_insert khi xây dựng để thêm dữ liệu vào bảng có trả về id mỗi khi thêm
            // => id đó lấy làm id cho customer
            $cus_id = add_customer($data_customer);

            // tương tự thêm vào bảng đơn hàng
            $data_order = array(
                'order_sub_total' => $_SESSION['cart']['info']['total'],
                'order_method' => $payment_method,
                'cus_id' => $cus_id,
                'note' => 0,
                'status' => '1',
                'order_day' => date("d"),
                'order_month' => date("m"),
                'order_year' => date("Y")
            );
            // tương tự khi thêm vào bảng order hàm db_insert cũng trả về 1 id
            // lấy đó làm id cho đơn hàng đó
            $order_id = add_order($data_order);

            // sau đó thêm dữ liệu vào chi tiết đơn hàng
            if (!empty($_SESSION['cart']['buy'])) {
                foreach ($_SESSION['cart']['buy'] as $item) {
                    $data_item = array(
                        'pro_id' => $item['product_id'],
                        'detail_qty' => $item['qty'],
                        'detail_total' => $item['sub_total'],
                        'order_id' => $order_id, // vừa tìm đc ở trên
                        'cus_id' => $cus_id 
                    );
                    add_detail_order($data_item); // thêm vào bảng tbl_detail_order
                }
            }
            
            // lần lượt sau khi thêm 3 lần, tiến hành gửi mail xác nhận cho khách

            $content = "
                        <script>
                        #khach-hang h3 {
                            color: #ff9600;
                            margin-bottom: 15px;
                        }
                        
                        #hoa-don h3 {
                            color: #ff9600;
                            margin-bottom: 15px;
                        }
                        
                        table {
                            font-size: 16px;
                        }
                        
                        table td {
                            padding: 15px 5px;
                        }
                        
                        table td.price {
                            color: red;
                        }
                        
                        table td.total-price {
                            font-weight: bold;
                            color: #e60000;
                        }
                        
                        table tr.bold {
                            font-weight: bold;
                        }
                        
                        .info {
                            font-weight: bold
                        }
                        
                        p.info {
                            margin-top: 20px;
                        }
                        </script>
                        <div id='wrap-inner'>
                        <div id='khach-hang'>
                            <h3>Thông tin khách hàng</h3>
                            <p>
                                <span class='info'>Khách hàng: </span>
                                $fullname
                            </p>
                            <p>
                                <span class='info'>Email: </span>
                                $email
                            </p>
                            <p>
                                <span class='info'>Điện thoại: </span>
                                $phone
                            </p>
                            <p>
                                <span class='info'>Địa chỉ: </span>
                                $address
                            </p>
                        </div>						
                        <div id='hoa-don'>
                            <h3>Hóa đơn mua hàng</h3>							
                            <table class='table-bordered table-responsive' style='text-align:center;'>
                                <tr class='bold'>
                                    <th width='30%'>Tên sản phẩm</th>
                                    <th width='25%'>Giá</th>
                                    <th width='20%'>Số lượng</t>
                                    <th width='15%'>Thành tiền</th>
                                </tr>";
            foreach ($_SESSION['cart']['buy'] as $item) {
                $content .= "
                                <tr>
                                    <td width='35%'>" . $item['name'] . "</td>
                                    <td width='25%'>" . number_format($item['price']) . ' đ' . "</td>
                                    <td width='20%'>" . $item['qty'] . "</td>
                                    <td width='20%'>" . number_format($item['sub_total']) .  ' đ' . "</td>
                                </tr>      
                                ";
            }
            $content .= "
                                <h3>Tổng tiền: " . number_format($_SESSION['cart']['info']['total']) . ' đ' . ";</h3>	
                            </table>
                        </div>
                        <div id='xac-nhan'>
                            <br>
                            <p align='justify'>
                                <b>Quý khách đã đặt hàng thành công!</b><br />
                                • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
                                • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
                                <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
                            </p>
                        </div>
                    </div>
                ";
            sent_email($email, $fullname, "Xác nhận đơn hàng của cửa hàng Watch Shop", $content);
            redirect("?mod=home&action=index");
            session_destroy();
        }
    }

    load_view('checkout');
}
function buyNowAction()
{
    $id = (int) $_GET['id'];
    add_cart($id);
    update_info_cart();
    header("Location:?mod=cart&action=checkout");
}
