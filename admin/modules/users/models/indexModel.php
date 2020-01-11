<?php
#Phân Trang

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
#Hàm xử lý show toàn bộ thông tin và xử lý phân trang
function get_users($start = 1, $num_per_page = 10, $where = "")
{
    $list_users = db_fetch_array("SELECT * FROM tbl_users LIMIT {$start}, {$num_per_page}");
    return $list_users;
}

//--------------------------------------------------------------------------------------------------------

function check_login($username, $password)
{
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    //echo $check_user;
    if ($check_user > 0) {
        return true;
    }
    return false;
}

function check_username($username)
{
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' ");
    if ($check > 0) {
        return true;
    }
    return false;
}

function insert_user($data)
{
    return db_insert('tbl_users', $data);
}

function get_pw_by_username($username)
{
    return db_fetch_row("SELECT password  FROM `tbl_users` WHERE tbl_users.username = '{$username}' ");
}
function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '{$id}'");
    return $item;
}

function update_user($data, $id)
{
    db_update('tbl_users', $data, "`user_id` = '{$id}'");
}


function check_oldpass($old_pass, $username)
{
    if (db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$old_pass}'") > 0) {
        return true;
    }
    return false;
}
function reset_password($data, $current_user)
{
    db_update('tbl_users', $data, "`username` = '{$current_user}'");
}

function delete_users($id)
{
    db_delete('tbl_users', "`user_id` = '{$id}'");
}


/*function show_admin(){
    $admin = db_fetch_array("SELECT * FROM `tbl_users");
    return $admin;
}*/
#phân trang

//Thống kê sản phẩm ------------------------------------------------

function reckon()
{
    return db_fetch_array("SELECT tbl_products.pro_name,tbl_products.pro_number,tbl_products.pro_remain,
                                    tbl_products.pro_price,tbl_products.price_import,
                                    (tbl_products.pro_price - tbl_products.price_import) as loinhuan1sanpham,
                            ((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan,
                            (tbl_products.price_import * tbl_products.pro_number) as tonggianhap 
                            FROM `tbl_products` 
                            JOIN tbl_detail_order on tbl_products.pro_id = tbl_detail_order.pro_id 
                            JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                            WHERE tbl_orders.status = 3 
                            GROUP BY tbl_products.pro_id");
}


#Biểu đồ hiển thị
function bdt1()
{
    return db_fetch_row("SELECT SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 1 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt2()
{
    return db_fetch_row("SELECT SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 2 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt3()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 3 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt4()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 4 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt5()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 5 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt6()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 6 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt7()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 7 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt8()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 8 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt9()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 9 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt10()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 10 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt11()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 11 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}

function bdt12()
{
    return db_fetch_row("SELECT tbl_products.pro_month,SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloinhuan 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.order_month = 12 AND tbl_orders.status = 3 GROUP BY tbl_orders.order_month");
}
#Tìm kiếm theo tháng

function  reckon_month($month)
{
    return db_fetch_array("SELECT tbl_products.pro_id,tbl_orders.order_day,tbl_orders.order_month,tbl_orders.order_year,tbl_products.pro_name, 
                            SUM(tbl_detail_order.detail_qty) AS daban,
                            tbl_products.pro_remain + tbl_detail_order.detail_qty as pro_number, 
                            tbl_products.pro_remain,tbl_products.pro_price,tbl_products.price_import, 
                            (tbl_products.pro_price - tbl_products.price_import) as loinhuan1sanpham, 
                            (tbl_products.pro_remain + SUM(tbl_detail_order.detail_qty)) as slbandau,
                            ((tbl_products.pro_price - tbl_products.price_import) * SUM(tbl_detail_order.detail_qty)) as tongloi,
                            ((tbl_products.pro_price - tbl_products.price_import) * ((tbl_products.pro_number + tbl_detail_order.detail_qty) - tbl_products.pro_remain)) as tongloinhuan, 
                            (tbl_products.price_import * (tbl_products.pro_number + tbl_detail_order.detail_qty)) as tonggianhap 
                            FROM `tbl_products` JOIN tbl_detail_order 
                            ON tbl_products.pro_id = tbl_detail_order.pro_id 
                            JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                            WHERE tbl_orders.status = 3 AND tbl_orders.order_month = '$month' 
                            GROUP BY tbl_products.pro_id");
}

function  reckon_month_and_day($month, $day1, $day2)
{
    return db_fetch_array("SELECT tbl_products.pro_id,tbl_orders.order_day,tbl_orders.order_month,tbl_orders.order_year,tbl_products.pro_name, 
    SUM(tbl_detail_order.detail_qty) AS daban,
    tbl_products.pro_remain + tbl_detail_order.detail_qty as pro_number, 
    tbl_products.pro_remain,tbl_products.pro_price,tbl_products.price_import, 
    (tbl_products.pro_price - tbl_products.price_import) as loinhuan1sanpham, 
    (tbl_products.pro_remain + SUM(tbl_detail_order.detail_qty)) as slbandau,
    ((tbl_products.pro_price - tbl_products.price_import) * SUM(tbl_detail_order.detail_qty)) as tongloi,
    ((tbl_products.pro_price - tbl_products.price_import) * ((tbl_products.pro_number + tbl_detail_order.detail_qty) - tbl_products.pro_remain)) as tongloinhuan, 
    (tbl_products.price_import * (tbl_products.pro_number + tbl_detail_order.detail_qty)) as tonggianhap 
    FROM `tbl_products` JOIN tbl_detail_order 
    ON tbl_products.pro_id = tbl_detail_order.pro_id 
    JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
    WHERE tbl_orders.status = 3 AND tbl_orders.order_month = '$month' and tbl_orders.order_day BETWEEN {$day1} AND {$day2}
    GROUP BY tbl_products.pro_id");
}

function get_total_orders()
{
    return db_fetch_row("SELECT SUM(order_sub_total) as total FROM `tbl_orders` WHERE status = '3'");
}
function count_success_orders()
{
    return db_fetch_row("SELECT COUNT(order_id) as sl FROM `tbl_orders` WHERE status = '3'");
}

function get_tongloi(){
    return db_fetch_row("SELECT SUM((tbl_products.pro_price - tbl_products.price_import) * tbl_detail_order.detail_qty) as tongloi 
                        FROM `tbl_products` JOIN tbl_detail_order ON tbl_products.pro_id = tbl_detail_order.pro_id 
                        JOIN tbl_orders ON tbl_detail_order.order_id = tbl_orders.order_id 
                        WHERE tbl_orders.status = 3");
}