<?php

class RoomInfoInsert
{
     private $mainBody;
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
         $this->mainBody.="<div class='room_info_insert'><form action='http://localhost/hms/Admin/index.php?pagename=roomInfoInsert' method='post' enctype='multipart/form-data'>
              <div class='room_label'>কক্ষ নং </div><div class='room_input'><input type='text' name='roomNumber' /></div><br />
              <div class='room_label'>কক্ষের ধরণ নং</div><div class='room_input'> <input type='text' name='roomTypeId' /></div><br />
             <div class='room_label'> কক্ষের ধরণ </div><div class='room_input'> <input type='text' name='roomType' /></div><br />
             <div class='room_label'> কক্ষের বর্ণনা</div><div class='room_input'> <textarea rows='10' cols='50' name='roomDesc'> </textarea></div><br />
             <div class='room_label'><label for='file'>ফটো</label></div><div class='room_input'><input type='file' name='file' id='file'></div><br>
             <div class='room_label'>শয্যা  সংখ্যা   </div><div class='room_input'><input type='text' name='numBeds' /></div><br />
             <div class='room_label'>কক্ষের ভাড়া</div><div class='room_input'> <input type='text' name='roomRate' /></div><br />
               <div class='room_submit' ><input type='submit' value='জমা'/></div><br />
            </form></div></div></div>";
   
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>

