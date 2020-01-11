<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Trang đăng nhập</title>
</head>

<body>
    <div id="wp-form-login">
        <h1 id="header-title">ĐĂNG NHẬP</h1>
        <form action="" method="post" id="form-login">
            <!--Username-->
            <input type="text" name="username" id="username" placeholder="Username" />
            <p class="error"><?php echo form_error('username'); ?></p>
            <!--Password-->
            <br>
            <input type="password" name="password" id="password" placeholder="Password" />
            <p class="error"><?php echo form_error('password'); ?></p>
            <!--SESSION-->
            <!-- <input type="checkbox" name="remember_me" id="remember" />Ghi nhớ đăng nhập -->
            <br>
            <!--Đăng Nhập-->
            <input type="submit" value="Đăng Nhập" name="btn_login" id="btn_login" />
            <p class="error"><?php echo form_error('account'); ?></p>
        </form>
    </div>
</body>

</html>