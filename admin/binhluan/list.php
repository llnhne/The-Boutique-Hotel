<div class="row">
    <div class="row mb headeradmin" style="width:148%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:148%;">
        <h3>DANH SÁCH Bình Luận</h3>
    </div>
    <div class="row formcontent" style="width:1040px;">
        <form action="" method="post">
            <div class="row mb10 formdshanghoa" style="width:100%">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã bình luận</th>
                        <th>Nội dung</th>
                        <th>Mã khách hàng</th>
                        <th>Ngày bình luận </th>
                        <th style="background-color: #FFCACA;"></th>
                    </tr>
                    <?php foreach ($listbinhluan as $binhluan) {?>
                        <?php extract($binhluan);?>
                        <?php $xoabl = "index.php?act=xoabl&id=" . $id_comment;?>

                        <tr>
                                        <td><input type="checkbox" name="name"></td>
                                        <td><?php echo  $id_comment ?></td>
                                        <td><?php echo   $noidung ?></td>
                                        <td><?php echo   $id_user ?></td>
                                        <td><?php echo   $ngaybinhluan ?></td>

                                        
                                        <td>
                                            <a onclick="return confirm('Bạn có thực sự muốn xóa không?');" href="<?php echo $xoabl ?>">
                                                <input type="button" value="Xóa">
                                            </a>
                                        </td>
                                    </tr>
                   <?php } ?>
                    
                </table>
            </div>
            <div class="row mb10">
                <input type="button" id="btn1" value="Chọn tất cả">
                <input type="button" id="btn2" value="Bỏ chọn tất cả">
                <input type="button" value="Xóa các mục đã chọn">
            </div>
        </form>
      
    </div>
</div>
</div>