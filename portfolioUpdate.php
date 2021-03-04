<?php 
session_start();
include 'database.php';

if(isset($_POST['update_portfolio'])){
   $id = $_POST['id'];

   $portfolio_name = $_POST['portfolio_name'];
   $portfolio_details = $_POST['portfolio_details'];
   $portfolio_link = $_POST['portfolio_link'];
   $portfolio__old_image = $_POST['oldimage'];

   if(isset($_FILES['portfolio_image']['name']) && ($_FILES['portfolio_image']['name']!="")){
   	$newImage = "uploads/".$_FILES['portfolio_image']['name'];
   	unlink($portfolio__old_image);
   	move_uploaded_file($_FILES['portfolio_image']['tmp_name'], $newImage);
   }else{
   	$newImage = $portfolio__old_image;
   }
   
   $query = "UPDATE portfolio SET name='$portfolio_name', details='$portfolio_details', link='$portfolio_link', image='$newImage' WHERE ID = $id";

    $result = mysqli_query($connection, $query);  

    if($result){

        $_SESSION['outcome'] = "Successfully Inserted New Portfolio"; 
        $_SESSION['type'] = "success";
        header("location: portfolio-list.php");
    } 

    
} 



?>