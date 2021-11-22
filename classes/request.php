<?php 
namespace animalsStore\classes;
class request
{
   //$_GET[$key]
public function get($key)
{
 return $_GET[$key];
}
public function post($key)
{
return $_POST[$key];
}
public function files($key)
{
return $_FILES[$key];
}
public function getHas($key)
{
    return isset($_GET[$key]);
}
public function postHas($key)
{
    return isset($_POST[$key]);
}
public function redirect($path)
{
header("location: ".URL.$path);
}

public function Aredirect($path)
{
header("location: ".AURL.$path);
}
}



?>