<?php
namespace App\Controller;

use App\Model\ProductModel;
use App\Model\ThuongHieuModel;

class ThuongHieuController extends BaseController
{
    private $ProductModel;
    private $thuonghieu;
    function __construct()
    {
        $this->ProductModel = new ProductModel;
        $this->thuonghieu = new ThuongHieuModel;
    }
    function showth(){
        $this->titlepage = "Trang thương hiệu";
        $url = $_SERVER['REQUEST_URI'];
        $segments = explode('/', rtrim($url, '/'));
        $idth_key = array_search('idth', $segments);      
        $idth = 0;  // Giá trị mặc định       
        if ($idth_key !== false && isset($segments[$idth_key + 1])) {
            $idth = (int) $segments[$idth_key + 1];
        }   
        $this->data["dssp_thuonghieu"] = $this->thuonghieu->sanpham_get_all_thuonghieu($idth);

        $this->renderView("thuonghieu", $this->titlepage, $this->data);
    }
}