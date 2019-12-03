<?php get_header(); ?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
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
            <!-- <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($product as $pro) { ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $pro['pro_id']; ?>" title="" class="thumb">
                                <img src="../project/admin/public/uploads/<?php echo $pro['pro_thumb'] ?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $pro['pro_id']; ?>" title="" class="product-name"><?php echo $pro['pro_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($pro['pro_price']) . ' đ' ?></span>
                                <span class="old"><?php echo number_format($pro['pro_price_old']) . ' đ' ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=index&id={$pro['pro_id']}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=checkoutid={$pro['pro_id']}" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div> -->
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
                                        <img src="../project/admin/public/uploads/<?php echo $pro['pro_thumb'] ?>">
                                    </a>
                                    <a href="?mod=product&action=detail&id=<?php echo $pro['pro_id']; ?>" title="" class="product-name"><?php echo $pro['pro_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($pro['pro_price']) . ' đ' ?></span>
                                        <span class="old"><?php echo number_format($pro['pro_price_old']) . ' đ' ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&action=index&id={$pro['pro_id']}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&action=checkoutid={$pro['pro_id']}" title="" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php }?>
                <!-- <div class="section-detail">
                    <ul class="list-item clearfix" id="filter">

                    </ul>
                </div> -->
            </div>
        </div>


        <?php get_sidebar(); ?>
        <div class="sidebar fl-left">
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title"><a href="?mod=home&action=filter" style="color:white">Bộ lọc</a></h3>
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