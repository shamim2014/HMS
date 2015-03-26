<?php

class Gallery 
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
            $this->mainBody.="<div align='center' class='gallery'><img src='".$row[1]."' alt='image' /></div>";
  
         }
      $this->mainBody.="</div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>