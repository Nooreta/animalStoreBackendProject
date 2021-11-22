<?php  
require_once("../../app.php");
use animalsStore\classes\models\admins;
use animalsStore\classes\models\product;
use animalsStore\classes\files;
if($request->postHas("submit"))
   {
    $name=$request->post("name");
    $cat_id=$request->post("cat_id");
    $price=$request->post("price");
    $animalNo=$request->post("animalNo");
    $description=$request->post("description");
    $img=$request->files("img");
    $files=new files($img);
    $ad=new admins;

    $imgUploadName=$files->rename()->upload(); //the name of the image
     $pr=new product;
     $pr->insert("name,description,price,animalNo,category_id,animalImg","'$name','$description','$price',
     '$animalNo','$cat_id','$imgUploadName'");
   $request->Aredirect("products.php");

 }


