<?php
class HomeBody
{
    private $mainBody;
    
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
        $this->mainBody .="<div class='middle'><div class='homeBody'>";
        $this->mainBody .="<div class='himage' align='center'><img src='http://localhost/hms/Images/banner.jpg' alt='logo' /></div>";
        $this->mainBody .="<div class='infoAndSerach'><div class='overview'><h1>অভ্যর্থনা</h1>";
        $this->mainBody .="<hr />হোটেল সোনার বাংলায় আপনাকে  স্বাগতম ।  হোটেল সোনার  বাংলা বাংলাদেশের   অন্যতম   পাঁচ তারকা    হোটেল  ।   </div>";
        $this->mainBody .="<div class='onlineBooking'><h1>অনলাইন বুকিং</h1><hr /><div>";
        $this->mainBody .="<form action='http://localhost/hms/index.php?pagename=onlineBooking' method='post'><br />";
        $this->mainBody .="<div class='checkIn'><div>চেক-ইন-ডেট</div>";
        $this->mainBody .="<div><select name='checkInDate'><option value='";
        $this->mainBody .=date("Y-m-d")."'";
        $this->mainBody .=" selected>".date("Y-m-d")."</option>";
            for($i=1;$i<=90;$i++)
            {
                $this->mainBody .="<option value='";
                $this->mainBody .=date("Y-m-d",  time()+$i*86400);
                $this->mainBody .="'>";
                $this->mainBody .=date("Y-m-d",  time()+$i*86400);
                $this->mainBody .="</option>";
            } 
              $this->mainBody .="</select></div></div><div class='checkIn'><div>চেক- আউট-ডেট</div><div><select name='checkOutDate'><option value='";
              $this->mainBody .=date("Y-m-d")."'";
              $this->mainBody .="selected>".date("Y-m-d")."</option>";
              for($i=1;$i<=90;$i++)
            {
                $this->mainBody .="<option value='";
                $this->mainBody .=date("Y-m-d",  time()+$i*86400);
                $this->mainBody .="'>";
                $this->mainBody .=date("Y-m-d",  time()+$i*86400);
                $this->mainBody .="</option>";
            } 
            $this->mainBody .="</select></div></div><br /><div class='search'><input type='submit' value='অনুসন্ধান>>' /></div><br /></form>";
            $this->mainBody .="</div></div></div></div></div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
