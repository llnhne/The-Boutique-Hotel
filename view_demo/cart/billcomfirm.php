<div class="">

    <div class="">
        <div class="boxcenter" style="margin-top: 2%;">
            <div class="row mb main">
                <form action="index.php?act=billcomfirm" method="post">
                    <div class="giohang">
                        <h1>THÔNG TIN ĐƠN HÀNG</h1>
                    </div>
                    <?php
                    foreach ($giohang as $value) {
                        extract($giohang);
                        echo '
                            <div style="font-size: 0.8vw;color:#06283D">
                                <h3>Mã đơn hàng: <?= $iddonhang ?></h3>
                                <h3>Người đặt hàng: <?= $user ?></h3>
                                <h3>Địa chỉ nhận hàng: <?= $address ?></h3>
                                <h3>Số điện thoại: <?= $tel ?></h3>
                                <h3>Ghi chú: <?= $ghichu ?></h3>
                                <h3>Phí vận chuyển: <?= $vanchuyen ?>$</h3>
                            </div>';
                        }
                    ?>
                    <?php
                    echo "<h3>Ngày đặt hàng: </h3>" . date("Y-m-d h:i:sa");
                    ?>
                    <div class="giohang">
                        <p>Cảm Ơn Bạn Đã Đặt Hàng !
                            Thông tin đơn hàng của bạn là: </p>
                    </div>


                </form>

                <table style="text-align:center;width:100%;margin-bottom:80px;">
                    <thead style="background-color: #06283D;color: #DFF6FF;">
                        <tr>
                            <th style="padding: 20px 60px">Hình</th>
                            <th>Sản Phẩm</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>

                        </tr>
                    </thead>

                    <?php
                    $tong = 0;
                    $i = 0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $img = $cart[2];
                        $thanhtien = $cart[3] * $cart[4];
                        $tong += $thanhtien;
                        $tonghang = $tong + $vanchuyen;
                        echo '  <tr>
                                      <td><img src="' . $img . '" alt="" height="80px"></td>
                                      <td>' . $cart[1] . '</td>
                                      <td>' . $cart[3] . '$</td>
                                      <td> ' . $cart[4] . '</td>
                                      <td>' . $thanhtien . '$</td>
                                      
                                    </tr>';
                        $i += 1;
                    }
                    echo '
                            <tfoot>
                            <tr>
                                <th colspan="4">Tổng Đơn Hàng</th>
                                <th>' . $tonghang . '$</th>
                            </tr>
                        </tfoot>';
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>