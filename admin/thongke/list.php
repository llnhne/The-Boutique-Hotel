<div class="row">
    <div class="row mb headeradmin" style="width:143%;">
        <h1 style="padding: 15px 0;">ADMIN </h1>
    </div>
    <div class="row formtittle" style="width:143%;">
        <h3>DANH SÁCH THỐNG KÊ</h3>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=thongke" method="post">
            <div class="row mb10 formdshanghoa" style="width:1050px;">
                <table>
                    <tr>
                        <th>MÃ LOẠI PHÒNG</th>
                        <th>TÊN LOẠI PHÒNG</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '<tr>
                                        <td>' . $malp . '</td>
                                        <td>' . $tenlp . '</td>
                                        <td>' . $countp . '</td>
                                        <td>' . $maxprice . '</td>
                                        <td>' . $minprice . '</td>
                                        <td>' . $avgprice . '</td>
                                    </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
            </div>
        </form>
    </div>
</div>
</div>