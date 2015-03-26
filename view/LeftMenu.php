<?php

class LeftMenu 
{
    private  $menu;
    
    public function __construct() 
    {
        $this->setMenu();
     }
     private function setMenu()
     {
         $this->menu="<div class='middle'><div class='admin_menu'>";
         $this->menu .="<div class='left_buttion'> <ul><li><a href='http://localhost/hms/Admin/index.php?pagename=room'>কক্ষ </a>";
         $this->menu .=" <ul><li><a href='http://localhost/hms/Admin/index.php?pagename=room_info'>নতুন তথ্য  </a> </li> <li><a href='http://localhost/hms/Admin/index.php?pagename=room_edit' >তথ্য   সংযোজন     </a> </li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=room_update' > তথ্য   হাল নাগাদ</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=room_status' >কক্ষের অবস্থা</a></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=room_tarif' >কক্ষের ভাড়া</a></li></ul> </li><li><a href='http://localhost/hms/Admin/index.php?pagename=service'>সেবা</a>";
         $this->menu .="<ul><li><a href='http://localhost/hms/Admin/index.php?pagename=new_service'>নতুন সেবা</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=service_edit' >তথ্য   সংযোজন</a> </li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=service_update' > তথ্য   হাল নাগাদ</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=services' >সেবাসমূহ</a></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=service_tarif' >সেবার মূল্্য</a></li></ul></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=customer'>অতিথি </a> <ul><li><a href='http://localhost/hms/Admin/index.php?pagename=new_customer'>নতুন অতিথি</a> </li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=customer_reserved' >রিজার্ভ</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=customer_update' > তথ্য   হাল নাগাদ</a></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=customers' >অতিথিসমূহ</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=customer_info' >অতিথির তথ্য   </a></li>";
         $this->menu .="</ul></li><li><a href='http://localhost/hms/Admin/index.php?pagename=bill'>বিল</a><ul><li><a href='http://localhost/hms/Admin/index.php?pagename=new_bill'>নতুন বিল</a></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=bill_edit' >বিল সংযোজন</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=bill_update' > বিল হাল নাগাদ</a></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=bills' >বিলসমূহ</a></li></ul></li><li><a href='http://localhost/hms/Admin/index.php?pagename=checkin'>হাজিরা</a></li><li><a href='http://localhost/hms/Admin/index.php?pagename=checkout'>প্রস্থান</a></li>";
         $this->menu .="<li><a href='http://localhost/hms/Admin/index.php?pagename=photo'>ফটো আপলোড</a></li></ul></div>";
     }
     public function  getMenu()
     {
         return $this->menu;
     }
}
?>
