<style type="text/css">
    
/* ==========================================================================
   #FONT
   ========================================================================== */
.font-robo {
  font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
}

.font-poppins {
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
}

.font-opensans {
  font-family: "Open Sans", "Arial", "Helvetica Neue", sans-serif;
}

 
.form-row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  padding: 5px 26px;
  border-bottom: 1px solid #e5e5e5;
}

.form-row .name {
  width: 188px;
  color: #333;
  font-size: 15px;
  font-weight: 700; 
}

.form-row .value {
  width: -webkit-calc(100% - 188px);
  width: -moz-calc(100% - 188px);
  width: calc(100% - 188px);
}

@media (max-width: 767px) {
  .form-row {
    display: block;
    padding: 24px 30px;
  }
  .form-row .name,
  .form-row .value {
    display: block;
    width: 100%;
  }
  .form-row .name {
    margin-top: 0;
    margin-bottom: 12px;
  }
}

 
button {
/*  outline: none;
  background: none;
  border: none;*/
}

/* ==========================================================================
   #PAGE WRAPPER
   ========================================================================== */
.page-wrapper { 

   width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 5px;

  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  z-index: 1;  
}

.page-wrapper:before{
     content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgba(255,255,255,0.9);
}

body {
  font-family: "Open Sans", "Arial", "Helvetica Neue", sans-serif; 
}

 
/* ==========================================================================
   #SPACING
   ========================================================================== */
 
.p-t-20 {
  padding-top: 20px;
}
 

.p-b-50 {
  padding-bottom: 50px;
}

 
/* ==========================================================================
   #WRAPPER
   ========================================================================== */
.wrapper {
  margin: 0 auto;
  width: 100%;
}

.wrapper--w1260 {
  max-width: 700px;
}
  

@media (max-width: 767px) {
  .card-6 .card-footer {
    padding: 50px 30px;
  }
  .wrapper {
    width: 100%;
  }
}
.limiter {
  width: 100%; 
}
 

.form-body{
    background:#fff;
    padding:20px;
}
 
.innter-form{
  padding-top:20px;
}

  .card-body p {
      padding-bottom: 10px;
      font-size: 15px;
      font-weight: bold;
      border-bottom: 1px #ddd solid;
      margin-bottom: 10px;
      color: #000;
      /*text-transform: uppercase;*/
  }
 

</style>
<div class="limiter"> 
 <div class="page-wrapper bg-dark p-t-20 p-b-50" style="background-image: url('images/banner.jpg');">
        <div class="wrapper wrapper--w1260" > 
         <div class="container">
            <div class="row">
            <div class="col-md-12">
            <div class="card">
              
                    <div class="card-body">
                      <!-- SELECT `ClientID`, `Fname`, `Lname`, `Address`, `ContactNo`, `Status`, `cUsername`, `cPassword`, `PicLoc` FROM `tblclients` WHERE 1 -->
                      <p>Register as Client</p>
                       <form class="sa-innate-form" method="post" action="process.php?action=addc">
                        <label>Fist name</label>
                        <input type="text"  class="form-input" name="Fname">
                        <label>Last name</label>
                        <input type="text"  class="form-input" name="Lname">
                        <label>Address</label>
                        <input type="text"  class="form-input" name="Address">
                        <label>Contact Number</label>
                        <input type="text"  class="form-input" name="ContactNo">
                        <label>Username</label>
                        <input type="text"  class="form-input" name="cUsername">
                        <label>Password</label>
                        <input type="password"  class="form-input" name="cPassword">
                        <button type="submit" class="button button-primary" name="btnregister">Submit Registration</button> 
                        </form>
                        </div> 
                        
                </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>

