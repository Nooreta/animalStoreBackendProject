<?php
namespace animalsStore\classes\models;
use animalsStore\classes\db;
class product extends db
{
    public function __construct()
    {
      $this->connect();
      $this->table="animalproducts";
    }
    public function selectId($id,$fields="*")
    {
       $sql="SELECT $fields from $this->table JOIN category on $this->table.category_id=category.id where 
       $this->table.id=$id";
       $res=mysqli_query($this->conn,$sql);
       return mysqli_fetch_assoc($res);
    }
    public function selectAll($fields="*"){
      $sql="SELECT $fields FROM $this->table JOIN category on $this->table.category_id=category.id";
      $result=mysqli_query($this->conn,$sql);
      return mysqli_fetch_all($result,MYSQLI_ASSOC);//assoc array
    }
}



?>