<div class="ct-img" style="margin-top: 20px;">
    <img src="view/images/nenuser.png" alt="" style="width:100%;height:50%;">
    <div class="ct" style="border-radius:20px;border:2px solid #FFCACA;height:50%;width:50%;margin-left:25%;margin-top:15%;box-shadow: 5px 5px 8px #251B37, 10px 10px 8px #372948, 15px 15px 8px #FFCACA;">
        <div class="font" style="text-align: center;
    font-size: 2.5vw;color:#251B37;margin-top:5%;"><Label>Log in to your account</Label></div><br>
        <form action="index.php?act=dangnhap" method="post">
            <div class="form1" style="text-align:center;">
                <label for="" style="color: #372948;margin-left:-30%;">Username</label><br>
                <input type="text" name="user" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;" required><br><br>
                <label for="" style="color: #372948;margin-left:-30%;">Password</label><br>
                <input type="password" name="password" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;" required>
            </div><br>
            <div class="form2" style="text-align:center;">
                <input type="checkbox" name="checkbox" id="">
                <label for="" style="color: #372948;">Remember account?</label><br><br>
            </div>
            <div class="form3" style="text-align:center;">
                <input type="submit" value="Log in" name="dangnhap" style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;color: #372948;padding: 8px 35px;">
                <input type="reset" value="Reset" style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;color: #372948;padding: 8px 35px;">
                <button style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;padding: 8px 35px;"><a href="index.php?act=dangky" style="color: #372948;text-decoration: none;">Register</a></button><br><br>
            </div>
            <div class="form4" style="text-align:center;">
                <button style="background-color: #372948;border: 1px solid #372948;border-radius: 10px;padding: 8px 35px;"><a href="index.php" style="color: #FFCACA;text-decoration: none;">Back to home</a></button>
            </div>
        </form>
        <div class="" style="text-align:center;color: red;">
            <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }
            ?>
        </div>
    </div>
</div>