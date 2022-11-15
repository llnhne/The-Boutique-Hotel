<div class="row">
    <div class="row mb headeradmin" style="width:143%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:143%;">
        <h3>DANH SÁCH HỖ TRỢ</h3>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=thongke" method="post">
            <div class="row mb10 formdshanghoa" style="width:1050px;">
                <table>
                    <tr>
                        <th>MÃ HỖ TRỢ</th>
                        <th>MÃ KHÁCH Hàng</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                    </tr>
                    <?php
                    foreach ($listhotro as $hotro) {
                        extract($hotro);
                        echo '<tr>
                                        <td>' . $id_hotro . '</td>
                                        <td>' . $id_user . '</td>
                                        <td>' . $tel . '</td>
                                    </tr>';
                    }
                    ?>
                </table>
            </div>
        </form>
    </div>
</div>
</div>