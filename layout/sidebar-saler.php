<div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    <?php foreach(get_best_seller() as $item){ ?> 
                        <li class="clearfix">
                            <a href="detail-product-<?php echo $item['pro_id'];?>.html" title="" class="thumb fl-left">
                                <img src="../watch/admin/public/uploads/<?php echo $item['pro_thumb']; ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="detail-product-<?php echo $item['pro_id'];?>.html" title="" class="product-name"><?php echo $item['pro_name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo number_format($item['pro_price']) . 'đ' ?></span>
                                    <span class="old"><?php echo number_format($item['pro_price_old']) . 'đ'?></span>
                                </div>
                                <?php if($item['pro_remain'] == 0){ ?>
                                    <span>Hết hàng</span>
                                <?php } else { ?>
                                    <a href="?mod=cart&action=buyNow&id=<?php echo $item['pro_id'] ?>" title="" class="buy-now">Mua ngay</a>
                                <?php } ?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>