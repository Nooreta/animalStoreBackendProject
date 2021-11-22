<?php  
require_once("../../app.php");
use animalsStore\classes\models\admins;

if($request->postHas("submit"))
{
    // $qty=$_POST['submit'];
    $email=$request->post("email");
    $password=$request->post("password");
    $ad=new admins;
    $isLogin=$ad->login($email,$password,$session);
    if($isLogin)
    {
        $request->Aredirect("index.php");
    }
    else 
    $request->Aredirect("login.php");
}

