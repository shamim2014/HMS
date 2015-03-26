<?php

class CustomerInfoInsert
{
    private $mainBody;
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
         $this->mainBody.="<div class='customer_info_insert'><form action='http://localhost/hms/Admin/index.php?pagename=customerInfo' method='post' >
              <div class='customer_label'>নাম </div><div class='customer_input'><input type='text' name='customerName' /></div><br />
              <div class='customer_label'>বাড়ী নং/গ্রাম</div><div class='customer_input'> <input type='text' name='addStreet' /></div><br />
             <div class='customer_label'> রোড নং/ ইউনিয়ন </div><div class='customer_input'> <input type='text' name='addRoad' /></div><br />
             <div class='customer_label'> পোষ্টাল কোড </div><div class='customer_input'> <input type='text' name='addZip' /></div><br />
             <div class='customer_label'> এলাকা/উপজেলা </div><div class='customer_input'> <input type='text' name='addState' /></div><br />
             <div class='customer_label'> জেলা </div><div class='customer_input'> <input type='text' name='addCity' /></div><br />
            <div class='customer_label'> দেশ </div><div class='customer_input'> <input type='text' name='addCountry' /></div><br />
            <div class='customer_label'> ফোন </div><div class='customer_input'> <input type='text' name='phone' /></div><br />
            <div class='customer_label'> ই-মেইল </div><div class='customer_input'> <input type='text' name='email' /></div><br />
           <div class='customer_label'> জাতীয় পরিচয় পত্র   </div><div class='customer_input'> <input type='text' name='nID' /></div><br />
             <div class='customer_label'>ক্রেডিট কার্ড নাম্বার  </div><div class='customer_input'><input type='text' name='ccNum' /></div><br />
             <div class='cust_label'>ক্রেডিট কার্ডের শেষ তারিখ</div><div class='customer_input'> <select name='month'><option value='ccExp' selected>মাস নির্বাচন করূন</option>";
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
        $this->mainBody.="</select><br /></div><br /><div class='customer_submit' ><input type='submit' value='জমা'/></div><br /></form></div></div></div>";
   
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>