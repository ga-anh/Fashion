<?php require_once "header.php"; ?>
<?php
$billshow = new App\Model\BillModel;
$showdh = $billshow->bill_select_all_id($_SESSION['s_user']['id']);
$html_showdh = '';
foreach ($showdh as $dh) {
    extract($dh);
    if ($status == "Đã hủy") {
        $iddh = "<div class='tbdh'></div>";
    } else {
        $iddh = "";
    }
    $html_showdh .= '
                    <tr id=' . $iddh . '>
                        <td>' . $madh . '</td>
                        <td>' . $nguoidat_ten . '</td>
                        <td>' . $nguoidat_tel . '</td>
                        <td>' . $nguoidat_diachi . '</td>
                        <td>' . $status . '</td>
                        <td>
                        <a href="'.BASE_PATH.'/theodoidh/chitietdh/' . $id . '"  class="btn-alt3">Xem chi tiết</a>
                        </td>
                        <td>

                        <a href="'.BASE_PATH.'/theodoidh/huydon/' . $id . '"  name="status" class="btn-alt3">Hủy đơn</a>
                        </td>

                    </tr>';
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
        <div class="boxright boxright3">
            <h1>LỊCH SỬ MUA HÀNG</h1><br>
            <div class="containerfull mr30">

                <div class="category-container">

                    <div class="order-container">

                        <table>
                            <thead>
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <td>Tên</td>
                                    <td>Số điện thoại</td>
                                    <td>Địa chỉ</td>
                                    <td>Trạng thái</td>
                                    <td>Xem chi tiết</td>
                                    <td>Thao tác</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $html_showdh ?>

                            </tbody>
                        </table>


                    </div>

                </div>
            </div>


        </div>

</section>
<?php require_once "footer.php"; ?>
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
        text-align: center;
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

    h1 {
        margin-top: 10px;
    }

    .btn {
        display: inline-block;
        padding: .5rem 1rem;
        background-color: #1e1f26;
        border-radius: 2rem;
        color: #cd8c38;
        transition: .3s;
    }

    .btn:hover {
        background-color: #cd8c38;
    }

    .tbdh {
        color: red;
    }

    .btn-l {
        width: 100%;
        text-align: center;
    }

    /* category container */
    .order-container a {

        margin-top: 20px;
        margin-left: 20px;
    }

    .btn-alt {
        background-color: #1e1f26;
        color: #cd8c38;
        border: 1px solid #cd8c38;
        margin-left: 1rem;
    }

    td .btn-alt3 {

        color: #cd8c38;
        margin-left: 0;
        text-align: center;
        font-size: 1em;
    }

    td .btn-alt3:hover {

        color: #1e1f26;
        margin-left: 0;

    }

    .btn-alt:hover {
        color: #1e1f26;
        background-color: #cd8c38;
    }

    /* order-container  */
    .order-container {

        position: relative;
        text-align: center;
        height: 400px;
        width: 100%;
        border: 2px solid #1e1f26;
        border-radius: 1rem;
        overflow: hidden;
        margin-bottom: 1.5rem;
        height: 600px;
        background-color: rgb(255, 255, 255)
    }

    .boxleft {
        float: left;
        width: 20%;
    }

    .boxright3 {
        height: 700px;
    }

    .tbloidh {
        color: red;
    }
</style>