<?php
require_once("../../includes/initialize.php"); 
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	case 'changepassword' :
		$content    = 'changepassword.php';		
		break;
	default :
		$content    = 'list.php';		
}
require_once("../nav/navigation.php");
?>
  
