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

function check_username($username){
	$check = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' ");
	if($check > 0){
		return true;
	}
	return false;
}

function insert_user($data){
    return db_insert('tbl_users',$data);
}

function get_user_by_username($username){
    $item =db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $item;
}
function get_user_by_id($id){
    $item =db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '{$id}'");
    return $item;
}

function update_user($data,$id){
    db_update('tbl_users', $data, "`user_id` = '{$id}'");
}


function check_oldpass($old_pass,$username){
    if(db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$old_pass}'") > 0){
        return true;
    }
    return false;
}
function reset_password($data,$password){
    db_update('tbl_users', $data, "`password` = '{$password}'");
}

function delete_users($id){
    db_delete('tbl_users',"`user_id` = '{$id}'");
}
/*function show_admin(){
    $admin = db_fetch_array("SELECT * FROM `tbl_users");
    return $admin;
}*/
#phân trang
