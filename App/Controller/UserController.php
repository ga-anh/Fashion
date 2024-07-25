<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController extends BaseController
{
    private $user;
    function __construct()
    {
        $this->user = new UserModel;
    }
    function dangnhap()
    {
        $this->titlepage = "Trang đăng nhập";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                //xu ly:kiem tra
                $kq = $this->user->user_check($username, $password);
                $this->data['kq'] = $kq;
                if (is_array($kq) && (count($kq))) {
                    $_SESSION['s_user'] = $kq;
                    header('location: ' . BASE_PATH . '/index');
                } else {
                    $tb = "Tai khoan khong ton tai hoac nhap sai thong tin";
                    $_SESSION['tb_dangnhap'] = $tb;
                    header('location: ' . BASE_PATH . '/login');
                }
            }
        }

        $this->renderView("login", $this->titlepage, $this->data);
    }
    function dangky()
    {
        $this->titlepage = "Trang đăng ký";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                //xu ly
                $this->user->user_insert($username, $password, $email);
                header('location: ' . BASE_PATH . '/index');
            } else {
                header('location: ' . BASE_PATH . '/signup');
            }
        }

        $this->renderView("signup", $this->titlepage, $this->data);
    }
    function trangcanhan()
    {
        $this->titlepage = "Trang ca nhan";
        $this->renderView("trangcanhan", $this->titlepage, $this->data);
    }
    function myaccount()
    {
        $this->titlepage = "Trang thay đổi thông tin";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["ten"]) && isset($_POST["email"]) && isset($_POST['diachi']) && isset($_POST["dienthoai"]) && isset($_POST["id"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $ten = $_POST["ten"];
                $email = $_POST["email"];
                $diachi = $_POST['diachi'];
                $dienthoai = $_POST["dienthoai"];
                $id = $_POST["id"];
                $role = 0;
                //xu ly
                $this->user->user_update($username, $password, $ten, $email, $diachi, $dienthoai, $role, $id);
                $userinfo = $this->user->get_user($id);
                $_SESSION['s_user'] = $userinfo;
                header('location: ' . BASE_PATH . '/index');
            } else {
                header('location: ' . BASE_PATH . '/product');
            }
        }
        $this->renderView("myaccount", $this->titlepage, $this->data);
    }
    function logout()
    {
        unset($_SESSION['s_user']);
        header('location: ' . BASE_PATH . '/index');
    }
}
