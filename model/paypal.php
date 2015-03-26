<?php
include_once(dirname(dirname(__FILE__)) . '/api/paypal.php');
class Paypal
{
    private $book,$PayPalMode,$PayPalApiUsername,$PayPalApiPassword,$PayPalApiSignature,$PayPalCurrencyCode,$PayPalReturnURL,$PayPalCancelURL;
    public function __construct($book)
    {
        $this->book=$book;
        $this->PayPalMode= "sandbox"; // sandbox or live
        $this->PayPalApiUsername= "admin-developer_api1.binarybluesoft.com"; //PayPal API Username
        $this->PayPalApiPassword= "1400762342"; //Paypal API password
        $this->PayPalApiSignature= "An5ns1Kso7MWUdW4ErQKJJJ4qi4-Aku9woCp6X9jvwuU.hlgHuU5pH2U"; //Paypal API Signature
        $this->PayPalCurrencyCode= "USD"; //Paypal Currency Code
        $this->PayPalReturnURL = "http://localhost/hms/index.php?pagename=paypal"; //Point to process.php page
        $this->PayPalCancelURL= "http://localhost/hms/"; //Cancel URL if user clicks cancel
       
    }
     public function paypal_new()
  { 
        if($_POST) //Post Data received from product list page.
       {
                $Item = $_POST['itemname'];
                $Price = $this->book->charge; //Item Price
                
                if(!strcmp($this->book->type,"booking" ))
                {
                    $ItemNumber = "bk-400"; //Item Number
                    $pay =30;
                }
                else 
                {
                    $ItemNumber ="pm-400";
                    $pay =100;
                }
                $ItemQty = 1; // Item Quantity
                $ItemTotalPrice = ($Price*$ItemQty*$pay/100); //(Item Price x Quantity = Total) Get total amount of product; 
                $padata ='&CURRENCYCODE='.urlencode($this->PayPalCurrencyCode).
                                '&PAYMENTACTION=Sale'.
                                '&ALLOWNOTE=1'.
                                '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($this->PayPalCurrencyCode).
                                '&PAYMENTREQUEST_0_AMT='.urlencode($ItemTotalPrice).
                                '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice). 
                                '&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
                                '&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemTotalPrice).
                                '&L_PAYMENTREQUEST_0_NAME0='.urlencode($Item).
                                '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
                                '&AMT='.urlencode($ItemTotalPrice).				
                                '&RETURNURL='.urlencode($this->PayPalReturnURL ).
                                '&CANCELURL='.urlencode($this->PayPalCancelURL);	
                   
                  $paypal= new Paypal_lib();
                  $httpParsedResponseAr= $paypal->PPHttpPost('SetExpressCheckout', $padata, $this->PayPalApiUsername, $this->PayPalApiPassword, $this->PayPalApiSignature, $this->PayPalMode);
	session_start();
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
	{
                            $_SESSION['itemprice'] =  $Price;
                            $_SESSION['totalamount'] = $ItemTotalPrice;
                            $_SESSION['itemName'] =  $Item;
	         $_SESSION['itemNo'] =  $ItemNumber;
                            $_SESSION['itemQTY'] =  $ItemQty;
                            $_SESSION['book']=  $this->book;
                            
                            if($this->PayPalMode=='sandbox')
                            {
		$paypalmode='.sandbox';
                            }
                            else
                            {
		$paypalmode='';
                            }
                            //Redirect user to PayPal store with Token received.
                            $paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
	         header('Location: '.$paypalurl);
				
	}
                   else
                   {
                             //Show error message
                             echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
                             echo '<pre>';
                             print_r($httpParsedResponseAr);
                            echo '</pre>';
                    }
			
           }
         else if(isset($_GET["token"]) && isset($_GET["PayerID"]))
          {       
                   session_start();
                   include_once(dirname(dirname(__FILE__)) . '/model/Data.php');
	$token = $_GET["token"];
	$playerid = $_GET["PayerID"];
	$ItemPrice = $_SESSION['itemprice'];
	$ItemTotalPrice = $_SESSION['totalamount'];
	$ItemName= $_SESSION['itemName'];
	$ItemNumber= $_SESSION['itemNo'];
	$ItemQTY=$_SESSION['itemQTY'];
			
	$padata = 	'&TOKEN='.urlencode($token).
		'&PAYERID='.urlencode($playerid).
		'&PAYMENTACTION='.urlencode("SALE").
		'&AMT='.urlencode($ItemTotalPrice).
		'&CURRENCYCODE='.urlencode($this->PayPalCurrencyCode);
		
                   $paypal= new Paypal_lib();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $this->PayPalApiUsername, $this->PayPalApiPassword, $this->PayPalApiSignature, $this->PayPalMode);
	$cur_tnx_dd = urldecode($httpParsedResponseAr["TRANSACTIONID"]);
                   
                   $data = new Data();
                   echo $cur_tnx_dd;
	$result = $data->selectTransactionId($cur_tnx_dd);
                  
	if (mysqli_num_rows($result)==0)
	{
	          if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	         {
		$tnx_innd = urldecode($httpParsedResponseAr["TRANSACTIONID"]);
		
		if("Completed" == $httpParsedResponseAr["PAYMENTSTATUS"])
		{
		         $this->book = $_SESSION['book'];
		         if($ItemNumber=="bk-400")  //reservation
		        {
		            $data->insertCustomer($this->book); 
                                                     
                                                   $this->book->customerID=$data->selectCustomerID($this->book);
                                                   $data->insertReservation($this->book);
                                                   $this->book->reservationID=$data->selectReservationID($this->book->customerID);
                                                    $data->insertPayment($this->book,$tnx_innd,2,$ItemTotalPrice);
                                                   $data->billID($this->book);
                                                   $data->updateRoom($this->book->roomNumber,"booked");
                                               }
                                               else
                                               {
                                                   $data->insertPayment($this->book,$tnx_innd,2,$ItemTotalPrice);
                                                   
                                                }
		          $data->close();
		         return 1;
		}					
                            }
	}
	else
	{
                            return 0;
	}
           }
          else 
          {
	echo 'Sorry you are not permitted here';	
           }
}	
}	
?>