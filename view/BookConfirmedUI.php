<?php
class BookConfirmedUI 
{
    private $mainBody,$book,$room;
    
    public function __construct($book,$room)
     {
        $this->mainBody="";
        $this->book=$book;
        $this->room=$room;
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
              $this->mainBody.="<div class='middle'><div class='reserved'><form action='http://localhost/hms/index.php?pagename=bookConfirmed' method='post'>";
              $this->mainBody.="<div class='info_name'> নাম</div><input type='text' name='customerName'  value='".$this->book->customerName."' readonly='readonly' /><br /><div class='info_name'>বাড়ী নং/গ্রাম</div><input type='text' name='addStreet' value='".$this->book->addStreet."' readonly='readonly' /><br />
                <div class='info_name'>রোড নং/ ইউনিয়ন</div><input type='text' name='addRoad'  value='".$this->book->addRoad."' readonly='readonly'/><br /><div class='info_name'>পোষ্টাল কোড    </div><input type='text' name='addZip' value='".$this->book->addZip."' readonly='readonly' /><br /><div class='info_name'>এলাকা/উপজেলা</div><input type='text' name='addState' value='".$this->book->addState."' readonly='readonly' /><br />
                <div class='info_name'>জেলা</div><input type='text' name='addCity' value='".$this->book->addCity."' readonly='readonly' /><br />
                <div class='info_name'>দেশ</div> <input type='text' name='addCountry' value='".$this->book->addCountry."' readonly='readonly' /><br />
                <div class='info_name'>ফোন </div><input type='text' name='phone' value='".$this->book->phone."' readonly='readonly' /><br />
                <div class='info_name'> ই-মেইল</div><input type='text' name='email' value='".$this->book->email."' readonly='readonly' /><br />
                <div class='info_name'>জাতীয় পরিচয় পত্র   </div><input type='text' name='nID' value='".$this->book->nID."' readonly='readonly' /><br />
                <div class='info_name'>কক্ষের ধরণ </div> <input type='text' name='roomType' value='".$this->book->roomType."' readonly='readonly' /><br />
                <div class='info_name'>রুম নাম্বর  </div> <input type='text' name='roomNumber' value='".$this->room[0]."' readonly='readonly' /><br />
               <div class='info_name'>রুম ভাড়া </div> <input type='text' name='roomRate' value='".$this->room[1]."' readonly='readonly' /><br />
                <div class='info_name'>আগমনের তারিখ </div><input type='text' name='checkInDate' value='".$this->book->checkInDate."' readonly='readonly' /><br />
                <div class='info_name'>প্রস্থানের তারিখ </div><input type='text' name='checkOutDate' value='".$this->book->checkOutDate."'  readonly='readonly' /><br />
                <div class='info_name'> ক্রেডিট কার্ড  </div><input type='text' name='paymentType' value='".$this->book->paymentType."'  readonly='readonly' /><br />
                <div class='info_name'>ক্রেডিট কার্ড নাম্বার </div><input type='text' name='ccNum' value='".$this->book->ccNum."'  readonly='readonly' /><br />
               <div class='info_name'>ক্রেডিট কার্ডের মেয়াদ</div><input type='text' name='month' value='".$this->book->month."'  readonly='readonly' />
                 <input type='hidden' name='itemname' value='বুকিং' />
               <input type='text' name='year' value='".$this->book->year."' readonly='readonly /><br /><br /><div class='submit'><input type='submit' value='জমা'/></div><br /></form></div></div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
