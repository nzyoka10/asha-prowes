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
   // <!-- // SELECT `ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`, `Description` FROM `tblserviceprovider` WHERE 1 -->

	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ($_POST['ServiceName'] == "" OR $_POST['ServiceContact'] == "" OR $_POST['ServiceAddress'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$provider = New ServiceProvider(); 
			$provider->ServiceName 		= $_POST['ServiceName'];
			$provider->ServiceContact		= $_POST['ServiceContact'];
			$provider->ServiceAddress			= $_POST['ServiceAddress'];
			$provider->Services			= $_POST['Services'];
			$provider->spUsername			= $_POST['spUsername'];
			$provider->spPassword			= sha1($_POST['spPassword']);
			$provider->create(); 
 
			message("New Service Provider created successfully!", "success");
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

			$provider = New ServiceProvider();  
			$provider->spPassword			= sha1($_POST['spPassword']);
			$provider->update($_POST['ServiceID']);
 
 
			  message("Password has been changed!", "success");
			  redirect("index.php?view=changepassword&id=".$_POST['ServiceID']);
		}
	}


	function doDelete(){
		
 
		
				$id = 	$_GET['id'];

				$sp = New ServiceProvider();
	 		 	$sp->delete($id);
			 
			message("Service Provider already Deleted!","info");
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
				redirect("index.php?view=view&id=". $_POST['ServiceID']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"../../images/services/" . $myfile);
		 	
					 
						$provider = New ServiceProvider();   
						$provider->PicLoc 			= $location;
						$provider->update($_POST['ServiceID']);
						redirect("index.php?view=view&id=".$_POST['ServiceID']);
						 
							
					}
			}
			 
		}

   function doChangeStatus(){ 
			$provider = New ServiceProvider();  
			$provider->Status			= $_POST['Status'];
			$provider->update($_POST['id']);
 
 
			  message("Password has been changed!", "success");
			  redirect("index.php?view=changepassword&id=".$_POST['ServiceID']); 
	}

 
?>