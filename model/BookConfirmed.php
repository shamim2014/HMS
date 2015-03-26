<?php

include_once(dirname(__FILE__) . '/Book.php');
class BookConfirmed extends Book
{
    public $roomNumber,$charge,$customerID,$reservationID,$type;
    
    public function __construct($booking) 
    {
        parent::__construct();
        if(isset($_POST['roomNumber']))
        {
            $this->roomNumber=$_POST['roomNumber'];
            $this->charge=$_POST['roomRate'];
        }
        else if(isset ($_POST['customerID']))
        {
            $this->customerID=$_POST['customerID'];
            $this->reservationID=$_POST['reservationID'];
        }
        $this->type=$booking;
    }
    public function setCustomerInfo($info)
    {
        $this->customerID=$info[0];
        $this->reservationID=$info[1];
        $this->customerName=$info[2];
        $this->roomNumber=$info[3];
        $this->checkInDate=$info[4];
        $this->checkOutDate=$info[5];
    }
    public function setCardInfo($info)
    {
        $this->ccNum=$info[0];
        $str =  explode('-', $info[1]);
        $this->month=$str[0];
        $this->year=$str[1];
    }
}
?>