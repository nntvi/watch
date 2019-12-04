<?php
    function construct()
    {
        load_model('index');
    }
    function indexAction(){
        
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
        $_SESSION['cart']['buy'][$id] = array(
            'product_id' => $item['pro_id'],
            'name' => $item['pro_name'],
            'code' => $item['pro_code'],
            'price' => $item['pro_price'],
            'thumb_img' => $item['pro_thumb'],
            'qty' => $qty,
            'sub_total' => $qty * $item['pro_price'],
        );
        $data['list_cart'] = $_SESSION['cart']['buy'];
        update_info_cart();
        load_view('index', $data);
    }

    function updateAction(){
        if (isset($_POST['btn_update'])) {
            update_cart($_POST['qty']);
        }
        redirect("?mod=cart&action=show");
    }

    function deleteAction(){
        $id = $_GET['id'];
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        }
        redirect("?mod=cart&action=show");
    }
    function deleteallAction(){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
        redirect("?mod=cart&action=show");
    }
    function showAction(){
        load_view('show');
    }
    function checkoutAction(){
        global $error, $fullname, $email, $address, $phone, $note, $payment_method;
        if(isset($_POST['checkout'])){

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
                } 
                else {
                    $phone = $_POST['phone'];
                }
            }

            if (empty($_POST['payment_method'])) {
                $error['payment_method'] = "Vui lòng chọn phương thức thanh toán";
            } else {
                $payment_method = $_POST['payment_method'];
            }

            $note = $_POST['note']; 

           show_array($_SESSION['cart']['buy']);
            if (empty($error)) {
                $data_customer = array(
                    'cus_name' => $fullname,
                    'cus_email' => $email,
                    'cus_phone' => $phone,
                    'cus_address' => $address,
                    'cus_note' => $note,
                    'cus_date' => date("d/m/Y"),
                );
                $cus_id = add_customer($data_customer);

                $data_order = array(
                    'order_sub_total' => $_SESSION['cart']['info']['total'],
                    'order_method' => $payment_method,
                    'cus_id' => $cus_id,
                    'status' => '1'
                );
                $order_id = add_order($data_order);                
                if(!empty($_SESSION['cart']['buy'])){
                    foreach($_SESSION['cart']['buy'] as $item){
                        $data_item = array(
                            'pro_id' => $item['product_id'],
                            'detail_qty' => $item['qty'],
                            'detail_total' => $item['sub_total'],
                            'order_id' => $order_id,
                            'cus_id' => $cus_id
                        );
                        add_detail_order($data_item);
                    }
                   
                }
               
                $content = "<p style='text-align:center'>Cửa hàng ....</p>
                <hr>
                <p>Kính chào quý khách...</p>
                <p>Cửa hàng vừa nhận được đơn hàng .... của quý khách đặt ngày .... với hình thức thanh toán là .... <br>
                Chúng tôi gởi để xác nhận đơn hàng của quý khách bao gồm các sản phẩm sau:";

                foreach ($_SESSION['cart']['buy'] as $item) {
                    $content .= $item['name']."<br/>";
                };
                
                $content .= "
                Tổng giá trị sản phẩm là: ....
                </p>";
                sent_email($email,$fullname,"Xác nhận đơn hàng của cửa hàng....",$content);
                //sent_email($email,$fullname,"Xác nhận đơn hàng của cửa hàng Pé Vivi",$product_name);
            }
        }
        load_view('checkout');
    }

    function SendMailAction(){
        if(isset($_POST['checkout'])){

        }
    }