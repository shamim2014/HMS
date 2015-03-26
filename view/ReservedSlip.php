<?php
class ReservationSlip
{
     private $mainBody,$customer,$bill,$pay;
    
    public function __construct($customerInfo,$bill,$pay)
     {
        $this->customer=mysqli_fetch_row($customerInfo);
        $this->bill=$bill;
        $this->pay=$pay;
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setHotelInfo()
    {
       $this->mainBody.="<div id='printableArea'><div align='center'><h1>রিপোর্ট</h1><b>শ্রীমঙ্গল হোটেল</b><br />মৌলভীবাজার, সিলেট<br /> ই-মেইল:xyz@gmail.com<br />ফোন:01717-xxyyzz<br /></div>";
    }

    private function setCustomerInfo()
    {
          $this->mainBody.="<div align='center'>অতিথি   আইডি : ".$this->customer[0]."<br />Reservation ID: ".$this->customer[1]."<br />";
          $this->mainBody.="Customer Name : ".$this->customer[2]."<br />Room No : ".$this->customer[3]."<br /> Arrival Date: ".$this->customer[4]."<br /> Departure Date: ".$this->customer[5]."<br /><br /><br /></div>";
    }
    private function setBill()
    {
        $this->mainBody.="<div align='center'><table><tr><th>সার্ভিস</th> <th>প্রতি সার্ভিস মূল্য</th><th>মোট সার্ভিস</th><th>মূল্য</th></tr>";
         $sum =0;
         
           $this->mainBody.="<tr><td>রুম ভাড়া</td> <td>".  $this->bill."</td><td>1</td><td>".$this->bill."</td></tr>";
           $sum +=$this->bill;
        
           $this->mainBody.="<tr ><td colspan='3' align='right'>মোট</td><td >".$sum."</td></tr>";
           $this->mainBody.="<tr ><td colspan='3' align='right'>পরিশোধ</td><td >".$this->pay."</td></tr>";
           $this->mainBody.="<tr ><td colspan='3' align='right'>বকেয়া</td><td >".($sum-$this->pay)."</td></tr></table></div><br />";
    }
   private function setAction()
   {
         $this->mainBody.="</div><div><button type='button' onclick='printDiv(\"printableArea\")'>প্রিন্ট</button></div>";
   }

   private function setMainBody()
    {
        $this->mainBody.="<script src='http://localhost/hms/JS/Action.js'></script><div class='midlle'>";
        $this->setHotelInfo();
        $this->setCustomerInfo();
        $this->setBill();
        $this->setAction();
        $this->mainBody.="</div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
