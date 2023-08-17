<?php 
require_once("../includes/initialize.php");  
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
 
$title="Dashboard";	
$content='dashboard.php';		
 require_once("nav/navigation.php");
?>
