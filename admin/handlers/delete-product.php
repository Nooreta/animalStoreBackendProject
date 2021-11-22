<?php
require_once("../../app.php");
use animalsStore\classes\models\product;


if($request->getHas("id"))
{
    $id=$request->get("id");
}
$pr=new product;
$imgName=$pr->selectId($id,"animalImg")['animalImg'];
unlink(PATH."upload/$imgName");
$pr->delete($id);
$request->Aredirect("products.php");



?>