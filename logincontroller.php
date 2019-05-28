<?php 
	require('admin/dbconn.php');
	require('sessioncontroller.php');?>
<?php 


if (isset($_GET['email'],$_GET['oauth_uid'])) {
	$email_add=$_GET['email'];
	$oauth_uid=$_GET['oauth_uid'];
	$conn=mysqli_connect("localhost", "root", "", "albertos");
	$query="SELECT * FROM users WHERE oauth_uid='$oauth_uid' AND email_add='$email_add' AND user_type='customer'	 LIMIT 1" ;
	$result=mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
    
		while($row = mysqli_fetch_assoc($result)) {

		setSesh($row['email_add'],
				$row['password'],
				$row['user_id'],
				$row['fname'],
				$row['lname'],
				$row['branch']);

		header('Location:contact.php');
		}
	}

}


else if(isset($_POST['login'])){
	attemptLogin();
}
function attemptLogin(){
	$email_add=$_POST['email_add'];
	$password=$_POST['password'];
	$conn=mysqli_connect("localhost", "root", "", "albertos");
	$query="SELECT * FROM users WHERE password='$password' AND email_add='$email_add' AND user_type='customer'	 LIMIT 1" ;
	$result=mysqli_query($conn,$query);
	

		if (mysqli_num_rows($result) > 0) {
    
		$row = mysqli_fetch_assoc($result);
		if(strcmp($row['blocked'], 'blocked') == 0) {
			echo" <script> alert('You are Blocked'); window.location ='login.php';</script>";

		}else{
		setSesh($row['email_add'],
				$row['password'],
				$row['user_id'],
				$row['fname'],
				$row['lname'],
				$row['branch']);

		header('Location:contact.php');
		}
	} else {
		echo "<script>
alert('Wrong Email or Password Please try again!');
window.location.href='login.php';
</script>";

    	}
	mysqli_close($conn);
}
?>
