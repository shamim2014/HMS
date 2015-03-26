<?php
class AdminLog 
{
  private $mainBody;
    
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
        $this->mainBody.="<div class='middle'><div align='center'>";
        $this->mainBody.="<br /><div>নিচের তথ্যগুলি পূরণ করুন</div><br />";
        $this->mainBody.="<form action='http://localhost/hms/index.php?pagename=adminInfo' method='post'>";
        $this->mainBody.="<div>আইডি :<input type='text' name='userID' /></div><br />";
       $this->mainBody.="<div>পাসওয়ার্ড : <input type='password' name='pwd' /></div><br />";
       $this->mainBody.="<div><input type='submit' value='জমা'/></div><br /></form>";
       $this->mainBody.="</div></div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
    public function setErrorInfo()
    {
         $this->mainBody="";
        $this->mainBody.="<div class='middle'><div align='center'>";
        $this->mainBody.="<br /><div>আইডি/পাসওয়ার্ড  ভূল আছে ।</div><br />";
        $this->mainBody.="<br /><div>নিচের তথ্যগুলি পূরণ করুন</div><br />";
        $this->mainBody.="<form action='http://localhost/hms/index.php?pagename=adminInfo' method='post'>";
        $this->mainBody.="<div>আইডি :<input type='text' name='userID' /></div><br />";
       $this->mainBody.="<div>পাসওয়ার্ড : <input type='password' name='pwd' /></div><br />";
       $this->mainBody.="<div><input type='submit' value='জমা'/></div><br /></form>";
       $this->mainBody.="</div></div>";
    }
}
?>