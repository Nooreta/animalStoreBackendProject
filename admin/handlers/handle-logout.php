<?php
require_once("../../app.php");
use animalsStore\classes\models\admins;

$ad=new admins;
$ad->logout($session);
$request->Aredirect("login.php");


?>