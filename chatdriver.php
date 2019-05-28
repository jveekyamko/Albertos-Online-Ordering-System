<?php session_start();
	  include ('admin/dbconn.php'); 
	
	  $logged=($_SESSION["user_id"]);
    echo $_SESSION["cusid"]=$_GET['cusid'];
    $branch=($_SESSION['branch_id']);
    $cusid=$_SESSION['cusid'];

     $find_admin="SELECT * FROM users 
            WHERE branch_id='$branch' and position='Admin' ";
    $find_admin_result=mysqli_query($conn,$find_admin);
    $adminrow=mysqli_fetch_assoc($find_admin_result);
    $empid=$adminrow['user_id'];

      $find_chat="SELECT * FROM chats WHERE driverid='$logged' or cusid='$cusid' and empid='$empid' ";
      $find_chat_result=mysqli_query($conn,$find_chat);

      $chatrow=mysqli_fetch_array($find_chat_result);
     echo $chatid=$chatrow['chat_id'];
     
  header("location:AlbertosChat/chatuiDriver.php?chatid=$chatid");
    
   
      
    
   

        
	
     
   
 ?>
 