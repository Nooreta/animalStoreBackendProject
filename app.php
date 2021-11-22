<?php 
define('PATH',__DIR__.'/');
// echo PATH;
define('URL',"http://localhost/animalsStore/");

define('APATH',__DIR__.'/admin');
// echo PATH;
define('AURL',"http://localhost/animalsStore/admin/");



//  echo URL;
define("SERVER_NAME",'localhost');

define("USER_NAME",'root');
define("PASSWORD",'');
define("DB_NAME",'animalstore');

require_once(PATH."vendor/autoload.php");

use animalsStore\classes\request;
use animalsStore\classes\session;
//objects
$session=new session;
$request=new request;

?>