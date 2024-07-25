<?php

namespace App\Model;

class ThuongHieuModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }
    function thuonghieu_get_all()
    {
        $sql = "SELECT * FROM thuonghieu ORDER BY id DESC ";
        return $this->db->pdo_query($sql);
    }
    function thuonghieu_show($dssp)
    {
        $html_dssp_home = '';

        foreach ($dssp as $item) {
            extract($item);
            $link = BASE_PATH . "/index/idth/" . $id;
            $html_dssp_home .= '
        <a href="' . $link . '">
        <img src="layout/images/' . $imgth . '" alt="" style="width: 100px; height:100px">
        </a>
      ';
        }
        return $html_dssp_home;
    }
    
    function sanpham_get_all_thuonghieu($idth)
    {
        $sql = "SELECT * FROM sanpham where 1";

        if ($idth > 0) {
            $sql .= " and idth=" . $idth;
        }



        $sql .= " order by id desc" ;

        return $this->db->pdo_query($sql);
    }
}
