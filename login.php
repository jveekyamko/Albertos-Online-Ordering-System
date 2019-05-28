<?php 
include('admin/dbconn.php'); 
require ('sessioncontroller.php');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="icon" href="img/service-icon/service-1.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Alberto's Pizza</title>
<body background="pizza.jpg" style="background-size: 100%">
  </head>
<body id="LoginForm"><br>
<div class="container">
<br>
<div class="login-form">
<div class="main-div">
    <div class="panel">
    <h1 class="form-heading" style="color: #ffa500;"><center>Alberto's Pizza</center></h1>
   <h2>Welcome Customer!</h2>
   <p>Please enter your email and password</p>
   </div>
    <form action="logincontroller.php" method="POST">

        <div class="form-group">


            <input name="email_add" type="email_add" class="form-control"  placeholder="Email Address" >

        </div>

        <div class="form-group">

            <input name="password" type="password" class="form-control" placeholder="Password">

        </div>
        <div class="forgot">
        <a href="password/reset_pass.html">Forgot password?</a>
        <a href="register.php" class="btn login-toggle">Click here to Register </a>

		</div>
		<div>

        <button type="submit" name="login" class="btn btn-primary">Login</button>
        
        </div>
        </form>
        <div>
          <a href="google/index.php"><img src="google.png" style="width:270px;height:95px"></a>
        </div>
                                                        </div>
                                                    
    </div>

</div></div></div>


</body>
</html>
