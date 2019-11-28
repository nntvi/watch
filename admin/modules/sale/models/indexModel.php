<?php
function get_list_customer()
{
    return db_fetch_array("SELECT * FROM `tbl_customers`");
}

function get_list_order()
{
    return db_fetch_array("SELECT tbl_orders.order_id,cus_name,detail_qty,order_sub_total,
                                        cus_date, count(tbl_detail_order.order_id) sl,
                                        status FROM tbl_orders 
                                        INNER JOIN tbl_customers on tbl_orders.cus_id = tbl_customers.cus_id 
                                        INNER JOIN tbl_detail_order on tbl_orders.cus_id = tbl_detail_order.cus_id 
                                        GROUP BY tbl_orders.order_id, tbl_customers.cus_name");
}

function get_detail_order($id)
{
    return db_fetch_row(("SELECT order_method, status, cus_address, tbl_orders.order_id FROM tbl_customers inner join tbl_orders on tbl_orders.cus_id = tbl_customers.cus_id WHERE tbl_orders.order_id = $id"));

    // return db_fetch_array("SELECT count(detail_qty) sl, order_sub_total, status, cus_address,pro_thumb,pro_price
    // FROM tbl_orders INNER JOIN tbl_detail_order on tbl_orders.order_id = tbl_detail_order.order_id 
    // INNER JOIN tbl_customers on tbl_orders.cus_id = tbl_orders.cus_id
    // INNER JOIN tbl_products on tbl_detail_order.pro_id = tbl_products.pro_id
    // WHERE tbl_detail_order.order_id = tbl_detail_order.order_id and tbl_detail_order.order_id = $id ");
}
function get_detail_order_product($id)
{
    return db_fetch_array("SELECT * FROM tbl_orders INNER JOIN tbl_detail_order ON 
        tbl_orders.order_id = tbl_detail_order.order_id INNER JOIN
         tbl_products ON tbl_detail_order.pro_id = tbl_products.pro_id
                                    where tbl_orders.order_id = $id");
}
function get_result_order($id){
    return db_fetch_row("SELECT SUM(detail_qty) as sum_sl, order_sub_total 
                            FROM tbl_orders INNER JOIN tbl_detail_order 
                            on tbl_orders.order_id = tbl_detail_order.order_id
                            WHERE tbl_orders.order_id = $id
                            GROUP BY tbl_orders.order_id");
}
function update_status($data,$order_id){
    db_update('tbl_orders',$data,"`order_id` = '{$order_id}'");
}