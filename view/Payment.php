<?php
class PaymentLog 
{
   private $mainBody;
    
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
        $this->mainBody.="<div align='center'>";
        $this->mainBody.="<br /><div>নিচের তথ্যগুলি পূরণ করুন</div><br />";
        $this->mainBody.="<form action='http://localhost/hms/Admin/index.php?pagename=paymentInfo' method='post'>";
        $this->mainBody.="<div>বুকিং  আইডি :<input type='text' name='reservationID' /></div><br />";
       $this->mainBody.="<div>অতিথি   আইডি : <input type='text' name='customerID' /></div><br />";
       $this->mainBody.="<div><input type='submit' value='জমা'/></div><br /></form>";
       $this->mainBody.="</div></div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>