<div class="">

    <div class="">
        <div class="boxcenter" style="margin-top: 2%;">
            <div class="row mb main">
                <form action="index.php?act=billcomfirm" method="post">
                    <div class="giohang">
                        <h1>THÔNG TIN ĐẶT HÀNG</h1>
                    </div>

                    <table style="margin-left:15%;">

                        <?php
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['user'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $tel = $_SESSION['user']['tel'];
                        } else {
                            $name = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                        }
                        ?>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;">Người đặt hàng</td>
                            <td><input type="text" name="name" value="<?= $user ?>" style="width:100%;margin-left:30px;border:1px solid #06283D;border-radius:5px;height:30px;"></td>
                            <input type="hidden" name="iddonhang" value="<?= $iddonhang ?>">
                        </tr>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;">Địa chỉ</td>
                            <td><input type="text" name="address" value="<?= $address ?>" style="width:100%;margin-left:30px;border:1px solid #06283D;border-radius:5px;height:30px;"></td>
                        </tr>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;">Email</td>
                            <td><input type="text" name="email" value="<?= $email ?>" style="width:100%;margin-left:30px;border:1px solid #06283D;border-radius:5px;height:30px;"></td>
                        </tr>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;">Điện thoại</td>
                            <td><input type="text" name="tel" value="<?= $tel ?>" style="width:100%;margin-left:30px;border:1px solid #06283D;border-radius:5px;height:30px;"></td>
                        </tr>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;">Ghi chú</td>
                            <td><textarea name="ghichu" id="" cols="30" rows="10" style="width:100%;margin-left:30px;border:1px solid #06283D;border-radius:5px;height:100px;"></textarea></td>
                        </tr>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;">Phương thức thanh toán</td>
                            <td><input name="thanhtoan" type="radio" value="1" style="margin-left:30px;" />Trả tiền khi nhận hàng
                                <input name="thanhtoan" type="radio" value="2" style="margin-left:30px;" />Thanh toán qua ngân hàng
                                <input name="thanhtoan" type="radio" value="3" style="margin-left:30px;" />Thanh toán bằng thẻ VISA
                        </tr>
                        <tr>
                            <td style="color: #06283D;font-size:1vw;font-weight:700;" required>Phương thức vận chuyển</td>
                            <td><select name="vanchuyen" id="mon_Hoc" class="form-control" style="margin-left:30px;border:1px solid #06283D;border-radius:5px;width:100%;" onclick="phiship()" required>
                                    <option value="">---None---</option>
                                    <option value="5" id="HTML">Vận chuyển nhanh</option>
                                    <option value="3" id="JS">Vận chuyển thường</option>
                                    <option value="2" id="PHP">Vận chuyển tiết kiệm</option>
                                </select></td>
                        </tr>

                        <td style="color: #06283D;font-size:1vw;font-weight:700;">Tiền ship</td>
                        <td><span name="tienship" id="hoc_Phi" style="margin-left:30px;color:red;"></span></td>
                    </table><br><br><br>
                    <div class="bt">
                <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
                <input type="hidden" value="<?= $iddonhang?>">
                </form>
            </div>
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
                                <th>' . $tong . '$</th>
                            </tr>
                        </tfoot>';
                        ?>
                    </table>
            </div>
            
        </div>
    </div>
    <script>
        function phiship() {
            var monH = document.querySelector('#mon_Hoc').value;
            var select_HTML = document.getElementById("HTML").value;
            var select_JS = document.getElementById("JS").value;
            var select_PHP = document.getElementById("PHP").value;

            if (monH == select_HTML)
                document.querySelector('#hoc_Phi').innerHTML = "5$";
            else if (monH == select_JS)
                document.querySelector('#hoc_Phi').innerHTML = "3$";
            else if (monH == select_PHP)
                document.querySelector('#hoc_Phi').innerHTML = "2$";
        }
    </script>
</div>