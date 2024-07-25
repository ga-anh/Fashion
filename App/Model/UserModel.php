<?php
namespace App\Model;
class UserModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }
    function get_all(){
        $sql="SELECT * FROM user";
        $this->db->get_all($sql);
    }
    function user_insert($username,$password,$email){
        $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)";
        $this->db->pdo_execute($sql, $username, $password, $email);
    }
    function user_check($username,$password){
        $sql="SELECT * FROM user WHERE username=? AND password=?";
        return $this->db->pdo_query_one($sql,$username,$password);
    }
    function user_insert_id($username,$password,$hoten,$diachi,$email,$dienthoai){
        $sql = "INSERT INTO user(username, password, ten, diachi, email, dienthoai) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->pdo_execute_id($sql, $username, $password, $hoten, $diachi, $email, $dienthoai);
        
    }
    function user_update($username,$password,$ten,$email,$diachi,$dienthoai,$role,$id){
        $sql = "UPDATE user SET username=?,password=?,ten=?,email=?,diachi=?,dienthoai=?,role=? WHERE id=?";
        $this->db->pdo_execute($sql,$username,$password,$ten,$email,$diachi,$dienthoai,$role,$id);
    }
    function get_user($id){
        $sql="SELECT * FROM user WHERE id=?";
        return $this->db->pdo_query_one($sql,$id);
    }
}

