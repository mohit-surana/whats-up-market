<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$_SESSION['fname']=$_POST['fname'];
$_SESSION['ph']=$_POST['ph'];
$_SESSION['email']=$_POST['email'];
$s="SELECT * FROM `customer` WHERE email_id='"+$_SESSION['email']+"';";
$check= $db_handle->runQuery($s);

?>
<html>
  <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-1.12.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>                
        <style>
          body{
              background:url('background.jpg');
              padding:50px;
          }
          #id{
          	width: 500px;
          }
        </style>
        <script>
    var username,password,confirm,email,strength;
        function check()
        {
			var p1=document.getElementById("password1").value;
            var p2=document.getElementById("confirm").value;
			if(p1!=p2)
            {
                alert("Passwords do not match");
                password.focus();
                confirm.value="";
				return false;
            }
			return true;
        }
        function init()
        {

            strength = document.getElementById("strength");
            username=document.getElementById("username");
            password=document.getElementById("password1");
            confirm=document.getElementById("confirm");
			
            //email=document.getElementById("email");
			}
        function validate() {

            if (username.value.length == 0) {
                alert("Please enter an username");
                return false;
            }

            
            if(passwordChanged()==0)
            {
                alert("Please Enter stronger password");
                return false;
            }
            return true;
        }
        function passwordChanged() {

                    var strongRegex = new RegExp("^(?=.{7,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W).*$", "g");
                    var mediumRegex = new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                    var enoughRegex = new RegExp("(?=.{4,}).*", "g");
                    var pwd =password;
                    if (pwd.value.length==0) {
                        strength.innerHTML = 'Please Type a Password';
                        return 0;
                    } else if (false == enoughRegex.test(pwd.value)) {
                        strength.innerHTML = '<span style="color:red">Needs More Characters</span>';
                        return 0;
                    } else if (strongRegex.test(pwd.value)) {
                        strength.innerHTML = '<span style="color:green"> The password is strong!</span>';
                        return 2;
                    } else if (mediumRegex.test(pwd.value)) {
                        strength.innerHTML = '<span style="color:orange">The password is moderate</span>';
                        return 1;
                    } else {
                        strength.innerHTML = '<span style="color:red">The password is weak</span>';
                        return 0;
                    }
        }
    </script>

  </head>
  <body id="b" onload="init()">  
    <nav class="navbar navbar-default">
     <div class="container-fluid">
     
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
		<a class="navbar-brand" href="../main/main.html">What's Up Market!</a>
      </div>

     
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form id="signin" class="navbar-form navbar-right" role="form" action = "" method = "post">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="email" class="form-control" name="username" value="" placeholder="Username">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-raised btn-default">Login</button>
          <input type="hidden" name="title" value="LOGIN">
        </form>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
	<div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:80%">
      Almost there!
    </div>
  </div>
<br>
  <div align = "center">
  <div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card">
              <div class="content">
                <div class="header">SignUp</div>
              </div>
              <div>
              <form action="reg3.php" method="post" onsubmit="return validate()">
              		<div class = "form-group">
		            <div class = "col-md-12"><input class = "form-control" type="text" id="name" name="username" placeholder="Enter username"></div></div>
		            <div class = "col-md-12"><input type="password" class = "form-control" id="password1" name="password" placeholder="Enter Password" onkeyup="return passwordChanged()">  <label id="strength"></label></div>
		            <div class = "col-md-12"><input type="password" class = "form-control" placeholder = "Confirm Password" id="confirm" name="confirm" onblur="check()"> </div>
		            <input type="hidden" name="title" value="REGISTER">
		            <div align="center"> 
		            <div class = "col-md-12" align="center"><input class = "btn btn-raised btn-primary" type="submit" value="Next" onsubmit="reg3.html"></div>
		            </div>
		        </form>
		       </div>
    </div>
    </div>
  </body>
</html>