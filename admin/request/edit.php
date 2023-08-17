<?php   
 if (!isset($_SESSION['USERID'])){
  redirect(web_root."admin/login.php");
 }
$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}
  $r = New Request();
  $res = $r->single_request($id);

?> 

 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       <div class="row no-gutters"> 
                <div class="col-md-3"></div>
                <div class="col-md-6"> 
                    <div class="card-header">
                          <h2>Modify Request</h2>
                    </div>  
                                      
                    <div class="form-group row no-gutters"> 
                      <label class="col-md-3 label" for=
                      "Request">Request:</label>

                      <div class="col-md-9"> 
                        <input type="hidden" name="RequestID" value="<?php echo $res->RequestID;?>">
                         <textarea class="form-control input-sm" id="Request" rows="10" name="Request" placeholder=
                            "Input Request...." type="text" ><?php echo $res->Request;?></textarea>
                      </div> 
                    </div>


                    <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "ClientID">Clients:</label>

                      <div class="col-md-9"> 
                         <select class="form-control" name="ClientID" id="ClientID">
                           <option>Select</option>
                           <?php
                            $clients = new Clients();
                            $cur = $clients->listOfclient();
                            foreach ($cur as $result) {
                              # code...
                              if($res->ClientID==$result->ClientID){

                                echo '<option selected value="'.$result->ClientID.'">'.$result->Fname.' '.$result->Lname.'</option>';
                              }else{
                                 echo '<option value="'.$result->ClientID.'">'.$result->Fname.' '.$result->Lname.'</option>';
                              }
                            }
                           ?>
                         </select>
                      </div> 
                    </div>

                  <div class="form-group row no-gutters">  
                      <label class="col-md-3 label" for=
                      "ServiceID">Service Provider:</label>

                      <div class="col-md-9"> 
                         <select class="form-control" name="ServiceID" id="ServiceID">
                           <option>Select</option>
                            <?php
                              $service = new ServiceProvider();
                              $cur = $service->listOfprovider();
                              foreach ($cur as $result) {
                                # code...
                                if($res->ServiceID==$result->ServiceID){ 
                                  echo '<option SELECTED value="'.$result->ServiceID.'">'.$result->ServiceName.'</option>';
                                }else{
                                  echo '<option value="'.$result->ServiceID.'">'.$result->ServiceName.'</option>';
                                }
                              }
                           ?>
                         </select>
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
       