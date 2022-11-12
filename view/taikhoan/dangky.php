<div class="ct-img" style="margin-top: 20px;">
    <img src="view/images/nenuser.png" alt="" style="width:100%;height:50%;">
    <div class="ct" style="border-radius:20px;border:2px solid #FFCACA;height:70%;width:50%;margin-left:25%;margin-top:10%;box-shadow: 5px 5px 8px #251B37, 10px 10px 8px #372948, 15px 15px 8px #FFCACA;">
    <div class="font" style="text-align: center;
    font-size: 2.5vw;color:#251B37;margin-top:5%;"><Label>Sign up for an account</Label></div><br>
        <form action="index.php?act=dangky" method="post" >
        <div class="form1" style="text-align:center;">
                <label for="" style="color: #372948;margin-left:-30%;">Username *</label><br>
                <input type="text" name="user" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;" required><br><br>
                <label for="" style="color: #372948;margin-left:-30%;">Password *</label><br>
                <input type="password" name="password" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;" required>
            </div><br>
            <div class="form1" style="text-align:center;">
                <label for="" style="color: #372948;margin-left:-34%;">Email *</label><br>
                <input type="email" name="email" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;"title="Nhập đúng yêu cầu rằng buộc(gồm @ và .)"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br><br>
                <label for="" style="color: #372948;margin-left:-26%;">Phone Number *</label><br>
                <input type="tel" name="tel" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;" title="Nhập 10 số"
                pattern="0[0-9]{9}" required>
            </div><br>
            <div class="form1" style="text-align:center;">
                <label for="" style="color: #372948;margin-left:-32%;">Address</label><br>
                <input type="text" name="address" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;">
            </div><br><br>
            <div class="form3" style="text-align:center;">
                <input type="submit" value="Register" name="dangky" style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;color: #372948;padding: 8px 35px;">
                <input type="reset" value="Reset" style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;color: #372948;padding: 8px 35px;">
                <button style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;padding: 8px 35px;"><a href="index.php?act=dangnhap" style="color: #372948;text-decoration: none;">Log In</a></button><br><br>
            </div>
            <div class="form4" style="text-align:center;">
                <button style="background-color: #372948;border: 1px solid #372948;border-radius: 10px;padding: 8px 35px;"><a href="index.php" style="color: #FFCACA;text-decoration: none;"><a style="color: #FFCACA;text-decoration: none;" href="index.php">Back to home</a></button>
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