<?php
class BillInfo
{
    private $mainBody,$customer,$bill,$paymentMethod,$pay,$roomRate;
    
    public function __construct($customerInfo,$bill,$paymentMethod,$pay,$roomRate)
     {
        $this->customer=mysqli_fetch_row($customerInfo);;
        $this->bill=$bill;
        $this->paymentMethod=$paymentMethod;
        $this->pay=$pay;
        $this->roomRate=$roomRate;
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setHotelInfo()
    {
       $this->mainBody.="<div align='center'><h1>রিপোর্ট</h1><b>শ্রীমঙ্গল হোটেল</b><br />মৌলভীবাজার, সিলেট<br /> ই-মেইল:xyz@gmail.com<br />ফোন:01717-xxyyzz<br /></div>";
    }

    private function setCustomerInfo()
    {
          $this->mainBody.="<div align='center'>অতিথি  আইডি : ".$this->customer[0]."<br />রিজার্ভেশন আইডি: ".$this->customer[1]."<br />";
          $this->mainBody.="নাম : ".$this->customer[2]."<br />রুম নং : ".$this->customer[3]."<br /> আসার দিন: ".$this->customer[4]."<br /> যাওয়ার দিন: ".$this->customer[5]."<br /><br /><br /></div>";
    }
    private function setBill()
    {
        $this->mainBody.="<div align='center'><table><tr><th>সার্ভিস</th> <th>প্রতি সার্ভিস মূল্য</th><th>মোট সার্ভিস</th><th>মূল্য</th></tr>";
         $sum =0;
         $this->mainBody.="<tr><td>রুম ভাড়া</td> <td>".  $this->roomRate."</td><td>1</td><td>".$this->roomRate."</td></tr>";
         $sum +=$this->roomRate;
         while($row=mysqli_fetch_row($this->bill))
        {
           $this->mainBody.="<tr><td>".$row[2]."</td> <td>".$row[4]."</td><td>".$row[3]."</td><td>".$row[3]*$row[4]."</td></tr>";
           $sum +=$row[3]*$row[4];
        }
           $this->mainBody.="<tr ><td colspan='3' align='right'>মোট</td><td >".$sum."</td></tr>";
           $this->mainBody.="<tr ><td colspan='3' align='right'>অগ্রিম</td><td >".$this->pay."</td></tr>";
           $this->mainBody.="<tr ><td colspan='3' align='right'>বকেয়া</td><td >".($sum-$this->pay)."</td></tr></table></div><br />";
    }
   private function setPaymentMethod()
   {
       $this->mainBody.="<div class='paymentTypeSelect' align='center'><form action='http://localhost/hms/index.php?pagename=onlinePay' method='post'><div>পেমেন্ট টাইপ</div><select><option value='paymentType' selected>পেমেন্ট টাইপ নির্বাচন করূন</option>";
        
       while($row=  mysqli_fetch_row($this->paymentMethod))
          {
              $this->mainBody.="<option value='".$row[0]."' name='paymentType'>".$row[0]."</option>";
          }
          $this->mainBody.="</div></select><br /><div class='submit'><input type='hidden' name='customerID' value='".$this->customer[0]."' /><input type='hidden' name='reservationID' value='".$this->customer[1] ."'/>"; 
         $this->mainBody.="<input type='hidden' name='itemname' value='পেমেন্ট' /><input type='submit' value='পরিশোধ'/></div>";
   }

   private function setMainBody()
    {
        $this->mainBody.="<div class='midlle'>";
        $this->setHotelInfo();
        $this->setCustomerInfo();
        $this->setBill();
        $this->setPaymentMethod();
        $this->mainBody.="</div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>

