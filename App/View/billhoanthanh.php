<?php require_once "header.php"; ?>
<?php
    
?>
<section class="containerfull layouthome">
    <div class="container">
        <h2>Cảm ơn quý khách. Đơn hàng đã đặt thành công. <br>
            Quý khách có thể theo dõi đơn hàng <a href="index.php?pg=donhang&idbill">tại đây.

            </a>Mã đơn hàng:<?=$data['madh']?>!
        </h2>
        <div class="tc">
            <a href="<?= BASE_PATH ?>">Quay lại trang chủ</a>
        </div>


    </div>
</section>
<?php
require_once "footer.php";
?>
<style>
    .tc{
        border: 2px solid black;
        border-radius: 5px;
        width: 15%;
        text-align: center;
        margin-top: 41px;
    }
    .tc a:hover{
        color: brown;
    }
    .tc:hover{
        background-color: burlywood;
    }
    .layouthome{
        margin-top: 65px;
        margin-bottom: 65px;
    }
</style>