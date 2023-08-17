<?php
require_once ("../includes/initialize.php"); 
 if (!isset($_SESSION['ServiceID'])){
  redirect(web_root."login.php");
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


	case 'changestatus' :
	doChangeStatus();
	break;

	case 'photos' :
	doupdateimage();
	break; 
	
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	}
// SELECT `ClientID`, `Fname`, `Lname`, `Address`, `ContactNo`, `Status`, `cUsername`, `cPassword` FROM `tblclients` WHERE 1

	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ($_POST['Fname'] == "" OR $_POST['Lname'] == "" OR $_POST['Address'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$client = New Clients(); 
			$client->Fname 		= $_POST['Fname'];
			$client->Lname		= $_POST['Lname'];
			$client->Address			= $_POST['Address'];
			$client->ContactNo			= $_POST['ContactNo'];
			$client->cUsername			= $_POST['cUsername'];
			$client->cPassword			= sha1($_POST['cPassword']);
			$client->create(); 
 
			message("New client created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		global $mydb;
	if(isset($_POST['save'])){

			$provider = New ServiceProvider(); 
			$provider->ServiceName 		= $_POST['ServiceName'];
			$provider->ServiceContact		= $_POST['ServiceContact'];
			$provider->ServiceAddress			= $_POST['ServiceAddress'];
			$provider->Services			= $_POST['Services'];
			$provider->spUsername			= $_POST['spUsername']; 
			$provider->update($_POST['ServiceID']);
 

			message("Service Provider has been updated!", "success");
			redirect("index.php");
		}
	}

  function doChangePassword(){
		global $mydb;
	if(isset($_POST['save'])){

			$client = New Clients(); 
			$client->cPassword			= sha1($_POST['cPassword']);
			$client->update($_POST['ClientID']);
 
 
			  message("Password has been changed!", "success");
			  redirect("index.php?view=changepassword&id=".$_POST['ClientID']);
		}
	}


	function doDelete(){
		
 
		
				$id = 	$_GET['id'];

				$client = New Clients();
	 		 	$client->delete($id);
			 
			message("Client already Deleted!","info");
			redirect('index.php'); 

		
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="services/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_POST['ServiceID']);
		}else{ 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php");
			}else{
					//uploading the file
					move_uploaded_file($temp,"../images/services/" . $myfile);
		 	
					 	$sp = New ServiceProvider(); 
						$sp->PicLoc			= $location;
						$sp->update($_SESSION['ServiceID']); 

						redirect("index.php");
						 
							
					}
			}
			 
		}

   function doChangeStatus(){ 
			$client = New Clients();  
			$client->Status			= $_POST['Status'];
			$client->update($_POST['id']); 
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
 
 
?>