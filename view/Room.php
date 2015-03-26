<?php
class Room
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
            $this->mainBody.="<div class='room'><div class='room_info'><div class='description'><h2><a href='#'>".$row[1]."</a></h2>".$row[2]."</div>";
            $this->mainBody.="<div class='room_price'>ভাড়া : ".$row[3]."</div><div class='room_no'>বিছানার সংখ্যা : ".$row[5]."</div></div>";
           $this->mainBody.="<div class='room_pic'><img src='".$row[4]."' alt='logo' width='360' height='360' /></div></div>";
      }
      $this->mainBody.="</div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
