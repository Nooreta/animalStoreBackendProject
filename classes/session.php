<?php
namespace animalsStore\classes;
class session{
     public function __construct()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
        session_start();
        }
    }
    //$_SESSION['userName']="ali"
    public function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }
    public function get($id)
    {
        return $_SESSION[$id];
    }
    public function has($id)
    {
      return isset($_SESSION[$id]);
    }
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
    public function destroy()
    {
        session_destroy();
    }

}





?>



