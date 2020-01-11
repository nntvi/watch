<?php get_header();
// show_array($data);
?>
<style>
    .form-group label {
        font-size: 18px;
        font-weight: bold;
    }

    .form-group p {
        font-size: 19px;
        padding-top: 10px;
    }

    .form-group {
        padding: 15px;
        margin: 0px 50px 20px 0px;
    }

    #category-menu h2 {
        text-align: center;
        font-size: 22px;
        font-family: initial;
        font-weight: bolder;
        padding: 30px;
    }

    #category-menu {
        margin: 0px 70px 0px 0px;
    }
</style>
<div id="main-content-wp" class="add-cat-page menu-page">

    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h2 id="index" class="fl-left">THỐNG KÊ</h2>
                </div>
                <div class="form-group" style="border: 1px solid palegreen;background: palegreen;width: 20%;float:left;">
                    <label for="title">Tổng doanh thu</label>
                    <p><?php echo currency_format($total['total']) ?></p>
                </div>
                <div class="form-group" style="    border: 1px solid lightcoral;background: lightcoral;width: 20%; float:left;">
                    <label for="url-static">Tổng tiền lời</label>
                    <p style="color: white;"><?php echo currency_format($profit['tongloi']) ?></p>
                </div>
                <div class="form-group" style="    border: 1px solid aquamarine;background: aquamarine;width: 30%; float:left;">
                    <label for="url-static">Tổng đơn hàng giao dịch thành công</label>
                    <p><?php echo $success_order['sl'] ?></p>
                </div>
            </div>
            <div class="section-detail clearfix">
                <div id="list-menu" class="fl-left">
                    <label>Thời gian thống kê</label>
                    <form method="POST" action="">
                        <div class="form-group clearfix">
                            <label>Tháng</label>
                            <select name="month">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <label>Từ ngày</label>
                            <select name="day_start">
                                <option value="" selected>Mời bạn chọn</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="30">31</option>
                            </select>
                            <label>Đến ngày</label>
                            <select name="day_end">
                                <option value="" selected>Mời bạn chọn</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">31</option>
                            </select>
                        </div>
                        <input style="border: none; margin: 13px;" type="submit" id="add-new" name="btn_confirm" value="Xác nhận">
                    </form>
                </div>

                <div id="category-menu" class="fl-right" style="width: 60%;">

                    <canvas id="canvas">

                    </canvas>
                </div>

            </div>

            <div id="category-menu" style="width: 100%; padding: 0px; margin-top: 20px">
                <h2 style="text-align: center;">BẢNG CHI TIẾT</h2>
                <div class="table-responsive">
                    <table class="table list-table-wp">
                        <thead>
                            <tr>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Mã sản phẩm</span></td>
                                <td><span class="thead-text">Tên sản phẩm</span></td>
                                <td><span class="thead-text">Đã bán</span></td>
                                <!-- <td><span class="thead-text">Tổng số sản phẩm</span></td> -->
                                <td><span class="thead-text">Tồn kho</span></td>
                                <td><span class="thead-text">SL nhập</span></td>
                                <td><span class="thead-text">Giá bán</span></td>
                                <td><span class="thead-text">Giá nhập</span></td>
                                <td><span class="thead-text">Lợi nhuận 1 sản phẩm</span></td>
                                <td><span class="thead-text">Tổng lời</span></td>
                                <!-- <td><span class="thead-text">Tổng giá nhập</span></td> -->
                                <!-- <td><span class="thead-text">Tổng lợi nhuận</span></td> -->
                            </tr>
                        </thead>
                        <?php
                        if (isset($_POST['month']) && empty($_POST['day_start']) && empty($_POST['day_end'])) {
                        ?>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($tktheothang as $tk) {
                                    $temp++; ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $temp; ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['pro_id'] ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['pro_name']; ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['daban']; ?></span>
                                            <!-- <td><span class="tbody-text"><?php echo $tk['pro_number']; ?></span> -->
                                        <td><span class="tbody-text"><?php echo $tk['pro_remain']; ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['slbandau']; ?></span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['pro_price']); ?>đ</span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['price_import']); ?>đ</span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['loinhuan1sanpham']); ?>đ</span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['tongloi']); ?>đ</span>
                                            <!-- <td><span class="tbody-text"><?php echo number_format($tk['tonggianhap']); ?>đ</span> -->
                                            <!-- <td><span class="tbody-text"><?php echo number_format($tk['tongloinhuan']); ?>đ</span> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } else if (isset($_POST['month']) && !empty($_POST['day_start']) && !empty($_POST['day_end'])) { ?>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($tkngaythang as $tk) {
                                    $temp++; ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $temp; ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['pro_id'] ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['pro_name']; ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['daban']; ?></span>
                                            <!-- <td><span class="tbody-text"><?php echo $tk['pro_number']; ?></span> -->
                                        <td><span class="tbody-text"><?php echo $tk['pro_remain']; ?></span>
                                        <td><span class="tbody-text"><?php echo $tk['slbandau']; ?></span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['pro_price']); ?>đ</span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['price_import']); ?>đ</span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['loinhuan1sanpham']); ?>đ</span>
                                        <td><span class="tbody-text"><?php echo number_format($tk['tongloi']); ?>đ</span>
                                            <!-- <td><span class="tbody-text"><?php echo number_format($tk['tonggianhap']); ?>đ</span> -->
                                            <!-- <td><span class="tbody-text"><?php echo number_format($tk['tongloinhuan']); ?>đ</span> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Mã sản phẩm</span></td>
                                <td><span class="thead-text">Tên sản phẩm</span></td>
                                <td><span class="thead-text">Đã bán</span></td>
                                <!-- <td><span class="thead-text">Tổng số sản phẩm</span></td> -->
                                <td><span class="thead-text">Tồn kho</span></td>
                                <td><span class="thead-text">SL nhập</span></td>
                                <td><span class="thead-text">Giá bán</span></td>
                                <td><span class="thead-text">Giá nhập</span></td>
                                <td><span class="thead-text">Lợi nhuận 1 sản phẩm</span></td>
                                <td><span class="thead-text">Tổng lời</span></td>
                                <!-- <td><span class="thead-text">Tổng giá nhập</span></td> -->
                                <!-- <td><span class="thead-text">Tổng lợi nhuận</span></td> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var MONTHS = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9',
        'Tháng 10', 'Tháng 11', 'Tháng 12'
    ];
    var config = {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9',
                'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],
            datasets: [{
                    label: 'Tiền lời thu được theo tháng',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        <?php if (!empty($t1['tongloinhuan'])) {
                            echo $t1['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t2['tongloinhuan'])) {
                            echo $t2['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t3['tongloinhuan'])) {
                            echo $t3['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t4['tongloinhuan'])) {
                            echo $t4['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t5['tongloinhuan'])) {
                            echo $t5['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t6['tongloinhuan'])) {
                            echo $t6['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t7['tongloinhuan'])) {
                            echo $t7['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t8['tongloinhuan'])) {
                            echo $t8['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t9['tongloinhuan'])) {
                            echo $t9['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t10['tongloinhuan'])) {
                            echo $t10['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t11['tongloinhuan'])) {
                            echo $t11['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,
                        <?php if (!empty($t12['tongloinhuan'])) {
                            echo $t12['tongloinhuan'];
                        } else {
                            echo 0;
                        } ?>,


                    ],
                    fill: false,
                }
                // {
                //     label: 'Some thing else',
                //     fill: false,
                //     backgroundColor: window.chartColors.blue,
                //     borderColor: window.chartColors.blue,
                //     data: [
                //         0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
                //     ],
                // }
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Watch Shop'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: ''
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'VND'
                    }
                }]
            }
        }
    };
    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };
</script>
<?php get_footer(); ?>