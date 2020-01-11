<?php get_header(); 
?>
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
                            <p class="desc">Hỗ trợ linh hoạt</p>
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
                            <a href="detail-product-<?php echo $hot['pro_id'];?>.html" title="" class="thumb">
                                <img src="../watch/admin/public/uploads/<?php echo $hot['pro_thumb'] ?>">
                            </a>
                            <a href="detail-product-<?php echo $hot['pro_id'];?>.html" title="" class="product-name"><?php echo $hot['pro_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($hot['pro_price']).' đ'?></span>
                                <span class="old"><?php echo number_format($hot['pro_price_old']).' đ'?></span>
                            </div>
                            <div class="action clearfix">
                                <?php 
                                if($hot['pro_remain'] == 0){ ?>
                                   <span>Hết hàng</span>
                                <?php } else{ ?>
                                    <div class="action clearfix">
                                    <a href="giohang/product-<?php echo $hot['pro_id']?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&action=buyNow&id=<?php echo $hot['pro_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                               <?php }
                            ?>
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
                            if($count < 5){ // giới hạn sản phẩm
                            ?>
                        <li>
                            <a href="detail-product-<?php echo $p['pro_id'];?>.html" title="" class="thumb">
                                <img src="../watch/admin/public/uploads/<?php echo $p['pro_thumb']; ?>">
                            </a>
                            <a href="detail-product-<?php echo $p['pro_id'];?>.html" title="" class="product-name"><?php echo $p['pro_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($p['pro_price']) . 'đ' ?></span>
                                <span class="old"><?php echo number_format($p['pro_price_old']) . 'đ'?></span>
                            </div>
                            <?php 
                                if($p['pro_remain'] == 0){ ?>
                                   <span>Hết hàng</span>
                                <?php } else{ ?>
                                    <div class="action clearfix">
                                    <a href="giohang/product-<?php echo $p['pro_id']?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&action=buyNow&id=<?php echo $p['pro_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                               <?php }
                            ?>
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
        <?php get_sidebar('saler'); ?>
    </div>
</div>
<?php get_footer(); ?>