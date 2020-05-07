<?php
	$connect = new mysqli("localhost","root","","doctorcare");
	if($connect->connect_error){
		die("connection failed : ".$connect->connect_error);
	}
?>