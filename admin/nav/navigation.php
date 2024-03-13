<!DOCTYPE html>
<html>
<head>
	<title>Prowes | Admin </title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo web_root;?>admin/css/style.css">
    <link rel="stylesheet" href="<?php echo web_root;?>admin/css/jquery.dataTables.min.css">
    <link rel="icon" href="<?php echo web_root;?>images/favicon.ico">
	   <style type="text/css">
		.logo ul li{
			border-radius: 12px;
		}

	   </style>  
</head>
<body>
	<div id="menu">
		<div class="logo"></div>
		<ul>
			<li><a class="<?php echo (currentpage()=='index.php') ? 'active' : ''?>" href="<?php echo web_root;?>admin/">Dashboard</a></li>
			<li><a class="<?php echo (currentpage()=='services') ? 'active' : ''?>" href="<?php echo web_root;?>admin/services/">Service Provider</a></li>
			<li><a class="<?php echo (currentpage()=='request') ? 'active' : ''?>" href="<?php echo web_root;?>admin/request/">Request</a></li>
			<li><a class="<?php echo (currentpage()=='client') ? 'active' : ''?>" href="<?php echo web_root;?>admin/client/">Clients</a></li>
			<li><a class="<?php echo (currentpage()=='users') ? 'active' : ''?>" href="<?php echo web_root;?>admin/users">Manage Users</a></li>
			<li><a class="<?php echo (currentpage()=='') ? 'active' : ''?>" href="<?php echo web_root;?>admin/logout.php">Logout</a></li>
		</ul>
	</div>
<br/>
<br/>
<br/> 
	<div class="container">
		<div class="content"> 
			<div id="check_msg">
				<?php 
				check_message(); 
				 ?>
		  </div>
				<?php  
				 require_once $content;
				 ?>  
		</div>
	</div>

</body>
<footer > 
	<div class="footer">
		<p> @2024 Copyright. Prowes </p>

	</div>

</footer>


  

 
	<script type="text/javascript" src="<?php echo web_root;?>admin/js/jquery.js"></script> 
	<script type="text/javascript" src="<?php echo web_root;?>admin/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">

	$(".select_status").change(function(){
		var id = $(this).data("id");
		var status = document.getElementById(id+'status').value;
		 
		  // alert(status);

		$.ajax({
		  type:"POST",
		  url : "controller.php?action=changestatus",
		  dataType : "text",
		  data:{id:id,Status:status,changestatus:'status'},
		  success:function(data){
		      $("#addbulkmodal").html(data);
		  }
		})


	});




		  $(function () {
		    $("#dash-tables").DataTable ({
		      "paging": true,
		      "lengthChange": false,
		      "searching": true,
		      "ordering": false,
		      "info": true, 
		      "autoWidth": true,
		       "order": [[1, "desc" ]],
		        // "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
		        // "iDisplayLength": 50

		       });
		  });

   function validateRetypePassword(){
  // retype_user_pass
  var pass = $("#user_pass");
  var rpass = $("#retype_user_pass"); 

  // alert(rpass.val());

  // return false;
  if(pass.val()==rpass.val()){
    return true
  }else{
    alert("Password does not match")
    return false;
  }
}


//set time for hiding message
function hideMsg(){
  $("#check_msg").hide();
} 
setTimeout(function(){ hideMsg(); }, 3000);  

	</script>
</html>