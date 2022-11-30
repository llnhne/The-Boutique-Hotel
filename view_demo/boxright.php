
<div class="row mb">

                    <div class="row mb">
                        <div class="boxtittle" style="font-weight: 700;">CATEGORY</div>
                        <div class="boxcontent2 menudoc" id="test">
                            <ul>
                                <?php
                                    foreach($dsdm as $dm){
                                        extract($dm);
                                        $linkdm="index.php?act=sanpham&iddm=".$id;
                                        echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="boxfooter searchbox">
                            <form action="index.php?act=sanpham" method="post">
                                <input type="text" placeholder="Search keyword" name="kyw" style="border: 1px solid #DFF6FF;padding: 3px;border-radius: 5px;background-color: #DFF6FF;font-size: 0.7vw;">
                                <input type="submit" name="timkiem" value="Search" hidden>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="boxtittle" style="border:1px solid #DFF6FF;font-weight: 700;">TOP 10 FAVORITE</div>
                        <div class="row boxcontent" style="border:1px solid #DFF6FF;color: #372948;">
                                    <?php
                                    
                                        foreach ($dstop10 as $sp){ 
                                            extract($sp);
                                            $linksp="index.php?act=sanphamchitiet&idsp=".$id;
                                            $img=$img_path.$img;
                                            echo '<div class="row mb10 top10">
                                                    <img src="'.$img.'" alt="">
                                                    <a href="'.$linksp.'">'.$product_name.'</a>
                                                </div>';
                                        }
                                    ?>
                        </div>
                    </div>
