<?php get_header();
global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa thông tin sản phẩm</h3>
                </div>
            </div>
            <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo $item['pro_name']; ?>">
                        <p class="error"><?php form_error('product_name'); ?></p>

                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="<?php echo $item['pro_code']; ?>">
                        <p class="error"><?php form_error('product_code'); ?></p>

                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="price" value="<?php echo $item['pro_price']; ?>">
                        <p class="error"><?php form_error('product_price'); ?></p>

                        <label for="gender">Giới tính</label>
                        <div class="gender">
                            <input type="radio" name="gender" value="male" <?php if($item['pro_gender'] == 'male'){ echo "checked";}else{
                                echo "";
                            }?>> Nam
                            <input type="radio" name="gender" value="female" <?php if($item['pro_gender']  == 'female'){ echo "checked";}else{echo "";}?>> Nữ<br><br>
                        </div>
                    
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc" class="ckeditor"><?php echo $item['pro_desc']; ?></textarea>
                        <p class="error"><?php form_error('product_desc'); ?></p>

                        <label for="desc">Chi tiết</label>
                        <textarea name="product_detail" id="desc" class="ckeditor"><?php echo $item['pro_detail']; ?>"</textarea>
                        <p class="error"><?php form_error('product_detail'); ?></p>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="">
                            <img src="../admin/public/uploads/<?php echo $name['pro_thumb']; ?>">
                        </div>

                        <p style="color:red; padding: 20px 0px;">Vui lòng chọn lại danh mục khi chỉnh sửa</p>
                        <label>Danh mục sản phẩm</label>
                        <select id="parent_id" name="parent_id">
                            <option value="-1">-- Chọn danh mục --</option>
                            <?php foreach (get_name_cat() as $parent) { ?>
                                <option value="<?php echo $parent['cat_id']; ?>"><?php echo $parent['cat_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label>Danh mục con</label>
                        <select id="sub-cat" name="sub-cat">
                            <option><?php echo $item['cat_name']; ?></option>
                        </select>
                        <button type="submit" name="btn_update_product" id="btn-submit">Chỉnh sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>