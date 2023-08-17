<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
 
$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id==''){
   redirect("index.php");
}


  $r = New Request();
  $request = $r->single_request($id);

  $client = New Clients();
  $client = $client->single_client($request->ClientID);


  $sp = New ServiceProvider();
  $sp = $sp->single_provider($request->ServiceID);

 
  ?>
  <style type="text/css">
    h3 { 
      border-bottom: 1px solid #ddd;
      padding: 8px;
      margin: 5px;
    } 
  </style>
<div class="container">  
  <h1 style="text-align: center;"><strong>Request Details</strong></h1><br>  
    <div class="row no-gutters">
        <div class="col-md-4 col">
                              
        <h3>Clients</h3>     
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-8"> 
                         <?php echo $client->Fname;?>
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-4 label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-8"> 
                         <?php echo $client->Lname;?> 
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "Address">Address:</label>

                      <div class="col-md-8"> 
                        <?php echo $client->Address;?> 
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "ContactNo">Contact Number:</label>

                      <div class="col-md-8"> 
                         <?php echo $client->ContactNo;?> 
                      </div> 
                    </div>

        </div>
        <div class="col-md-4 col">     
        <h3>Service Provider</h3>    
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "ServiceName">Service Provider:</label> 
                      <div class="col-md-8">  
                        <?php echo $sp->ServiceName ?> 
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-4 label" for=
                      "ServiceContact">Contact Number:</label>

                      <div class="col-md-8">
                        <?php echo $sp->ServiceContact ?> 
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "ServiceAddress">Address:</label>

                      <div class="col-md-8"> 
                         <?php echo $sp->ServiceAddress ?> 
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "Services">Services:</label>

                      <div class="col-md-8"> 
                         <?php echo $sp->Services ?>
                      </div> 
                    </div>
                </div>
               <div class="col-md-4 col">

               <h3>Request</h3>   
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Request">Request:</label>

                      <div class="col-md-8"> 
                        <?php echo $request->Request;?> 
                      </div> 
                    </div>
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Status">Status:</label>

                      <div class="col-md-8"> 
                        <?php echo $request->Status;?> 
                      </div> 
                    </div>
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Remarks">Remarks:</label>

                      <div class="col-md-8"> 
                        <?php echo $request->Remarks;?> 
                      </div> 
                    </div>
                               
               </div>

        </div>
    </div>
</div>  
 