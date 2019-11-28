<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
       <?php get_sidebar();?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title">
                        <label for="desc">Nội dung</label>
                        <textarea name="detail" id="desc" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile" enctype="multipart/form-data">
                            <input type="file" name="file" id="upload-thumb">
                            <!--<input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">-->
                            <!--<img src="public/images/img-thumb.png">-->
                        </div>
                        <button type="submit" name="btn_upload_post" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>