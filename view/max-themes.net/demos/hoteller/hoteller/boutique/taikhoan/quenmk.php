<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="path/to/your/charts.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300:400);

body {
  margin:0;
}

/* h1 {
  font-family: 'Lato', sans-serif;
  font-weight:300;
  letter-spacing: 2px;
  font-size:48px;
}
p {
  font-family: 'Lato', sans-serif;
  letter-spacing: 1px;
  font-size:14px;
  color: #333333;
} */

.header {
  position:relative;
  text-align:center;
  background: linear-gradient(60deg, rgb(248, 85, 199) , rgb(238, 94, 161) 0% );

  color:white;
}
.logo {
  width:50px;
  fill:white;
  padding-right:15px;
  display:inline-block;
  vertical-align: middle;
}

.inner-header {
  height:65vh;
  width:100%;
  margin: 0;
  padding: 0;
}

.flex { /*Flexbox for containers*/
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.waves {
  position:relative;
  width: 100%;
  height:15vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:100px;
  max-height:150px;
}

.content {
  position:relative;
  height:20vh;
  text-align:center;
  background-color: white;
}

/* Animation */

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height:40px;
    min-height:40px;
  }
  .content {
    height:30vh;
  }
  h1 {
    font-size:24px;
  }
}
    </style>
</head>
<body>
    <!--Hey! This is the original version
of Simple CSS Waves-->

<div class="header">

    <!--Content before waves-->
    <div class="inner-header flex">
    <!--Just the logo.. Don't mind this-->
    

    <div class="ct-img" style="margin-top: 20px;">
    <div class="ct" style="border-radius:20px;;height:50%;width:180%;margin-left:-43%;margin-top:15%; ">
        <div class="font" style="text-align: center;font-size: 2.5vw;color:#fff;margin-top:5%;">
            <Label>Quên mật khẩu</Label>
        </div>
        <br>
        <form action="../index.php?act=quenmk" method="post">
            <div class="form1" style="text-align:center;">
                <div>
                    <label for=""  class="text-lg" style="color: #fff;margin-left:-38%;">Email</label><br>
                    <input type="text" class="bg-inherit" name="email" style="padding: 8px 0;width:50%;border-radius:10px;border:1px solid #FFCACA" required>
                </div>
            </div>
            <br>
           
            <div class="form3" style="text-align:center;margin-bottom:15px;">
                <input type="submit" value="Send" name="guiemail" class=" mx-2 hover:bg-gradient-to-r from-violet-500 to-fuchsia-500 hover:scale-105" style="border: 1px solid #fff;border-radius: 10px;color: #fff;padding: 8px 35px; cursor: pointer;">
                <input type="reset" value="Reset" class=" duration-100 mx-2 hover:bg-gradient-to-r from-violet-500 to-fuchsia-500 hover:bg-stone-500" style="border: 1px solid #fff;border-radius: 10px;color: #fff;padding: 8px 35px; cursor: pointer">
                <!-- <button style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;padding: 8px 35px;"><a href="index.php?act=dangky" style="color: #fff;text-decoration: none;">Register</a></button><br><br> -->
            </div>
            <div class="form4" style="text-align:center;">
                <button class="bg-gradient-to-r from-purple-500 to-pink-500 " style="border: 1px solid #fff;border-radius: 10px;padding: 8px 35px; cursor: pointer">
                    <a href="../index.php?act=home" style="color: #FFCACA;text-decoration: none;">Trở về trang chủ</a>
                </button>
            </div>
            <div class="" style="text-align:center;color: red;">
            <?php
                if(isset($thongbao)){
                    echo $thongbao;
                }
            ?>
        </div>
        </form>  
        
    </div>
</div>


    </div>
    
    <!--Waves Container-->
    <div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
    <defs>
    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
    </defs>
    <g class="parallax">
    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
    </g>
    </svg>
    </div>
    <!--Waves end-->
    
    </div>
    <!--Header ends-->
    
    <!--Content starts-->
    <div class="content flex">
    </div>
    <!--Content ends-->
</body>
</html>