<div class="ct-img" style="margin: 10px 0px 20px 0px;">
          
    <div class="ct" style="border-radius:20px;border:2px solid #FFCACA;height:70%;width:50%;margin-left:25%;margin-top:10%;box-shadow: 5px 5px 8px #251B37, 10px 10px 8px #372948, 15px 15px 8px #FFCACA;">
    <div class="font" style="text-align: center;
    font-size: 2.5vw;color:#251B37;margin-top:5%;"><Label>Đăng kí</Label></div><br>
        <div class="text-3xl my-3" style="text-align:center;color: red;">
            <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }
            ?>
        </div>
        <form action="../index.php?act=dangki" method="post">
            <div class="form1 " style="text-align:center;">
                
                <div>
                  <label for="" class="text-lg" style="color: #000;margin-left:-38%; ">Username</label><br>
                  <input type="text" name="username" class="bg-inherit" style="padding: 8px 0;width:50%;border-radius:10px;border:1px solid #FFCACA" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" >
                  <br>
                  <span style="color: red;">
                    <?php echo isset($error['username']) ? $error['username'] : ''; ?>
                  </span>
                </div>
                
                <div>
                    <label for=""  class="text-lg" style="color: #000;margin-left:-38%;">Password</label><br>
                    <input type="password" class="bg-inherit" name="password" style="padding: 8px 0;width:50%;border-radius:10px;border:1px solid #FFCACA" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" >
                    <br>
                    <span style="color: red;">
                      <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                    </span>
                </div>
                <?php 
                    if(isset($thongbao) && ($thongbao = "")){
                        echo $thongbao;
                    }
                ?>
                <div>
                    <label for=""  class="text-lg" style="color: #000;margin-left:-38%;">Email</label><br>
                    <input type="text" class="bg-inherit" name="email" style="padding: 8px 0;width:50%;border-radius:10px;border:1px solid #FFCACA" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                    <br>
                    <span style="color: red;">
                      <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                    </span>
                </div>
                
                <div>
                    <label for="" class="text-lg" style="color: #000;margin-left:-38%;">Số điện thoại</label><br>
<input type="text" name="phone" class="bg-inherit text-black" style="padding: 8px 0;width:50%;border-radius:10px;border:1px solid #FFCACA;" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
                    <br>
                    <span style="color: red;">
                      <?php echo isset($error['phone']) ? $error['phone'] : ''; ?>
                    </span>
                </div>
                <div>
                    <label for="" class="text-lg" style="color: #000;margin-left:-38%;">Địa chỉ</label><br>
                    <input type="text" name="add" class="bg-inherit text-black" style="padding: 8px 0;width:50%;border-radius:10px;border:1px solid #FFCACA;" value="<?php echo isset($data['add']) ? $data['add'] : ''; ?>" >
                    <br>
                    <span style="color: red;">
                      <?php echo isset($error['add']) ? $error['add'] : ''; ?>
                    </span>
                </div>
                
               
                
            </div>
            <br>
           
            <div class="form3" style="text-align:center;margin-bottom:15px;">
                <input type="submit" value="Đăng kí" name="dangki" class=" mx-2 " style="background-color: #FFCACA;border: 1px solid #fff;border-radius: 10px;color: #000;padding: 8px 35px; cursor: pointer;">
                <input type="reset" value="Reset" class="bg-rose-500 mx-2" style="background-color: #FFCACA;border: 1px solid #fff;border-radius: 10px;color: #000;padding: 8px 35px; cursor: pointer">
                <!-- <button style="background-color: #FFCACA;border: 1px solid #FFCACA;border-radius: 10px;padding: 8px 35px;"><a href="index.php?act=dangky" style="color: #fff;text-decoration: none;">Register</a></button><br><br> -->
            </div>
            <div class="form4" style="text-align:center;">
                <button class="" style="background-color: #FFCACA; border:none;border-radius: 10px;padding: 8px 35px; cursor: pointer; margin: 10px">
                    <a href="../index.php?act=home" style="color: #000;text-decoration: none;">Back to home</a>
                </button>
            </div>
            <div class="" style="text-align:center;color: red;">
            <?php
                if(isset($txt_erro)&&($txt_erro!="")){
                    echo $txt_erro;
                }
            ?>
            </div>
        </form>
        
    </div>
</div>