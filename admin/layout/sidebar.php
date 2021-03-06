<?php
$role = get_role_user($_SESSION['user_login']);
?>
<div id="sidebar" class="fl-left">
    <ul id="sidebar-menu">
        <?php
        if (in_array($role['user_role'], [1, 3, 5, 7])) {
        ?>
            <li class="nav-item">
                <a href="" title="" class="nav-link nav-toggle">
                    <span class="fa fa-map icon"></span>
                    <span class="title">Trang</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="?mod=pages&action=list" title="" class="nav-link">Danh sách các trang</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="" title="" class="nav-link nav-toggle">
                    <span class="fa fa-pencil-square-o icon"></span>
                    <span class="title">Bài viết</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="?mod=posts&action=add" title="" class="nav-link">Thêm mới</a>
                    </li>
                    <li class="nav-item">
                        <a href="?mod=posts&action=list" title="" class="nav-link">Danh sách bài viết</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <?php
        if (in_array($role['user_role'], [2, 3, 6, 7])) {
        ?>
            <li class="nav-item">
                <a href="" title="" class="nav-link nav-toggle">
                    <span class="fa fa-product-hunt icon"></span>
                    <span class="title">Sản phẩm</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="?mod=product&action=add" title="" class="nav-link">Thêm mới</a>
                    </li>
                    <li class="nav-item">
                        <a href="?mod=product&action=list_product" title="" class="nav-link">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="?mod=product&action=list_cat_product" title="" class="nav-link">Danh mục sản phẩm</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <?php
        if (in_array($role['user_role'], [4, 5, 6, 7])) {
        ?>
            <li class="nav-item">
                <a href="" title="" class="nav-link nav-toggle">
                    <span class="fa fa-database icon"></span>
                    <span class="title">Bán hàng</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="?mod=sale&action=list_order" title="" class="nav-link">Danh sách đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="?mod=sale&action=list_customer" title="" class="nav-link">Danh sách khách hàng</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <!-- <li class="nav-item">
            <a href="#" title="" class="nav-link nav-toggle">
                <span class="fa fa-cubes icon"></span>
                <span class="title">Khối giao diện</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="?page=add_widget" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="?page=list_widget" title="" class="nav-link">Danh sách khối</a>
                </li>
                <li class="nav-item">
                    <a href="?page=menu" title="" class="nav-link">Menu</a>
                </li>
            </ul>
        </li> -->
        <?php
        if (in_array($role['user_role'], [1, 3, 5, 7])) {
        ?>
            <li class="nav-item">
                <a href="#" title="" class="nav-link nav-toggle">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span class="title">Slider</span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class="nav-item">
                        <a href="?mod=slider&action=add" title="" class="nav-link">Thêm mới</a>
                    </li> -->
                    <li class="nav-item">
                        <a href="?mod=slider&action=list" title="" class="nav-link">Danh sách slider</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <?php
        if (in_array($role['user_role'], [4, 5, 6, 7])) {
        ?>
            <li class="nav-item">
                <a href="#" title="" class="nav-link nav-toggle">
                    <i class="fa fa-sliders" aria-hidden="true"></i>
                    <span class="title">Nhập hàng</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="?mod=update_qty_pro&action=index" title="" class="nav-link">Cập nhật hàng</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <!-- <li class="nav-item">
            <a href="#" title="" class="nav-link nav-toggle">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <span class="title">Media</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="?page=list_media" title="" class="nav-link">Danh sách media</a>
                </li>
            </ul>
        </li> -->
    </ul>
</div>