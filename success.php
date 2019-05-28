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
<?php include 'admin/dbconn.php'; 
$get_id = $_GET['user_id'];
$sql = "UPDATE order_details
        SET status = 'pending'
        WHERE user_id = '$get_id' AND status = 'inserted'";
$result = mysqli_query($conn,$sql);

?>

<?php if($branch==1){
                                            echo "<script>alert('Thank you for your purchase. Please continue ordering! Indulge! :)'); window.location = 'menu-grid.php?branch=1';</script>";
                                        }else if($branch==2){
                                            echo "<script>alert('Thank you for your purchase. Please continue ordering! Indulge! :)'); window.location = 'menu-grid.php?branch=2';</script>";
                                        }else if($branch==3){
                                            echo "<script>alert('Thank you for your purchase. Please continue ordering! Indulge! :)'); window.location = 'menu-grid.php?branch=3';</script>";
                                        }