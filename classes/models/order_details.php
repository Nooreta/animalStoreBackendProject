<?php
namespace animalsStore\classes\models;
use animalsStore\classes\db;
class order_details extends db
{
    public function __construct()
    {
      $this->connect();
      $this->table="order_details";
    }
    

}



?>