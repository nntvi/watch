<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users');?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới admin</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <!-- Kiểm tra username -->
                        <label for="title">Username</label>
                        <input type="text" name="username" id="title">
                        <p class="error"><?php echo form_error('username'); ?></p>

                        <!-- Kiểm tra email -->
                        <label for="title">Email</label>
                        <input type="text" name="email" id="title">
                        <p class="error"><?php echo form_error('email'); ?></p>

                        <!-- Kiểm tra password -->
                        <label for="title">Password</label>
                        <input type="password" name="password" id="title">
                        <p class="error"><?php echo form_error('password'); ?></p>

                        <!-- Kiểm tra phone -->
                         <label for="title">Number Phone</label>
                        <input type="text" name="phone" id="title">
                        <p class="error"><?php echo form_error('phone'); ?></p>

                        <!-- Kiểm tra address -->
                        <label for="title">Địa chỉ</label>
                        <input type="text" name="address" id="title">         
                        <p class="error"><?php echo form_error('address'); ?></p>
             
                        <!--<label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                        </div>-->
                        
                        <button type="submit" name="btn_adduser" id="btn-submit">Thêm admin</button>
                        <p class="error"><?php echo set_value('account'); ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>