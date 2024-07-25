<?php

namespace App\Model;

class VoucherModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }
    function voucher_select_by_id($voucher)
    {
        $sql = "SELECT * FROM voucher WHERE voucher=?";
        return $this->db->pdo_query_one($sql, $voucher);
    }
}
