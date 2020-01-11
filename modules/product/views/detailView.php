<?php get_header();
//show_array($detail);
?>
<style>
    h2.notify {
        font-size: 20px;
        font-style: italic;
        font-weight: 600;
        color: darkgrey;
    }
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
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home&action=index" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=product&action=detail&id=<?php echo $id ?>" title=""><?php echo $name['pro_name'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <?php foreach ($detail as $item) { ?>
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb-1">
                                <img id="zoom" src="../watch/admin/public/uploads/<?php echo $item['pro_thumb'] ?>" data-zoom-image="../watch/admin/public/uploads/<?php echo $item['pro_thumb'] ?>" />
                            </a>
                            <!-- <div id="list-thumb">
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                        </div> -->
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="../project/admin/public/uploads/<?php echo $item['pro_thumb'] ?>" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name"><?php echo $item['pro_name'] ?></h3>
                            <div class="desc">
                                <p><?php echo str_replace("\n", "", $item['pro_desc']); ?></p>
                            </div>
                            <!-- <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng</span>
                        </div> -->
                            <p class="price"><?php echo number_format($item['pro_price']) . 'đ' ?></p>
                            <!-- <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div> -->
                            <?php
                            if ($count_remain['pro_remain'] == 0) {   ?>
                                <h2 class="notify">Hết hàng</h2>

                            <?php } else { ?>
                                <a href="giohang/product-<?php echo $item['pro_id'] ?>.html" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                            <?php } ?>

                        </div>
                    </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <p> <?php echo $item['pro_detail']; ?></p>
                </div>
            </div>
        <?php } ?>
        <div class="section" id="same-category-wp">
            <div class="section-head">
                <h3 class="section-title">Cùng chuyên mục</h3>
            </div>
            <div class="section-detail">
                <ul class="list-item">
                    <?php
                    $data = db_fetch_array("SELECT * FROM tbl_products WHERE cat_id = {$item['cat_id']}");
                    foreach ($data as $s_category) { ?>
                        <li>
                            <a href="detail-product-<?php echo $s_category['pro_id']; ?>.html" title="" class="thumb">
                                <img src="../watch/admin/public/uploads/<?php echo $s_category['pro_thumb']; ?>">
                            </a>
                            <a href="detail-product-<?php echo $s_category['pro_id']; ?>.html" title="" class="product-name"><?php echo $s_category['pro_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($s_category['pro_price']) . 'đ' ?></span>
                                <span class="old"><?php echo number_format($s_category['pro_price_old']) . ' đ' ?></span>
                                <!--<span class="old">20.900.000đ</span>-->
                            </div>
                            <div class="action clearfix">
                                <?php
                                if ($s_category['pro_remain'] == 0) { ?>
                                    <span>Hết hàng</span>
                                <?php } else { ?>
                                    <div class="action clearfix">
                                        <a href="giohang/product-<?php echo $s_category['pro_id'] ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&action=buyNow&id=<?php echo $s_category['pro_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        </div>
        <?php get_sidebar(); ?>
        <?php get_sidebar('saler'); ?>
    </div>
</div>
<?php get_footer(); ?>