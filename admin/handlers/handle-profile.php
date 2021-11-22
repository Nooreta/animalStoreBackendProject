<?php  
require_once("../../app.php");
use animalsStore\classes\models\admins;

if($request->postHas("submit"))
{
    // $qty=$_POST['submit'];
    $name=$request->post("name");
    $email=$request->post("email");
    $password=$request->post("password");
    $confirmPassword=$request->post("confirmPassword");
    $ad=new admins;

    if(!empty($password))
    {
        $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
          //update query with password
        $ad->update("name='$name',email='$email',`password`='$hashedPassword'", $session->get('adminId'));
    }
           //update query without password
      else  $ad->update("name='$name',email='$email'", $session->get('adminId'));

      $request->Aredirect("handlers/handle-logout.php");

 }


