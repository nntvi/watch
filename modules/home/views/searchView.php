<?php get_header(); ?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">

            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Kết quả tìm kiếm cho: <?php echo str_replace('%', ' ',$name) ?></h3>
                </div>
            </div>

            <div class="section" id="list-product-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if (!empty($search)) {
                            ?>
                            <?php foreach ($search as $item) { ?>
                                <li>
                                    <a href="detail-product-<?php echo $item['pro_id'];?>.html" title="" class="thumb">
                                        <img src="../project/admin/public/uploads/<?php echo $item['pro_thumb']; ?>">
                                    </a>
                                    <a href="detail-product-<?php echo $item['pro_id'];?>.html" title="" class="product-name"><?php echo $item['pro_name']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($item['pro_price']) . 'đ' ?></span>
                                        <span class="old"><?php echo number_format($item['pro_price_old']) . 'đ' ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="giohang/product-<?php echo $item['pro_id'] ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="checkout-<?php echo $item['pro_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <p class="error">Không có kết quả cho tìm kiếm vừa nhập</p>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>