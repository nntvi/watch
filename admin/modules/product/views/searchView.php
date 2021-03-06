<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><span class="count">Kết quả tìm thấy (<?php echo $count['sl'] ?>)</span></li>
                            <!-- <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li> -->
                        </ul>
                        <form method="POST" class="form-s fl-right" action="?mod=product&action=search">
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
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá bán</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Giới tính</span></td>
                                    <td><span class="thead-text">Tổng số lượng</span></td>
                                    <td><span class="thead-text">Số lượng còn lại</span></td>
                                    <td><span class="thead-text">Ngày nhập</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($search)) {
                                ?>
                                    <?php
                                    $temp = 0;
                                    foreach ($search as $item) {
                                        $temp++
                                    ?>
                                        <tr>
                                            <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
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
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo $item['url_update'];  ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $item['url_delete'];  ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo number_format($item['pro_price']) . 'đ'  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['cat_name'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['pro_gender'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['pro_number'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['pro_remain'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['pro_time'];  ?></span></td>
                                        </tr>
                                    <?php } ?>


                                <?php } else { ?>
                                    <p class="error">Không có kết quả cho tìm kiếm vừa nhập</p>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Giới tính</span></td>
                                    <td><span class="thead-text">Tổng số lượng</span></td>
                                    <td><span class="thead-text">Số lượng còn lại</span></td>
                                    <td><span class="thead-text">Ngày nhập</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <?php
                        # echo get_pagging($num_page, $page, "?mod=product&action=list_product");
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>