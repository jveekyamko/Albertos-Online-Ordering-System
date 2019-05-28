<?php 

session_start();
function setSesh($e,$p,$i,$f,$l,$b){

	$_SESSION["email_add"] =$e;
	$_SESSION["password"] =$p;
	$_SESSION["user_id"] =$i;
	$_SESSION["fname"]=$f;
	$_SESSION["lname"]=$l;
	$_SESSION["branch"]=$b;
	
}


function unsetSesh(){

	session_unset();
	session_destroy(); 
}

?>
