<?php get_header(); ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($post as $item) { ?>
                            <li class="clearfix">
                                <a href="?mod=post&action=detail&id=<?php echo $item['post_id'] ?>" title="" class="thumb fl-left">
                                    <img src="admin/public/uploads/<?php echo $item['post_thumb'] ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="?mod=post&action=detail&id=<?php echo $item['post_id'] ?>" title="" class="title"><?php echo $item['post_title'] ?></a>
                                    <span class="create-date"><?php echo $item['post_date'] ?></span>
                                    <p class="desc"><?php echo $item['post_head'] ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        echo get_pagging($num_page, $page, "?mod=post&action=index");
                        ?>
                    </ul>
                </div>
            </div>
        </div>
       <?php get_sidebar('saler')?>
    </div>
</div>
<?php get_footer(); ?>