<?php

namespace App\Controller;

use App\Model\BillModel;
use App\Model\CartModel;
use App\Model\UserModel;

class BillController extends BaseController
{
    private $bill;
    private $cart;
    private $user;
    function __construct()
    {
        $this->bill = new BillModel;
        $this->cart = new CartModel;
        $this->user = new UserModel;
    }
    function index()
    {
        $this->titlepage = "Trang thanh toán";
        if (isset($_SESSION["giohang"])) {
            $this->data['tongdonhang'] = $this->cart->get_tongdonhang();
            $giatrivoucher = 0;
            $this->data['thanhtoan'] = $this->data['tongdonhang'] - $giatrivoucher;
        } else {
            $this->data['tongdonhang'] = 0;
            $this->data['thanhtoan'] = 0;
        }

        $this->renderView("bill", $this->titlepage, $this->data);
    }
    function billsubmit()
    {
        $this->titlepage = "Trang hoàn thành đơn hàng";
        if (isset($_POST['donhangsubmit'])) {
            if (!isset($_POST['hoten']) && !isset($_POST['diachi']) && !isset($_POST['email']) && !isset($_POST['dienthoai'])) {
                $_SESSION['tbform'] = "Bạn chưa điền đầy đủ thông tin";
                header('Location: ' . BASE_PATH . '/bill');
            } else {
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                $nguoinhan_ten = $_POST['hoten_nguoinhan'];
                $nguoinhan_diachi = $_POST['diachi_nguoinhan'];
                $nguoinhan_tell = $_POST['dienthoai_nguoinhan'];
                $pttt = $_POST['pttt'];
                //insert user moi
                $username = "guest" . rand(1, 999);
                $password = "123456";
                if (isset($_SESSION['s_user'])) {
                    $iduser = $_SESSION['s_user']['id'];
                } else {
                    $iduser = $this->user->user_insert_id($username, $password, $hoten, $diachi, $email, $dienthoai);
                }

                //tao don hang
                $madh = "CHANEL-HCM" . $iduser . "-" . date("His-dmY");
                $total = $this->cart->get_tongdonhang();
                $status = "Chờ xác nhận";
                if (isset($_SESSION['voucher_gt'])) {
                    $voucher = $_SESSION['voucher_gt'];
                } else {
                    $voucher = 0;
                }

                $tongthanhtoan = ($total - $voucher);
                $idbill = $this->bill->bill_insert_id($madh, $iduser, $hoten, $email, $dienthoai, $diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tell, $total, $voucher, $tongthanhtoan, $pttt, $status);
                //insert gio hang tu session vao table cart
                foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    $this->cart->cart_insert($idpro, $price, $name, $img, $soluong, $thanhtien, $idbill);
                }
                $this->data['user'] = $iduser;
                $_SESSION['giohang'] = null;
                $this->data['madh'] = $madh;

                $this->renderView("billhoanthanh", $this->titlepage, $this->data);
            }
        }
    }
    function theodoidh()
    {
        $this->titlepage = "Trang theo dõi đơn hàng";
        if (isset($_GET['huydon'])) {
            $id = $_GET['huydon'];
            $tdbill = $this->bill->bill_select_all_id_admin($id);
            $status = $tdbill['status'];
            if ($status == "Chờ xác nhận") {
                $this->bill->bill_update_user($id);
            } else {

                echo '<script type="text/javascript">

                window.onload = function () {
                     alert("Bạn không thể hủy đơn hàng"); 
                    }
                
                </script>';
            }
        }
        
        $this->renderView("theodoidh", $this->titlepage, $this->data);
    }
    function chitietdh()
    {
        $url = isset($_GET['url']) ? "/" . rtrim($_GET['url'], '/') : '/index';
        $url_array = explode("/", $url);
        if (count($url_array) > 0) {
            $idbill = $url_array[count($url_array) - 1];
        } else {
            $idbill = "";
        }


        $get_sp = $this->cart->cart_select_all_id($idbill);
        if (is_array($get_sp)) {
            extract($get_sp);
            $this->titlepage = "Trang chi tiết đơn hàng";
            $this->data["chitietdh"] = $get_sp;
            $this->renderView("chitietdh", $this->titlepage, $this->data);
        } else {
            header('location: ' . BASE_PATH . '/index');
        }
        
    }
}
