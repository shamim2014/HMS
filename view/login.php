<?php

class Login
{
    private $loginPage="";
    
    public function __construct() 
    {
            $this->setLoginPage();
    }
    private function setLoginPage()
    {
        $this->loginPage="";
        $this->loginPage.="<div class='Login'><form action='controller.php' method='post'><br />";
        $this->loginPage.="Login ID : <input type='text' name='loginID' /><br />";
        $this->loginPage.="Password : <input type='password' name='pwd' /><br />";
        $this->loginPage.="<input type='submit' value='Submit'/><br />";
        $this->loginPage.="</form>";
        $this->loginPage.="</div>";
    }
    public function getLogin()
    {
        return $this->loginPage;
    }
}
$obj=new Login();
echo $obj->getLogin();
?>
