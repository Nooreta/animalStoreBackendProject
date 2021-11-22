<?php  
require_once("../app.php");
use animalsStore\classes\cart;
if($request->getHas("submit"))
{
     $quantity=$request->get('quantity');
     $prodId=$request->get('prodId');
     $prodName=$request->get('prodName');
     $animalNo=$request->get('animalNo');
     $description=$request->get('description');
     $price=$request->get('price');
     $animalImg=$request->get("animalImg");

     //It's better to store these info inside array
     $prodData=[
       'quantity'=>$quantity,
       'prodName'=>$prodName,
       'animalImg'=>$animalImg,
       'description'=>$description,
       'price'=>$price
     ];
}

$cart=new cart;
$cart->add($prodId,$prodData);
$request->redirect("shop-single.php");

//   'cart'=> [
//       '1'=>[
//         //   all data of the product 1
//       ],
        //  '2'=>[
              
        //  ]
//   ]
?>

