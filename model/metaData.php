<?php
 if(!defined("HMS")&&!defined("ADMIN"))
 {
	   die("Directory access is forbidden.");
 }
 
 
class MetaData
{
         private  $metaData ;
        
         public function __construct() 
         {
            $this->setMetaData("অনলাইন হোটেল ম্যানেজমেন্ট");
         }
         private function setMetaData($title)
         {
			 $this->metaData ="";
			 $this->metaData .="<!DOCTYPE html><html><head><title>";

			 if(isset($title))
			    $this->metaData .=$title;
             $this->metaData .="</title>";
             $this->metaData .="<meta charset='UTF-8'>";
			 $this->setCss();
			 $this->metaData .="</head><body>";
			    
   }
         private function  setCss()
         {
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/h.css' />";
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/middle.css' />";
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/home.css' />";
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/room.css' />";
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/footer.css'/>";
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/lefMenu.css' />";
            $this->metaData .="<link rel='stylesheet' type='text/css' href='http://localhost/hms/csses/BillInfo.css' />";
           }
         public function getMetaData()
         {
             return $this->metaData;
         }
}
?>
