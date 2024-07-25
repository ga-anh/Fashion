<?php require_once "header.php"; ?>
<?php
extract($data['detail']);
$html_dssp = '
                <div class="details container">
                <div class="left image-container">
                    <div class="main">                   
                        <img src="'.BASE_PATH.'/layout/images/' . $img . '" id="zoom" alt="' . $name . '" />
                    </div>
                </div>
                <div class="right">           
                    <h1>' . $name . '</h1>
                    <div class="price">' . number_format($price, 0, ",", ".") . 'đ</div>
                    <form>
                        <div>
                            <select>
                                <option value="Select Size" selected disabled>
                                    Select Size
                                </option>
                                <option value="1">32</option>
                                <option value="2">42</option>
                                <option value="3">52</option>
                                <option value="4">62</option>
                            </select>
                            <span><i class="bx bx-chevron-down"></i></span>
                        </div>
                    </form>
                    <form action="'.BASE_PATH.'/addcart" method="post" class="form">
                        <input type="hidden" name="idpro" value="' . $id . '">
                        <input type="hidden" name="tensp" value="' . $name . '">
                        <input type="hidden" name="img" value="' . $img . '">
                        <input type="hidden" name="price" value="' . $price . '">
                        <input type="number" name="soluong" id="" min="1" value="1" max="10">
                        <button name="addcart" class="addCart">Add To Cart</button>
                    </form>
                    <h3>Product Detail</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima
                        delectus nulla voluptates nesciunt quidem laudantium, quisquam
                        voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!
                    </p>
                </div>
                </div>   
                ';
$propage= new App\Model\ProductModel;
$dssp_lienquan=$data['dssp_lienquan'];
$html_dssp_lienquan =$propage->sanpham_show($dssp_lienquan);
?>
<style>
    .product-detail .form input {
        padding: 0.8rem;
        text-align: center;
        width: 5.5rem;
        margin-right: 2rem;
    }
</style>
<!-- Product Details -->
<section class="section product-detail">
    <?= $html_dssp ?>
</section>

<!-- Related -->
<section class="section featured">
    <div class="top container">
        <h1>Related Products</h1>
        <a href="#" class="view-more">View more</a>
    </div>
    <div class="product-center container">
        <?= $html_dssp_lienquan ?>
    </div>
</section>
<?php
require_once "footer.php";
?>