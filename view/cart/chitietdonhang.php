<div class="row">
    <div class="row mb headeradmin" style="width:143%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:143%;">
        <h3>DANH SÁCH ĐƠN HÀNG</h3>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=chitietdonhang" method="post">
            <div class="row mb10 formdshanghoa" style="width:1050px;">
                <table>
                    <tr>
                        <th></th>
                        <th>HÌNH</th>
                        <th>SẢN PHẨM</th>
                        <th>ĐƠN GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>THÀNH TIỀN</th>
                        <th></th>
                    </tr>
                    
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
        
    </div>
</div>
</div>