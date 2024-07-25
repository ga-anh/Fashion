<?php
require_once 'pdo.php';

function user_insert($username,$password,$email){
    $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)";
    pdo_execute($sql, $username, $password, $email);
}

function user_insert_id($username,$password,$hoten,$diachi,$email,$dienthoai){
    $sql = "INSERT INTO user(username, password, ten, diachi, email, dienthoai) VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute_id($sql, $username, $password, $hoten, $diachi, $email, $dienthoai);
    
}

function user_update($username,$password,$ten,$email,$diachi,$dienthoai,$role,$id){
    $sql = "UPDATE user SET username=?,password=?,ten=?,email=?,diachi=?,dienthoai=?,role=? WHERE id=?";
    pdo_execute($sql,$username,$password,$ten,$email,$diachi,$dienthoai,$role,$id);
}

function user_update_admin($role,$id){
    $sql = "UPDATE user SET role=? WHERE id=?";
    pdo_execute($sql,$role,$id);
}

function user_check($username,$password){
    $sql="SELECT * FROM user WHERE username=? AND password=?";
    return pdo_query_one($sql,$username,$password);
    // if(is_array($kq)&&(count($kq))){
    //     return $kq["id"];
    // }else{
    //     return 0;
    // }
}

function get_user($id){
    $sql="SELECT * FROM user WHERE id=?";
    return pdo_query_one($sql,$id);
}

// function userupdate($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "UPDATE user SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
// }

// function userdelete($ma_kh){
//     $sql = "DELETE FROM user  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

function userselect_all(){
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}

// function userselect_by_id($ma_kh){
//     $sql = "SELECT * FROM user WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function userexist($ma_kh){
//     $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function userselect_by_role($vai_tro){
//     $sql = "SELECT * FROM user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function userchange_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }
function showkh_admin($dskh){
    $html_dskh='';
    $i=1;
    foreach ($dskh as $kh){
        extract($kh);     
        $html_dskh.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$username.'</td>
                            <td>'.$password.'</td>
                            <td>'.$ten.'</td>
                            <td>'.$diachi.'</td>
                            <td>'.$email.'</td>
                            <td>'.$dienthoai.'</td>
                            <td>'.$role.'</td>
                            <td>
                                <a href="index.php?pg=userupdate&id='.$id.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            </td>
                        </tr>';
                        $i++;
    }

    return $html_dskh;
}