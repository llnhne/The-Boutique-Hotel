<?php
if (is_array($bl)) {
    extract($bl);
}
?>
<div class="row">
    <div class="row mb headeradmin" style="width:100%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row mb10 formtittle" style="width:100%;">
        <h3>CẬP NHẬT BÌNH LUẬN</h3>
    </div>
    <?php
    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
    ?>
    <div class="row formcontent" style="width:1450px;">
        <form action="index.php?act=updatebl" method="post">
            <div class="row mb10">
                <label for="">Id</label><br>
                <input type="text" placeholder="auto number" name="id" disabled>
            </div>
            <div class="row mb10">
                <label for="">Nội Dung</label><br>
                <input type="text" name="noidung" value="<?php if (isset($noidung) && ($noidung != "")) echo $noidung; ?>">
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" name="nhaplai" value="NHẬP LẠI">
                <a href="index.php?act=dsbl"><input type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>
</div>