<?php get_header(); 
//show_array($admin);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">

            <!-- <h3 id="index" class="fl-left">Danh sách bài viết</h3> -->
            <a href="?mod=users&action=adduser" title="" id="add-new" class="fl-left">Thêm mới</a>

        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <!-- <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(10)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(5)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">(5)</span></a></li>
                            <li class="trash"><a href="">Thùng rác <span class="count">(0)</span></a></li>
                        </ul> -->
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <!-- <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thủng rác</option>
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
                                    <td><span class="thead-text">Tên Admin</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Number Phone</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $temp = 0;
                                foreach($list_users as $user){
                                   $temp++;
                                    ?> 
                                <tr>

                                    <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                    <td><span class="tbody-text"><?php echo $temp;?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $user['username']; ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo $user['url_update'];?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo $user['url_delete'];?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $user['email']; ?></span></td>
                                    <td><span class="tbody-text"><?php echo $user['number_phone']; ?></span></td>
                                    <td><span class="tbody-text"><?php echo $user['time']; ?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên Admin</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Number Phone</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
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
                        echo get_pagging($num_page, $page, "?mod=users&action=show");
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>