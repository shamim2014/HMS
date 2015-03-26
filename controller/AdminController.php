<?php
if(defined("ADMIN")&&isset($_SESSION['userID']))
{
	include_once(dirname(dirname(__FILE__)) . '/model/metaData.php');
	include_once(dirname(dirname(__FILE__)) . '/view/AdminHeader.php');
	include_once(dirname(dirname(__FILE__)) . '/view/footer.php');
                   include_once(dirname(dirname(__FILE__)) . '/view/LeftMenu.php');
                   include_once(dirname(dirname(__FILE__)) . '/application/Admin.php');
                   $obj = new AdminController();
	$page ="";
                   if(isset($_GET['pagename']))
	{
		if(!strcmp($_GET['pagename'],"adminInfo")||!strcmp($_GET['pagename'],"login"))
		{
			$page .= $obj->getWelComePage();
		}
                                       else if(!strcmp($_GET['pagename'],"new_bill"))
		{
			$page .= $obj->getPaymentLogPage();
		}
                                     else if(!strcmp($_GET['pagename'],"paymentInfo"))
		{
                                                         $reservationId = $_POST['reservationID'];
                                                         $cutomerId = $_POST['customerID'];
			$page .= $obj->getPaymentInfoPage($reservationId,$cutomerId);
		}
                                     else if(!strcmp($_GET['pagename'],"cashPay"))
		{
                                                         $reservationId = $_POST['reservationID'];
                                                         $cutomerId = $_POST['customerID'];
                                                         $paid =$_POST['pay'];
			$page .= $obj->getPaymentSlip($reservationId,$cutomerId,$paid);
		}
                                      else if(!strcmp($_GET['pagename'],"logout"))
		{
			$page .= $obj->getLogOutPage();
		}
                                     else if(!strcmp($_GET['pagename'],"room_info"))
		{
			$page .= $obj->getRoomInfoInsertPage();
		}
                                     else if(!strcmp($_GET['pagename'],"roomInfoInsert"))
		{
			$page .= $obj->getRoomInfoInsert();
		}
                                      else if(!strcmp($_GET['pagename'],"new_service"))
		{
			$page .= $obj->getServiceInfoInsertPage();
		}
                                     else if(!strcmp($_GET['pagename'],"serviceInfoInsert"))
		{
			$page .= $obj->getServiceInfoInsert();
		}
                                     else if(!strcmp($_GET['pagename'],"checkin"))
		{
			$page .= $obj->getCheckinLogPage();
		}
                                      else if(!strcmp($_GET['pagename'],"CheckInInfo"))
		{
                                                         $reservationId = $_POST['reservationID'];
                                                         $cutomerId = $_POST['customerID'];
			$page .= $obj->getCheckinPage($reservationId,$cutomerId);
		}
                                     else if(!strcmp($_GET['pagename'],"checkout"))
		{
			$page .= $obj->getCheckOutLogPage();
		}
                                      else if(!strcmp($_GET['pagename'],"CheckOutInfo"))
		{
                                                         $reservationId = $_POST['reservationID'];
                                                         $cutomerId = $_POST['customerID'];
			$page .= $obj->getCheckOutPage($reservationId,$cutomerId);
		}
                                       else if(!strcmp($_GET['pagename'],"new_customer"))
		{
			$page .= $obj->getNewCustomerPage();
		}
                                      else if(!strcmp($_GET['pagename'],"customerInfo"))
		{
			$page .= $obj->getCustomerInfoInsertPage();
		}
                                      else if(!strcmp($_GET['pagename'],"photo"))
		{
			$page .= $obj->getImageUploadPageUI();
		}
                                      else if(!strcmp($_GET['pagename'],"imageUpload"))
		{
			$page .= $obj->getImageUploadPage();
		}
                                       else if(!strcmp($_GET['pagename'],"customer_reserved"))
		{
			$page .= $obj->getDirectReservedPage();
		}
                                      else if(!strcmp($_GET['pagename'],"booked"))
		{
			$page .= $obj->getBookPage();
		}
                                      else if(!strcmp($_GET['pagename'],"bookedConfirmed"))
		{
			$page .= $obj->getBookConfirmedPage();
		}
                   }
	echo $page; 
}
else
{
	die("Directory access is forbidden.");
}

?>
