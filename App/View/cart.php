<?php require_once "header.php"; ?>
<?php

$html_cart = $data['giohang'];
$proshow = new \App\Model\ProductModel;
$dssp_view = $data["dssp_view"];

$html_dssp_view = $proshow->sanpham_show($dssp_view);
if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
  $_SESSION['giohang'];
  $html_gh = '<a href="'. BASE_PATH .'/bill" class="checkout btn">
                  <form action="'. BASE_PATH .'/bill"  method="post">
                      
                      <button id="" name="dat">Thanh toán</button>
                  </form> 
              </a>';
} else {
  $html_gh = '<a href="'. BASE_PATH .'/cart/tb=1" class="checkout btn">
                  <form action="'. BASE_PATH .'/cart/tb=1"  method="post">
                      
                      <button id="" name="dat">Thanh toán</button>
                  </form> 
              </a>';
}
$tongdonhang = $data['tongdonhang'];
$thanhtoan=$data['thanhtoan'];
if (!isset($_SESSION['voucher'])) {
  $voucher = "";
}
?>



<body>
  <!-- Cart Items -->
  <div class="container cart">
    <table>
      <tr>
        <th>Sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
      </tr>
      <?= $html_cart ?>
      <?php
      if (isset($_GET['tb']) && ($_GET['tb'] == 1)) {
        $_SESSION['tb'] = "<div class='tb'>Không có sản phẩm để thanh toán</div>";
        echo $_SESSION['tb'];
      }
      ?>
    </table>
    <button class="remove-btn"><a href="<?=BASE_PATH?>/cart/del">Xóa rỗng đơn hàng</a></button>
    <div class="total-price">
      <div class="col3">
        <div class="total">
          <h3>Tổng đơn hàng: <?= $tongdonhang ?></h3>
        </div>
        <div class="coupon">
          <form action="<?=BASE_PATH?>/cart/voucher/1" method="post">
            <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
            <input type="text" name="mavoucher" value="<?=$voucher?>" placeholder="Nhập voucher">
            <button type="submit">Áp mã</button>
          </form>

        </div>
        <div class="total">
          <h3>Tổng thanh toán:<?=$thanhtoan?> </h3>
        </div>
        <?= $html_gh ?>
      </div>
    </div>
  </div>

  <!-- Latest Products -->
  <section class="section featured">
    <div class="top container">
      <h1>Latest Products</h1>
      <a href="#" class="view-more">View more</a>
    </div>
    <div class="product-center container">
      <?= $html_dssp_view; ?>
    </div>
    </div>
  </section>

</body>

<?php
require_once "footer.php";
?>
<style>
  .col3 button {
    text-align: center;
    margin: 5px;
    outline: none;
    border: none;
    background-color: var(--green);
    color: white;
    cursor: pointer;
  }

  .checkout {
    display: inline-block;
    background-color: var(--green);
    color: white;
    margin-top: 1rem;
    border-radius: 4px;
  }

  .remove-btn {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 5px 10px;
    font-size: 12px;
    cursor: pointer;
    border-radius: 5px;
  }

  .tb {
    color: #e74c3c;
  }

  .total-price {
    display: flex;
    align-items: flex-end;
    flex-direction: column;
    margin-top: 2rem;
  }

  .total-price .col3 {
    border-top: 3px solid var(--green);
    width: 100%;
    max-width: 35rem;
  }

  .coupon input[type=text] {

    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;

  }

  .coupon {
    text-align: center;
  }

  .coupon button {
    margin: 5px;

    width: 50%;
    border-radius: 4px;
    outline: none;
    border: none;
    font-size: 1.6rem;
    padding: 1rem 3rem;
    margin-right: 1.5rem;
    background-color: var(--green);
    color: white;
    cursor: pointer;
  }
</style>