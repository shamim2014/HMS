<?php
class Database
{
    private $db;
    private $pass;
    private $user;
    private $host;
    private $con;
    public function __construct() 
    {
        $this->host ="localhost";
        $this->user ="root";
        $this->pass ="";
        $this->db = "HMS";
        $this->con ="";
        $this->connect();
    }
    private function connect()
    {
       $this->con = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
       if(mysqli_connect_errno())
        {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		
		mysqli_set_charset($this->con, 'utf8');
        mysqli_query($this->con, "SET NAMES 'utf8';");
        mysqli_query($this->con, "SET CHARACTER SET 'utf8';");
        mysqli_query($this->con, "SET COLLATION_CONNECTION = 'utf8_general_ci';");

		echo mysqli_error($this->con);
    }
    public function close()
    {
        mysqli_close($this->con);
    }
    public function insert($sql)
    {
          return  $this->query($sql);
		  
    }
    private function query($sql)
    {
         $result = mysqli_query($this->con,$sql);
       /* if(!$result)
         {
            die("SQL Error: " . mysqli_error($result));
          }
         else
        {
           $result=1;
         }*/
		 
          return  $result;
    }
    public function select($sql)
    {
        $result = mysqli_query($this->con,$sql);
        if(!$result)
         {
            die("SQL Error: " . mysqli_error($result));
          }
          return  $result;
    }
    public function delete($sql)
    {
        return  $this->query($sql);
    }
    public function update($sql)
    {
       return  $this->query($sql);
    }
}
?>
