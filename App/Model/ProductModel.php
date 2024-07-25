<?php

namespace App\Model;

class ProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }
    function sanpham_get_all($limi)
    {
        $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
        return $this->db->get_all($sql);
    }

    function get_dssp_view($limi)
    {
        $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
        return $this->db->get_all($sql);
    }

    function sanpham_get_one($id)
    {
        $sql = "SELECT * FROM sanpham where id=?";
        return $this->db->pdo_query_one($sql, $id);
    }
    function sanpham_get_dm($id)
    {
        $sql = "SELECT * FROM sanpham where iddm=?";
        return $this->db->pdo_query($sql, $id);
    }

    function sanpham_dssp_lienquan($iddm, $id, $limi)
    {
        $sql = "SELECT * FROM sanpham WHERE iddm = ? AND id <> ? ORDER BY view DESC limit " . $limi;
        return $this->db->pdo_query($sql, $iddm, $id);
    }

    function sanpham_show($dssp)
    {
        $html_dssp_home = '';

        foreach ($dssp as $item) {
            extract($item);
            $link = BASE_PATH . '/product/detail/' . $id;
            $html_dssp_home .= '<div class="product-item">
                                    <div class="overlay">
                                        <a href="' . $link . '" class="product-thumb">
                                        <img src="' . BASE_PATH . '/layout/images/' . $img . '" alt="" />
                                        </a>
                                        <span class="discount">' . $view . '</span>
                                    </div>
                                    <div class="product-info">
                                    <span>' . $name . '</span>
                                    <a href="' . $link . '" class="product-thumb">Chi tiết</a>
                                    <h4>' . number_format($price, 0, ",", ".") . 'đ</h4>
                                    </div>
                                    <ul class="icons">
                                        <li><i class="bx bx-heart"></i></li>
                                    </ul>
                                </div>';
        }
        return $html_dssp_home;
    }
    
    function sanpham_show_lienquan($dssp)
    {
        $html_dssp_home = '';
        foreach ($dssp as $item) {
            extract($item);
            $link = BASE_PATH . '/product/detail/' . $id;
            $html_dssp_home .= '<div class="product-item">
                                    <div class="overlay">
                                        <a href="' . $link . '" class="product-thumb">
                                        <img src="' . BASE_PATH . '/layout/images/' . $img . '" alt="" />
                                        </a>                                      
                                    </div>
                                    <div class="product-info">
                                    <span>' . $name . '</span>
                                    <a href="' . $link . '" class="product-thumb">Chi tiết</a>
                                    <h4>' . number_format($price, 0, ",", ".") . 'đ</h4>
                                    </div>
                                    <ul class="icons">
                                        <li><i class="bx bx-heart"></i></li>
                                    </ul>
                                </div>';
        }
        return $html_dssp_home;
    }
    function sanpham_get_all_idcatalog($kyw, $idcatalog, $trang, $soluongsp)
    {
        $sql = "SELECT * FROM sanpham where 1";
        if ($kyw != "") {
            $sql .= " AND name like '%" . $kyw . "%'";
        }
        if ($idcatalog > 0) {
            $sql .= " and iddm=" . $idcatalog;
        }

        $limit1 = ($trang - 1) * $soluongsp;
        $limit2 = $soluongsp;

        $sql .= " order by id desc limit " . $limit1 . "," . $limit2;

        return $this->db->get_all($sql);
    }

}
