<?php
namespace App\Model;
class CatalogModel
{
    private $db;
    function __construct()
    {
        $this->db =new DatabaseModel;
    }
    function catalog_get_all()
    {
        $sql = "SELECT * FROM danhmuc ORDER BY id DESC ";
        return $this->db->get_all($sql);
    }
   

    
}
