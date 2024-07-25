<?php require_once "header.php"; ?>
<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
}

?>

<section class="section all-products layouthome">
    <div class="container">
        <div class="boxright">
            <h1>CẬP NHẬT THÀNH VIÊN</h1><br>
            <div class="containerfull mr30">
                <form action="<?= BASE_PATH ?>/updateuser" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Tên dang nhap</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="username" value="<?= $username ?>" name="username" placeholder="Nhập tên">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Mat khau</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="password" value="<?= $password ?>" name="password" placeholder="Nhập tên">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Tên</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="ten" value="<?= $ten ?>" name="ten" placeholder="Nhập tên">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="email" value="<?= $email ?>" name="email" placeholder="Nhập email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Địa chỉ</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="diachi" value="<?= $diachi ?>" name="diachi" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Điện thoại</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="dienthoai" value="<?= $dienthoai ?>" name="dienthoai" pattern="\d{9,10}" title="Vui lòng nhập từ 9 đến 10 chữ số" placeholder="Nhập điện thoại">
                        </div>
                    </div>


                    <br>
                    <div class="row1">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" name="capnhat">Cập nhật</button>
                    </div>
                </form>

            </div>
        </div>


    </div>
</section>
<?php
require_once "footer.php";
?>
<style>
    h1 {
        margin-top: 10px;
    }

    .layouthome {
        margin-bottom: 20px;
    }


    * {
        margin: 0;
        padding: 0;
    }

    .mr2pt {
        margin-right: 2%;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    h1 {
        text-align: center;
        font-size: 24pt;
        margin: 0px;
    }

    h2 {
        font-size: 18pt;
        padding-left: 10px;
        color: #444444;
        border-left: 4px #FF9900 solid;
    }

    .boxleft {
        float: left;
        width: 20%;
    }

    .boxright {
        float: left;
        width: 78%;
    }

    .menutrai a {
        display: block;
        width: 100%;
        color: #001c99;
        font-size: 13pt;
        font-weight: bold;
        text-decoration: none;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px #CCC dotted;
    }

    .menutrai a:hover {
        color: #000000;
    }




    /* FORM */

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




    .row::after {
        content: "";
        display: table;
        clear: both;
    }
</style>