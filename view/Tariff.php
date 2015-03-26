<?php
class Tariff
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
        $this->mainBody .="<div class='horizontal'><div class='room_name'>রূম</div><div class='room_charge'>ভাড়া</div></div>";
        while($row=mysqli_fetch_row($this->result))
        {
            $this->mainBody .="<div class='horizontal'><div class='room_name'>".$row[1]."</div><div class='room_charge'>".$row[3]."</div></div>";
         }
      $this->mainBody.="</div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>

