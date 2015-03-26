<?php

if(empty($_GET['pagename']))
{
    die ("Access denied");
}

class Book
{
    public $customerName,$addStreet,$addRoad,$addZip,$addState,$addCity,$addCountry,$phone;
    public $email,$nID,$roomType,$checkInDate,$checkOutDate,$paymentType,$ccNum,$month,$year;
    public $noGuest;
    public function __construct() 
    {
        if(isset($_POST['customerName']))
        {
            $this->customerName=$_POST['customerName'];
            $this->addStreet=$_POST['addStreet'];
            $this->addRoad=$_POST['addRoad'];
            $this->addZip=$_POST['addZip'];
            $this->addState=$_POST['addState'];
            $this->addCity=$_POST['addCity'];
            $this->addCountry=$_POST['addCountry'];
            $this->phone=$_POST['phone'];
            $this->email=$_POST['email'];
            $this->nID=$_POST['nID'];
            $this->roomType=$_POST['roomType'];
            $this->checkInDate=$_POST['checkInDate'];
            $this->checkOutDate=$_POST['checkOutDate'];
            $this->paymentType=$_POST['paymentType'];
            $this->ccNum=$_POST['ccNum'];
            $this->month=$_POST['month'];
            $this->year=$_POST['year'];
        }
        $this->noGuest=2;
    }
}
?>