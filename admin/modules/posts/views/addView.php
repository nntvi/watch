<?php get_header();
global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
       <?php get_sidebar();?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <h1 style="font-size: 18px; color: red; margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title">
                        <p class="error"><?php echo form_error('title'); ?></p>

                        <label for="desc">Đôi dòng giới thiệu</label>
                        <textarea name="post_head" id="desc" class="ckeditor"></textarea>
                        <p class="error"><?php echo form_error('post_head'); ?></p>

                        <label for="desc">Nội dung</label>
                        <textarea name="detail" id="desc" class="ckeditor"></textarea>
                        <p class="error"><?php echo form_error('detail'); ?></p>

                        <label for="status">Trạng thái</label>
                        <input type="radio" name="status" id="desc" value="1" checked>Hiện
                        <input type="radio" name="status" id="desc" value="0">Ẩn 
                        
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
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