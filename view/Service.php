<?php
class Service 
{
 private $mainBody,$result;
    
    public function __construct($result)
     {
        $this->mainBody="";
        $this->result=$result;
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
        $this->mainBody.="<div class='middle'>";
        while($row=mysqli_fetch_row($this->result))
        {
            $this->mainBody.="<div class='service'><div class='description'><h2><a href='#'>".$row[1]."</a></h2>".$row[2]."</div>";
            $this->mainBody.="<div class='service_price'>সার্ভিস  চার্জ  : ".$row[3]."</div></div>";
      }
      $this->mainBody.="</div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
