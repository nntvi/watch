<?php get_header();
global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
    <?php get_sidebar();?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa danh mục</h3>
                </div>
            </div>
            <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>

            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="product-name">Tên danh mục cũ</label>
                        <input type="text" name="old_cat_name" id="product-name" readonly="readonly" value="<?php echo $cat['cat_name'];?>" disabled >
 
                        <label for="product-name">Tên danh mục mới</label>
                        <input type="text" name="new_cat_name" id="product-name">   
                        <p class="error"><?php echo form_error('new_cat_name') ?></p>
                        <button type="submit" name="btn_update_cat" id="btn-submit">Sửa danh mục</button>
                        <p class="error"><?php echo form_error('fail_update_cat') ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>