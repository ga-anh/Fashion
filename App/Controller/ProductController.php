<?php

namespace App\Controller;

use App\Model\ProductModel;
use App\Model\CatalogModel;

class ProductController extends BaseController
{
    private $pro;
    private $cat;
    function __construct()
    {
        $this->pro = new ProductModel;
        $this->cat = new CatalogModel;
    }
    function index()
    {

        $this->titlepage = "Danh sach san pham";
        // Lấy giá trị 'idcatalog' từ URL hoặc mặc định là 0 nếu không có
        $url = $_SERVER['REQUEST_URI'];
        $segments = explode('/', rtrim($url, '/'));
        $idcatalog_key = array_search('idcatalog', $segments);


      
        

        $idcatalog = 0;  // Giá trị mặc định
        
        if ($idcatalog_key !== false && isset($segments[$idcatalog_key + 1])) {
            $idcatalog = (int) $segments[$idcatalog_key + 1];
        }

        $key_search = array_search('search', $segments);
        $kyw = "";
        if ($key_search !== false && isset($segments[$key_search + 1])) {
            $kyw = $segments[$key_search + 1];
        }else{
            $kyw="";
        }
        
        // Lấy giá trị 'trang' từ URL hoặc mặc định là 1 nếu không có
        $trang_key = array_search('trang', $segments);
        $trang = 1;  // Giá trị mặc định
        if ($trang_key !== false && isset($segments[$trang_key + 1])) {
            $trang = (int) $segments[$trang_key + 1];
        }

        $soluongsp = 4;

        $this->data["dssp_new"] = $this->pro->sanpham_get_all_idcatalog($kyw,$idcatalog, $trang, $soluongsp);
        $this->data["catalog_list"] = $this->cat->catalog_get_all();
        $this->renderView("product", $this->titlepage, $this->data);
    }
    function detail()
    {
        $url = isset($_GET['url']) ? "/" . rtrim($_GET['url'], '/') : '/index';
        $url_array = explode("/", $url);
        if (count($url_array) > 0) {
            $id = $url_array[count($url_array) - 1];
        } else {
            $id = "";
        }


        $get_sp = $this->pro->sanpham_get_one($id);
        if (is_array($get_sp)) {
            extract($get_sp);
            $this->titlepage = $name;
            $this->data["detail"] = $get_sp;
            $iddm = $get_sp['iddm'];
            $this->data["dssp_lienquan"] = $this->pro->sanpham_dssp_lienquan($iddm, $id, 4);
            $this->renderView("productdetail", $this->titlepage, $this->data);
        } else {
            header('location: ' . BASE_PATH . '/index');
        }
    }
}
