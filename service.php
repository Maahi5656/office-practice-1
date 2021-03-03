<?php 
session_start();

include 'database.php';

if(!$_SESSION['admin']){
    header('location: login.php');
}


?>

<?php 

    $username = $password = $email = $confirmPassword = "";

    $errors = array();

    function test_input($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
         return $value;
    } 

  if(isset($_POST['submit_user'])){

    //validation
    if(empty($_POST['servicename'])){
      $errors['servicename'] = "Please Enter Your Service Name"; 
    }else{
      $username = test_input($_POST['servicename']);  
    }

    if(empty($_POST['service_details'])){
       $errors['service_details'] = "Please Enter Your Service Details";
    }else{
        $password = test_input($_POST['service_details']);
    }

    if(empty($_FILES['image']['name'])){
        $errors['image'] = "Please Upload An Image";
    }else{

                //uploading file In The Server
      $orginal_photo_name = $_FILES['image']['name'];
      $after_explode = explode(".",$orginal_photo_name);
      $orginal_photo_extension = end($after_explode);

      $support_list = array('jpg','jpeg','png','PNG','JPG','JPEG');

    
      if (in_array($orginal_photo_extension,$support_list)) {
          if ($_FILES['image']['size'] > 500000) {
            $_SESSION['protfolio_err'] = "Your file size is too large!";
            header("Location: service.php");
          }
          else {
            $new_file_name = uniqid().".".$orginal_photo_extension;
            $new_file_location = "uploads/service/".$new_file_name;
            move_uploaded_file($_FILES['image']['tmp_name'],$new_file_location);
            
            $protfolio_insert_query = "INSERT INTO service(service_name,service_details,image) VALUES('$username','$password','$new_file_location')";
            $protfolio_insert_form_db = mysqli_query($connection,$protfolio_insert_query);

            

        if($protfolio_insert_form_db){
            $_SESSION['outcome'] = "Successfully Inserted New Employee"; 
            $_SESSION['type'] = "success";
            header("Location: service.php");
        }else{
           $_SESSION['outcome'] = "Error: ".mysqli_error($connection);
           $_SESSION['type'] = "danger";
           header("Location: service.php");
        }

            
            
          }
        }
        else{
          $_SESSION['protfolio_err'] = "This file formate doesn't supported!";
          header("Location: service.php");
        }


    }
/*

    if(!$errors){
            $protfolio_insert_query = "insert into service(service_name,service_details,image) values('$username','$password','$new_file_location')";
            $protfolio_insert_form_db = mysqli_query($db_connect,$protfolio_insert_query);

        if($protfolio_insert_form_db){
            $_SESSION['outcome'] = "Successfully Inserted New Employee"; 
            $_SESSION['type'] = "success";
        }else{
           $_SESSION['outcome'] = "Error: ".mysqli_error($connection);
           $_SESSION['type'] = "danger";
        }
    }

 */   


  }



?>



<!DOCTYPE html>
<html lang="en">


  <?php include 'inc/head.php'; ?>

    
    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            

            <?php include 'inc/header.php'; ?>
            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->
            <?php include 'inc/sidebar.php'; ?>
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                       
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Form Layouts</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Form Layouts</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">New Service</h4>
                                        <?php if(isset($_SESSION['outcome'])){ ?>
                                            <span class="text-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['outcome']; ?></span>
                                        <?php }unset($_SESSION['outcome']) ?>
                                        
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                                            

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                  <input type="file" name="image">
                                                  <span class="text-danger">
                                                    <?php 
                                                      if(isset($errors['image'])){
                                                        echo $errors['image'];  
                                                    }
                                                    ?>
                                                  </span>
                                                </div>
                                            </div>


                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Service Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="servicename" class="form-control" id="horizontal-firstname-input">
                                                  <span class="text-danger">
                                                    <?php 
                                                      if(isset($errors['servicename'])){
                                                        echo $errors['servicename'];  
                                                    }
                                                    ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Service Details</label>
                                                <div class="col-sm-9">
                                                  <textarea name="service_details" id="service_details" cols="30" rows="10" style="width:100%;"></textarea>
                                                  <span class="text-danger">
                                                    <?php 
                                                      if(isset($errors['service_details'])){
                                                        echo $errors['service_details'];  
                                                    }
                                                    ?>                                                    
                                                  </span>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-end"> 
                                                <div class="col-sm-9">                                       
                                                     <input type="submit" name="submit_user" class="btn btn-primary w-md" value="Submit">
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                    </div>
            </div>        
                <!-- end modal --> 
                <?php include 'inc/footer.php' ?>
    
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
    
        <?php include 'inc/script.php'; ?>
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Jan 2021 15:39:00 GMT -->
</html>