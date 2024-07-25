<?php
namespace App\Controller;

use App\Model\ProductModel;
use App\Model\ThuongHieuModel;


class HomeController extends BaseController
{
    private $ProductModel;
    private $thuonghieu;
    function __construct()
    {
        $this->ProductModel = new ProductModel;
        $this->thuonghieu = new ThuongHieuModel;
        
    }
    function index()
    {
        $this->titlepage = "Trang chu website ban hang";
        $dssp_new = $this->ProductModel->sanpham_get_all(8);
        $dssp_view = $this->ProductModel->get_dssp_view(4);
        $dssp_thuonghieu = $this->thuonghieu->thuonghieu_get_all();
        $this->data["dssp_new"] = $dssp_new;
        $this->data["dssp_view"] = $dssp_view;
        $this->data["dssp_thuonghieu"] = $dssp_thuonghieu;
        $this->renderView("home", $this->titlepage, $this->data);
    }
    
}
