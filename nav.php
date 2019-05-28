<?php 
session_start();
if(!$_SESSION['user_id']){header('Location:login.php');}
     $logged=($_SESSION['user_id']);
     $log_name=($_SESSION['fname']).($_SESSION['lname']);
      

      if(isset($_GET['branch'])){
        $branch=$_GET['branch'];   
      
}else {
    $branch=0;
}
     
?>
<?php include ('admin/dbconn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
                                <style type="text/css">
                                .badge1 {
   position:relative;
}
.badge1[data-badge]:after {
   content:attr(data-badge);
   position:absolute;
   top:-10px;
   right:-10px;
   font-size:.7em;
   background:green;
   color:white;
   width:18px;height:18px;
   text-align:center;
   line-height:18px;
   border-radius:50%;
   box-shadow:0 0 1px #333;
}
                            </style>
</style>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/service-icon/service-1.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Alberto's Pizza</title>

        <!-- Icon css link -->
        <link href="vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linears-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/bootstrap-selector/bootstrap-select.css" rel="stylesheet">
        <link href="vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
       


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
       
       <div id="preloader">
            <div class="loader absolute-center">
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
            </div>
        </div>
       
        <!--================ Frist hader Area =================-->
        <div class="first_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="header_contact_details">
                            
                            <?php if(!$_SESSION['user_id']){ ?>

                            <a href="login.php"><i class="fa fa-user"></i>Register/Log In</a>

                        <?php }else { ?>
                            <a href="edituser.php?id=<?php echo $logged;?>"><i class="fa fa-user">&nbsp;<?php echo $_SESSION["fname"]?> <?php }echo $_SESSION["lname"];?></i></a>|&nbsp;<a href="logout.php"><i class="fa fa-sign-in">Logout</font></i></a>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Footer Area =================-->
        
        <!--================End Footer Area =================-->
        <header class="main_menu_area">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="privateindex.php?branch=<?php echo $branch;?>"><span><img src="images/pizzlog.png" width="50px" height="50px" alt="">&nbsp;Alberto's Pizza</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="privateindex.php?branch=<?php echo $branch;?>">Home</a></li>
                            <li><a href="view_pizza.php?branch=<?php echo $branch;?>">Menu</a></li>
                            <!--<li class="dropdown submenu active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="menu-grid.html">Menu Grid</a></li>
                                    <li><a href="menu-list.html">Menu List</a></li>
                                </ul>
                            </li>-->
                            <li><a href="menu-grid.php?branch=<?php echo $branch;?>">Products</a></li>
                            <li><a href="about.php?branch=<?php echo $branch;?>">About Us</a></li>
                            
                            <li><a href="contact.php?branch=<?php echo $branch;?>">Contact US</a></li>
                            <li><a href="myOrders.php?branch=<?php echo $branch;?>">My Orders</a></li>
                           <li class="dropdown">

                             <a  href=AlbertosChat/customerchatcheck.php?branch=<?php echo $branch;?>><i class="fa fa-envelope"></i>&nbsp;<?php  
                             $findbranchadmin="SELECT * FROM users where position='Admin' and branch_id='$branch'";
                              $findBAresult=mysqli_query($conn,$findbranchadmin);
                              $findBArow=mysqli_fetch_array($findBAresult);
                              $admin=$findBArow['user_id'];
                              $findchatid="SELECT * FROM chats where cusid='$logged' and empid='$admin'";
                              $findCIresult=mysqli_query($conn,$findchatid);
                              $findCIrow=mysqli_fetch_array($findCIresult);
                              $chat_id=$findCIrow['chat_id'];

                              $status_query = "SELECT * FROM messages WHERE chat_id='$chat_id' and mess_status=0 ";
                              $result_query = mysqli_query($conn, $status_query);
                             echo $countnotif = mysqli_num_rows($result_query);?></a></li>
                            <li><a href="cart.php?branch=<?php echo $branch;?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php
                                include ('admin/dbconn.php');
                                $query = "SELECT * FROM order_details where user_id='$logged' AND status='inserted'";
                                $result = mysqli_query($conn,$query) ;
                                $count = mysqli_num_rows($result);
                                ?>
                            <?php echo $count; ?></a></li>
                          
                            <!--<li><a href="user.php"><img src="images/prof.png" width="24px" height="24px"></li>-->
                        </ul>
                           
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
