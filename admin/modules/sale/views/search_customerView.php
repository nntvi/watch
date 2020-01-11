<?php get_header(); 
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Kết quả tìm thấy <span class="count">(<?php echo $count['sl']; ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <!-- <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div> -->
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Đơn hàng</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list_search)) { ?>
                                    <?php
                                        $temp = 0;
                                        foreach ($list_search as $item) {
                                            $temp++;
                                            ?>
                                        <tr>
                                            <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                            <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $item['cus_name'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <!-- <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li> -->
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $item['cus_phone'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['cus_email'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['cus_address'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['order_id'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['cus_date'] ?></span></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <p class="error">Không có kết quả cho tìm kiếm vừa nhập</p>
                                <?php    } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="tfoot-body">STT</span></td>
                                    <td><span class="tfoot-body">Họ và tên</span></td>
                                    <td><span class="tfoot-body">Số điện thoại</span></td>
                                    <td><span class="tfoot-body">Email</span></td>
                                    <td><span class="tfoot-body">Địa chỉ</span></td>
                                    <td><span class="tfoot-body">Đơn hàng</span></td>
                                    <td><span class="tfoot-body">Thời gian</span></td>
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
                        // echo get_pagging($num_page, $page, "?mod=sale&action=list_order");
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>