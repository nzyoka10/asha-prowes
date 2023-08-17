<?php 
$id = $_SESSION['ServiceID'];
if($id==''){
  redirect("index.php");
}
  $sp = New ServiceProvider();
  $res = $sp->single_provider($id);

?> 

 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

    <div class="row no-gutters">  
                <div class="col-md-12"> 
                      <div class="card-header">
                          <h4>Modify Accounts</h4>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "ServiceName">Service Provider:</label>

                      <div class="col-md-9"> 
                         <input id="ServiceID" name="ServiceID"  type="hidden" value="<?php echo $res->ServiceID ?>">
                         <input class="form-control input-sm" id="ServiceName" name="ServiceName" placeholder=
                            "Service Provider" type="text" value="<?php echo $res->ServiceName ?>">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "ServiceContact">Contact Number:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="ServiceContact" name="ServiceContact" placeholder=
                            "Contact Number" type="text" value="<?php echo $res->ServiceContact ?>">
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "ServiceAddress">Address:</label>

                      <div class="col-md-9"> 
                         <textarea class="form-control input-sm" id="ServiceAddress" name="ServiceAddress" placeholder=
                            "Address" ><?php echo $res->ServiceAddress ?></textarea>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "Services">Services:</label>

                      <div class="col-md-9"> 
                         <textarea class="form-control input-sm" id="Services" name="Services" placeholder=
                            "Services" ><?php echo $res->Services ?></textarea>
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "spUsername">Service Provider:</label> 
                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="spUsername" name="spUsername" placeholder=
                            "Username" type="text" value="<?php echo $res->spUsername ?>">
                      </div> 
                    </div>
  
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "idno"></label> 
                      <div class="col-md-9">
                       <button class="btn btn-primary btn-lg" id="usersave" name="save" type="submit" ><i class="fa fa-save"></i>  Save</button>  
                       </div>   
                    </div>
                </div> 
                </div>

 
 
              
 
</form>
       