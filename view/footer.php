<?php
class Footer
{
   private $footer;
   public function __construct()
   {
      $this->setFooter();   
   }
   private function setFooter()
   {
    $this->footer="";
    $this->footer.="<div class='footer' align='center'><hr />যোগাযোগ : হোটেল শ্রীমঙ্গল,মৌলভীবাজার, সিলেট,Tel: +88 xx xxxxxxx Fax: +88 xx xx-xxxx Email: xyz@gmail.com</div>";

    $this->setEnd();
   }
   private function setEnd()
   {
	   $this->footer .= "</body></html>";
   }
   public function getFooter()
   {
      return $this->footer;
   }
 }
 
?>
