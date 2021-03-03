<?php 
session_start();

include 'database.php';

if(isset($_GET['delete'])){
	$id = $_GET['delete'];

	$query = "DELETE from skill where ID = $id";
	$result = mysqli_query($connection, $query);

	if($result){

	$_SESSION['response'] = "Deleted Successfully";
	$_SESSION['type'] = "danger";

	header('location: skill-list.php');
 
}

}







?>