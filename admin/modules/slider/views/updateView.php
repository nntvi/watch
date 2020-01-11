<?php get_header();
global $error, $success;
?>
<style>
#uploadFile img {
    margin-top: 15px;
    height: 150px;
    width: 430px;
    overflow: hidden;
    border: 1px solid #ddd;
}
</style>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
    <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa Slider</h3>
                </div>
            </div>
            <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>

            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tên slider</label>
                        <input type="text" name="slide_name" id="title" value="<?php echo $show_slide['slide_name'];?>">
                        <p class="error"><?php form_error('slide_name'); ?></p>
                        <!-- <label for="title">Link</label>
                        <input type="text" name="slide_link" id="slug" value="<?php echo $show_slide['slide_link'];?>"> -->
                        <p class="error"><?php form_error('slide_link'); ?></p>
                        <!-- <label for="desc">Mô tả</label>
                        <textarea name="slide_" id="desc" class="ckeditor"></textarea> -->
                        <!-- <label for="title">Thứ tự</label>
                        <input type="text" name="slide_position" id="num-order"> -->
                        <!-- <p class="error"><?php form_error('slide_position'); ?></p> -->
                        <label>Hình ảnh</label>
                        <div id="uploadFile" enctype="multipart/form-data">
                            <input type="file" name="file" id="upload-thumb">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <img src="../admin/public/uploads/<?php echo $show_slide['slide_thumb']; ?>">
                        </div>
                        <!-- <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1">Công khai</option>
                            <option value="2">Chờ duyệt</option>
                        </select> -->
                        <button type="submit" name="btn_update_slider" id="btn-submit">Chỉnh sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>