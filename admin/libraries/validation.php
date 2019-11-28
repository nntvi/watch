<?php
function is_username($username)
{
    $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($parttern, $username)) {
        return true;
    }
    return false;
}


function is_password($password)
{
    $parttern = "/^([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($parttern, $password)){
        return true;
    }
    return false;
}

function is_phone_number($number)
{
    $parttern = "/^(09|03|07|08|05)+([0-9]{8}$)/";
    if (preg_match($parttern, $number)){
        return true;
    } 
    return false;
}


function is_email($email)
{
    $parttern =
        "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($parttern, $email)){
        return true;
    } 
    return false;
}

function is_number($number)
{
    $parttern = '#^\(?[\d]{3}\)?-\(?[\d]{2}\)?-[\d]{2}\.[\d]{3}-[\d]{3}$#';
    if (preg_match($parttern, $number)) {
        return true;
    }
    return false;
}

function set_value($label_field)
{
    global $$label_field;
    if (isset($$label_field))
        return $$label_field;
}

function form_error($label_field)
{
    global $error;
    if (isset($error[$label_field])) {
        echo "<span style=\"color:
            red;\">{$error[$label_field]}</span><br/>";
    }
}


