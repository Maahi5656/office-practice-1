<?php 
session_start();

if($_SESSION['admin']){
	session_destroy();
	session_unset();
	header('Location: login.php');
}




?>