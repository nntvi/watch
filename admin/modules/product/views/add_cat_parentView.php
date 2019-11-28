<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục con</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục con</label>
                        <input type="text" name="cat_name_parent" id="title">
                        <label>Danh mục cha</label>
                        <select name="parent_cat">
                        <option value="">-- Chọn danh mục --</option>
                            <?php
                             foreach(get_name_cat() as $item){ ?>
                            <option value="<?php echo $item['cat_id'];?>"><?php echo $item['cat_name']; ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" name="btn_cat_parent" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>