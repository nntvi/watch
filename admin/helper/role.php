<?php
    function get_role_user($username){
        return db_fetch_row("SELECT user_role FROM `tbl_users` WHERE `username` = '{$username}'");
    }
?>