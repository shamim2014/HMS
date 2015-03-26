<?php
   if(!defined("HMS"))
   {
	   die("Directory access is forbidden.");
   }
    class Header
    {
        private $view="";
        private $menu="";
        private $logo="";
        private $css ="";
        public function __construct() 
        {
			$this->view="";
			
            $this->setLogo();
			$this->setMenu();
        }
        private function setLogo()
        {
            $this->logo="";
            $this->logo.="</center><div class='header'><div class='icon'>";
            $this->logo.="<img src='http://localhost/hms/Images/logo.jpg' alt='logo' width='60' height='60' /><p>Hotel</p></div>";
        }
        private function setMenu()
        {
            $this->menu=""; 
            $this->menu.="<div class ='menu'>";
            $this->menu.="<ul><li><a href='http://localhost/hms/index.php?pagename=home'>হোম</a></li>";
            $this->menu.="<li><a href='http://localhost/hms/index.php?pagename=room'>রুম</a></li><li><a href='http://localhost/hms/index.php?pagename=service'>সার্ভিস</a></li>";
            $this->menu.="<li><a href='http://localhost/hms/index.php?pagename=reservation'>রিজার্ভ</a></li><li><a href='http://localhost/hms/index.php?pagename=tariff'>ট্যারিফ</a></li>";    
            $this->menu.="<li><a href='http://localhost/hms/index.php?pagename=gallary'>গ্যালারি</a></li>";
            $this->menu.="<li><a href='http://localhost/hms/index.php?pagename=paymentLog'>পেমেন্ট</a></li><li><a href='http://localhost/hms/index.php?pagename=login'>লগ ইন</a></li>";
            $this->menu.="</ul></div></div>";
        }

        public function getHeader()
        {
            $this->view.=$this->logo;
            $this->view.=$this->menu;
            return $this->view;
        }
    }
    
    //$obj = new Header();
    //echo $obj->getHeader();
?>
