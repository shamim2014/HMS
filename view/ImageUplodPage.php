<?php
class ImageUplodPage 
{
    private $mainBody;
    
    public function __construct()
     {
        $this->mainBody="";
        $this->setMainBody() ;
    }
    private function setMainBody()
    {
        $this->mainBody.="<div  class='upload_info_insert'>";
        $this->mainBody.="<br /><div class='upload_h'>নিচের তথ্যগুলি পূরণ করুন</div><br />";
        $this->mainBody.="<form action='http://localhost/hms/Admin/index.php?pagename=imageUpload' method='post'  enctype='multipart/form-data'>";
        $this->mainBody.="<div class='upload_label'> আইডি</div><div class='upload_input'><input type='text' name='ID' /></div><br />";
       $this->mainBody.="<div class='upload_label'><label for='file'>ফটো</label></div><div class='upload_input'><input type='file' name='file' id='file'></div><br>";
       $this->mainBody.="<div class='upload_submit' ><input type='submit' value='জমা'/></div><br /></form>";
       $this->mainBody.="</div></div></div>";
    }
    public function getMainBody()
    {
        return $this->mainBody;
    }
}
?>
