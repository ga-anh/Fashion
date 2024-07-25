<?php
namespace App\Model;
class BillModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }    
    function bill_select_all(){
        $sql = "SELECT * FROM bill ORDER BY id DESC";
        return $this->db->pdo_query($sql);
    }
    function bill_insert_id($madh,$iduser,$nguoidat_ten,$nguoidat_email,$nguoidat_tell,$nguoidat_diachi,$nguoinhan_ten,$nguoinhan_diachi,$nguoinhan_tell,$total,$voucher,$tongthanhtoan,$pttt,$status){
        $sql = "INSERT INTO bill(madh,iduser,nguoidat_ten,nguoidat_email,nguoidat_tel,nguoidat_diachi,nguoinhan_ten,nguoinhan_diachi,nguoinhan_tel,total,voucher,tongthanhtoan,pttt,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";
        return $this->db->pdo_execute_id($sql, $madh,$iduser,$nguoidat_ten,$nguoidat_email,$nguoidat_tell,$nguoidat_diachi,$nguoinhan_ten,$nguoinhan_diachi,$nguoinhan_tell,$total,$voucher,$tongthanhtoan,$pttt,$status);
        
    }
    
    function bill_update_user($id){
        $sql = "UPDATE bill SET status='Đã hủy' WHERE id=?";
        $this->db->pdo_execute($sql,$id);
    }


    function bill_select_all_id_admin($id){
        $sql = "SELECT * FROM bill WHERE id=?";
        return $this->db->pdo_query_one($sql,$id);
    }

    function bill_select_all_id($iduser){
        $sql = "SELECT * FROM bill WHERE iduser=? ORDER BY id DESC";
        return $this->db->pdo_query($sql,$iduser);
    }

}
