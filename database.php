<?php 

require_once('config.php');

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

/*
if($connection){
	echo "Connected Successfully";
}
*/
if(!$connection){
	die("Database Connection failed :". mysqli_connect_error());
}

?>