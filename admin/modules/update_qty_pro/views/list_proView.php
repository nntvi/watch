<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <!-- <a href="?mod=product&action=add" title="" id="add-new" class="fl-left">Thêm mới</a> -->
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo $count['count_id']; ?>)</span></a> </li>
                            <!-- <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li> -->
                        </ul>
                        <form method="POST" class="form-s fl-right" action="?mod=update_qty_pro&action=search">
                            <input type="text" name="search" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <!-- <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng"> -->
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giới tính</span></td>
                                    <td><span class="thead-text">SL Nhập</span></td>
                                    <td><span class="thead-text">Số lượng còn lại</span></td>
                                    <td><span class="thead-text">Ngày nhập</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $temp = 0;
                                foreach ($product as $item) { 
                                    $temp++ ?>
                                    <tr>
                                        <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                        <td><span class="tbody-text"><?php echo $temp  ;?></h3></span>
                                        <td><span class="tbody-text"><?php echo $item['pro_code'];  ?></h3></span>
                                        <td>
                                            <div class="tbody-thumb">
                                                <img src="public/uploads/<?php echo $item['pro_thumb'];  ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $item['pro_name'];  ?></a>
                                            </div>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $item['pro_gender'];  ?></span></td>
                                        <td style="text-align: center;"><span class="tbody-text"><?php echo $item['pro_number'];  ?></span></td>
                                        <td style="text-align: center;"><span class="tbody-text"><?php echo $item['pro_remain'];  ?></span></td>
                                        <td><span class="tbody-text"><?php echo $item['pro_time'];  ?></span></td>
                                        <td><span class="tbody-text"><a href="?mod=update_qty_pro&action=add&id=<?php echo $item['pro_id'];?>">Thêm số lượng</a></span></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                    <td><span class="tfoot-text">Hình ảnh</span></td>
                                    <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giới tính</span></td>
                                    <td><span class="thead-text">SL Nhập</span></td>
                                    <td><span class="thead-text">Số lượng còn lại</span></td>
                                    <td><span class="tfoot-text">Ngày nhập</span></td>
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
                            echo get_pagging($num_page,$page,"?mod=update_qty_pro&action=index");
                       ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>