<?php

class AdminController
{
    private $webPage;
	
    public function __construct() 
    {
        $meta = new MetaData("হোটেল");
        $this->webPage="";
        $this->webPage .= $meta->getMetaData();
    }
    public function getWelComePage()
    {
         include_once(dirname(dirname(__FILE__)) . '/view/WelComeAdmin.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
       $this->webPage .= $menu->getMenu();
        $welcome = new WelComeAdmin();
        $this->webPage .=$welcome->getWelcomePage();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getPaymentLogPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Payment.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $paymentLog = new PaymentLog();
        $this->webPage .=$paymentLog->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
     public function getPaymentInfoPage($reservationId,$customerId)
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Bill.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $data = new Data();
        $result1 = $data->selectBillCustomerInfo($reservationId,$customerId);
        $result2 = $data->selectBill($reservationId);
        $result3 = $data->selectAvailablePaymentType();
        $pay = $data->getTotalPayed($reservationId);
        $roomRate=$data->getRoomRate($reservationId);
        $paymentLog = new BillInfo($result1, $result2, $result3,$pay,$roomRate);
        $data->close();
        $this->webPage .=$paymentLog->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getPaymentSlip($reservationId,$customerId,$paid)
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Bill.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $data = new Data();
        $data->setPayment($paid, $reservationId);
        $result1 = $data->selectBillCustomerInfo($reservationId,$customerId);
        $result2 = $data->getRoomRate($reservationId);
        $bill = $data->selectBill($reservationId);
        $pay = $data->getTotalPayed($reservationId);
        $roomRate=$data->getRoomRate($reservationId);
         include_once(dirname(dirname(__FILE__)) . '/view/PaymentSlip.php');
        $paymentSlip= new PaymentSlip($result1, $bill, $result2, $pay);
        $this->webPage .=$paymentSlip->getMainBody();         
        $data->close();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getLogOutPage()
    {
        session_destroy();
        include_once(dirname(dirname(__FILE__)) . '/index.php');
        return $this->webPage;
    }
    public function getRoomInfoInsertPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/RoomInfoInsert.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
          $this->webPage .= $menu->getMenu();
       $roomInfoInsert = new RoomInfoInsert();
       $this->webPage .= $roomInfoInsert->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
     public function getRoomInfoInsert()
    {
                include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
                $roomNumber =$_POST['roomNumber'];
                $roomTypeId  = $_POST['roomTypeId'];
                $roomType    = $_POST['roomType'];
                $roomDesc   =$_POST['roomDesc'];
                $numBeds   =$_POST['numBeds'];
                $roomRate =$_POST['roomRate'];

               $allowedExts = array("gif", "jpeg", "jpg", "png");
               $temp = explode(".", $_FILES["file"]["name"]);
               $extension = end($temp);

          if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/x-png")|| ($_FILES["file"]["type"] == "image/png"))&& ($_FILES["file"]["size"] < 50000)&& in_array($extension, $allowedExts)) 
         {
              if ($_FILES["file"]["error"] > 0) 
              {
                      die( "Return Code: " . $_FILES["file"]["error"] . "<br>");
               } 
               else 
               {
                  if (file_exists(dirname(dirname(__FILE__))."/Images/". $_FILES["file"]["name"]))
                  {
                        ;
                   }
                   else 
                   {
                       move_uploaded_file($_FILES["file"]["tmp_name"],dirname(dirname(__FILE__))."/Images/". $_FILES["file"]["name"]);
                   }
                }
          }
          else 
          {
            die( "Invalid file");
          }
          $path="http://localhost/hms/Images/". $_FILES["file"]["name"];
         $data = new Data();
         $result=$data->setRoomInfo($roomNumber, $roomTypeId, $roomType, $roomDesc, $numBeds, $roomRate, $path);
        if($result==TRUE)
        {
            echo "<script>alert('নতুন রুমের তথ্য  ডাটাবেজে রাখা হয়েছে ।')</script>";
        }
      else
          {
              echo "<script>alert('নতুন রুমের তথ্য  ডাটাবেজে সংরক্যিত হয়নি ।')</script>";
          }
          $data->close();
          return $this->getRoomInfoInsertPage();
    }
    public function getServiceInfoInsert()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $serviceTypeID =$_POST['serviceTypeID'];
        $serviceName =$_POST['serviceName'];
        $description = $_POST['description'];
        $price =$_POST['price'];
        $data = new Data();
        $result = $data->setServiceInfo($serviceTypeID,$serviceName,$description,$price);
        if($result==TRUE)
        {
            echo "<script>alert('নতুন সেবার তথ্য  ডাটাবেজে রাখা হয়েছে ।')</script>";
        }
      else
        {
              echo "<script>alert('নতুন সেবার তথ্য  ডাটাবেজে সংরক্যিত হয়নি ।')</script>";
         }
        $data->close();
        return $this->getServiceInfoInsertPage();
        
    }
    public function getServiceInfoInsertPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/ServiceInfoInsert.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $serviceInfoInsert = new ServiceInfoInsert();
       $this->webPage .= $serviceInfoInsert->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getCheckinLogPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/CheckInLog.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $checkInLog = new CheckInLog();
        $this->webPage .=$checkInLog->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getCheckOutLogPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/CheckOutLog.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $checkOutLog = new CheckOutLog();
        $this->webPage .=$checkOutLog->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getCheckinPage($reservationId,$customerId)
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $data = new Data();
        $result = $data->setCheckIn($reservationId, $customerId);
        if($result==TRUE)
        {
            echo "<script>alert('চেক-ইন সম্পন হয়েছে ।')</script>";
        }
       else
        {
              echo "<script>alert('ডাটাবেজে সংরক্যিত হয়নি ।')</script>";
         }
        $data->close();
        return $this->getCheckinLogPage();
    }
    public function getCheckOutPage($reservationId,$customerId)
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $data = new Data();
        $result = $data->setCheckOut($reservationId, $customerId);
        $data->close();
        if($result==TRUE)
        {
            return $this->getPaymentInfoPage($reservationId,$customerId);
        }
       else
        {
              echo "<script>alert('চেক-আউট সম্পন হয়নি ।')</script>";
              return $this->getCheckOutLogPage();
         }
         
    }
    public function getNewCustomerPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/CustomerInfoInsert.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $customerInfoInsert = new CustomerInfoInsert();
        $this->webPage .=$customerInfoInsert->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getCustomerInfoInsertPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $customerName =$_POST['customerName'];
        $addStreet =$_POST['addStreet'];
        $addRoad =$_POST['addRoad'];
        $addZip    =$_POST['addZip'];
        $addState =$_POST['addState'];
        $addCity = $_POST['addCity'];
        $addCountry =$_POST['addCountry'];
        $phone =$_POST['phone'];
        $email =$_POST['email'];
        $nID =$_POST['nID'];
        $ccNum = $_POST['ccNum'];
        $month =$_POST['month'];
        $year   =$_POST['year'];
        
        $data = new Data();
        $result = $data->insertCustomerInfo($customerName,$addStreet,$addRoad,$addZip,$addState,$addCity,$addCountry,$phone,$email,$nID,$ccNum,$month,$year);
        if($result==TRUE)
        {
            echo "<script>alert('অতিথির তথ্য   সংরক্ষিত হয়েছে ।')</script>";
        }
       else
        {
              echo "<script>alert('ডাটাবেজে সংরক্যিত হয়নি ।')</script>";
         }
        $data->close();
        return $this->getNewCustomerPage();
    }
    public function getImageUploadPageUI()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/ImageUplodPage.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $imageUplodPage = new ImageUplodPage();
        $this->webPage .=$imageUplodPage->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getImageUploadPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $ID =$_POST['ID'];
        $allowedExts = array("gif", "jpeg", "jpg", "png");
         $temp = explode(".", $_FILES["file"]["name"]);
         $extension = end($temp);

          if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/x-png")|| ($_FILES["file"]["type"] == "image/png"))&& ($_FILES["file"]["size"] < 50000)&& in_array($extension, $allowedExts)) 
         {
              if ($_FILES["file"]["error"] > 0) 
              {
                      die( "Return Code: " . $_FILES["file"]["error"] . "<br>");
               } 
               else 
               {
                  if (file_exists(dirname(dirname(__FILE__))."/Images/". $_FILES["file"]["name"]))
                  {
                        ;
                   }
                   else 
                   {
                       move_uploaded_file($_FILES["file"]["tmp_name"],"http://localhost/hms/Images/". $_FILES["file"]["name"]);
                   }
                }
          }
          else 
          {
            die( "Invalid file");
          }
          $path="http://localhost/hms/Images/". $_FILES["file"]["name"];
         $data = new Data();
         $result=$data->setImageInfo($ID,$path);
        if($result==TRUE)
        {
            echo "<script>alert('নতুন রুমের তথ্য  ডাটাবেজে রাখা হয়েছে ।')</script>";
        }
      else
          {
              echo "<script>alert('নতুন রুমের তথ্য  ডাটাবেজে সংরক্যিত হয়নি ।')</script>";
          }
          $data->close();
          return $this->getImageUploadPageUI();
  }
  public function getDirectReservedPage()
  {
         include_once(dirname(dirname(__FILE__)) . '/view/reserved.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $data = new Data();
        $result = $data->selectAvailableRoomType();
        $result1 = $data->selectAvailablePaymentType();
        $reservation = new Reservation($result,$result1);
        $this->webPage .= $reservation->getMainBody();
        $data->close();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
  }
   public function getBookPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Book.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        include_once(dirname(dirname(__FILE__)) . '/view/BookedConfirmedUI.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        $book=new Book();
        $data = new Data();
        $result = $data->selectRoomAndFare($book->roomType);
        $data->close();
        $bookConfirmedUI = new BookConfirmedUI($book, $result);
        $this->webPage .= $bookConfirmedUI->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    
     public function getBookConfirmedPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/BookConfirmed.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        include_once(dirname(dirname(__FILE__)) . '/view/BookConfirmedUI.php');
        $headerObj = new AdminHeader();
        $this->webPage .= $headerObj->getHeader();
        $menu = new LeftMenu();
        $this->webPage .= $menu->getMenu();
        if(!strcmp($_GET['pagename'],"bookedConfirmed"))
        {
             $book=new BookConfirmed("booking");
             $tnx_innd=23;
        }
              $data = new Data();
              $data->insertCustomer($book); 
              $book->customerID=$data->selectCustomerID($book);
              $data->insertReservation($book);
              $book->reservationID=$data->selectReservationID($book->customerID);
              $data->insertPayment($book,$tnx_innd,1,$book->charge);
              $data->billID($book);
              $data->updateRoom($book->roomNumber,"booked");
              $result1 = $data->getCustomerInfo($book->reservationID,$book->customerID);
              $result2 = $book->charge;
              $pay = $data->getTotalPayed($book->reservationID);
              
              if(!strcmp($book->type,"booking"))
              {    
                   include_once(dirname(dirname(__FILE__)) . '/view/ReservedSlip.php');
                  $reservationSlip = new ReservationSlip($result1, $result2,$pay);
                  $this->webPage .=$reservationSlip->getMainBody();
                  
              }
              else if(!strcmp($book->type,"payment"))
              {
                  $bill = $data->selectBill($book->reservationID);
                  $result2=$data->getRoomRate($book->reservationID);
                   include_once(dirname(dirname(__FILE__)) . '/view/PaymentSlip.php');
                  $paymentSlip= new PaymentSlip($result1, $bill, $result2, $pay);
                  $this->webPage .=$paymentSlip->getMainBody();                  
              }
              $data->close();
        
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
  
   
    
    
}

?>
