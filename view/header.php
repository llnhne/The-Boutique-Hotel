<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&family=Nunito:ital,wght@0,200;1,300&family=Oswald:wght@300&family=Poppins:wght@500&family=Roboto+Mono:wght@400;500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="">
        <div class="header">
            <div class="boxcenter">
                <div class="content" style="display: flex;align-items:center;justify-content: space-between;">
                    <div class="images">
                        <img src="view/images/logo11.jpg" alt="img" style="height:65px;margin-top: 2px;border-radius: 5px;">
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php?act=giothieu">About Us</a></li>
                            <li><a href="index.php?act=lienhe">Contact</a></li>
                            <li><a href="index.php?act=gopy">Feedback</a></li>
                            <li><a href="index.php?act=hoidap">Q&A</a></li>
                        </ul>
                    </div>
                    <!-- dang nhap -->
                    <div style="display:flex;align-items:center;">
                        <div class="dropdown">

                            <a class="" href="" role="button" data-toggle="dropdown" aria-expanded="false">

                                <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#DFF6FF" width="30px" ;>
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg></button>
                            </a>
                            <?php
                            if (isset($_SESSION['user'])) {
                                extract($_SESSION['user']);
                            ?>
                                <div class="" style="color:#f2f2f2;display:inline-block;">
                                    <label for="">Hello</label><br>
                                    <?= $user ?>
                                </div>

                                <div class="dropdown-content">

                                    <a href="index.php?act=quenmk">Forgot password</a>


                                    <a href="index.php?act=edit_taikhoan">Update account</a>

                                    <?php if ($role == 1) { ?>

                                        <a href="admin/index.php">Login admin</a>

                                    <?php } ?>

                                    <a href="index.php?act=logout">Log out</a>

                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="dropdown-content">
                                        <a href="index.php?act=quenmk">Forgot password</a>

                                        <a href="index.php?act=dangnhap">Log in</a>

                                        <a href="index.php?act=dangky">Register</a>

                                </div>
                            <?php } ?>

                        </div>
                        <!-- day la cai gio hang -->
                        <div class="" style="margin-left:30px;">
                            <a href="index.php?act=addtocart"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#DFF6FF" class="w-6 h-6" width="30px" ;>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg></a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="grad1"></div>