<?php
namespace animalsStore\classes\models;
use animalsStore\classes\db;
use animalsStore\classes\session;
class admins extends db
{
    public function __construct()
    {
      $this->connect();
      $this->table="admins";
    }
    
    public function login($email,$password,session $session)
    {
      $sql="SELECT * FROM $this->table where email='$email'";
      $result=mysqli_query($this->conn,$sql);
      $admin=mysqli_fetch_assoc($result); //return the data of one row if it exists
      // return $admin;
      //step1: check the validity of the email
      if(!empty($admin))   //if there's data stored inside the $admin then the email of the user exists
      {
         $hashedPassword=$admin['password'];
         $isSame=password_verify($password,$hashedPassword);
         if($isSame) //if the password is correct
         {
          $session->set('adminId',$admin['id']);
          $session->set('adminName',$admin['name']);
          $session->set('adminEmail',$admin['email']);
           return true;
         }
         else{
           return false;
         }

      }
      else{
        return false;
      }
    }
    public function logout(session $session)
    {
       $session->remove('adminId');
       $session->remove("adminName");
       $session->remove("adminEmail");
    }

}


   
 



?>