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

	case 'photos' :
	doupdateimage();
	break; 
	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ($_POST['user_name'] == "" OR $_POST['user_email'] == "" OR $_POST['user_pass'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$user = New User();
			// $user->USERID 		= $_POST['user_id'];
			$user->NAME 		= $_POST['user_name'];
			$user->UEMAIL		= $_POST['user_email'];
			$user->PASS			=sha1($_POST['user_pass']);
			$user->TYPE			= $_POST['user_type'];
			$user->create(); 

						// $autonum = New Autonumber(); 
						// $autonum->auto_update(2);

			message("New [". $_POST['user_name'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		global $mydb;
	if(isset($_POST['save'])){

			$user = New User(); 
			$user->NAME 		= $_POST['user_name'];
			$user->UEMAIL		= $_POST['user_email'];

			$singleuser = $user->single_user($_POST['user_id']);
		    if ($singleuser->TYPE!='SystemAdministrator') {
				$user->TYPE			= $_POST['user_type'];
			 } 
			$user->update($_POST['user_id']);
 

			  message("[". $_POST['user_name'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}

  function doChangePassword(){
		global $mydb;
	if(isset($_POST['save'])){

			$user = New User();  
			$user->PASS			=sha1($_POST['user_pass']); 
			$user->update($_POST['user_id']);

			 $sql = "SELECT * FROM `tblstudent` WHERE `IDNO`='".$_POST['user_id']."'";
			 $mydb->setQuery($sql);
			 $mydb->executeQuery();


			  message("Password has been changed!", "success");
			  redirect("index.php?view=changepassword&id=".$_POST['user_id']);
		}
	}


	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$user = New User();
		// 	$user->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$user = New User();
	 		 	$user->delete($id);
			 
			message("User already Deleted!","info");
			redirect('index.php');
		// }
		// }

		
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="users/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{ 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"../../images/users/" . $myfile);
		 	
					 

						$user = New User();
						$user->PicLoc 			= $location;
						$user->update($_POST['user_id']);
						redirect("index.php?view=view&id=".$_POST['user_id']);
						 
							
					}
			}
			 
		}
 
?>