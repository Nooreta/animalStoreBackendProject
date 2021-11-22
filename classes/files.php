<?php 
namespace animalsStore\classes;
class files
{
    private $name,$tmpName,$uploadName;
    public function __construct($img)
    {
        $this->name=$img['name'];
        $this->tmpName=$img['tmp_name'];
     }
public function rename()
{
    $randomStr=uniqid();
    $ext=pathinfo($this->name,PATHINFO_EXTENSION);
    $this->uploadName="$randomStr.$ext";
    return $this;
}

public function upload()
{
    $destination=PATH."upload/".$this->uploadName;
    move_uploaded_file($this->tmpName,$destination);
    return $this->uploadName;
}

public function uploadd()
{
    $destination=PATH."upload2/".$this->uploadName;
    move_uploaded_file($this->tmpName,$destination);
    return $this->uploadName;
}

}



?>