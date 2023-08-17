<?php  

 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
  @$user_id = $_GET['id'];
    if($user_id==''){
  redirect("index.php");
}
  $user = New User();
  $singleuser = $user->single_user($user_id);

?> 


 

 <form class="row" action="controller.php?action=changepassword" method="POST" onsubmit="return validateRetypePassword()">

 
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="page-header">
                  <h2>Change Password</h2>
                </div>
                 <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                    "Account Id" type="Hidden" value="<?php echo $singleuser->USERID; ?>">
      
                    <div class="row form-group no-gutters">
                      <label class="col-md-2 label" for=
                      "user_name">Name:</label>

                      <div class="12">

                        <?php echo $singleuser->NAME; ?>
                        
                      </div>
                    </div> 

                   <div class="row form-group no-gutters">
                      <label class="col-md-2 label" for=
                      "user_name">Username:</label>

                      <div class="12">

                        <?php echo $singleuser->UEMAIL; ?>
                        
                      </div>
                    </div> 

                  <hr/>

                  <div class="form-group"> 
                      <label class="col-md-4 label" for=
                      "user_pass">New Password:</label>

                      <div class="12">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="user_pass" name="user_pass" placeholder=
                            "Account Password" type="Password" value="" placeholder="Enter new password......">
                      </div>
                    </div> 
                  <div class="form-group"> 
                      <label class="col-md-4 label" for=
                      "user_pass">Retype Password:</label>

                      <div class="12">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="retype_user_pass" name="retype_user_pass" placeholder=
                            "Retype Password" type="Password" value="">
                      </div>
                    </div> 
            
             <div class="form-group"> 
                      <label class="col-md-4 label" for=
                      "idno"></label>

                      <div class="12">
                         <button class="btn btn-primary btn-lg" id="usersave" name="save" type="submit" ><i class="fa fa-save"></i> Save</button>
                          <a href="index.php" class="btn btn-info btn-lg"><span class="fa fa-arrow-left"></span> List of Users</a>
                      </div>
                    </div> 
              </div>
              <div class="col-md-3"></div>
 
        </form>
       