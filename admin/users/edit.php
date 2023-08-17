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

 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">


               <div class="row no-gutters"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                      <div class="page-header">
                          <h2>Modify User</h2>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "user_name">Name:</label>

                      <div class="col-md-9">
                       <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                            "Account Id" type="Hidden" value="<?php echo $singleuser->USERID; ?>">
                         <input class="form-control input-sm" id="user_name" name="user_name" placeholder=
                            "Account Name" type="text" value="<?php echo $singleuser->NAME; ?>">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "user_email">Username:</label>

                      <div class="col-md-9">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="user_email" name="user_email" placeholder=
                            "Username" type="text" value="<?php echo $singleuser->UEMAIL; ?>">
                      </div> 
                    </div>
 

                     <div class="form-group row no-gutters">

                      <label class="col-md-3 label" for=
                      "user_type">Type:</label>

                      <div class="col-md-9">
                       <select class="form-control input-sm" name="user_type" id="user_type">
                          <option <?php echo ($singleuser->TYPE=='Administrator')? 'SELECTED':'';?>>Administrator</option>
                          <option <?php echo ($singleuser->TYPE=='Staff')? 'SELECTED':'';?>>Staff</option>  
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
       