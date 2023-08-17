<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
 
$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id==''){
   redirect("index.php");
}

  $sp = New ServiceProvider();
  $res = $sp->single_provider($id);

 
  ?>
<div class="container">  
  <h1 style="text-align: center;"><strong>Service Provider Details</strong></h1><br>  
    <div class="row no-gutters">
        <div class="col-md-4">
            <form action="controller.php?action=photos" enctype="multipart/form-data" method="post" style="padding: 3px 4px;"> 
              <div>
                <img alt="click here to change image" style="width: 100%;height: 350px;"
                 title=""  src="<?php echo web_root.'images/'. $res->PicLoc;?>"  >  
              </div> 
              <div> 
                  <input  type="hidden" name="ServiceID" id="ServiceID" value="<?php echo $id ?>">
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
                      "ServiceName">Service Provider:</label>

                      <div class="col-md-8"> 
                         <input id="ServiceID" name="ServiceID"  type="hidden" value="<?php echo $res->ServiceID ?>">
                         <input class="form-control input-sm" id="ServiceName" name="ServiceName" placeholder=
                            "Service Provider" type="text" value="<?php echo $res->ServiceName ?>" readonly>
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-4 label" for=
                      "ServiceContact">Contact Number:</label>

                      <div class="col-md-8"> 
                         <input class="form-control input-sm" id="ServiceContact" name="ServiceContact" placeholder=
                            "Contact Number" type="text" value="<?php echo $res->ServiceContact ?>" readonly>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "ServiceAddress">Address:</label>

                      <div class="col-md-8"> 
                         <textarea class="form-control input-sm" id="ServiceAddress" name="ServiceAddress" placeholder=
                            "Address"  readonly><?php echo $res->ServiceAddress ?></textarea>
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "Services">Services:</label>

                      <div class="col-md-8"> 
                         <textarea class="form-control input-sm" id="Services" name="Services" placeholder=
                            "Services"  readonly><?php echo $res->Services ?></textarea>
                      </div> 
                    </div>

                     <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "spUsername">Service Provider:</label>

                      <div class="col-md-8"> 
                         <input class="form-control input-sm" id="spUsername" name="spUsername" placeholder=
                            "Username" type="text" value="<?php echo $res->spUsername ?>" readonly>
                      </div> 
                    </div>
   
                </div>
                <div class="col-md-3"></div>
                </div>
        </div>
    </div>
</div>  
 