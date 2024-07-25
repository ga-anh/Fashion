<?php

namespace App\Controller;

use App\Model\ProductModel;
use App\Model\CartModel;
use App\Model\VoucherModel;

class CartController extends BaseController
{
    private $cart;
    private $vc;
    private $ProductModel;
    function __construct()
    {
        $this->cart = new CartModel;
        $this->vc= new VoucherModel;
        $this->ProductModel = new ProductModel;
    }
    function index()
    {
        $this->titlepage = "Giỏ hàng";
        ob_start();
        if (!isset($_SESSION["giohang"])) {
            $_SESSION["giohang"] = [];
        }
        //lay du lieu tu form
        if (isset($_POST["addcart"])) {
            $idpro = $_POST["idpro"];
            $name = $_POST["tensp"];
            $img = $_POST["img"];
            $price = $_POST["price"];
            $soluong = $_POST["soluong"];
            $thanhtien = (int)$soluong * (int)$price;
            $sp = array("idpro" => $idpro, "name" => $name, "img" => $img, "price" => $price, "soluong" => $soluong, "thanhtien" => $thanhtien);
            $product_exists = false;
            foreach ($_SESSION['giohang'] as $key => $cart_item) {
                if ($cart_item['name'] === $name) {
                    $product_exists = true;

                    $_SESSION['giohang'][$key]['soluong'] += $soluong;
                    break;
                }
            }
            if (!$product_exists) {
                array_push($_SESSION['giohang'], $sp);
            }
            header('location: ' . BASE_PATH . '/cart');
        }




        if (isset($_SESSION["giohang"])) {
            $this->data['tongdonhang'] = $this->cart->get_tongdonhang();
        }
        
       

        $giatrivoucher = 0;
        if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
            $voucher = $_POST['mavoucher'];
            $vcgt = $this->vc->voucher_select_by_id($voucher);
            $_SESSION['voucher_gt'] = $vcgt;
            if (isset($_SESSION['voucher_gt']) && (count($_SESSION['voucher_gt']) > 0)) {
                unset($_SESSION['voucher_gt']);
                $voucher = $_POST['mavoucher'];
                $giamgia = $this->vc->voucher_select_by_id($voucher);
                $_SESSION['voucher_gt'] = $giamgia;
            } else {
                $voucher = $_POST['mavoucher'];
                $giamgia = $this->vc->voucher_select_by_id($voucher);
                $_SESSION['voucher_gt'] = $giamgia;
            }
            $giatrivoucher = $_SESSION['voucher_gt']['giatri'];
           
        }
        $this->data['thanhtoan'] = $this->data['tongdonhang'] - $giatrivoucher;
        if (isset($_GET['tangsl']) && ($_GET['tangsl'] == 1)&&isset($_POST["suasl"])) {
           
                $soluong = $_POST['soluong'];
                if ($soluong > 0) {
                    $sodem = $_POST['sodem'];
                    $_SESSION['giohang'][$sodem]['soluong'] = $soluong;
                }
            
            header('location: ' . BASE_PATH . '/cart');
        }
        $this->data["giohang"] = $this->cart->viewcart();
        $dssp_view = $this->ProductModel->get_dssp_view(4);
        $this->data["dssp_view"] = $dssp_view;
        $this->renderView("cart", $this->titlepage, $this->data);
    }
    function delcart()
    {
        unset($_SESSION['giohang']);
        header('location: ' . BASE_PATH . '/cart');
    }
    function deletecart()
    {
        $url = $_SERVER['REQUEST_URI'];
        $segments = explode('/', rtrim($url, '/'));
        $product_index_key = array_search('delete', $segments);

        $product_index = 0;  // Giá trị mặc định
        
        if ($product_index_key !== false && isset($segments[$product_index_key + 1])) {
            $product_index = (int) $segments[$product_index_key + 1];
        }
        if(isset($_SESSION["giohang"][$product_index])) {
            unset($_SESSION["giohang"][$product_index]);
        }
        header('Location: ' . BASE_PATH . '/cart');
    }
}
