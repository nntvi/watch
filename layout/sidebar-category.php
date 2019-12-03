<div class="sidebar fl-left">
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Tìm kiếm theo giá</h3>
        </div>
        <div class="section-detail">
            <form id="fiter_sidebar" method="POST" action="?mod=home&action=filter">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r-price" value="1" class="r-price"></td>
                            <td>Dưới 1.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value="2" class="r-price"></td>
                            <td>1.000.000đ - 2.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value="3" class="r-price"></td>
                            <td>2.000.000đ - 3.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value="4" class="r-price"></td>
                            <td>3.000.000đ - 4.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value="4" class="r-price"></td>
                            <td>4.000.000đ - 5.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value="5" class="r-price"></td>
                            <td>Trên 5.000.000đ</td>
                        </tr>
                    </tbody>
                </table>

                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Loại</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r-price" value="male"></td>
                            <td>Nam</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value="female"></td>
                            <td>Nữ</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>
<script>
    // $( "#fiter_sidebar" ).click(function() {
    //     $(this).submit();
    // });
</script>

