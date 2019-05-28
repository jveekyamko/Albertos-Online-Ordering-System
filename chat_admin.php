<?php session_start();
	  include ('admin/dbconn.php'); 
	
	  $logged=($_SESSION["user_id"]);
    $_SESSION["cusid"]=$_GET['receiver_id'];
    $branch=($_SESSION['branch_id']);
    $cusid=$_SESSION['cusid'];

      $find_chat="SELECT * FROM chats WHERE empid='$logged' and cusid='$cusid' ";
      $find_chat_result=mysqli_query($conn,$find_chat);
      $find_chat_ctr_rows=mysqli_num_rows($find_chat_result);

         if($find_chat_ctr_rows<1){
             $createchat="INSERT into chats (empid,cusid)
                           VALUES('$logged','$cusid')";

   $createchat_result=mysqli_query($conn,$createchat);
   header("location:AlbertosChat/chatuiAdmin.php?cusid=$cusid");
    
   } else{
        
  header("location:AlbertosChat/chatuiAdmin.php?cusid=$cusid");
    }

      
    
   

        
	
     
   
 ?>
 