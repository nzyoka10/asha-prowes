<?php 
require_once 'includes/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

unset($_SESSION['ClientID']);   	
unset($_SESSION['Fname'] );     		
unset($_SESSION['Lname']);				
unset($_SESSION['cUsername'] );			
unset($_SESSION['Address'] );	
unset($_SESSION['ContactNo'] );			


			unset($_SESSION['ServiceID']);   		 
		 	unset($_SESSION['ServiceName']);      	 
		 	unset($_SESSION['ServiceContact']); 			 
		 	unset($_SESSION['ServiceAddress']); 			 
		 	unset($_SESSION['spUsername']); 			 
		 	unset($_SESSION['lat'] );			 
		 	unset($_SESSION['lng'] );			 
 	
// 4. Destroy the session
// session_destroy();
redirect(web_root."index.php?logout=1");
?>