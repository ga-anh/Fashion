<?php
namespace App\Model;
class CartModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }    
    function cart_insert($idpro,$price,$name,$img,$soluong,$thanhtien,$idbill){
        $sql = "INSERT INTO cart(idpro,price,name,img,soluong,thanhtien,idbill) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->pdo_execute($sql, $idpro,$price,$name,$img,$soluong,$thanhtien,$idbill);
    }
    function viewcart()
    {
        $html_cart = '';   
        $i=0;          
        foreach ($_SESSION["giohang"] as $product_index=>$sp) {
            extract($sp);
            $tt=(int)$price*(int)$soluong;
          
            $link=BASE_PATH .'/cart/delete/'.$product_index;
            $html_cart .= '<tr>
                                <td>
                                <div class="cart-info">
                                    <img src="layout/images/'.$img.'" alt="" />
                                    <div>
                                    <a href="'.$link.'">Xóa</a>
                                    </div>
                                </div>
                                </td>
                                <td>'.$name.'</td>
                                <td>
                                    <form action="' . BASE_PATH . '/cart/tangsl/1" method="post">      
                                        <input type="hidden" name="sodem" value="'.$i.'">
                                        <input type="number" name="soluong" min="1" max="10" value="'.$soluong.'" >
                                        <button name="suasl" style="width:50%; cursor:pointer; border: 1px #993300 solid; padding:5px 5px; font-size: 10pt;">Xác nhận</button>   
                                    </form> 
                                </td>
                                <td>'. number_format($price, 0, ",", ".") .'</td>
                                <td>'. number_format($tt, 0, ",", ".") .'</td>
                            </tr>
                            ';
                        $i++;
        }

        return $html_cart;
    }
    function get_tongdonhang(){
        $tong=0;
        
        foreach($_SESSION["giohang"] as $sp){
            extract($sp);
            $tt=(int)$price*(int)$soluong;
            $tong+=$tt;
        }
        return $tong;
    }
    function cart_select_all_id($idbill){
        $sql = "SELECT * FROM cart WHERE idbill=?";
        return $this->db->pdo_query($sql,$idbill);
    }
    function viewcart_bill(){
        $html_carts='';
        $i=0;
        $j=$i +1;
        $tong=0;
        foreach($_SESSION["giohang"] as $sp){
            extract($sp);          
            $tt=$price*$soluong;
            $tong+=$tt;
            
            $html_carts.='
                        
                                    
                                    <td><img src="layout/images/'.$img.'" alt="" style="width:100px"></td>
                                    
                                    <td>|'.$name.'</td>
                                    
                                    <td>|'.number_format($price,0,",",".").'</td>
                                    <td >   
                                        x'.$soluong.' 
                                    </td>
                                    
                                    
                                ';
            $i++;
        }
        
        return $html_carts;  
    }
}
