<?php

//Trả về true đã login
function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    }
    return false;
}

//Trả về username của người login
function user_login()
{
    if (!empty($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    }
    return false;
}

//Trả về fullname
/*function info_user($field = 'id')
{
    global $list_user;
    if (isset($_SESSION['is_login'])) {
        foreach ($list_user as $user) {
            if ($_SESSION['user_login'] == $user['username']) {
                if (array_key_exists($field, $user)) {
                    return $user[$field];
                }
            }
        }
    }
    return false;
}*/
