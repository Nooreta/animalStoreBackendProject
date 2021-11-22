<?php
namespace animalsStore\classes;

class cart{
    public function add($id,$prodData)
    {
    
       $_SESSION['cart'][$id]=$prodData;

    }
    public function count()
    {
        if(isset($_SESSION['cart']))
       { return count($_SESSION['cart']);
       }
       else return 0;
    }
    public function cartTotal():int
    {
        $total=0;
        if(isset($_SESSION['cart']))
        foreach($_SESSION['cart'] as $id=>$data)
        {
            $totall=(int)($data['price'])*(int)($data['quantity']);
            $total+=$totall;
        }

        return $total;
    }
    public function hasId($id)
    {    if(isset($_SESSION['cart']))
        return array_key_exists($id,$_SESSION['cart']);
       
    }
    public function remove($id)
{
    
    unset($_SESSION['cart'][$id]);
    echo "removed";
}
    public function all()
    {
        if(isset($_SESSION['cart']))
        return $_SESSION['cart'];
        else return [];
    }
  
}



?>