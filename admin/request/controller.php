<?php
require_once ("../../includes/initialize.php"); 
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;


	case 'changepassword' :
	doChangePassword();
	break;
	
	case 'delete' :
	doDelete();
	break;


	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;

	case 'photos' :
	doupdateimage();
	break; 
	}
// SELECT `RequestID`, `Request`, `Status`, `Remarks`, `ClientID`, `ServiceID`, `USERID` FROM `tblrequest` WHERE 1

	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ($_POST['Request'] == "" OR $_POST['ClientID'] == "" OR $_POST['ServiceID'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$request = New Request(); 
			$request->Request 		= $_POST['Request'];
			$request->ClientID		= $_POST['ClientID'];
			$request->ServiceID			= $_POST['ServiceID'];
			$request->Status			= 'Pending';
			$request->Remarks			= 'Request is on process...'; 
			$request->create(); 
 
			message("New Request created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		global $mydb;
	if(isset($_POST['save'])){

			$request = New Request(); 
			$request->Request 		= $_POST['Request'];
			$request->ClientID		= $_POST['ClientID'];
			$request->ServiceID			= $_POST['ServiceID']; 
			$request->update($_POST['RequestID']);
 

			message("Request has been updated!", "success");
			redirect("index.php");
		}
	}

  function doConfirm(){  

			$request = New Request();  
			$request->Status			= 'Confirmed'; 
			$request->Remarks			= ''; 
			$request->update($_GET['id']);
 

			message("Request has been confirmed!", "success");
			redirect("index.php"); 
	}
  function doCancel(){  

			$request = New Request();  
			$request->Status			= 'Cancelled'; 
			$request->Remarks			= ''; 
			$request->update($_GET['id']);
 

			message("Request has been cancelled!", "success");
			redirect("index.php"); 
	}
 
 

	function doDelete(){
		
 
		
				$id = 	$_GET['id'];

				$r = New Request();
	 		 	$r->delete($id);
			 
			message("Request already Deleted!","info");
			redirect('index.php'); 

		
	}

	 

   function doChangeStatus(){ 
			$r = New Request();  
			$r->Status			= $_POST['Status'];
			$r->Remarks			= '';
			$r->update($_POST['id']); 
			 
	}

 
?>