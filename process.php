<?php
require_once ("includes/initialize.php");  

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'addsp' :
	doInsert();
	break;

	case 'addc' :
	doInsertClient();
	break;
	case 'rate' :
	rateUs();
	break;
 
	}


   // <!-- // SELECT `ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`, `Description` FROM `tblserviceprovider` WHERE 1 -->

	function doInsert(){
		global $mydb;

		if(isset($_POST['btnregister'])){


		    if ($_POST['ServiceName'] == "" OR $_POST['ServiceContact'] == "" OR $_POST['ServiceAddress'] == "") {
		      $messageStats = false;
	      echo '<script>alert("All field is required!")</script>';
		      redirect('index.php?q=spregister');
		    }else{  
		      $provider = New ServiceProvider(); 
		      $provider->ServiceName    = $_POST['ServiceName'];
		      $provider->ServiceContact   = $_POST['ServiceContact'];
		      $provider->ServiceAddress     = $_POST['ServiceAddress'];
		      $provider->Services     = $_POST['Services'];
		      $provider->lat     = $_POST['lat'];
		      $provider->lng     = $_POST['lng'];
		      $provider->EmailAddress     = $_POST['EmailAddress'];
		      $provider->spUsername     = $_POST['spUsername'];
		      $provider->spPassword     = sha1($_POST['spPassword']);
		      $provider->Status     = 'Pending';
		      $provider->create(); 

		      // echo '<script>alert("You are successfully registered.")</script>';

				message("You have successfully register. You can now login!", "success");
				redirect("index.php?q=success");
		  
		      
		    }
	    }
	 

	}
 

 function doInsertClient(){  
	if(isset($_POST['btnregister'])){
 
	    if ($_POST['Fname'] == "" OR $_POST['Lname'] == "" OR $_POST['Address'] == "") {
	      // $messageStats = false;
	      // message("All field is required!","error");

	      echo '<script>alert("All field is required!")</script>';
	      redirect('index.php?q=cregister');
	    }else{  
	      $client = New Clients(); 
	      $client->Fname   			= $_POST['Fname'];
	      $client->Lname    	  	= $_POST['Lname'];
	      $client->Address      	= $_POST['Address'];
	      $client->ContactNo      	= $_POST['ContactNo'];
	      $client->cUsername      	= $_POST['cUsername'];
	      $client->cPassword      	= sha1($_POST['cPassword']);
	      $client->create(); 

	      // echo '<script>alert("You have successfully register. You can now login")</script>';
	 
	      message("You have successfully register. You can now login", "success");
	      redirect("index.php?q=success");
	      
	    }
	    } 

 }

 function rateUs(){
 	global $mydb;
 	if (isset($_POST['submitRating']) ) {
  # code...
	  $ratingNo = $_POST['ratingNo'];
	  $ServiceID = $_POST['ServiceID'];
	  $ClientID = $_SESSION['ClientID'];
	  $fedback = $_POST['fedback'];
	  $sql = "INSERT INTO `tblrating` (`RatingNo`, `ServiceID`, `ClientID`, `RateDate`, `FeedBack`) 
	         VALUES ({$ratingNo},{$ServiceID},'{$ClientID}',NOW(),'{$fedback}')";
	  $mydb->setQuery($sql);
	  $mydb->executeQuery();

	   redirect(web_root.'index.php?q=singleservice&id='.$ServiceID);
	}
 }
 
?>