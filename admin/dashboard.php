<style>

body {
    background-color: whitesmoke; ; /* Dark navy blue background */
	color: #444;
}

header {
    text-align: center;
    padding: 20px 0;
}

header h1{
	font-size: 1.5em;
	text-align: left;	
	padding: 2px;
}
.box {
    background-color: #333; /* Dark grey box background */
    padding: 8px;
    border-radius: 10px;
}

.num {
    font-size: 28px;
	text-align: center;
	text-decoration: dotted;
	cursor: pointer;
	color: wheat;
	padding: 32px;
	font-weight: 770;
}

.display-data{
	border: 1px solid;

	margin-top: 12px;
	padding: 28px;
}

</style>

<header>
	<h1>
		Administrator Dashboard
	</h1>
</header>

<div class="row no-gutters">
	<div class="col-md-3 d-flex justify-content-center align-items-center"">
		<div class="box rounded">
			<h2>Total Clients</h2>
			<span class="num">
				<?php 
					require_once('../includes/accounts.php'); 
					$totalUsers = User::getTotalClients();
					echo $totalUsers;
				?>
			</span>
		</div>
	</div>

	<div class="col-md-3 d-flex justify-content-space-center align-items-center"">
		<div class="box rounded">
			<h2>Service Providers</h2>
			<span class="num">
				
			<?php 
				require_once('../includes/accounts.php'); 
				$totalUsers = User::getServiceProviders();
				echo $totalUsers;
			?>			
			</span>
		</div>
	</div>

	<div class="col-md-3 d-flex justify-content-space-around-center align-items-center">
		<div class="box rounded">
			<h2>Pending Request</h2>
			<span class="num">
			
			</span>
		</div>
	</div>

</div>


<div class="display-data">
	<p>All pending requests</p>

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



