<?php
if(isset($_SESSION['ClientID'])){
   redirect(web_root."index.php");
}
if(isset($_POST['btnLogin'])){
  $email = trim($_POST['username']);
  $upass  = trim($_POST['pass']);
  $h_upass = sha1($upass);

   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      echo '<script>

        alert("Invalid Username and Password!")


      </script>';
      redirect(web_root."index.php?q=login&auth=client");

    }else{
      //it creates a new objects of member
        $client = new Clients();
        //make use of the static function, and we passed to parameters
        $res = $client::clientAuthentication($email, $h_upass);
        if ($res==true) { 
           redirect(web_root."client/"); 
        }else{
           message("Account does not exist! Please contact Administrator.", "error");
            echo '<script>

              alert("Account does not exist! Please contact Administrator.")
            
              </script>';
           redirect(web_root."index.php?q=login&auth=client");
        }
   }
 }
 if(isset($_POST['btnsp_login'])){
  $email = trim($_POST['username']);
  $upass  = trim($_POST['pass']);
  $h_upass = sha1($upass);

   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      echo '<script>alert("Invalid Username and Password!")</script>';
      redirect(web_root."index.php?q=login&auth=client");

    }else{
      //it creates a new objects of member
        $service = new ServiceProvider();
        //make use of the static function, and we passed to parameters
        $res = $service::spAuthentication($email, $h_upass);
        if ($res==true) { 
           redirect(web_root."service/"); 
        }else{
           message("Account does not exist! Please contact Administrator.", "error");
            echo '<script>alert("Account does not exist! Please contact Administrator.")</script>';
           redirect(web_root."index.php?q=login&auth=service");
        }
   }
 }
 ?>  
 <style type="text/css">
   @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

 
 

.wrapper-login h1 {
  font-weight: bold;
  margin: 0;
  font-size: 18px;
}

.wrapper-login h2 {
  text-align: center;
}

.wrapper-login p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

.wrapper-login span {
  font-size: 12px;
}

.wrapper-login a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

 

.wrapper-login button {
  border-radius: 20px;
  border: 1px solid #0042CB;
  background-color: #0042CB;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

.wrapper-login button:active {
  transform: scale(0.95);
}

.wrapper-login button:focus {
  outline: none;
}

.wrapper-login button.ghost {
  background-color: transparent;
  border-color: #FFFFFF;
}

.wrapper-login form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

.wrapper-login input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.wrapper-login {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
    4px 18px 28px rgba(10,21,0,0.25), 
    0 10px 10px rgba(0,12,0,0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px; 
  margin-top: 10px;
  margin-bottom: 10px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .sign-in-container {
  transform: translateX(100%);
}

.sign-in-sp-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .sign-in-sp-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%, 49.99% {
    opacity: 0;
    z-index: 1;
  }
  
  50%, 100% {
    opacity: 1;
    z-index: 5;
  }
}

 .overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

 .container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

 .overlay {
  background: #62BFE6;
  background: -webkit-linear-gradient(to right, #0042CB, #62BFE6);
  background: linear-gradient(to bottom, #0042CB, #62BFE6);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
    transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

 .container.right-panel-active .overlay {
    transform: translateX(50%);
}

 .overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

 .overlay-left {
  transform: translateX(-20%);
}

 .container.right-panel-active .overlay-left {
  transform: translateX(0);
}

 .overlay-right {
  right: 0;
  transform: translateX(0);
}

 .container.right-panel-active .overlay-right {
  transform: translateX(20%);
}


 
 </style>
 
<div class="wrapper-login container" id="container"> 
  <div class="form-container sign-in-sp-container">
    <form action="index.php?q=login&auth=provider" method="POST">
      <h1>Service Provider LogIn</h1>  
      <input type="text" placeholder="Username" name="username" />
      <input type="password" placeholder="Password" name="pass" /> 
      <button name="btnsp_login">Login</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="index.php?q=login&auth=client" method="POST">
      <h1>Client LogIn</h1>  
      <input type="text" placeholder="Username" name="username" />
      <input type="password" placeholder="Password" name="pass" /> 
      <button name="btnLogin">Login</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <p>Welcome Back!</p>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Login as Client</button>
      </div>
      <div class="overlay-panel overlay-right">
          <p>Welcome Back!</p>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signinsp">Login as Service Provider</button>
      </div>
    </div>
  </div>
</div>

 