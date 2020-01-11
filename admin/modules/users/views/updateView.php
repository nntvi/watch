<?php get_header(); 
//show_array($info_user);
global $error, $success;
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        
        <div id="content" class="fl-right">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
            <a href="?mod=users&action=adduser" title="" id="add-new" class="fl-left">Thêm mới</a>
        </div>
        <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>

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
                        
                        <?php if($info_user['username'] != "tuongvi"){ ?>
                        <label for="title">Role</label>
                        <input type="checkbox" name="role1" id="" value="1" <?php if($info_user['user_role'] == 1 || $info_user['user_role'] == 7 || $info_user['user_role'] == 3 || $info_user['user_role'] == 5) echo "checked"; ?>> Quản lý bài viết
                        <input type="checkbox" name="role2" id="" value="2" <?php if($info_user['user_role'] == 2 || $info_user['user_role'] == 7 || $info_user['user_role'] == 3 || $info_user['user_role'] == 6) echo "checked"; ?> > Quản lý sản phẩm
                        <input type="checkbox" name="role3" id="" value="4" <?php if($info_user['user_role'] == 4 || $info_user['user_role'] == 7 || $info_user['user_role'] == 6 || $info_user['user_role'] == 5) echo "checked"; ?> > Quản lý bán hàng
                        <p class="error"><?php echo form_error('role'); ?></p>
                        <?php } ?>
                        <br>
                        <button type="submit" name="btn_update" id="btn-submit">Cập nhật</button>
                        <p class="error"><?php echo form_error('account'); ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>