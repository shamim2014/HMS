<?php
  define("ADMIN", "admin");
  if(!isset($_SESSION))
     session_start();
   include_once(dirname(dirname(__FILE__))."/controller/AdminController.php");
?>
