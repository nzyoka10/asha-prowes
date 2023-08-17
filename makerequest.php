   <?php 
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    if ($id==0) {
      # code...
      redirect("");

    }

    $serviceprovider = new ServiceProvider();
    $res = $serviceprovider->single_provider($id);


    if (isset($_POST['sendrequest'])) {
      # code...
      $request = New Request(); 
      $request->Request     = $_POST['Request'];
      $request->ClientID    = $_SESSION['ClientID'];
      $request->ServiceID     = $_POST['ServiceID'];
      $request->Status      = 'Pending';
      $request->Remarks     = 'Request is on process...'; 
      $request->create(); 
 
      message("New Request created successfully!", "success");
      redirect("index.php?q=success");
    }


   ?>
<style type="text/css">
	 .best-features{
      margin-bottom: 70px;
      margin-top: 50px;
    }
     .right-image img {
      width: 100%;
      height: 390px;
     }
     .footer {
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
      margin-bottom: 50px;
     }

	a {
  outline: none !important;
  border: none;
  background: transparent;
}

a:hover {
  cursor: pointer;
}


/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.btn {
  font-family: Poppins-Medium;
  font-size: 16px;
  color: #555555;
  line-height: 1.2;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 120px;
  height: 50px;
  border-radius: 25px;

  background: #9152f8;
  background: -webkit-linear-gradient(bottom, #62BFE6, #0042CB);
  background: -o-linear-gradient(bottom, #62BFE6, #0042CB);
  background: -moz-linear-gradient(bottom, #62BFE6, #0042CB);
  background: linear-gradient(bottom, #62BFE6, #0042CB);
  position: relative;
  z-index: 1;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.btn::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  border-radius: 25px;
  background-color: #fff;
  top: 0;
  left: 0;
  opacity: 1;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.btn:hover {
  color: #fff;
}

.btn:hover:before {
  opacity: 0;
}
   </style>

    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 style="text-transform: uppercase;"><?php echo $res->ServiceName;?></h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="images/<?php echo $res->PicLoc;?>" alt="">
            </div>

            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <p><?php echo $res->Services;?></p>
              <ul class="footer">
                <li><i class="fa fa-phone"></i> <?php echo $res->ServiceContact;?></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> <?php echo $res->ServiceAddress;?></a></li>
              </ul> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              
      <section class="section section-md">
        <div class="container">
          <h3>Make a Request</h3>
          <!--RD Mailform-->
          <form class="  rd-form text-left"  method="post" action="">
            <div class="row row-30"> 
              <div class="col-md-12">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message">Request</label>
                  <input type="hidden" name="ServiceID" value="<?php echo $id;?>">
                  <textarea class="form-input" id="contact-message" name="Request" data-constraints="@Required"></textarea>
                </div>
              </div>
            </div>
            <div class="form-button">
              <?php if (isset($_SESSION['ClientID'])) { ?>  
                <button class="button button-primary" name="sendrequest" type="submit">Submit</button>
              <?php }else{ ?>
                <a class="button button-primary" name="sendrequest" href="index.php?q=login">Submit</a>
              <?php } ?>
            </div>
          </form>
        </div>
      </section>
            </div>
          </div>
        </div>
      </div>
    </div> 