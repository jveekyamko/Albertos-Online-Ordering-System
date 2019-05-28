<?php

$conn = mysqli_connect("localhost", "root", "", "albertos");

if(!$conn){
	echo "Failed to connect to mysql/db!";
	exit();
}

?>