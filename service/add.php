<?php   
 if (!isset($_SESSION['ClientID'])){
  redirect(web_root."login.php");
 }
 ?>   
 
 <form class="" action="controller.php?action=add" method="POST" onsubmit="return validateRetypePassword()"  autocomplete="off">

                <div class="row no-gutters"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                      <div class="card-header">
                          <h2>Add New Clients</h2>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="Fname" name="Fname" placeholder=
                            "First Name" type="text" value="">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="Lname" name="Lname" placeholder=
                            "Last Name" type="text" value="">
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "Address">Address:</label>

                      <div class="col-md-9"> 
                         <textarea class="form-control input-sm" id="Address" name="Address" placeholder=
                            "Address" ></textarea>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "ContactNo">Contact Number:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                            "Contact Number" >
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "cUsername">Username:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="cUsername" name="cUsername" placeholder=
                            "Username" type="text" value="">
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "cPassword">Password:</label>

                      <div class="col-md-9"> 
                         <input class="form-control input-sm" id="cPassword" name="cPassword" placeholder=
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