<?php 
require_once("../includes/initialize.php");  
 if (isset($_SESSION['USERID'])){
  redirect(web_root."admin/");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Prowes | Admin Login</title> 
  <link rel="icon" href="<?php echo web_root;?>images/favicon.ico">
	<style type="text/css">
   
/*login*/

 body{
  margin:0;
  color:#6a6f8c;
  background:#c8c8c8;
  font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
  width:100%;
  margin:auto;
  max-width:525px;
  min-height:670px;
  position:relative;
  background:url('../images/logo.png') no-repeat center;
  box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
  width:100%;
  height:100%;
  position:absolute;
  padding:90px 70px 50px 70px;
  background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm {
  top:0;
  left:0;
  right:0;
  bottom:0;
  position:absolute;  
}
.tab,
.label{
  color: #fff;
}
 
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
  text-transform:uppercase;
}
.login-html .tab{
  font-size:22px;
  margin-right:15px;
  padding-bottom:5px;
  margin:0 15px 10px 0;
  display:inline-block;
  border-bottom:2px solid transparent;
} 
.login-form{
  min-height:345px;
  position:relative;
  perspective:1000px;
  transform-style:preserve-3d;
}
.login-form .group{
  margin-bottom:15px;
}
.button {
  cursor: pointer;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
  width:100%;
  color:#fff;
  display:block;
}
.login-form .group .input,
.login-form .group .button{
  border:none;
  padding:15px 20px;
  border-radius:25px;
  background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
  text-security:circle;
  -webkit-text-security:circle;
}
.login-form .group .label{
  color:#aaa;
  font-size:12px;
}
.login-form .group .button{
  background:#1161ee;
}
.login-form .group label .icon{
  width:15px;
  height:15px;
  border-radius:2px;
  position:relative;
  display:inline-block;
  background:rgba(255,255,255,.1);
}
 
.hr{
  height:2px;
  margin:60px 0 50px 0;
  background:rgba(255,255,255,.2);
}
.foot-lnk{
  text-align:center;
} 
.error-chk{
  color: #fff;
}

  </style> 
</head>
<body>
  <form action="login.php" method="POST" autocomplete="off"> 
 <div class="login-wrap">
  <div class="login-html">

    <label class="tab">Sign In</label>  
    <div class="error-chk"><?php check_message();?></div>
    <div class="hr"></div>
    <div class="login-form">
      <div class="sign-in-htm">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="user" type="text" class="input" name="user_email">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" type="password" class="input" data-type="password" name="user_pass">
        </div> 
        <div class="group">
          <input type="submit" class="button" value="Sign In" name="btnLogin">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Prowes</a>
        </div>
      </div>
      
    </div>
  </div>
</div>
</form>
</body>
 
</html>

<?php

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);

   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");

    }else{
      //it creates a new objects of member
        $user = new User();
        //make use of the static function, and we passed to parameters
        $res = $user::userAuthentication($email, $h_upass);
        if ($res==true) { 
           redirect(web_root."admin/"); 
        }else{
           message("Account does not exist! Please contact Administrator.", "error");
           redirect(web_root."admin/login.php");
        }
   }
 }
 ?>  
