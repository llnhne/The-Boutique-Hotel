<div class="">
    
    <div class="ct">
        <div class="boxcenter" style="background-color: #0000;margin-top: 2%;color: rgb(255, 251, 7);">
            <div class="row mb main">
                <div class="boxleft mr">

                    <div class="row mb">
                        <div class="boxtittle">CATEGORY: <strong><?=$tendm?></strong></div>
                        <div class="row boxcontent">
                        <?php 
                            $i=0;
                            foreach($dssp as $sp){
                                extract($sp);
                                $linksp="index.php?act=sanphamchitiet&idsp=".$id;
                                $img=$img_path.$img;
                                if(($i==2)||($i==5)||($i==8)||($i==11)){
                                    $mr="";
                                }else{
                                    $mr="mr";
                                }
                                echo '     
                                        <div class="boxsp ' . $mr . '" style="border:none;text-align:center;">
                                        <div class="blog-list-item">
                                            <div class="list-item-wrap-img">
                                                <a href="' . $linksp . '"><img src="' . $img . '" alt="" class="list-item-img"></a>
                                            </div>
                                            <div class="list-item-content">
                                                <a href="' . $linksp . '"><p style="font-size: 1.2vw;color:red; " class="list-item-content-price">'.$price.'$</p></a>
                                                <a href="' . $linksp . '" style="" class="list-item-content-title">' . $product_name . '</a><br>
                                                
                                            <form action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="'.$id.'">
                                                <input type="hidden" name="product_name" value="'.$product_name.'">
                                                <input type="hidden" name="img" value="'.$img.'">
                                                <input type="hidden" name="price" value="'.$price.'">
                                                <input type="submit" name="addtocart" class="list-item-content-btn" value="Thêm Vào Giỏ Hàng">
                                            </form>
                                            </div>
                                            </div>
                                                </div>';
                            $i += 1;
                        }
                        ?>
                        </div>
                    </div>

                </div>
                <div class="boxright">
                    <?php include "boxright.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>