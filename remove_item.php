<?php
include('admin/dbconn.php');

$order_id=$_GET['id'];
$branch = $_GET['branch'];

$sql1 = "SELECT * FROM order_details where order_id='$order_id'";
$res = mysqli_query($conn,$sql1);
$row = mysqli_fetch_array($res);

$prod_id = $row['prod_id'];
$qty = $row['qty'];

$query2="UPDATE products
         	set quantity=quantity+$qty
         	where prod_id='$prod_id' and branch_id='$branch' ";
$result2 = mysqli_query($conn,$query2);
$row1 = mysqli_fetch_array($result2);

$sql = "DELETE from order_details where order_id='$order_id'";
$result = mysqli_query($conn,$sql);

if($branch==1){
	header('Location:cart.php?branch=1');
}else if($branch==2){
	header('Location:cart.php?branch=2');
}else if($branch==3){
	header('Location:cart.php?branch=3');
}
?>