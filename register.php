<?php 
include('admin/dbconn.php'); 
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
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
<div class="login-form">
<div class="main-div">
    <div class="panel">
    <h1 class="form-heading" style="color: #ffa500;"><center>Alberto's Pizza</center></h1>
   <h2>Welcome Customer!</h2>
   <p>Please enter your email and password</p>
   </div>
    <form method="post">
         <div class="form-group"> 


            <input type="hidden" name="user_type"  class="form-control" value="customer" required="required"  >

        </div>

        <div class="form-group">


            <input name="fname" type="fname" class="form-control"  placeholder="First Name" required="required">

        </div>


         <div class="form-group">


            <input name="lname" type="lname" class="form-control"  placeholder="Last Name" required="required" >

        </div>

        <div class="form-group">


            <input name="email_add" type="email_add" class="form-control"  placeholder="Email address" required="required" >

        </div>
        <div class="form-group">

            <input name="address" type="address" class="form-control" placeholder="address" required="required">

        </div>
        <div class="form-group">

            <input name="cnum" type="cnum" class="form-control" placeholder="cnum" required="required">

        </div>

         <div class="form-group">


            <input name="username" type="username" class="form-control"  placeholder="Username" required="required" >

        </div>


        <div class="form-group">

            <input name="password" type="password" class="form-control" placeholder="Password" required="required">

        </div>
       
        <button type="submit" name="go" class="btn btn-primary">submit</button>
        
        </div>

                                                    </form>


                            <?php include ('dbconn.php');
                            if (isset($_POST['go'])) {
                                $user_type = $_POST['user_type'];
                                $fname = $_POST['fname'];
                              $lname = $_POST['lname'];
                            $address = $_POST['address'];
                            $cnum = $_POST['cnum'];
                            $email_add = $_POST['email_add'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                
                               
                
                                $query = "SELECT * from users where email_add= '$email_add'";
                                $result = mysqli_query($conn,$query);
                                $count = mysqli_num_rows($result);
            
                              if ($count  > 0){ 
                              ?>
                                <script>
                                  alert("Username Already Taken");
                                </script>
                              <?php
                                }
                                else{
                              $add_user = "INSERT INTO users (user_type,fname, lname,address,cnum,email_add, username, `password`) 
                              values('$user_type','$fname','$lname','$address','$cnum','$email_add','$username','$password')";
                              $result2 = mysqli_query($conn,$add_user);
                              header('location:login.php');
                              ?>
                  <?php }} ?> 
    </div>


</div></div></div>


</body>
</html>
