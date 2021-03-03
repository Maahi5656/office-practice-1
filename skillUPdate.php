<?php 

include "database.php";

if(isset($_POST['update_skill']) ){
    
    $skill = $_POST['skill'];
    $percent = $_POST['percent'];
    $id = $_POST['id'];

    $error = array();

	if(empty($_POST['percent'])){
		$error = "Percentage Should Not Be Empty";
	}

	if(!$error){
		$sql = "UPDATE skill SET name='$skill',percent='$percent' WHERE ID = $id";

		$query = mysqli_query($connection, $sql);

		print_r($query);
		if($query) {
			header("Location: skill-list.php");
		}

	}
   
   
}