<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
?>   <div class="page-header">
		<h2>List of Customer's Request <span><a class="btn btn-primary btn-sm" href="index.php?view=add">Add New</a></span></h2> 
	</div>

	
        <div class="table-responsive">
			
                <table class="hover" id="dash-tables"   cellspacing="0" >
				  <thead> 
				  		<th>RequestID</th>
				  		<th>Request</th>
				  		<th>Clients</th>
				  		<th>Services</th>
				  		<th>Status</th>
				  		<th>Remarks</th>
				  		<th width="30%">Action</th>  
				  </thead> 
				  <tbody>
				  	<?php 


				  		$mydb->setQuery("SELECT *,r.Status as stats 
											FROM  `tblrequest` r, `tblserviceprovider` s,`tblclients` c 
										WHERE r.ServiceID=s.ServiceID AND r.ClientID=c.ClientID ");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
				  		echo '<td>' . $result->RequestID.'</a></td>';
				  		echo '<td>'. $result->Request.'</td>';
				  		echo '<td>'. $result->Fname.' '. $result->Lname.'</td>';
				  		echo '<td>'. $result->ServiceName.'</td>';
				  		echo '<td>'.$result->stats.'</td>';
				  		echo '<td>'. $result->Remarks.'</td>';
 
				  		  $btn= '
				  			<a title="Confirm" href="index.php?view=edit&id='.$result->RequestID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-edit"></i> Edit</a>
				  			 <a title="View" href="index.php?view=view&id='.$result->RequestID.'" class="btn btn-info btn-sm  " ><i class="fa fa-edit"></i> View</a>
				  			<a title="Confirm" href="controller.php?action=confirm&id='.$result->RequestID.'" class="btn btn-success btn-sm  " ><i class="fa fa-edit"></i> Confirm</a>
				  					 <a title="Cancel" href="controller.php?action=cancel&id='.$result->RequestID.'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Cancel</a>'; 
				  		echo '<td > '.$btn.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div>