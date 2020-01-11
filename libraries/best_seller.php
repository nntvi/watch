<?php
    function get_best_seller(){
        $list_pro = db_fetch_array("SELECT *,sum(tbl_detail_order.detail_qty) 
                                    FROM tbl_orders INNER JOIN tbl_detail_order 
                                    ON tbl_orders.order_id = tbl_detail_order.order_id 
                                    INNER JOIN  tbl_products 
                                    ON tbl_products.pro_id = tbl_detail_order.pro_id
                                    WHERE tbl_orders.status = 3 
                                    GROUP BY tbl_detail_order.pro_id DESC limit 10" );
        return $list_pro;
    }
?>