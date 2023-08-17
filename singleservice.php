   <?php 
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    if ($id==0) {
      # code...
      redirect("");

    }

    $serviceprovider = new ServiceProvider();
    $res = $serviceprovider->single_provider($id);


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
      /*margin-bottom: 50px;*/
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

 


.gold {
  color: gold;
}
.rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
        position: absolute;
        /* top: -9999px; */
        clip: rect(0, 0, 0, 0);
        height: 0;
        width: 0;
        overflow: hidden;
        opacity: 0;
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

.tableRating tr td {
  padding: 5px 20px;

}
.ratings{
  background-color: #F2F2F2;
  padding: 10px;
  font-size: 50px;
  font-weight: bold;
  color: #DC4B3E;
  margin: 0px;
  text-align: center;
  margin-bottom: 10px;
  width: 120px;
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
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <H5><?php echo $res->Services;?></H5>
              <ul class="footer">
                <li><i class="fa fa-phone"></i> <?php echo $res->ServiceContact;?></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> <?php echo $res->ServiceAddress;?></a></li>
              </ul> 
              <div class="ratings">
                <?php 
                  $sql = "SELECT SUM(`RatingNo`) as rate,COUNT(ClientID) as noclient FROM `tblrating` WHERE `ServiceID`=".$res->ServiceID;
                  $mydb->setQuery($sql);
               
                    $rate_no = $mydb->loadSingleResult();

                    $rt  = 5 * $rate_no->noclient;

                  $rateno =  isset($rate_no->rate) ? ($rate_no->rate*5) / $rt : 0;
                  echo   number_format($rateno,1)

                  // echo isset($rate_no->rate) ?(($rate_no->rate*5)/$rate_no->noclient) :0;
                  // echo (20/5*5)*5;
                  // echo 

                 ?> 

              </div>
              <div class="col-md-4">
                  <div class="form-button">
                  <a href="index.php?q=request&id=<?php echo $res->ServiceID;?>" class="button button-primary">Make a Request</a> 
                </div>
              </div>
            </div>
          </div>
        </div>
 <hr/>
 <br/>
 <br/>
        <form action="process.php?action=rate" method="POST"  > 
              <h3>Rate Us</h3>
              <label class="">Feed Back</label>
              <div><textarea name="fedback" class="form-control" rows="9"></textarea></div>
              <br/>
              <p>Rate</p>
                 <div class="rating"> 
                    <input type="radio" id="star5" name="ratingNo" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                    <input type="radio" id="star4" name="ratingNo" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3" name="ratingNo" value="3" /><label for="star3" title="Not Bad">3 stars</label>
                    <input type="radio" id="star2" name="ratingNo" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                    <input type="radio" id="star1" name="ratingNo" value="1" /><label for="star1" title="Mahal Masyado">1 star</label>
                </div>
                <div class="clear-fix"></div>
                <div style="clear: all;"></div>
                <?php if (isset($_SESSION['ClientID'])) { ?> 

                    <input type="hidden" name="ServiceID" id="ServiceID" value="<?php echo $res->ServiceID;?>" /> 
                 <div class="col-lg-12 row" > <button type="submit" name="submitRating" class="button button-primary ">Submit</button></div>
               <?php }else{
                  echo '<div class="col-lg-12 row" ><a data-target="#myModal_Rating" data-toggle="modal" href="" data-id="'. $res->ServiceID.'" class="button button-primary" id="ServiceID_rating">Submit</a></div>';

               } ?>
            </form>
      </div>
    </div>
 