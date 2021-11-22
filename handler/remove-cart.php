<?php 
 use animalsStore\classes\cart;
require_once("../app.php");

if($request->getHas('id'))
{
    $id=$request->get('id');
    echo $id;
}

$cart = new cart;
$cart->remove($id);


 $request->redirect("cart.php");





?>