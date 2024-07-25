<?php require_once "header.php"; ?>
<?php
$dssp_thuonghieu = $data["dssp_thuonghieu"];
$proshow = new App\Model\ProductModel;
$html_dssp_thuonghieu = $proshow->sanpham_show($dssp_thuonghieu);


?>

<section class="section all-products" id="products">
    <div class="top container">
        <h1>All Products</h1>
    </div>
    <div class="product-center container">
        <?= $html_dssp_thuonghieu ?>
    </div>
</section>
<section class="pagination">
    <div class="container">
        <a href="<?=BASE_PATH?>/product/trang/1"><span>1</span> </a>
        <a href="<?=BASE_PATH?>/product/trang/2"><span>2</span> </a>
        <a href="<?=BASE_PATH?>/product/trang/3"><span>3</span> </a>
        <a href="<?=BASE_PATH?>/product/trang/4"><span>4</span> </a>
        <span><i class="bx bx-right-arrow-alt"></i></span>
    </div>
</section>
<?php
require_once "footer.php";
?>