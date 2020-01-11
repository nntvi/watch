<?php 
    function update_info_cart(){
       if(isset($_SESSION['cart'])){ // nếu mà giỏ hàng có tồn tại
            $num_order = 0; // đặt cho sl sp được vào giỏ là 0
            $total = 0; // tổng số tiền cũng là 0

            foreach($_SESSION['cart']['buy'] as $item){ // duyệt từng sản phẩm trong giỏ
                $num_order += $item['qty']; // => sl tổng trong giỏ = sl từng sp được mua + lại
                $total += $item['sub_total']; // => tổng tiền trong giỏ cũng = tổng tiền từng sp * sl mua + lại
            }
            // tạo 1 session mới để lưu thông tin tổng sl và tổng số sp
            $_SESSION['cart']['info'] = array(
                'number_order' => $num_order,
                'total' => $total
            );
        }
    }
    
    function update_cart($qty){
        // update theo dòng sản phẩm khi khách hàng cần tăng số lượng
        // lấy sl người dùng vừa thay đổi = method POST
        foreach ($qty as $id => $new_qty) {
            $_SESSION['cart']['buy'][$id]['qty'] = $new_qty; // sl mới lúc này = id của sp trong giỏ hàng tương ứng vs sl vừa post lên
            // => tổng giá lúc này = sl mới vừa cập nhật * giá của id sp tương ứng
            $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
        }
        // sau khi update cart xong phải update lại toàn bộ cart để lấy ra được tổng sp trong giỏ và tổng giá
        update_info_cart();
    }

    function add_cart($id){
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
            'limit' => $item['pro_remain']
        );
    }

    function get_product_by_id($id){
        return db_fetch_row("SELECT * FROM `tbl_products` WHERE `pro_id` = $id");
    }

    function add_customer($data){
        return db_insert('tbl_customers',$data);
    }

    function add_order($data){
        return db_insert('tbl_orders',$data);
    }

    function add_detail_order($data){
        return db_insert('tbl_detail_order',$data);
    }

    function update_announce($order_id){
        
    }
   