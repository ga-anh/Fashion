<?php require_once "header.php"; ?>
<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
}

?>

<section class="section all-products">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="<?=BASE_PATH?>/myaccount">Thay đổi thông tin</a>
            <a href="<?=BASE_PATH?>/theodoidh">Theo dõi đơn hàng</a>
            <a href="<?=BASE_PATH?>/logout">Thoát hệ thống</a>

        </div>
        <div class="boxright">
            <h1>THÔNG TIN THÀNH VIÊN</h1><br>
            <div class="containerfull mr50 mr30">
                <form action="" id="customerForm" method="post" enctype="multipart/form-data">
                    <div class="imgcontainer">
                        <img src="layout/images/23comuc.webp" alt="Avatar" class="avatar">
                    </div>
                    <label for="name">Họ và tên:</label>
                    <input type="text" id="ten" name="ten" value="<?= $ten ?>" readonly>

                    <label for="email">Email:</label>
                    <input type="email" id="email" value="<?= $email ?>" name="email" readonly>

                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="dienthoai" name="dienthoai" value="<?= $dienthoai ?>" readonly>


                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="diachi" name="diachi" value="<?= $diachi ?>" readonly>

                    <a href="index.php?pg=myaccount">
                        <form action="index.php?pg=myaccount">
                            <button type="button">Đổi mật khẩu</button>
                        </form>
                    </a>
                </form>

            </div>
        </div>


    </div>
</section>
<?php
require_once "footer.php";
?>
<style>
    body {

        margin: 0;
        padding: 0;
        /* Đường dẫn tới hình ảnh nền */
        /* background-image: url('view/images/2.jpg'); */
        /* Tùy chọn: giữ cho hình ảnh nền đầy đủ chiều cao và chiều rộng của cửa sổ trình duyệt */
        background-size: cover;
        /* Tùy chọn: đảm bảo hình ảnh nền không lặp lại */
        background-repeat: no-repeat;
        /* Tùy chọn: giữ cho nền màu của trang là một phần của hình ảnh (nếu hình ảnh không đầy đủ chiều cao và chiều rộng) */
        background-position: center center;
        /* Tùy chọn: màu nền fallback nếu hình ảnh không tải được hoặc không tồn tại */
        background-color: #f8f9fa;
        /* Tùy chọn: áp dụng hiệu ứng chuyển động cho hình ảnh nền */
        transition: background-image 0.5s ease-in-out;
    }

    .mr50 {
        margin: auto;

        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;

        margin-bottom: 20px;
    }

    .container {
        width: 1200px;
        margin: 0 auto;
    }

    h2 {
        color: #007bff;
        margin-bottom: 20px;
    }

    .mr50 label {
        display: block;
        margin-bottom: 8px;
        color: #495057;
    }

    .mr50 input {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .mr50 button {
        background-color: #007bff;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 20%;
        box-sizing: border-box;
    }

    .mr50 button:hover {
        background-color: #0056b3;
    }



    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 20%;
        border-radius: 50%;
    }

    h1 {
        margin-top: 10px;
        text-align: center  ;
    }

    .boxleft {
        float: left;
        width: 20%;
    }

    .boxright {
        float: left;
        margin-left: 5px;
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
</style>