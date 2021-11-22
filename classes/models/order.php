<?php
namespace animalsStore\classes\models;
use animalsStore\classes\db;
class order extends db
{
    public function __construct()
    {
      $this->connect();
      $this->table="orders";
    }
    

}



?>