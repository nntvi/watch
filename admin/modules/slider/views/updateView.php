<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
    <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tên slider</label>
                        <input type="text" name="slide_name" id="title" value="$item['']">
                        <p class="error"><?php form_error('slide_name'); ?></p>
                        <label for="title">Link</label>
                        <input type="text" name="slide_link" id="slug">
                        <!-- <label for="desc">Mô tả</label>
                        <textarea name="slide_" id="desc" class="ckeditor"></textarea> -->
                        <!-- <label for="title">Thứ tự</label>
                        <input type="text" name="slide_position" id="num-order"> -->
                        <!-- <p class="error"><?php form_error('slide_position'); ?></p> -->
                        <label>Hình ảnh</label>
                        <div id="uploadFile" enctype="multipart/form-data">
                            <input type="file" name="file" id="upload-thumb">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png"> -->
                        </div>
                        <!-- <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1">Công khai</option>
                            <option value="2">Chờ duyệt</option>
                        </select> -->
                        <button type="submit" name="btn_update_slide" id="btn-submit">Chỉnh sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>