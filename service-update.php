<?php 
session_start();

include 'database.php';

 $servicename = $servicedetails = "";
 $errors = array();

if(isset($_POST['update_service'])){

	$id = $_POST['id'];

	if(empty($_POST['servicename'])){
      $errors['servicename'] = "Service Name Should Not Be Empty";
      $_SESSION['servicename'] = $errors['servicename'];
	}
	elseif (is_numeric($_POST['servicename'])) {
		    $errors['servicename'] = "Service Name Should Not Contain Number";
            $_SESSION['servicename'] = $errors['servicename'];
	}
	else{
		$servicename = $_POST['servicename'];
	}

	if(empty($_POST['service_details'])){
      $errors['service_details'] = "Service Details Should Not Be Empty";
      $_SESSION['service_details'] = $errors['service_details'];
	}
    else{
		$servicedetails = $_POST['service_details'];
	}



	if(!array()){
	    $sql = "UPDATE service SET service_name='$servicename',service_details='$servicedetails' WHERE ID = $id";

		$query = mysqli_query($connection, $sql);

		// print_r($query);
		if($query) {
			header("Location: service-list.php");
		    $_SESSION['outcome'] = "Service Updated";
			$_SESSION['type'] = "success";
		} 
	}	




}



?>