<?php get_header(); 
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $detail_order['order_id'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $detail_order['cus_address'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail"><?php echo $detail_order['status'] ?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                                <option value='1' <?php if($detail_order['status']  == 1){ echo "selected";}else{echo "";}?> >Chờ duyệt</option>
                                <option value='2' <?php if($detail_order['status']  == 2){ echo "selected";}else{echo "";}?>>Đang vận chuyển</option>
                                <option value='3' <?php if($detail_order['status']  == 3){ echo "selected";}else{echo "";}?>>Thành công</option>
                            </select>
                            <input type="submit" name="btn_update_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $temp = 0;
                             foreach ($dt_od_product as $item) { 
                                 $temp++;
                                 ?>
                                <tr>
                                    <td class="thead-text"><?php echo $temp; ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="../admin/public/uploads/<?php echo $item['pro_thumb'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $item['pro_name'] ?></td>
                                    <td class="thead-text"><?php echo number_format($item['pro_price']).'đ' ?></td>
                                    <td class="thead-text"><?php echo $item['detail_qty'] ?></td>
                                    <td class="thead-text"><?php echo number_format($item['detail_total']).' đ' ?></td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $result_order['sum_sl'] ?> sản phẩm</span>
                            <span class="total"><?php echo number_format($result_order['order_sub_total']).' đ' ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>