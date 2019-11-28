<?php 
    function update_info_cart(){
       if(isset($_SESSION['cart'])){
            $num_order = 0;
            $total = 0;
            foreach($_SESSION['cart']['buy'] as $item){
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }
            $_SESSION['cart']['info'] = array(
                'number_order' => $num_order,
                'total' => $total
            );
        }
    }
    function update_cart($qty){
        foreach ($qty as $id => $new_qty) {
            $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
            $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty *   $_SESSION['cart']['buy'][$id]['price'];
        }
        update_info_cart();
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
   