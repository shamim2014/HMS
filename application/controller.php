<?php
class Controller
{
	private $webPage;
	
    public function __construct() 
    {
        $meta = new MetaData();
        $this->webPage="";
        $this->webPage .= $meta->getMetaData();
    }
    public function getHomePage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Home.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $home = new HomeBody();
        $this->webPage .= $home->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getRoomPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Room.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $data = new Data();
        $result = $data->selectRoomType();
        $room = new Room($result);
        $data->close();
        $this->webPage .= $room->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
        
    }
    public function getServicePage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Service.php');
         include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $data = new Data();
        $result = $data->selectService();
        $service = new Service($result);
        $data->close();
        $this->webPage .=$service->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
     public function getReservationPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Reservation.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
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
    
    public function getGallaryPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        include_once(dirname(dirname(__FILE__)) . '/view/Gallery.php');
       $hObj = new Header();
        $this->webPage .= $hObj->getHeader();
        $data = new Data();
        $result = $data->getImage();
        $gallery = new Gallery($result );
        $this->webPage .=$gallery->getMainBody();
        $data->close();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
   }
   public function getBookPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Book.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        include_once(dirname(dirname(__FILE__)) . '/view/BookConfirmedUI.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
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
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        if(!strcmp($_GET['pagename'],"bookConfirmed"))
        {
             $book=new BookConfirmed("booking");
        }
        else if(!strcmp($_GET['pagename'],"onlinePay"))
        {
             $book=new BookConfirmed("payment");
             $data = new Data();
             $result1 = $data->selectBillCustomerInfo($book->reservationID,$book->customerID);
             $book->charge = $data->selectTotalBill($book->reservationID);
             $pay = $data->getTotalPayed($book->reservationID);
             $book->charge -=$pay;
             $book->setCustomerInfo(mysqli_fetch_row($result1));
             $info = $data->getCardInfo($book->reservationID);
             $book->setCardInfo($info);
        }
         else 
         {
             $book=NULL;
         }
              include_once(dirname(dirname(__FILE__)) . '/model/paypal.php');
              $paypal = new Paypal($book);
              $paypal->paypal_new();
              
          if(isset($_SESSION['book']))
          {
              $book=$_SESSION['book'];
              $data = new Data();
              $result1 = $data->selectBillCustomerInfo($book->reservationID,$book->customerID);
              $result2 = $book->charge;
              $pay = $data->getTotalPayed($book->reservationID);
              
              if(!strcmp($book->type,"booking"))
              {    
                   include_once(dirname(dirname(__FILE__)) . '/view/ReservationSlip.php');
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
              session_destroy();
          }
        
        
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
  
   public function getAboutPage()
    {
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
     public function getTariffPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/Tariff.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $data = new Data();
        $result = $data->selectRoomType();
        $tariff = new Tariff($result);
        $data->close();
        $this->webPage .= $tariff->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getPaymentLogPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/PaymentLog.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $paymentLog = new PaymentLog();
        $this->webPage .=$paymentLog->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getPaymentInfoPage($reservationId,$customerId)
    {
        include_once(dirname(dirname(__FILE__)) . '/view/BillInfo.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new Header();
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
    public function getLoginPage()
    {
        include_once(dirname(dirname(__FILE__)) . '/view/AdminLog.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $adminLog = new AdminLog();
        $this->webPage .=$adminLog->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
    }
    public function getAdminWelComePage()
    {
             include_once(dirname(dirname(__FILE__)) . '/Admin/index.php');
    }
    public function getAdminPage($ID,$pass)
    {
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $data = new Data();
        $verify = $data->verifyAdmin($ID, $pass);
         if($verify==1)
         {
              session_start();
              $_SESSION['userID']=$ID;
             $_SESSION['password']=$pass;
             include_once(dirname(dirname(__FILE__)) . '/Admin/index.php');
         }
         else 
         {
             include_once(dirname(dirname(__FILE__)) . '/view/AdminLog.php');
            $headerObj = new Header();
            $this->webPage .= $headerObj->getHeader();
            $adminLog = new AdminLog();
            $this->webPage .=$adminLog->setErrorInfo();
            $this->webPage .=$adminLog->getMainBody();
            $hObj = new Footer();
            $this->webPage .= $hObj->getFooter();
         }
         
        return $this->webPage;
    }
    public function showAvailableRoom($checkIn,$checkOut)
    {
        include_once(dirname(dirname(__FILE__)) . '/view/SearchResult.php');
        include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
        $headerObj = new Header();
        $this->webPage .= $headerObj->getHeader();
        $data = new Data();
        $result = $data->getAvailableRoom($checkIn,$checkOut);
        $room = new Room($result);
        $data->close();
        $this->webPage .= $room->getMainBody();
        $hObj = new Footer();
        $this->webPage .= $hObj->getFooter();
        return $this->webPage;
        
    }
    
}
?>
