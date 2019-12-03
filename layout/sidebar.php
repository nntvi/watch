<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                <?php
                foreach (menu_two() as $c) {
                    echo '<li>
                                    <a href="" title="">' . $c['cat_name'] . '</a>';

                    if (isset($c['children'])) {
                        echo '<ul class="sub-menu">';
                        foreach ($c['children'] as $c2)
                            echo '<li>
                                            <a href="?mod=home&action=category&id=' . $c2['cat_id'] . '" title="">' . $c2['cat_name'] . '</a>
                                        </li>';
                        echo '</ul>';
                    }
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
                <!-- <img src="public/images/banner.png" alt=""> -->
            </a>
        </div>
    </div>
</div>