   <?php
// SELECT `ServiceID`, `ServiceName`, `ServiceContact`, `ServiceAddress`, `lat`, `lng`, `Services`, `EmailAddress`, `spUsername`, `spPassword`, `Status`, `PicLoc` FROM `tblserviceprovider` WHERE 1
 $sql = "SELECT * FROM `tblserviceprovider` WHERE `ServiceID`=".$_SESSION['ServiceID'];
 $mydb->setQuery($sql);
 $sp=$mydb->loadSingleResult();
 ?>
  <style type="text/css"> 
    .card-body img{
      width: 100%;
      height: 50%;
    }
    .card-body img:hover{
      cursor: pointer;
    }
    .wrap{
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .card-wrap{
      min-height: 290px;
    }
  </style>
 
<div class="container wrap">

    <div class="row">

        <div class="col-sm-3"><!--left col-->
           <div class="card card-default">            
            <div class="card-body"> 
              <div  id="image-container">
                <img title="profile image"  data-target="#myModal"  data-toggle="modal"  src="<?php echo web_root.'images/'.$sp->PicLoc; ?>">  
              </div>
             </div>
          <ul class="list-group"> 
         
            <li class="list-group-item text-muted">Profile</li> 
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real Name</strong></span> 
             <?php echo $sp->ServiceName; ?> 
             </li>
              <li class="list-group-item <?php echo ($view=='request' || $view=='' || $view=='roomdetails') ? 'active': '';?>"><a href="<?php echo web_root.'service/index.php?view=request'; ?>"><i class="fa fa-list"></i> Request
                   </a></li> 
                  <li class="list-group-item <?php echo ($view=='accounts') ? 'active': '';?>"><a href="<?php echo web_root.'service/index.php?view=accounts'; ?>"><i class="fa fa-user"></i> Accounts </a></li>
          </ul>  
 
          <!-- /.box -->
          </div>
          
        </div> 
        <div class="col-sm-9">
          <div class="card card-default card-wrap">
            <div class="card-body"> 

              <?php
                  require_once("../includes/initialize.php"); 
                   if (!isset($_SESSION['ServiceID'])){
                    redirect(web_root."index.php");
                   }

                  $view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

                  switch ($view) {
                    case 'notification' :
                      $content    = 'notification.php';   
                      break;

                    case 'request' :
                      $content    = 'list.php';    
                      break; 


                    case 'view' :
                      $content    = 'view.php';    
                      break; 

                      case 'accounts' :
                      $content    = 'edit.php';    
                      break; 

                    default :
                      $content    = 'list.php';    
                  } 

                  require_once $content;
                  ?>
            </div> 
          </div>
        </div><!--/col-sm-9-->
    </div><!--/row-->

  </div><!--/contanier--> 
 
 
         <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>
                                </div>

                                <form action="controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">
                                                          <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button  class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
