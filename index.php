<?php
require_once("includes/initialize.php");  
$q = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';

switch ($q) {
    case 'login' :
		$content    = 'login.php';		
		break;
    case 'cregister' :
		$content    = 'register.php';		
		break;

    case 'spregister' :
		$content    = 'spregister.php';		
		break;
    case 'services' :
		$content    = 'services.php';		
		break;
    case 'location' :
		$content    = 'location.php';		
		break;
    case 'singleservice' :
		$content    = 'singleservice.php';		
		break;
    case 'request' :
		$content    = 'makerequest.php';		
		break;
	case 'whoweare' :
		$content    = 'whoweare.php';		
		break;

	case 'history' :
		$content    = 'ourhistory.php';		
		break;

	case 'testimonials' :
		$content    = 'testimonials.php';		
		break;
	case 'team' :
		$content    = 'ourteam.php';		
		break;
    case 'contact' :
		$content    = 'contact.php';		
		break;
    case 'success' :
		$content    = 'success.php';		
		break;
 
	default :
		$content    = 'home.php';		
}
require_once("nav/navigation.php");
?>
  
