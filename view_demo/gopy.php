<div class="" >
    
    <div class="ct">
        <div class="boxcenter" style="background-color: #0000;margin-top: 2%;color: rgb(255, 251, 7);">
            <div class="row mb main">

<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// Full-width images
function one() {
    for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "100%";  // IE10
    elements[i].style.flex = "100%";
  }
}

// Two images side by side
function two() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "50%";  // IE10
    elements[i].style.flex = "50%";
  }
}

// Four images side by side
function four() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "25%";  // IE10
    elements[i].style.flex = "25%";
  }
}

// Add active class to the current button (highlight it)
var header = document.getElementById("myHeader");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
                <div class="boxleft mr">
                    <div class="row">
                        <div class="banner mb">
                            <!-- Container for the image gallery -->
                            <!-- Slideshow container -->
                            <div class="slideshow-container">

                                <!-- Full-width images with number and caption text -->
                                <div class="mySlides fade">
                                    <div class="numbertext">1 / 6</div>
                                    <img src="view/images/pc.jpg" style="width:100%">
                                    <div class="text">LanAnh PC</div>
                                </div>

                                <div class="mySlides fade">
                                    <div class="numbertext">2 / 6</div>
                                    <img src="view/images/pc1.jpg" style="width:100%">
                                    <div class="text">LanAnh PC</div>
                                </div>

                                <div class="mySlides fade">
                                    <div class="numbertext">3 / 6</div>
                                    <img src="view/images/pc4.jpg" style="width:100%">
                                    <div class="text">LanAnh PC</div>
                                </div>
                                <div class="mySlides fade">
                                    <div class="numbertext">4 / 6</div>
                                    <img src="view/images/pc8.jpg" style="width:100%">
                                    <div class="text">LanAnh PC</div>
                                </div>
                                <div class="mySlides fade">
                                    <div class="numbertext">5 / 6</div>
                                    <img src="view/images/pc55.jpg" style="width:100%">
                                    <div class="text">LanAnh PC</div>
                                </div>
                                <div class="mySlides fade">
                                    <div class="numbertext">6 / 6</div>
                                    <img src="view/images/pc66.jpg" style="width:100%">
                                    <div class="text">LanAnh PC</div>
                                </div>

                            </div>
                            <br>

                            <!-- The dots/circles -->
                            <div style="text-align:center">
                                <span class="dot" onclick="currentSlide(1)"></span>
                                <span class="dot" onclick="currentSlide(2)"></span>
                                <span class="dot" onclick="currentSlide(3)"></span>
                                <span class="dot" onclick="currentSlide(4)"></span>
                                <span class="dot" onclick="currentSlide(5)"></span>
                                <span class="dot" onclick="currentSlide(6)"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <h3 style="text-align:center;font-size:1.5vw;margin-bottom:30px;color:#06283D;">SẢN PHẨM MỚI NHẤT</h3>
                        <?php
                        $i = 0;
                        foreach ($spnew as $sp) {
                            extract($sp);
                            $linksp = "index.php?act=sanphamchitiet&idsp=" . $id;
                            $img = $img_path . $img;
                            if (($i == 2) || ($i == 5) || ($i == 8)) {
                                $mr = "";
                            } else {
                                $mr = "mr";
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
                <div class="boxright">
                    <?php include "boxright.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>