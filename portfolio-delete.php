<?php 
session_start();

include 'database.php';

if(isset($_GET['delete'])){

	$id = $_GET['delete'];

	$query = "DELETE from portfolio WHERE ID = $id";
	$result = mysqli_query($connection, $query);

	if($result){
		$_SESSION['response'] = "Row deleted successfully";
		$_SESSION['type'] = "danger";
	}
}



?>