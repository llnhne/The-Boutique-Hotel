<div class="">
    
    <div class="">
        <div class="boxcenter" style="margin-top: 2%;">
            <div class="row mb main">
                    <div class="giohang">
                    <h1>Giỏ Hàng</h1>
                    </div>
                    <table style="text-align:center;width:100%;">
                      <thead style="background-color: #06283D;color: #DFF6FF;">
                        <tr>
                            <th style="padding: 20px 60px">Hình</th>
                            <th>Sản Phẩm</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Thao Tác</th>
                        </tr>
                        </thead>
                        <?php
                            $tong=0;
                            $i=0;
                            foreach($_SESSION['mycart'] as $cart){
                                $img=$cart[2];
                                $thanhtien=$cart[3]*$cart[4];
                                $tong+=$thanhtien;
                                
                                $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
                            echo '  <tr>
                                      <td><img src="'.$img.'" alt="" height="80px"></td>
                                      <td>'.$cart[1].'</td>
                                      <td>'.$cart[3].'$</td>
                                      <td><input type="number" min="1" step="1" style="text-align:center;" value="'.$cart[4].'"></td>
                                      <td>'.$thanhtien.'$</td>
                                      <td>'.$xoasp.'</td>
                                    </tr>'; 
                                $i+=1;
                            }
                            echo '
                            <tfoot>
                            <tr>
                                <th colspan="4">Tổng Đơn Hàng</th>
                                <th>'.$tong.'$</th>
                            </tr>
                        </tfoot>'; 
                        ?>
                    </table>
            
                
            </div>
            <div class="bt" style="margin-bottom:300px;">
            <form action="index.php?act=bill" method="post">
            <a href="index.php?act=bill"><input type="button" value="ĐỒNG Ý ĐẶT HÀNG"><a href="'.$xoasp.'"><input type="button" value="XÓA GIỎ HÀNG" style="margin-left:20px;"></a>
            </form>
                    </div>
        </div>
    </div>
</div>

<script>
                        function DELETE() {
                            return confirm("Bạn có chắc muốn xóa " + "?");
                        }
                    </script>