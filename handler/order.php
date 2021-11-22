<?php  
require_once("../app.php");

use animalsStore\classes\models\order;
use animalsStore\classes\models\order_details;

use animalsStore\classes\cart;
if($request->postHas("submit"))
{
    $name=$request->post("name");
    $email=$request->post("email");
    $address=$request->post("address");
    $phone=$request->post("phone");
}

$order=new order;
$order_id=$order->insertAndGetId("name,email,address,phone","'$name', '$email', '$address', '$phone' ");

$cart =new cart;
$orderDetails=new order_details;
foreach($cart->all() as $id=>$prodData)
{
    $quantity=$prodData['quantity'];
$orderDetails->insert("product_id,order_id,quantity","'$id', '$order_id','$quantity'");

}
$request->redirect("shop-single.php");

?>