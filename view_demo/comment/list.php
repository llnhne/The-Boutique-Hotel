<div class="row">
    <div class="row mb headeradmin" style="width:143%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:143%;">
        <h3>DANH SÁCH BÌNH LUẬN</h3>
    </div>
    <div class="row formcontent">
        <form action="" method="post">
            <div class="row mb10 formdshanghoa" style="width:1050px;">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>NỘI DUNG</th>
                        <th>ID-USER</th>
                        <th>ID-PRO</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listbl as $binhluan) {
                        extract($binhluan);
                        $suabl = "index.php?act=suabl&id=" . $id;
                        $xoabl = "index.php?act=xoabl&id=" . $id;

                        echo '<tr>
                                        <td><input type="checkbox" name="name"></td>
                                        <td>' . $id . '</td>
                                        <td>' . $noidung . '</td>
                                        <td>' . $iduser . '</td>
                                        <td>' . $idpro . '</td>
                                        <td>' . $ngaybinhluan . '</td>
                                        <td><a href="' . $suabl . '"><input type="button" value="Sửa"></a>  <a onclick="return DELETE()" href="' . $xoabl . '"><input type="button" value="Xóa"></a></td>
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