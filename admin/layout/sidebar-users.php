<?php
$role = get_role_user($_SESSION['user_login']);
?>
<div id="sidebar" class="fl-left">
    <ul id="list-cat">
        <li>
            <a href="?mod=users&action=reset" title="">Đổi mật khẩu</a>
        </li>
        <?php
        if (in_array($role['user_role'], [7])) {
            ?>
            <li>
                <a href="?mod=users&action=show" title="">Nhóm quản trị</a>
            </li>
        <?php } ?>
        <li>
            <a href="?mod=users&action=logout" title="">Thoát</a>
        </li>
    </ul>
</div>