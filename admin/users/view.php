<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
$USERID = isset($_GET['id']) ? $_GET['id'] : '';

if($USERID==''){
   redirect("index.php");
}


  $user = New User();
  $singleuser = $user->single_user($USERID);

 
  ?>
<div class="container">  
  <h1 style="text-align: center;"><strong>User Profile</strong></h1><br>  
    <div class="row no-gutters">
        <div class="col-md-4">
            <form action="controller.php?action=photos" enctype="multipart/form-data" method="post" style="padding: 3px 4px;"> 
              <div>
                <img alt="click here to change image" style="width: 100%;height: 350px;"
                 title=""  src="<?php echo web_root.'images/'. $singleuser->PicLoc;?>"  >  
              </div> 
              <div> 
                  <input  type="hidden" name="user_id" id="user_id" value="<?php echo $USERID ?>">
                  <input name="MAX_FILE_SIZE" type=
                                  "hidden" value="1000000"> <input id=
                                  "photo" name="photo" type=
                                  "file"> 
                 <button class="btn btn-primary"
                        name="savephoto" type="submit">Upload Photo</button>
                
              </div>
           </form>
        </div>
        <div class="col-md-8">
            <div class="row" style="padding: 3px 4px;">
              <label class="col-md-4 control-label" for=
              "U_NAME">Name:</label>

              <div class="col-md-8">
                 <input id="USERID" name="USERID" type="Hidden" value="<?php echo $singleuser->USERID; ?>"> 
                 <input class="form-control" id="U_NAME" name="U_NAME" placeholder=
                    "Account Name" type="text" value="<?php echo $singleuser->NAME; ?>" readonly>
              </div>
            </div> 
          
            <div class="row" style="padding: 3px 4px;">
              <label class="col-md-4 control-label" for=
              "U_USERNAME">Username:</label>

              <div class="col-md-8">
                <input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=
                    "Email Address" type="text" value="<?php echo $singleuser->UEMAIL; ?>" readonly>
              </div>
            </div>
                  
        </div>
    </div>
</div>  
 