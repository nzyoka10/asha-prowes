<?php 
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
?> 
  <div class="page-header">
		<h2>List of Users <span><a class="btn btn-primary btn-sm" href="index.php?view=add">Add New</a></span></h2> 
	</div>
        <div class="table-responsive">
                <table class="hover" id="dash-tables"   cellspacing="0">
				  <thead> 
				  		<th> Account Name</th>
				  		<th>Username</th>
				  		<th>Type</th>
				  		<th width="32%">Action</th>  
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `tblusers`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
				  		echo '<td>' . $result->NAME.'</a></td>';
				  		echo '<td>'. $result->UEMAIL.'</td>';
				  		echo '<td>'. $result->TYPE.'</td>';

				  		if ($result->TYPE=="SystemAdministrator") {
				  			# code...
				  			$btn = '<a title="Edit" href="index.php?view=edit&id='.$result->USERID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-edit"></i> Edit</a> <a title="Edit" href="index.php?view=changepassword&id='.$result->USERID.'" class="btn btn-success btn-sm  " ><i class="fa fa-lock"></i> Change Passoword</a> <a title="View" href="index.php?view=view&id='.$result->USERID.'" class="btn btn-info btn-sm  " ><i class="fa fa-edit"></i> View</a>';

				  		}else{
				  			$btn= '<a title="Edit" href="index.php?view=edit&id='.$result->USERID.'" class="btn btn-primary btn-sm  " ><i class="fa fa-edit"></i> Edit</a> <a title="Edit" href="index.php?view=changepassword&id='.$result->USERID.'" class="btn btn-success btn-sm  " ><i class="fa fa-lock"></i> Change Passoword</a> <a title="View" href="index.php?view=view&id='.$result->USERID.'" class="btn btn-info btn-sm  " ><i class="fa fa-edit"></i> View</a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->USERID.'" class="btn btn-danger btn-sm  " ><i class="fa fa-trash"></i> Delete</a>';
				  		}
				  		echo '<td > '.$btn.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div>