<?php   
 if (!isset($_SESSION['ClientID'])){
  redirect(web_root."index.php");
 }
 
$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id==''){
   redirect("index.php");
}

$request = New Request();  
$request->Viewed      = 1;  
$request->update($id);



  $r = New Request();
  $request = $r->single_request($id);

  $client = New Clients();
  $client = $client->single_client($request->ClientID);


  $sp = New ServiceProvider();
  $sp = $sp->single_provider($request->ServiceID);

 
  ?>
  

 <style type="text/css"> 
.profile-main{
  width: 750px;
  margin: 50px auto;
  border: 1px solid #aed5e2;
  padding-bottom: 10px;
  height: auto;
}
.profile-header{
  height: 200px;
  width: 100%;
  background-color: #EBF6FA;
  border-bottom: 2px solid #E2F3FB;
  padding-bottom: 40px;
}
.user-detail{
  position: relative;
  width: 75%;
  margin: 0 auto;
  height: 100%;
}
.user-image{
  float: left;
  position: relative;
  width: 23%;
  height: 135px;
}
.user-image img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
  margin-top: 35px;
}
.prof-label{
  position: absolute;
  background: #8C13A0;
  color: #fff;
  padding: 9px 4px;
  border-radius: 50%;
  top: 155px;
  left: 42px;
  font-size: 12px;
}
.user-data{
  float: left;
  width: 46%;
  padding-left: 27px;
  margin-bottom: 20px;
}
.user-data h2{ 
  margin-bottom: 0px;
  margin-top: 35px;
  font-size: 20px;
  font-weight: 600;
}
.user-data .post-label{
  font-size: 10px;
  border: 1px solid #C3CECB;
  padding: 0px 4px;
  border-radius: 4px;
  background: #F3F5F5;
  margin-right: 5px;
}
.user-data .post-label:hover{
  background-color: #F8EDE7;
  border-color: #F2D4BA;
}
.user-data p{
  font-size: 12px;
  color: #404040;
}
 
/*tab*/
.tab-panel-main{
  width: 75%;
  margin: 0 auto; 
}
 
 
 

@media (min-width: 320px) and (max-width: 640px){
  .profile-main{
    width: 100%;
  }
  .user-detail{
    width: 95%;
  }
  .user-image {
    width: 33%;
    height: 100px;
  }
  .user-data{
    width: 51%;
    margin-bottom: 27px;
  }
  
  
  .profile-header{
    height: 250px;
  }
  
 
}
 </style>
 <?php
 // SELECT `ClientID`, `Fname`, `Lname`, `Address`, `ContactNo`, `Status`, `cUsername`, `cPassword`, `PicLoc` FROM `tblclients` WHERE 1
 $sql = "SELECT * FROM `tblclients` WHERE `ClientID`=".$_SESSION['ClientID'];
 $mydb->setQuery($sql);
 $client=$mydb->loadSingleResult();
 ?>
  <div class="profile-main">
    <div class="profile-header">
      <div class="user-detail">
        <div class="user-image">
           <a href="#" data-target="#myModal" data-toggle="modal" style="cursor: pointer;">
          <img alt="click here to change image" 
                 title=""   src="<?php echo web_root.'images/'.$client->PicLoc;?>">
                 </a>
        </div>
        <div class="user-data">
          <h2><?php echo $client->Fname. ' ' .$client->Lname;?></h2>
          <p class="post-label"><?php echo $client->ContactNo;?></p> 
          <p> 
          <i class="fa fa-map-marker" aria-hidden="true"></i>  <?php echo $client->Address;?>
          </p>
        </div> 
      </div>
    </div> 
      <div style="clear: both;"></div>
      <div class="tab-panel-main"> 
            <h4>Request Details</h4> 

        <hr/> 
             <div class="col-md-12 col">     
        <h4>Service Provider</h4>   
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "ServiceName">Service Provider:</label> 
                      <div class="col-md-8">  
                        <?php echo $sp->ServiceName ?> 
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-4 label" for=
                      "ServiceContact">Contact Number:</label>

                      <div class="col-md-8">
                        <?php echo $sp->ServiceContact ?> 
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "ServiceAddress">Address:</label>

                      <div class="col-md-8"> 
                         <?php echo $sp->ServiceAddress ?> 
                      </div> 
                    </div>

                    <div class="form-group row no-gutters">
                      <label class="col-md-4 label" for=
                      "Services">Services:</label>

                      <div class="col-md-8"> 
                         <?php echo $sp->Services ?>
                      </div> 
                    </div>
                </div>
               <div class="col-md-12 col">

               <h4>Request</h4>   
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Request">Request:</label>

                      <div class="col-md-8"> 
                        <?php echo $request->Request;?> 
                      </div> 
                    </div>
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Status">Status:</label>

                      <div class="col-md-8"> 
                        <?php echo $request->Status;?> 
                      </div> 
                    </div>
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-4 label" for=
                      "Remarks">Remarks:</label>

                      <div class="col-md-8"> 
                        <?php echo $request->Remarks;?> 
                      </div> 
                    </div>
                               
               </div>

       
      </div>
  </div> 


   <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

        <form action="controller.php?action=photos" enctype="multipart/form-data" method="post" style="padding: 3px 4px;">  
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
              <div style="display: inline;"> 
                  <input  type="hidden" name="ClientID" id="ClientID" value="<?php echo $id ?>">
                  <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                  <input id="photo" name="photo" type="file"> 
              </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"> 
        <button class="button button-ghost" name="savephoto" type="submit" >Upload Photo</button> 
      </div>

       </form>
    </div>
  </div>
</div>
