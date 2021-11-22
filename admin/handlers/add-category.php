<?php  
require_once("../../app.php");

use animalsStore\classes\models\category;
use animalsStore\classes\files;
if($request->postHas("submit"))
   {
    $name=$request->post("name");
    $img=$request->files("image");
    $files=new files($img);
  
    $imgUploadedName=$files->rename()->uploadd();  //the name of the image
    
    $cat=new category;
     $cat->insert("name,img","'$name','$imgUploadedName'");
   $request->Aredirect("categories.php");

 }


