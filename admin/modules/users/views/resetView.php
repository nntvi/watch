<?php get_header(); 
?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">

            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
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