<?php get_header(); ?>
<style>
#feature-product-wp .list-item li .product-name, #list-product-wp .list-item li .product-name, #same-category-wp .list-item li .product-name {
    display: block;
    text-align: center;
    color: #222;
    font-family: 'Roboto Medium';
    margin: 15px 0px 5px 0px;
    line-height: normal;
    height: 35px;
    overflow: hidden;
}
</style>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
            <div class="section-detail">
                     <?php
                    foreach ($slide as $item) { ?>
                        <div class="item">
                            <a href="http://localhost/watch/detail-product-35.html" target="_blank" rel="noopener noreferrer">
                                <img src="../watch/admin/public/uploads/<?php echo $item['slide_thumb'] ?>" alt="">
                            </a>
                        </div>
                    <?php   } ?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"></h3>
                </div>
                <?php if (!empty($product)) { ?>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php foreach ($product as $pro) { ?>
                                <li>
                                    <a href="?mod=product&action=detail&id=<?php echo $pro['pro_id']; ?>" title="" class="thumb">
                                        <img src="../watch/admin/public/uploads/<?php echo $pro['pro_thumb'] ?>">
                                    </a>
                                    <a href="?mod=product&action=detail&id=<?php echo $pro['pro_id']; ?>" title="" class="product-name"><?php echo $pro['pro_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($pro['pro_price']) . ' đ' ?></span>
                                        <span class="old"><?php echo number_format($pro['pro_price_old']) . ' đ' ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <?php
                                        if ($pro['pro_remain'] == 0) { ?>
                                            <span>Hết hàng</span>
                                        <?php } else { ?>
                                            <div class="action clearfix">
                                                <a href="giohang/product-<?php echo $pro['pro_id'] ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                <a href="?mod=cart&action=buyNow&id=<?php echo $pro['pro_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        echo get_pagging($num_page, $page, "?mod=home&action=category&id={$_GET['id']}");
                        ?>
                    </ul>
                </div>
            </div>

        </div>

        <?php get_sidebar(); ?>
        <div class="sidebar fl-left">
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="filter" style="color:white">Bộ lọc</a></h3>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>