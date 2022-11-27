<div class="ct-img" style="margin-top: 20px;">
    <img src="view/images/nenuser.png" alt="" style="width:100%;height:50%;">
    <div class="ct" style="border-radius:20px;border:2px solid #FFCACA;height:35%;width:50%;margin-left:25%;margin-top:15%;box-shadow: 5px 5px 8px #251B37, 10px 10px 8px #372948, 15px 15px 8px #FFCACA;">
    <div class="font" style="text-align: center;
    font-size: 2.5vw;color:#251B37;margin-top:5%;"><Label>Remember Account</Label></div><br>
        <form action="index.php?act=quenmk" method="post">
            <div class="form1" style="text-align:center;">
                <label for="" style="color: #372948;margin-left:-35%;">Email</label><br>
                <input type="email" name="email" style="padding: 5px 0;width:40%;border-radius:10px;border:1px solid #FFCACA;"><br><br>
            </div>
            <div class="form3" style="text-align:center;">
                <input type="submit" value="Send" name="send" style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;color: #372948;padding: 8px 35px;">
                <input type="reset" value="Reset" style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;color: #372948;padding: 8px 35px;">
            </div><br>
            <div class="form4" style="text-align:center;">
                <button style="background-color: #372948;border: 1px solid #372948;border-radius: 10px;padding: 8px 35px;"><a href="index.php" style="color: #FFCACA;text-decoration: none;">Back to home</a></button>
            </div><br>
        </form>
        <div class="" style="text-align:center;color:#251B37;">
            <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }
            ?>
        </div>
    </div>
</div>