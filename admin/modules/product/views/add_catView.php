<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
    <?php get_sidebar();?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm danh mục cha</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="product-name">Tên danh mục cha</label>
                        <input type="text" name="cat_name" id="product-name">   
                        <p class="error"><?php echo form_error('cat_name') ?></p>
                        <button type="submit" name="btn_add_cat" id="btn-submit">Thêm danh mục cha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>