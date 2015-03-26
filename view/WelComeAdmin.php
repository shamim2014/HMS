<?php
class WelComeAdmin
{
     private  $page;
    
    public function __construct() 
    {
        $this->setPage();
     }
     private function setPage()
     {
         $this->page="";
         $this->page.="<div class='admin_Welcome' align='center'> এ্যাডমিনিস্ট্যাশন পেইজে স্বাগতম</div></div></div>";
      }
     public function  getWelcomePage()
     {
         return $this->page;
     }
}
