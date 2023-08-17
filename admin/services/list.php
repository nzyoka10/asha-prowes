<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
?>   <div class="page-header">
		<h2>List of Service Provider <span><a class="btn btn-primary btn-sm" href="index.php?view=add">Add New</a></span></h2> 
	</div>
        <div class="table-responsive">
                <table class="hover" id="dash-tables"   cellspacing="0" >
				  <thead> 
				  		<th>Service Provider</th>
				  		<th>Contact Number</th>
				  		<th>Address</th>
				  		<th>Services</th>
				  		<th>Status</th>
				  		<th width="32%">Action</th>  
				  </thead> 
				  <tbody>
				  	<?php 
				  	// SELECT `ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`, `Description` FROM `tblserviceprovider` WHERE 1
				  		$mydb->setQuery("SELECT * 
											FROM  `tblserviceprovider`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
				  		echo '<td>' . $result->ServiceName.'</a></td>';
				  		echo '<td>'. $result->ServiceContact.'</td>';
				  		echo '<td>'. $result->ServiceAddress.'</td>';
				  		echo '<td>'. $result->Services.'</td>';
				  		echo '<td><select class="form-control select_status" data-id="'.$result->ServiceID.'" id="'.$result->ServiceID.'status">';

			  					if($result->Status=='Pending') { echo '<option Selected >Pending</option>';  }else{ echo '<option >Pending</option>'; }
			  					if($result->Status=='Confirmed') { echo '<option Selected >Confirmed</option>';  }else{ echo '<option >Confirmed</option>'; }
			  					if($result->Status=='Banned') { echo '<option Selected >Banned</option>';  }else{ echo '<option >Banned</option>'; }
			  					if($result->Status=='Cancelled') { echo '<option Selected >Cancelled</option>';  }else{ echo '<option >Cancelled</option>'; }
				  					 
				  			echo '</select>
				  				 </td>';
 
				  			$btn= '<a title="Edit" href="index.php?view=edit&id='.$result->ServiceID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-edit"></i> Edit</a> <a title="Edit" href="index.php?view=changepassword&id='.$result->ServiceID.'" class="btn btn-success btn-sm  " ><i class="fa fa-lock"></i> Change Passoword</a> <a title="View" href="index.php?view=view&id='.$result->ServiceID.'" class="btn btn-info btn-sm  " ><i class="fa fa-edit"></i> View</a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->ServiceID.'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>'; 
				  		echo '<td > '.$btn.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div>