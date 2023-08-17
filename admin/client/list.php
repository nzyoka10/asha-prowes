<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
?>   <div class="page-header">
		<h2>List of Clients <span><a class="btn btn-primary btn-sm" href="index.php?view=add">Add New</a></span></h2> 
	</div>
        <div class="table-responsive">
                <table class="hover" id="dash-tables"   cellspacing="0" >
				  <thead> 
				  		<th>First Name</th>
				  		<th>Last Name</th>
				  		<th>Address</th>
				  		<th>Contact Number</th>
				  		<th>Username</th>
				  		<th>Status</th>
				  		<th width="32%">Action</th>  
				  </thead> 
				  <tbody>
				  	<?php 
				  	// SELECT `ClientID`, `Fname`, `Lname`, `Address`, `ContactNo`, `Status` FROM `tblclients` WHERE 1
				  		$mydb->setQuery("SELECT * 
											FROM  `tblclients`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
				  		echo '<td>' . $result->Fname.'</a></td>';
				  		echo '<td>'. $result->Lname.'</td>';
				  		echo '<td>'. $result->Address.'</td>';
				  		echo '<td>'. $result->ContactNo.'</td>';
				  		echo '<td>'. $result->cUsername.'</td>';
				  		echo '<td><select class="form-control select_status" data-id="'.$result->ClientID.'" id="'.$result->ClientID.'status">';

			  					if($result->Status=='Pending') { echo '<option Selected >Pending</option>';  }else{ echo '<option >Pending</option>'; }
			  					if($result->Status=='Confirmed') { echo '<option Selected >Confirmed</option>';  }else{ echo '<option >Confirmed</option>'; }
			  					if($result->Status=='Banned') { echo '<option Selected >Banned</option>';  }else{ echo '<option >Banned</option>'; }
			  					if($result->Status=='Cancelled') { echo '<option Selected >Cancelled</option>';  }else{ echo '<option >Cancelled</option>'; }
				  					 
				  			echo '</select>
				  				 </td>';
 
				  			$btn= '<a title="Edit" href="index.php?view=edit&id='.$result->ClientID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-edit"></i> Edit</a> <a title="Edit" href="index.php?view=changepassword&id='.$result->ClientID.'" class="btn btn-success btn-sm  " ><i class="fa fa-lock"></i> Change Passoword</a> <a title="View" href="index.php?view=view&id='.$result->ClientID.'" class="btn btn-info btn-sm  " ><i class="fa fa-edit"></i> View</a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->ClientID.'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>'; 
				  		echo '<td > '.$btn.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div>