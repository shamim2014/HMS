<?php
class Reservation 
{
    private $mainBody,$result,$result1;
    
    public function __construct($result,$result1)
     {
        $this->mainBody="";
        $this->result=$result;
        $this->result1=$result1;
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
              $this->mainBody.="<div class='middle'><div class='reserved'><form action='http://localhost/hms/index.php?pagename=book' method='post'><div class='info_name'> নাম</div><input type='text' name='customerName' /><br /><div class='info_name'>বাড়ী নং/গ্রাম</div><input type='text' name='addStreet' /><br />
                <div class='info_name'>রোড নং/ ইউনিয়ন</div><input type='text' name='addRoad' /><br /><div class='info_name'>পোষ্টাল কোড    </div><input type='text' name='addZip' /><br /><div class='info_name'>এলাকা/উপজেলা</div><input type='text' name='addState' /><br />
                <div class='info_name'>জেলা</div><input type='text' name='addCity' /><br />
                <div class='info_name'>দেশ</div> <input type='text' name='addCountry' /><br />
                <div class='info_name'>ফোন </div><input type='text' name='phone' /><br />
                <div class='info_name'> ই-মেইল</div><input type='text' name='email' /><br />
                <div class='info_name'>জাতীয় পরিচয় পত্র   </div><input type='text' name='nID' /><br />
                <div class='info_name'>কক্ষের ধরণ </div> <select name='roomType'> 
                    <option value='roomType' selected>কক্ষের ধরণ নির্বাচন করূন</option>";
           
          while($row=  mysqli_fetch_row($this->result))
          {
              $this->mainBody.="<option value='".$row[1]."' >".$row[1]."</option>";
          }
       $this->mainBody.="</select><br /><div class='info_name'>আগমনের তারিখ </div><select name ='checkInDate'><option value='checkInDate' selected>তারিখ নির্বাচন করূন</option>";
       for($i=0;$i<=90;$i++)
       {
           $d = date("Y-m-d",  time()+$i*86400);
           $this->mainBody.="<option value='".$d. "' >".$d."</option>";
       }
       $this->mainBody.="</select><br /><div class='info_name'>প্রস্থানের তারিখ </div><select name ='checkOutDate'><option value='checkOutDate' selected>তারিখ নির্বাচন করূন</option>";
        for($i=0;$i<=90;$i++)
       {
           $d = date("Y-m-d",  time()+$i*86400);
           $this->mainBody.="<option value='".$d. "' >".$d."</option>";
       }     
       $this->mainBody.="</select><br /><div class='info_name'> ক্রেডিট কার্ড  </div><select name='paymentType'><option value='paymentType' selected>কার্ড   নির্বাচন করূন</option>";
        
       while($row=  mysqli_fetch_row($this->result1))
          {
              $this->mainBody.="<option value='".$row[0]."' >".$row[0]."</option>";
          }
          $this->mainBody.="</select><br /><div class='info_name'>ক্রেডিট কার্ড নাম্বার </div><input type='text' name='ccNum' /><br />
           <div class='info_name'>ক্রেডিট কার্ডের শেষ তারিখ</div><select name='month'><option value='ccExp' selected>মাস নির্বাচন করূন</option>";
         for($i=1;$i<=12;$i++)
        {
                 $this->mainBody.="<option value='".$i."' >".$i."</option>";
        }
         $this->mainBody.="</select><select name ='year'><option value='ccExp' selected>বছর নির্বাচন করূন</option>";
          for($i=0;$i<=10;$i++)
       {
           $d = date("Y",  time()+$i*86400*30*12);
           $this->mainBody.="<option value='".$d. "' >".$d."</option>";
       } 
        $this->mainBody.="</select><br /><div class='submit'><input type='submit' value='জমা'/></div><br /></form></div></div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
