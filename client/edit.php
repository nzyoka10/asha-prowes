<?php   
 if (!isset($_SESSION['ClientID'])){
  redirect(web_root."login.php");
 }
$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}
  $client = New Clients();
  $res = $client->single_client($id);

?> 

 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

    <div class="row no-gutters"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                      <div class="card-header">
                          <h2>Modify Client</h2>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-9"> 
                         <input  id="ClientID" name="ClientID" type="hidden" value="<?php echo $res->ClientID;?>">
                         <input class="form-control input-sm" id="Fname" name="Fname" placeholder=
                            "First Name" type="text" value="<?php echo $res->Fname;?>">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="Lname" name="Lname" placeholder=
                            "Last Name" type="text" value="<?php echo $res->Lname;?>">
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "Address">Address:</label>

                      <div class="col-md-9"> 
                         <textarea class="form-control input-sm" id="Address" name="Address" placeholder=
                            "Address" ><?php echo $res->Address;?></textarea>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "ContactNo">Contact Number:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                            "Contact Number" value="<?php echo $res->ContactNo;?>" >
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "cUsername">Username:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="cUsername" name="cUsername" placeholder=
                            "Username" type="text" value="<?php echo $res->cUsername;?>">
                      </div> 
                    </div>
                       <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "idno"></label> 
                      <div class="col-md-9">
                       <button class="btn btn-primary btn-lg" id="usersave" name="save" type="submit" ><i class="fa fa-save"></i>  Save</button> 
                          <a href="index.php" class="btn btn-info btn-lg"><span class="fa fa-arrow-left"></span> Back</a>
                       </div>   
                    </div>
                </div>
                <div class="col-md-3"></div>
                </div>

 
 
              
 
</form>
       