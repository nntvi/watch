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
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach($pro_hot as $hot){?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $hot['pro_id'];?>" title="" class="thumb">
                                <img src="../project/admin/public/uploads/<?php echo $hot['pro_thumb'] ?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $p['pro_id'];?>" title="" class="product-name"><?php echo $hot['pro_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo $hot['pro_price']?></span>
                                <span class="old"><?php echo $hot['pro_price_old']?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=index" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <?php
                foreach($cat as $item){ 
                    $cat_id = $item['cat_id'];
                ?>  
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $item['cat_name'] ?></h3>
                </div>
                <div class="section-detail">
                    <?php foreach(get_sub_cat($cat_id) as $sub_menu){
                        $id_sub_menu = $sub_menu['cat_id'];
                        $count = 0;
                    ?>
                    <ul class="list-item clearfix">
                        <?php foreach(get_product($id_sub_menu) as $p){ 
                            //show_array($p);
                            $count++;
                            if($count < 5){
                            ?>
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $p['pro_id'];?>" title="" class="thumb">
                                <img src="../project/admin/public/uploads/<?php echo $p['pro_thumb']; ?>">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $p['pro_id'];?>" title="" class="product-name"><?php echo $p['pro_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($p['pro_price']) . 'đ' ?></span>
                                <span class="old"><?php echo number_format($p['pro_price_old']) . 'đ'?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=index" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>      
                            <?php }?>
                        <?php }?>                
                    </ul>
                    <?php }?>
                </div>
            </div>
            <?php } ?>
          
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>