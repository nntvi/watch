<?php get_header();
// show_array(countannounce());
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><span class="count">Tất cả (<?php echo $count['count_order']; ?>)</span> | </li>
                            <!-- <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li> -->
                            <li class="pending">Đơn hàng vừa nhận được <span class="count">(<?php echo $countNote['sl']; ?>)</span></li>
                            <!-- <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li> -->
                        </ul>
                        <form method="POST" class="form-s fl-right" action="?mod=sale&action=search_order">
                            <input type="text" name="search" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <!-- <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số mặt hàng</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                    <td><span class="thead-text">Xét duyệt</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($order as $item) {
                                    $temp++;
                                ?>
                                    <tr>
                                        <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                        <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                        <td><span class="tbody-text"><?php echo $item['order_id'] ?></h3></span>
                                        <td>
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $item['cus_name'] ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <!-- <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li> -->
                                                <?php
                                                if ($item['status'] != 3) { ?>
                                                    <li><a href="?mod=sale&action=deleteorder&id=<?php echo $item['order_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                <?php   } else { ?>

                                                <?php } ?>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $item['sl'] ?></span></td>
                                        <td><span class="tbody-text "><?php echo number_format($item['order_sub_total']) . ' đ' ?></span></td>
                                        <?php if($item['status'] == 1){ ?> 
                                            <td><span class="tbody-text" style="color: red">Chờ duyệt</span></td>
                                        <?php } else if($item['status'] == 2) { ?>
                                            <td><span class="tbody-text" style="color: purple">Đang vận chuyển</span></td>
                                        <?php } else if($item['status'] == 3) { ?> 
                                            <td><span class="tbody-text" style="color: blue; font-weight:bold;">Thành công</span></td>
                                        <?php } ?>
                                        
                                        
                                        <!-- <td><span class="tbody-text"><?php if ($item['status'] == 1) {
                                                                            echo "Chờ duyệt";
                                                                        } else if ($item['status'] == 2) echo "Đang vận chuyển";
                                                                        else if ($item['status'] == 3) echo "Thành công"; ?></span></td> -->
                                        <td><span class="tbody-text"><?php echo $item['cus_date'] ?></span></td>
                                        <?php if ($item['note'] == 0) { ?>
                                            <td><a href="?mod=sale&action=detail_order&id=<?php echo $item['order_id'] ?>" title="" class="tbody-text" style="color: red">Chi tiết</a></td>
                                        <?php } else if ($item['note'] == 1) { ?>
                                            <td><a href="?mod=sale&action=detail_order&id=<?php echo $item['order_id'] ?>" title="" class="tbody-text">Chi tiết</a></td>
                                        <?php } ?>
                                        <td><span class="tbody-text"><?php if ($item['note'] == 0) {
                                                                            echo "Chưa xem";
                                                                        } else if ($item['note'] == 1) echo "Đã xem qua"; ?></span></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Mã đơn hàng</span></td>
                                    <td><span class="tfoot-text">Họ và tên</span></td>
                                    <td><span class="tfoot-text">Số mặt hàng</span></td>
                                    <td><span class="tfoot-text">Tổng giá</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Chi tiết</span></td>
                                    <td><span class="thead-text">Xét duyệt</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <!-- <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p> -->
                    <ul id="list-paging" class="fl-right">
                        <?php
                        echo get_pagging($num_page, $page, "?mod=sale&action=list_order");
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>