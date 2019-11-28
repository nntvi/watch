<?php get_header();
//show_array($cat_product);
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=product&action=add_cat" title="" id="add-new" class="fl-left">Thêm danh mục cha</a>
                    <a href="?mod=product&action=add_cat_parent" title="" id="add-new" class="fl-left">Thêm mới danh mục con</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp = 1;
                                foreach ($cat_product as $item) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $temp++; ?></h3></span>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo str_repeat('---', $item['level']) . $item['cat_name']; ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <li><a href="<?php echo $item['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $item['parent_cat'] ?></span></td>
                                        <td><span class="tbody-text">Hoạt động</span></td>
                                        <td><span class="tbody-text">Admin</span></td>
                                        <td><span class="tbody-text"><?php echo $item['cat_date'] ?></span></td>
                                    </tr>
                                <?php   }
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Thứ tự</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                    <!-- <?php 
                            // echo get_pagging($num_page,$page,"?mod=product&action=list_cat_product");
                       ?> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>