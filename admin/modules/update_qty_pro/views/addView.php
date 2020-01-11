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
                        <input type="text" name="product_name" id="product-name" value="<?php echo $item['pro_name']; ?>" readonly="readonly" disabled>

                        <label for="product-name">Mã sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo $item['pro_code']; ?>" readonly="readonly" disabled>

                        <label for="product-name">Số lượng trong kho</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo $item['pro_remain']; ?>" readonly="readonly" disabled>

                        <!-- <label for="product-name">Số lượng ban đầu kho nhập về</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo $item['pro_number']; ?>" readonly="readonly" disabled> -->

                        <label for="product-code">Số lượng sản phẩm cần nhập về tiếp</label>
                        <input type="number" min="1" name="number" id="product-code"">
                        <p class="error"><?php form_error('product_code'); ?></p>

                        <button style="margin-top: 20px" type="submit" name="btn_update_product" id="btn-submit">Chỉnh sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>