
<?php
$get_id = $_GET['id'];
?>

<?php include ('nav.php'); ?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="contact_area">
            <div class="container">
               
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area">
            <div class="container">
               <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/prof.png" alt="" width="72" height="72">
        <h2>Edit Information</h2>
   
      </div>

            <?php
                            $query = "SELECT * from users where user_id='$get_id'";
                            $result = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($result);
                            ?>
     
      
         
                                 </div>
                           
<center> <form method="post">

                    <input type="hidden" name='user_type' value='<?php echo $row['user_type'];?>'>
                                 
                   <h4> Firstname: <input type="text" name='fname' value='<?php echo $row['fname'];?>' require="required"></h4><br>  
                     <h4>Lastname: <input type="text" name='lname' value='<?php  echo$row['lname'];?>' required="required"></h4><br>   
                     <h4>Username: <input type="text" name='username' value='<?php  $row['username'];?>' required="required"></h4><br>  
                     <h4>Contact: <input type="text" name='cnum' value='<?php  $row['cnum'];?>' required="required"></h4><br>   
                     <h4>Address: <input type="text" name='address' value='<?php  $row['address'];?>' required="required"></h4><br>  
                     <h4>Email Add: <input type="text" name='email_add' value='<?php  $row['email_add'];?>' required="required"></h4><br>  
                     <h4>Password: <input type="password" name='password' value='<?php $row['password'];?>' required="required"></h4><br>                 
                             <input type="submit" class="btn btn-info" name="update">
          
          
          </form>
        </center>
      </div>
                     <?php
                            
                            if (isset($_POST['update'])) {

                                  $user_type =$_POST['user_type'];
                                  $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                 $username = $_POST['username'];
                                  $cnum = $_POST['cnum'];
                                 $address = $_POST['address'];
                                 $email_add = $_POST['email_add'];
                                $password = $_POST['password'];

                                

                                $sql = "UPDATE users 
                                set user_type='$user_type', 
                                fname='$fname', 
                                lname='$lname',
                                username='$username',
                                cnum='$cnum',
                                address='$address',
                                email_add='$email_add',
                                password='$password' 
                                where user_id='$logged'";
                                $result1 = mysqli_query($conn,$sql);
                               echo "<script>
                                        alert('Your Messages Successfully Sent');
                                        window.location='privateindex.php';
                                    </script>";

                            }
                            ?>


        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

            </div>
        </section>
        <!--================End Contact Area =================-->
        
        <!--================Map Area =================-->
        
                       
            <div class="copy_right_area">
                <div class="container">
                    <div class="pull-left">
                        <h5><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p></h5>
                    </div>
                    <div class="pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="#">About Us</a></li>
                            <li><a href="#">Menu</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Reservation</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End Recent Blog Area =================-->
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/bootstrap-selector/bootstrap-select.js"></script>
        <script src="vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/countdown/jquery.countdown.js"></script>
        <script src="vendors/js-calender/zabuto_calendar.min.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        
        <script src="js/video_player.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>