<?php

session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];

$dsbl = loadall_binhluan($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .binhluan table {
            width: 150%;
            margin-left: 15%;
            color: #372948;
        }

        .binhluan table td:nth-child(1) {
            width: 50%;
        }

        .binhluan table td:nth-child(1) {
            width: 20%;
        }

        .binhluan table td:nth-child(1) {
            width: 30%;
        }
    </style>
</head>

<body>


    <div class="row mb">
        <div class="boxtittle">COMMENT</div>
        <div class="boxcontent2 binhluan">
            <table>
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $noidung . '</td>';
                    echo '<td>' . $iduser . '</td>';
                    echo '<td>' . $ngaybinhluan . '</td></tr>';
                }
                ?>
            </table>
        </div>
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
        ?>
            <div class="boxfooter searchbox">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="idpro" value="<?= $idpro ?>">
                    <div style="display: flex;">
                        <input type="text" name="noidung" style="background-color: #DFF6FF;width:90%;border:1px solid #DFF6FF;" placeholder="Comment">
                        <input type="submit" name="guibinhluan" value="Send comment" style="border-radius:5px;background-color: #06283D;margin-left:8px;border:1px solid #DFF6FF;color:#DFF6FF;">
                    </div>
                </form>
            </div>
        <?php
        } else {
        ?>  
                <div class="boxfooter searchbox">
                <button style="background-color:#06283D;margin-left:8px;border:1px solid #DFF6FF;border-radius:5px;"><a style="padding: 10px 20px;color:#DFF6FF;text-decoration:none;" href="index.php?act=dangnhap">Đăng Nhập Để Bình Luận</a> </button>
                </div>
                <?php } ?>
        <?php
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }

        ?>
    </div>
</body>

</html>