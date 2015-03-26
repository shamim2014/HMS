<?php


class ServiceInfoInsert 
{
     private $mainBody;
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
       $this->mainBody.="<div class='room_info_insert'><form action='http://localhost/hms/Admin/index.php?pagename=serviceInfoInsert' method='post' >
              <div class='room_label'>সেবার ধরণ নং </div><div class='room_input'><input type='text' name='serviceTypeID' /></div><br />
              <div class='room_label'>সেবার নাম </div><div class='room_input'> <input type='text' name='serviceName' /></div><br />
             <div class='room_label'>বর্ণনা</div><div class='room_input'> <textarea rows='10' cols='50' name='description'> </textarea></div><br />
             <div class='room_label'>মূল্য </div><div class='room_input'> <input type='text' name='price' /></div><br />
               <div class='room_submit' ><input type='submit' value='জমা'/></div><br />
            </form></div></div></div>";
       }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
