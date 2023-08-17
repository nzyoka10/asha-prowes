                      <?php 
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
                       ?>   

 <form class="" action="controller.php?action=add" method="POST" onsubmit="return validateRetypePassword()">

                <div class="row no-gutters"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                      <div class="card-header">
                          <h2>Add New User</h2>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "user_name">Name:</label>

                      <div class="col-md-9">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="user_name" name="user_name" placeholder=
                            "Account Name" type="text" value="">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "user_email">Username:</label>

                      <div class="col-md-9">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="user_email" name="user_email" placeholder=
                            "Username" type="text" value="">
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-3 label" for=
                      "user_pass">Password:</label>

                      <div class="col-md-9">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="user_pass" name="user_pass" placeholder=
                            "Account Password" type="Password" value="">
                      </div> 
                    </div>

                 <div class="form-group row no-gutters">
 
                      <label class="col-md-3 label" for=
                      "user_pass">Retype Password:</label>

                      <div class="col-md-9">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="retype_user_pass" name="retype_user_pass" placeholder=
                            "Retype Password" type="Password" value=""><div id="rpass_errormsg"></div>
                      </div> 
                    </div>

                     <div class="form-group row no-gutters">

                      <label class="col-md-3 label" for=
                      "user_type">Type:</label>

                      <div class="col-md-9">
                       <select class="form-control input-sm" name="user_type" id="user_type">
                          <option>Administrator</option>
                          <option>Staff</option>  
                        </select> 
                      </div> 
                      </div> 

                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "idno"></label> 
                      <div class="col-md-9">
                       <button class="btn btn-primary btn-lg" id="usersave" name="save" type="submit" ><i class="fa fa-save"></i>  Save</button> 
                          <a href="index.php" class="btn btn-info btn-lg"><span class="fa fa-arrow-left"></span> List of Users</a>
                       </div>   
                    </div>
                </div>
                <div class="col-md-3"></div>
                </div>
        </form> 