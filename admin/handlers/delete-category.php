<?php
require_once("../../app.php");
use animalsStore\classes\models\category;


if($request->getHas("id"))
{
    $id=$request->get("id");
}
$cat=new category;
$imgName=$cat->selectId($id,"img")['img'];
unlink(PATH."upload2/$imgName");
$cat->delete($id);
$request->Aredirect("categories.php");



?>