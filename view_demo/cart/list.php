<div class="row">
    <div class="row mb headeradmin" style="width:143%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:143%;">
        <h3>DANH SÁCH ĐƠN HÀNG</h3>
    </div>
    <div class="row formcontent">
        <form action="" method="post">
            <div class="row mb10 formdshanghoa" style="width:1050px;">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>NGƯỜI ĐẶT HÀNG</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>GHI CHÚ</th>
                        <th>NGÀY ĐẶT HÀNG</th>
                        <th>TÌNH TRẠNG</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listdh as $donhang) {
                        extract($donhang);
                        $xoadh = "index.php?act=xoadh&iddonhang=" . $iddonhang;
                        $xemct = "index.php?act=chitietdonhang";

                        echo '<tr>
                                        <td><input type="checkbox" name="name"></td>
                                        <td>' . $iddonhang . '</td>
                                        <td>' . $user . '</td>
                                        <td>' . $address . '</td>
                                        <td>' . $tel . '</td>
                                        <td>' . $ghichu . '</td>
                                        <td>' . $ngaydathang . '</td>
                                        <td>' . $date . '</td>
                                        <td><a href="' . $xemct . '"><input type="button" value="Xem chi tiết"></a><a onclick="return DELETE()" href="' . $xoadh . '"><input type="button" value="Xóa"></a></td>
                                    </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10" style="display:flex;">
                <input type="button" id="btn1" value="Chọn tất cả">
                <input type="button" id="btn2" value="Bỏ chọn tất cả" style="margin-left:10px;">
                <input type="button" value="Xóa các mục đã chọn" style="margin-left:10px;">
            </div>
        </form>
        <script>
            document.getElementById("btn1").onclick = function() {

                var checkboxes = document.getElementsByName('name');


                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = true;
                }
            }
            document.getElementById("btn2").onclick = function() {

                var checkboxes = document.getElementsByName('name');


                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = false;
                }
            }
        </script>
        <script>
            function DELETE() {
                return confirm("Bạn có chắc muốn xóa " + "?");
            }
        </script>
    </div>
</div>
</div>