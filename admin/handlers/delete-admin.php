<?php
require_once("../../app.php");
use animalsStore\classes\models\admins;


if($request->getHas("id"))
{
    $id=$request->get("id");
}
$admin=new admins;
$admin->delete($id);
$request->Aredirect("admins.php");

?>