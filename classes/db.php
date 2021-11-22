<?php 
namespace animalsstore\classes;
abstract class db{
     protected $conn;
     protected $table;
    public function connect()
    {
       $this->conn=mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DB_NAME);
     }
    //select * from table
    public function selectAll($fields="*"){
        $sql="SELECT $fields FROM $this->table";
        $result=mysqli_query($this->conn,$sql);
      return mysqli_fetch_all($result,MYSQLI_ASSOC);//assoc array
      }
    public function selectId($id,$fields="*")
    {
       $sql="SELECT $fields from $this->table where id=$id";
       $res=mysqli_query($this->conn,$sql);
       return mysqli_fetch_assoc($res);
    }
    public function selectWhere($cond,$fields="*")
    {
        $sql="SELECT $fields from $this->table where $cond";
        $res=mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    public function count()
    {
      $sql="SELECT count(*) AS cnt FROM $this->table";
      $result=mysqli_query($this->conn,$sql);
      return mysqli_fetch_assoc($result)['cnt'];
    }
    public function insert($fields="*",$values)
    {
        $sql="INSERT INTO $this->table($fields) VALUES($values)";
        return mysqli_query($this->conn,$sql); 
     }
     public function insertAndGetId($fields="*",$values)
     {
         $sql="INSERT INTO $this->table($fields) VALUES($values)";
         mysqli_query($this->conn,$sql); 
        return mysqli_insert_id($this->conn);
      }
     public function update($set,$id)
     {
         $sql="UPDATE $this->table SET $set WHERE id=$id";
         return mysqli_query($this->conn,$sql);
     }
     public function delete($id)
     {
       $sql="delete from $this->table WHERE id=$id";
       return mysqli_query($this->conn,$sql);
     }
}

?>