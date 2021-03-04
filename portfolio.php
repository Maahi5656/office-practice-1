<?php 
session_start();

include 'database.php';

if(!$_SESSION['admin']){
    header('location: login.php');
}


?>

<?php 

$portfolioImage = $portfolioName =  $portfolioDetails = $portfolioLink = "";
$link = "";

$errors = array();

    function test_input($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

if(isset($_POST['submit_portfolio'])){
  
   if(empty($_POST['portfolio_name'])){
    $errors['portfolio_name'] = "Please Enter Your Portfolio Name";
    $_SESSION['portfolio_name'] = $errors['portfolio_name'];
   }else{
     $portfolioName = test_input($_POST['portfolio_name']);
   }

   if(empty($_POST['portfolio_details'])){
    $errors['portfolio_details'] = "Please Enter Your Portfolio Details";
    $_SESSION['portfolio_details'] = $errors['portfolio_details'];
   }else{
    $portfolioDetails = test_input($_POST['portfolio_details']);
   }

   if(!empty($_POST['link'])){
      $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);

      if(filter_var($link, FILTER_VALIDATE_URL)){
        $portfolioLink = $link;
      }
   }else{
       $portfolioLink = "no link found!";
   }

   if(empty($_FILES['image']['name'])){
    $errors['image'] = "Please Insert An Image";
    $_SESSION['image'] = $errors['image'];
   }else{

    //Uploading File in The server
    $file = $_FILES['image'];
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $file_error = $_FILES['image']['error'];

    //separate the string of the filename
    $temporaryExtension = explode('.', $filename);
    $fileExtension = strtolower(end($temporaryExtension));

    //check if file extension is allowed
    $isAllowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileExtension, $isAllowed)){
       
       if($file_error === 0){
         if($_FILES['image']['size'] > 500000){
            $_SESSION['file_error'] = "Your File Size Too Large";
            header('location: portfolio.php');
         }
         $newFileName = uniqid('', true).".".$fileExtension;
         $fileDFestination = "uploads/".$newFileName;
         move_uploaded_file($tmp_name, $fileDFestination);

         //sql query
         $query = "INSERT into portfolio(name,details,link,image) values('$portfolioName','$portfolioDetails','$portfolioLink','$fileDFestination')";

         $result = mysqli_query($connection, $query);
         
         if($result)
         {
            $_SESSION['outcome'] = "Successfully Inserted New Portfolio"; 
            $_SESSION['type'] = "success";
         }else{
           $_SESSION['outcome'] = "Error: ".mysqli_error($connection);
           $_SESSION['type'] = "danger";

         }

       }
    }else{
        $_SESSION['file_error'] = "File Type Not Supported";
    } 

   }
   



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
                                        <h4 class="card-title mb-4">Add Portfolio</h4>
                                        
                                        <?php if(isset($_SESSION['outcome'])){ ?>
                                            <span class="text-<?php echo $_SESSION['type'] ?>">
                                                <?php echo $_SESSION['outcome'] ?>
                                            </span>
                                        <?php }unset($_SESSION['outcome']) ?>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                                            

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                  <input type="file" name="image">
                                                  
                                                        <?php if(isset($_SESSION['image'])){ ?>
                                                        <span class="text-danger">    
                                                            <?php echo $_SESSION['image']; ?>
                                                        </span>    
                                                        <?php }unset($_SESSION['image']) ?>                   

                                                        <?php if(isset($_SESSION['file_error'])){ ?>
                                                        <span class="text-danger">    
                                                            <?php echo $_SESSION['file_error']; ?>
                                                        </span>    
                                                        <?php }unset($_SESSION['file_error']) ?>                   
                                                                                                                


                                                </div>
                                            </div>


                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="portfolio_name" class="form-control" id="horizontal-firstname-input">
                                                  
                                                        <?php if(isset($_SESSION['portfolio_name'])){ ?>
                                                        <span class="text-danger">    
                                                            <?php echo $_SESSION['portfolio_name']; ?>
                                                        </span>    
                                                        <?php }unset($_SESSION['portfolio_name']) ?>                   
                                                  
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Details</label>
                                                <div class="col-sm-9">
                                                  <textarea name="portfolio_details" id="service_details" cols="30" rows="10" style="width:100%;"></textarea>
                                                        <?php if(isset($_SESSION['portfolio_details'])){ ?>
                                                        <span class="text-danger">
                                                            <?php echo $_SESSION['portfolio_details']; ?>
                                                        </span>
                                                        <?php }unset($_SESSION['portfolio_details']) ?>                      
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Link</label>
                                                <div class="col-sm-9">
                                                  <input type="url" name="link" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-end"> 
                                                <div class="col-sm-9">                                       
                                                     <input type="submit" name="submit_portfolio" class="btn btn-primary w-md" value="Submit">
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