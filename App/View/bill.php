<?php require_once "header.php"; ?>
<?php

$tongdonhang = $data['tongdonhang'];
$thanhtoan = $data['thanhtoan'];
if (isset($_SESSION['s_user']) && ($_SESSION['s_user'] > 0)) {
    extract($_SESSION['s_user']);
    $html_users1 = '
            <label for="hoten"><b>Họ và tên</b></label>
            <input type="text" name="hoten" id="hoten" value="' . $ten . '" readonly>
    
            <label for="diachi"><b>Địa chỉ</b></label>
            <input type="text" name="diachi" id="diachi" value="' . $diachi . '" readonly>
    
            <label for="email"><b>Email</b></label>     
            <input type="text" name="email" id="email" value="' . $email . '" readonly>

            <label for="dienthoai"><b>Điện thoại</b></label>
            <input type="text" name="dienthoai" id="dienthoai" value="' . $dienthoai . '" readonly>';
} else {
    $html_users1 = '
        <label for="hoten"><b>Họ và tên</b></label>
        <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" >
    
        <label for="diachi"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" >
    
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Nhập email" name="email" id="email" >

        <label for="dienthoai"><b>Điện thoại</b></label>
        <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" >
        <a href="index.php?pg=dangnhap" style="cursor: pointer;">
                    &rArr; Bạn đã có tài khoản? 
                    </a>
    ';
}
$cart= new App\Model\CartModel;
$html_cartbill=$cart->viewcart_bill();
?>
<section class="section all-products" id="products">
    <div class="container">
        <form action="<?= BASE_PATH ?>/billhoanthanh" method="post">
            <div class="col9 viewcart">
                <div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                    <?= $html_users1 ?>
                    <!-- <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" required>

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Nhập email" name="email" id="email" required>

                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required> -->
                </div>
                <div class="ttdathang">
                    <a onclick="showttnhanhang()" style="cursor: pointer;">
                        &rArr; Thay đổi địa chỉ nhận hàng
                    </a>
                </div>
                <div class="ttdathang" id="ttnhanhang">
                    <h2>Thông tin người nhận hàng</h2>

                    <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten_nguoinhan" id="hoten_nguoinhan">

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan" id="diachi_nguoinhan">

                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai_nguoinhan" id="dienthoai_nguoinhan">
                </div>
            </div>
            <div class="col3">
                <h2>ĐƠN HÀNG</h2>
                <div class="total">
                    <div class="boxcart">
                        <li><?=$html_cartbill?></li>
                        <h3>Tổng: <?= $tongdonhang ?></h3>
                    </div>
                </div>

                <div class="coupon">
                    <div class="boxcart">
                        <h3>Voucher: </h3>
                    </div>
                </div>
                <div class="pttt">
                    <div class="boxcart">
                        <h3>Phương thức thanh toán: </h3>
                        <input type="radio" name="pttt" value="<?= $pttt ?>" id="" checked> Tiền mặt<br>
                        <input type="radio" name="pttt" value="<?= $pttt ?>" id=""> Chuyển khoản<br>
                        <input type="radio" name="pttt" value="<?= $pttt ?>" id=""> Ví điện tử<br>
                    </div>
                </div>
                <div class="total">
                    <div class="boxcart bggray">
                        <h3>Tổng thanh toán: <?= $thanhtoan ?></h3>
                    </div>
                </div>

                <button type="submit" name="donhangsubmit" style="cursor:pointer">Thanh toán</button>


            </div>

        </form>
    </div>
</section>
<?php
require_once "footer.php";
?>
<script>
    var ttnhanhang = document.getElementById("ttnhanhang");
    ttnhanhang.style.display = "none";

    function showttnhanhang() {
        if (ttnhanhang.style.display == "none") {
            ttnhanhang.style.display = "block";
        } else {
            ttnhanhang.style.display = "none";
        }
    }
</script>
<style>
    .container {
        width: 1200px;
        margin: 0 auto;
    }

    button {
        color: #993300;
        font-size: 13pt;
        font-weight: bold;
        width: 100%;
        border: 1px #993300 dotted;
        border-radius: 5px;
        padding: 10px 0px;
        background-color: #FFFFFF;
    }

    .col2 {
        width: 20%;
        float: left;
    }

    .col8 {
        float: left;
        width: 80%;
        text-align: right;
        padding: 15px 0;
    }

    .col6 {
        float: left;
        width: 50%;
    }

    .col9 {
        float: left;
        width: 70%;
    }

    .col9 a {
        color: rgb(13, 15, 15);
    }

    .col3 {
        float: left;
        width: 30%;
    }

    h2 {
        font-size: 18pt;
        padding-left: 10px;
        color: #444444;
        border-left: 4px #FF9900 solid;
    }

    .viewcart table {
        width: 95%;
        border-collapse: collapse;
    }

    .viewcart table tr th {
        background-color: #CCC;
    }

    th,
    td {
        padding: 10px;
        border: 1px #666666 solid;
        text-align: left;
    }




    /* FORM */

    .ttdathang input[type=text] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    .col-75 input[type=text],
    input[type=password],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    .row1 input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    .row1 input[type=submit]:hover {
        background-color: #45a049;
    }

    /* .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
} */

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }


    /* Clear floats after the columns */

    .row::after {
        content: "";
        display: table;
        clear: both;
    }


    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        .row1 input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

    .ttdathang {
        float: left;
        width: 90%;
        margin-bottom: 30px;
    }

    .boxcart {
        border: 1px #ccc solid;
        padding: 10px;
        margin-bottom: 20px;
    }

    .bggray {
        background-color: #EEE;
    }
</style>