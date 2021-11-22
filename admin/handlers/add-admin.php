<?php  
require_once("../../app.php");

use animalsStore\classes\models\admins;

if($request->postHas("submit"))
   {
    $name=$request->post("name");
    $email=$request->post("email");
    $password=$request->post("password");
    $isSuper=$request->post("isSuper");
    $admin=new admins;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     $admin->insert("name,email,`password`,is_super","'$name','$email','$hashed_password','$isSuper'");
   $request->Aredirect("admins.php");

 }


