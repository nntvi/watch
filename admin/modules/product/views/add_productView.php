<?php get_header(); 
global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>

            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name">
                        <p class="error"><?php form_error('product_name'); ?></p>

                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code">
                        <p class="error"><?php form_error('product_code'); ?></p>

                        <label for="price">Giá bán sản phẩm</label>
                        <input type="text" name="product_price" id="price">
                        <p class="error"><?php form_error('product_price'); ?></p>

                        <label for="old_price">Giá cũ</label>
                        <input type="text" name="product_old_price" id="price">
                        <p class="error"><?php form_error('product_old_price'); ?></p>

                        <label for="gender">Giới tính</label>
                        <div class="gender">
                            <input type="radio" name="gender" value="male"> Nam
                            <input type="radio" name="gender" value="female"> Nữ<br><br>
                        </div>
                    
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc" class="ckeditor"></textarea>
                        <p class="error"><?php form_error('product_desc'); ?></p>

                        <label for="desc">Chi tiết</label>
                        <textarea name="product_detail" id="desc" class="ckeditor"></textarea>
                        
                        <label>Hình ảnh</label>
                        <div id="uploadFile" enctype="multipart/form-data">
                            <input type="file" name="file" id="upload-thumb">
                        </div>
                        <p class="error"><?php form_error('file'); ?></p>

                       
                        <label>Danh mục sản phẩm</label>
                        <select id="parent_id" name="parent_id">
                            <option value="-1">-- Chọn danh mục --</option>
                            <?php foreach (get_name_cat() as $item) { ?>
                                <option value="<?php echo $item['cat_id']; ?>"><?php echo $item['cat_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label>Danh mục con</label>
                        <select id="sub-cat" name="sub-cat">

                        </select>
                        <!-- <label>Trạng thái</label>
                        <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Đã đăng</option>
                        </select> -->
                        <button type="submit" name="btn_add_product" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>