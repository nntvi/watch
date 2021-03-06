<?php get_header(); ?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home&action=index" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=cart&action=show" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php if (isset($list_cart) && !empty($list_cart)) { ?>
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <form action="?mod=cart&action=update" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_cart as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['code']; ?></td>
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="admin/public/uploads/<?php echo $item['thumb_img']; ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="detail-product-<?php echo $item['product_id'];?>.html" title="" class="name-product"><?php echo $item['name']; ?></a>
                                        </td>
                                        <td><?php echo number_format($item['price']).' đ' ?></td>
                                        <td>
                                            <input type="number" min="1" max="<?php echo $item['limit'];?>" name="qty[<?php echo $item['product_id']; ?>]" value="<?php echo $item['qty']; ?>" class="num-order">
                                        </td>
                                        <td><?php echo number_format($item['sub_total']).' đ' ?></td>
                                        <td>
                                            <a href="?mod=cart&action=delete&id=<?php echo $item['product_id'];?>" title="Xóa sản phẩm" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span><?php echo number_format($_SESSION['cart']['info']['total']).' đ'; ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <input type="submit" name="btn_update" value="Cập nhật giỏ hàng" id="update-cart">
                                                <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng.
                    <a href="trang-chu" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="?mod=cart&action=deleteall" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        <?php } else {  ?>
            <p style="text-align:center;font-size:20px;padding-bottom: 8px;">Bạn chưa có thông tin giỏ hàng</p>
            <a href="trang-chu"><p style="text-align:center;font-size:20px">Bấm vào đây để quay lại trang chủ!!!</p></a>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>