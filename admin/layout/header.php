<?php
$role = get_role_user($_SESSION['user_login']);
$tb = countannounce();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Watch</title>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/app.js" type="text/javascript"></script>
    <script src="public/js/update.js" type="text/javascript"></script>
    <script src="public/js/Chart.min.js"></script>
    <script src="public/js/utils.js"></script>

</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <?php 
                    if (in_array($role['user_role'], [7])) { ?>
                        <a href="?mod=users&action=thongke" title="" id="logo" class="fl-left">ADMIN</a>
                    <?php } else{ ?>
                        <a href="?mod=users&action=reset" title="" id="logo" class="fl-left">ADMIN</a>
                    <?php } ?>
                    <ul id="main-menu" class="fl-left">
                        <?php
                        if (in_array($role['user_role'], [1, 3, 5, 7])) {
                            ?>
                            <li>
                                <a href="?mod=pages&action=list" title="">Trang</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=pages&action=list" title="">Danh sách trang</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=posts&action=list" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=posts&action=add" title="">Thêm mới</a>
                                    </li>
                                    <li>
                                        <a href="?mod=posts&action=list" title="">Danh sách bài viết</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php
                        if (in_array($role['user_role'], [2, 3, 6, 7])) {
                            ?>
                            <li>
                                <a href="?mod=product&action=list_product" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=product&action=add" title="">Thêm mới</a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&action=list_product" title="">Danh sách sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&action=list_cat_product" title="">Danh mục sản phẩm</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php
                        if (in_array($role['user_role'], [4, 5, 6, 7])) {
                            ?>
                            
                            <li>
                                <?php if($tb['sl'] !=0){ ?>
                                    <a href="?mod=sale&action=list_order" title="">Bán hàng<sub style="color:orangered; font-weight:bold">(<?php echo $tb['sl'] ?>)</sub></a>
                                <?php } else { ?>
                                    <a href="?mod=sale&action=list_order" title="">Bán hàng</a>
                                <?php } ?>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=sale&action=list_order" title="">Danh sách đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="?mod=sale&action=list_customer" title="">Danh sách khách hàng</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clsearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle" class="fl-left">
                                <img src="public/images/img-admin.png">
                            </div>
                            <h3 id="account" class="fl-right"><?php if (!empty(user_login()))
                                                                    echo user_login();
                                                                ?></h3>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a href="?mod=users&action=reset" title="Thông tin cá nhân">Thông tin tài khoản</a></li>

                            <li><a href="?mod=users&action=logout" title="Thoát">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </div>