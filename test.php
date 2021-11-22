<?php 
require_once("classes/request.php");
require_once("classes/session.php");
require_once("classes/db.php");
require_once("classes/models/product.php");
require_once("classes/models/order.php");
// $request=new request;
// $res=$request->get("name");

// echo $res;

// $session=new session;
// $session->set("adminName","Ahmed");

// // echo $session->get("adminName") ;
// $session->remove("adminName");
// echo $session->get("adminName") ;
$order=new order;
$productAll=$order->delete(1);
echo "<pre>";
print_r($productAll);
echo "</pre>";
?>