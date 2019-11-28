<?php get_header(); 
//show_array($info_user);
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
            <a href="?mod=users&action=adduser" title="" id="add-new" class="fl-left">Thêm mới</a>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="" readonly="readonly" value="<?php echo $info_user['username']; ?>" disabled>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email']; ?>" disabled>

                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone" id="tel" value="<?php echo $info_user['number_phone']; ?>">
                        <p class="error"><?php echo form_error('phone'); ?></p>
                        <label for=" address">Địa chỉ</label>
                        <textarea name="address" id="address" value=""><?php echo $info_user['address']; ?></textarea>
                        <p class="error"><?php echo form_error('address'); ?></p>
                        <button type="submit" name="btn_update" id="btn-submit">Cập nhật</button>
                        <p class="error"><?php echo form_error('account'); ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>