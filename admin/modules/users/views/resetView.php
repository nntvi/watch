<?php get_header(); 
?>
<?php
$role = get_role_user($_SESSION['user_login']);
global $error, $success;
?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
            <?php if (in_array($role['user_role'], [7])) { ?>
            <!-- <a href="?mod=users&action=adduser" title="" id="add-new" class="fl-left">Thêm mới</a> -->
            <?php } ?>
        </div>
        <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <!-- mật khẩu cũ -->
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="old_pass" id="pass-old">
                        <p class="error"><?php echo form_error('old_pass'); ?></p>

                        <!-- mật khẩu mới -->
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="new_pass" id="pass-new">
                        <p class="error"><?php echo form_error('new_pass'); ?></p>

                        <!-- xác nhận mk -->
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm-pass">
                        <p class="error"><?php echo form_error('confirm_pass'); ?></p>

                        <button type="submit" name="btn_changepassword" id="btn-submit">Cập nhật</button>
                        <p class="error"><?php echo form_error('account'); ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>