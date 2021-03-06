<?php 
session_start();
include "database.php";

if(isset($_POST['update_profile']) ){
    
    
    $firstname = $lastname = $email = "";
    
    $occupation = $_POST['occupation'];
    $description = $_POST['description'];
    $facebookLink = $_POST['facebook'];
    $linkedinLink = $_POST['linkedin'];
    $instagramLink = $_POST['instagram'];
    $twitterLink  = $_POST['twitter'];

    $error = array();

	if(empty($_POST['firstname'])){
		$error['firstname'] = "First Name Should Not Be Empty";
		$_SESSION['firstname'] = $error['firstname']; 
	}else{
		$firstname = $_POST['firstname'];
	}

	if(empty($_POST['lastname'])){
		$error['lastname'] = "Last Name Should Not Be Empty";
		$_SESSION['lastname'] = $error['lastname']; 
	}else{
		$lastname = $_POST['lastname'];
	}

	if(empty($_POST['email'])){
		$error['email'] = "Email Should Not Be Empty";
		$_SESSION['email'] = $error['email']; 
	}else{
		$email = $_POST['email'];
	}

	if(!$error){
		$sql = "UPDATE profile SET firstname='$firstname', lastname='$lastname', email='$email', occupation='$occupation', description='$description', fb_link='$facebookLink', linkedin_link='$linkedinLink', instagram_link='$instagramLink', twitter_link='$twitterLink' WHERE ID = 1";

		$query = mysqli_query($connection, $sql);

		if($query) {
			header('location: user-edit.php');
			$_SESSION['outcome'] = "Profile Updated";
			$_SESSION['type'] = "success";
		}

	}
   
   
}