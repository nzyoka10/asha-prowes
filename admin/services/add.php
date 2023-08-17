<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
 ?>   
<!-- // SELECT `ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`, `Description` FROM `tblserviceprovider` WHERE 1 -->
 <form class="" action="controller.php?action=add" method="POST" onsubmit="return validateRetypePassword()"  autocomplete="off">

                <div class="row no-gutters"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                      <div class="card-header">
                          <h2>Add New Service Provider</h2>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "ServiceName">Service Provider:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="ServiceName" name="ServiceName" placeholder=
                            "Service Provider" type="text" value="">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "ServiceContact">Contact Number:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="ServiceContact" name="ServiceContact" placeholder=
                            "Contact Number" type="text" value="">
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "ServiceAddress">Address:</label>

                      <div class="col-md-9"> 
                         <textarea class="form-control input-sm" id="ServiceAddress" name="ServiceAddress" placeholder=
                            "Address" ></textarea>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "Services">Services:</label>

                      <div class="col-md-9"> 
                         <textarea class="form-control input-sm" id="Services" name="Services" placeholder=
                            "Services" ></textarea>
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "spUsername">Username:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="spUsername" name="spUsername" placeholder=
                            "Username" type="text" value="">
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "spPassword">Password:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="spPassword" name="spPassword" placeholder=
                            "Password" type="password" value="">
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