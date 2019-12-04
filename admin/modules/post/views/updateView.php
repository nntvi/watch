<?php get_header(); 
global $error, $success;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa bài viết</h3>
                </div>
            </div>
            <h1 style="font-size: 18px; color: red;margin-bottom: 15px;"><?php echo isset($success) ? $success : ""; ?></h1>

            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST"  enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo $item['post_title']; ?>">
                        <p class="error"><?php echo form_error('title'); ?></p>

                        <label for="desc">Nội dung</label>
                        <textarea name="detail" id="desc" class="ckeditor"><?php echo $item['post_content']; ?></textarea>
                        <p class="error"><?php echo form_error('detail'); ?></p>

                        <label>Hình ảnh</label>
                        <div id="uploadFile" >
                            <input type="file" name="file" id="upload-thumb" value="">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <img src="../admin/public/uploads/<?php echo $name[0]['post_thumb']; ?>">
                        </div>
                        <!-- <label>Danh mục cha</label>
                        <select name="parent-Cat">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="1">Thể thao</option>
                            <option value="2">Xã hội</option>
                            <option value="3">Tài chính</option>
                        </select> -->
                        <button type="submit" name="btn_update_post" id="btn-submit">Chỉnh sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>