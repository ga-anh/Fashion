<?php require_once "header.php"; ?>
<?php
$dssp_new = $data["dssp_new"];
$proshow = new App\Model\ProductModel;
$html_dssp_new = $proshow->sanpham_show($dssp_new);
$catalog_list = $data["catalog_list"];
$html_catalog_list = "";
foreach ($catalog_list as $item) {
    extract($item);
    $link = BASE_PATH . "/product/idcatalog/" . $id;
    $html_catalog_list .= '<li><a href="' . $link . '">' . $name . '</a></li>';
}

?>

<section class="section all-products" id="products">
    <div class="top container">
        <h1>All Products</h1>
        <div class="border-ul">
            <ul>
                <li><a href="<?=BASE_PATH?>/product">Mặc định</a></li>
                <?= $html_catalog_list; ?>
            </ul>
        </div>
    </div>
    <div class="product-center container">
        <?= $html_dssp_new; ?>
    </div>
</section>
<section class="pagination">
    <div class="container">
        <a href="<?=BASE_PATH?>/product/trang/1"><span>1</span> </a>
        <a href="<?=BASE_PATH?>/product/trang/2"><span>2</span> </a>
        <span>3</span>
        <span>4</span>
        <span><i class="bx bx-right-arrow-alt"></i></span>
    </div>
</section>
<?php
require_once "footer.php";
?>