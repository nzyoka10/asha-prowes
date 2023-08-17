<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}
  $sp = New ServiceProvider();
  $res = $sp->single_provider($id);

?> 



 

 <form class="row" action="controller.php?action=changepassword" method="POST" onsubmit="return validateRetypePassword()">

 
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="page-header">
                  <h2>Change Password</h2>
                </div>
                 <input id="ServiceID" name="ServiceID" type="Hidden" value="<?php echo $res->ServiceID; ?>">
      
                    <div class="row form-group no-gutters">
                      <label class="col-md-4 label" for=
                      "ServiceName">Service Provider:</label>

                      <div class="8">

                        <?php echo $res->ServiceName; ?>
                        
                      </div>
                    </div> 

                   <div class="row form-group no-gutters">
                      <label class="col-md-4 label" for=
                      "spUsername">Username:</label>

                      <div class="8">

                        <?php echo $res->spUsername; ?>
                        
                      </div>
                    </div> 

                  <hr/>

                  <div class="form-group"> 
                      <label class="col-md-4 label" for=
                      "spPassword">New Password:</label>

                      <div class="12"> 
                         <input class="form-control input-sm" id="user_pass" name="spPassword" placeholder=
                            "Account Password" type="Password" value="" placeholder="Enter new password......">
                      </div>
                    </div> 
                  <div class="form-group"> 
                      <label class="col-md-4 label" for=
                      "user_pass">Retype Password:</label>

                      <div class="12"> 
                         <input class="form-control input-sm" id="retype_user_pass" name="retype_user_pass" placeholder=
                            "Retype Password" type="Password" value="">
                      </div>
                    </div> 
            
             <div class="form-group"> 
                      <label class="col-md-4 label" for=
                      "idno"></label>

                      <div class="12">
                         <button class="btn btn-primary btn-lg" id="usersave" name="save" type="submit" ><i class="fa fa-save"></i> Save</button>
                          <a href="index.php" class="btn btn-info btn-lg"><span class="fa fa-arrow-left"></span> Back</a>
                      </div>
                    </div> 
              </div>
              <div class="col-md-3"></div>
 
        </form>
       