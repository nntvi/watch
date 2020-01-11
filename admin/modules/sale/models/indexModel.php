<?php

function get_list_customer($start = 1, $num_per_page = 10, $where = "")
{
    $list_customer = db_fetch_array("SELECT * FROM `tbl_customers` JOIN tbl_orders ON tbl_customers.cus_id = tbl_orders.cus_id LIMIT {$start}, {$num_per_page}");
    return $list_customer;
}

#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_list_order($start = 1, $num_per_page = 10, $where = "")
{
    $list_order = db_fetch_array("SELECT tbl_orders.order_id,cus_name,detail_qty,order_sub_total,tbl_orders.note,
    cus_date, count(tbl_detail_order.order_id) sl, status FROM tbl_orders 
    INNER JOIN tbl_customers on tbl_orders.cus_id = tbl_customers.cus_id 
    INNER JOIN tbl_detail_order on tbl_orders.cus_id = tbl_detail_order.cus_id 
    GROUP BY tbl_orders.order_id, tbl_customers.cus_name 
    ORDER BY tbl_orders.order_id DESC
    LIMIT {$start}, {$num_per_page}");
    return $list_order;
}
function get_detail_order($id)
{
    return db_fetch_row(("SELECT order_method, status, cus_address, tbl_orders.order_id FROM
     tbl_customers inner join tbl_orders on tbl_orders.cus_id = tbl_customers.cus_id
      WHERE tbl_orders.order_id = $id"));

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
function get_result_order($id)
{
    return db_fetch_row("SELECT SUM(detail_qty) as sum_sl, order_sub_total 
                            FROM tbl_orders INNER JOIN tbl_detail_order 
                            on tbl_orders.order_id = tbl_detail_order.order_id
                            WHERE tbl_orders.order_id = $id
                            GROUP BY tbl_orders.order_id");
}
function update_status($data, $order_id)
{
    db_update('tbl_orders', $data, "`order_id` = '{$order_id}'");
}

function get_pagging($num_page, $page, $base_url = "")
{
    $str_pagging = "<ul class='pagging'>";
    if ($page > 1) {
        $page_prev = $page - 1;
        $str_pagging .= "<li><a href = \"{$base_url}&page={$page_prev}\">Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page) {
            $active = "class = 'active'";
        }
        $str_pagging .= "<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li><a href=\"{$base_url}&page={$page_next}\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

#Xử lí tìm kiếm
function result_search($str)
{
    $item = db_num_rows("SELECT *
    FROM `tbl_customers` JOIN `tbl_orders` 
    ON tbl_customers.cus_id = tbl_orders.cus_id
    JOIN tbl_detail_order ON tbl_detail_order.order_id = tbl_orders.order_id
    where tbl_customers.cus_name like '%{$str}%' 
    or tbl_customers.cus_phone like '{$str}'
    or tbl_orders.order_id like '{$str}' 
    GROUP BY tbl_orders.order_id");
    return $item;
}

function get_order_search($str)
{
    $list_order = db_fetch_array("SELECT *,count(tbl_detail_order.order_id) sl FROM `tbl_customers` JOIN `tbl_orders` 
                                    ON tbl_customers.cus_id = tbl_orders.cus_id
                                    JOIN tbl_detail_order ON tbl_detail_order.order_id = tbl_orders.order_id
                                    where tbl_customers.cus_name like '%{$str}%' 
                                    or tbl_customers.cus_phone like '{$str}'
                                    or tbl_orders.order_id like '{$str}' GROUP BY tbl_orders.order_id");
    return $list_order;
}

function get_customer_search($str)
{
    $list_cus = db_fetch_array("SELECT * FROM `tbl_customers` 
                                JOIN tbl_orders ON tbl_customers.cus_id = tbl_orders.cus_id
                                where cus_name like '%{$str}%' or cus_phone like '{$str}'");
    return $list_cus;
}
function count_cus_search($str)
{
    $count = db_fetch_row("SELECT COUNT(tbl_customers.cus_id) as sl FROM `tbl_customers` 
    JOIN tbl_orders ON tbl_customers.cus_id = tbl_orders.cus_id WHERE cus_name like '%{$str}%' or cus_phone like '{$str}'");
    return $count;
}

function get_id()
{
    return db_fetch_array("SELECT tbl_orders.order_id,tbl_detail_order.pro_id,tbl_orders.status FROM tbl_orders JOIN tbl_detail_order on tbl_orders.order_id = tbl_detail_order.order_id");
}

function update_pro_remain($order_id) // cập nhật sản phẩm còn lại mỗi khi cập nhật tình trạng đơn hàng
{
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    $sql = "UPDATE tbl_products 
            JOIN tbl_detail_order 
            ON tbl_products.pro_id = tbl_detail_order.pro_id 
            JOIN tbl_orders 
            ON tbl_detail_order.order_id = tbl_orders.order_id 
            SET pro_remain = pro_remain - tbl_detail_order.detail_qty 
            WHERE tbl_orders.status = 3 AND tbl_orders.order_id = $order_id";

    mysqli_query($conn, $sql);
}

function count_order()
{
    return db_fetch_row("SELECT COUNT(order_id) as count_order FROM `tbl_orders`");
}
function count_customer()
{
    return db_fetch_row("SELECT COUNT(cus_id) as count_customer FROM `tbl_customers`");
}

function get_note($id)
{
    return db_fetch_row("SELECT tbl_customers.cus_note FROM tbl_customers
                         JOIN tbl_detail_order ON tbl_customers.cus_id = tbl_detail_order.cus_id
                         JOIN tbl_orders ON tbl_orders.order_id = tbl_detail_order.order_id 
                         WHERE tbl_orders.order_id = $id");
}

function countannouncenotheader()
{
    return  db_fetch_row("SELECT COUNT(tbl_orders.note) as sl FROM `tbl_orders` WHERE note = 0");
}

function updateannounce($order_id)
{
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    $sql = "UPDATE tbl_orders SET note = 1 WHERE order_id = {$order_id}";
    mysqli_query($conn, $sql);
}
function deleteallcus(){
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    $sql = "DELETE * FROM tbl_customers";
    mysqli_query($conn, $sql);
}