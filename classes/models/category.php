<?php
namespace animalsStore\classes\models;
use animalsStore\classes\db;
class category extends db
{
    public function __construct()
    {
      $this->connect();
      $this->table="category";
    }
    

}



?>