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


	case 'changestatus' :
	doChangeStatus();
	break;

	case 'photos' :
	doupdateimage();
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

			$client = New Clients(); 
			$client->Fname 		= $_POST['Fname'];
			$client->Lname		= $_POST['Lname'];
			$client->Address			= $_POST['Address'];
			$client->ContactNo			= $_POST['ContactNo'];
			$client->cUsername			= $_POST['cUsername'];
			$client->update($_POST['ClientID']);
 

			message("Clients has been updated!", "success");
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
		 	$location="client/".$myfile;


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
				redirect("index.php?view=view&id=". $_POST['ServiceID']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"../../images/client/" . $myfile);
		 	
					 	$client = New Clients(); 
						$client->PicLoc			= $location;
						$client->update($_POST['ClientID']); 

						redirect("index.php?view=view&id=".$_POST['ClientID']);
						 
							
					}
			}
			 
		}

   function doChangeStatus(){ 
			$client = New Clients();  
			$client->Status			= $_POST['Status'];
			$client->update($_POST['id']); 
	}

 
?>