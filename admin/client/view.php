<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
 
$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id==''){
   redirect("index.php");
}

  $client = New Clients();
  $res = $client->single_client($id);

 
  ?>
<div class="container">  
  <h1 style="text-align: center;"><strong>Client Details</strong></h1><br>  
    <div class="row no-gutters">
        <div class="col-md-4">
            <form action="controller.php?action=photos" enctype="multipart/form-data" method="post" style="padding: 3px 4px;"> 
              <div>
                <img alt="click here to change image" style="width: 100%;height: 350px;"
                 title=""  src="<?php echo web_root.'images/'. $res->PicLoc;?>"  >  
              </div> 
              <div> 
                  <input  type="hidden" name="ClientID" id="ClientID" value="<?php echo $id ?>">
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
                            <div class="col-md-3"></div>
                <div class="col-md-6">           
                     <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-8"> 
                         <input  id="ClientID" name="ClientID" type="hidden" value="<?php echo $res->ClientID;?>">
                         <input class="form-control input-sm" id="Fname" name="Fname" placeholder=
                            "First Name" type="text" value="<?php echo $res->Fname;?>">
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-4 label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-8"> 
                         <input class="form-control input-sm" id="Lname" name="Lname" placeholder=
                            "Last Name" type="text" value="<?php echo $res->Lname;?>">
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "Address">Address:</label>

                      <div class="col-md-8"> 
                         <textarea class="form-control input-sm" id="Address" name="Address" placeholder=
                            "Address" ><?php echo $res->Address;?></textarea>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "ContactNo">Contact Number:</label>

                      <div class="col-md-8"> 
                         <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                            "Contact Number" value="<?php echo $res->ContactNo;?>" >
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "cUsername">Username:</label>

                      <div class="col-md-8"> 
                         <input class="form-control input-sm" id="cUsername" name="cUsername" placeholder=
                            "Username" type="text" value="<?php echo $res->cUsername;?>">
                      </div> 
                    </div>
   
                </div>
                <div class="col-md-3"></div>
                </div>
        </div>
    </div>
</div>  
 