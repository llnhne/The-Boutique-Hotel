<div class="">
    
    <div class="ct">
        <div class="boxcenter" style="margin-top: 2%;">
            <div class="row mb main">
                <div class="boxleft mr">
                    <?php
                        extract($onesp);
                    ?>
                    <div class="row mb">
                        <div class="boxtittle">PRODUCT DETAILS</div>
                        <div class="row boxcontent" style="color:#372948;">
                            <?php
                                $img=$img_path.$img;
                                echo '<div class="row mb spct"><img src="'.$img.'" style="width:70%;"></div>';
                                echo 'Product name: '.$product_name.'<br>';
                                echo 'Product price: '.$price.'$<br>';
                                echo 'Describe: '.$mota.'<br>';
                            ?>
                        </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script>
                        $(document).ready(function(){
                            $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
                        });
                    </script>
                    <div class="row mb" id="binhluan">
                        
                    </div>
                    <div class="row mb">
                        <div class="boxtittle">SIMILAR PRODUCTS</div>
                        <div class="row boxcontent">
                            <?php
                                foreach ($sp_cungloai as $sp_cungloai){
                                    extract($sp_cungloai);
                                    $img=$img_path.$img;
                                    $linksp="index.php?act=sanphamchitiet&idsp=".$id;
                                    echo '<div class="spcl">
                                            <img src="'.$img.'" style="width:10%;border-radius:3px;margin-left:20px;">
                                            <li><a href="'.$linksp.'">'.$product_name.'</a></li>
                                        </div>';
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