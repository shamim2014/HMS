<?php

if(defined("HMS"))
{
	include_once(dirname(dirname(__FILE__)) . '/model/metaData.php');
	include_once(dirname(dirname(__FILE__)) . '/view/Header.php');
	include_once(dirname(dirname(__FILE__)) . '/view/footer.php');
                   include_once(dirname(dirname(__FILE__)) . '/application/controller.php');

	$obj = new Controller();
	$page ="";
	
	if(isset($_GET['pagename']))
	{
		if(!strcmp($_GET['pagename'],"home"))
		{
			$page .= $obj->getHomePage();
		}
		else if(!strcmp($_GET['pagename'],"room"))
		{
			$page .= $obj->getRoomPage();
		}
		else if(!strcmp($_GET['pagename'],"service"))
		{
			$page .= $obj->getServicePage();
		}
                                    else if(!strcmp($_GET['pagename'],"reservation"))
		{
			$page .= $obj->getReservationPage();
		}
		else if(!strcmp($_GET['pagename'],"gallary"))
		{
			$page .= $obj->getGallaryPage();
		}
                else if(!strcmp($_GET['pagename'],"book"))
		{
			$page .= $obj->getBookPage();
		}
		else if(!strcmp($_GET['pagename'],"about"))
		{
			$page .= $obj->getAboutPage();
		}
                else if(!strcmp($_GET['pagename'],"login"))
		{                    
                                                         session_start();
                                                         if(isset($_SESSION['userID']))
                                                             $obj->getAdminWelComePage();
                                                         else 
			     $page .= $obj->getLoginPage();
		}
                else if(!strcmp($_GET['pagename'],"tariff"))
		{
			$page .= $obj->getTariffPage();
		}
                else if(!strcmp($_GET['pagename'],"paymentLog"))
		{
			$page .= $obj->getPaymentLogPage();
		}
                else if(!strcmp($_GET['pagename'],"adminInfo"))
		{
                                                         $ID = $_POST['userID'];
                                                         $pass = $_POST['pwd'];
			$page .= $obj->getAdminPage($ID,$pass);
		}
                                      else if(!strcmp($_GET['pagename'],"paymentInfo"))
		{
                                                         $reservationId = $_POST['reservationID'];
                                                         $cutomerId = $_POST['customerID'];
			$page .= $obj->getPaymentInfoPage($reservationId,$cutomerId);
		}
                                      else if(!strcmp($_GET['pagename'],"bookConfirmed")||!strcmp($_GET['pagename'],"paypal")||!strcmp($_GET['pagename'],"onlinePay"))
		{
			$page .= $obj->getBookConfirmedPage();
		}
                                      else if(!strcmp($_GET['pagename'],"logout"))
		{
			$page .= $obj->getHomePage();
		}
                                    else if(!strcmp($_GET['pagename'],"onlineBooking"))
		{
                                                         $checkIn =$_POST['checkInDate'];
                                                         $checkOut =$_POST['checkOutDate'];
                                                         $page .= $obj->showAvailableRoom($checkIn,$checkOut);                                                        
		}
	}
	else
	{
	   $page .= $obj->getHomePage();
	}

	echo $page; 
}
else
{
	die("Directory access is forbidden.");
}

 ?>

