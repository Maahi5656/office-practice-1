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
    if(empty($_POST['username'])){
      $errors['username'] = "Please Enter Your Username"; 
    }else{
      $username = test_input($_POST['username']);  
    }

    if(empty($_POST['email'])){
        $errors['email'] = "Please Enter Your Email";
    }elseif( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email'] = "Invalid Email Address";
    }else{
        $email = test_input($_POST['email']);
    }

    if(empty($_POST['password'])){
        $errors['password'] = "Please Enter Your Password";
    }elseif( /*!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $_POST['password'])|| */  strlen($_POST['password'])<10 ){
        $errors['password'] = "Password Should Be At Least 10 Characters Long ";
    }elseif(empty($_POST['confirm_password'])){
       $errors['password'] = "Please Confirm Your Password";
    }
    elseif($_POST['password'] != $_POST['confirm_password']){
        $errors['password'] = "Passwords Not Matching";
    }else{
        $password = test_input($_POST['password']);
    }

    if(!$errors){

        $sql = "insert into employee(username,email,password) values('$username','$email','$password')";

        $result = mysqli_query($connection, $sql);

        if($result){
            $_SESSION['outcome'] = "Successfully Inserted New Employee"; 
            $_SESSION['type'] = "success";
        }else{
           $_SESSION['outcome'] = "Error: ".mysqli_error($connection);
           $_SESSION['type'] = "danger";
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
                                        <h4 class="card-title mb-4">Horizontal form layout</h4>
                                        <?php if(isset($_SESSION['outcome'])){ ?>
                                            <span class="text-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['outcome'] ?></span>
                                        <?php }unset($_SESSION['outcome']) ?>
                                        
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="username" class="form-control" id="horizontal-firstname-input">
                                                  <span class="text-danger">
                                                    <?php 
                                                      if(isset($errors['username'])){
                                                        echo $errors['username'];  
                                                    }
                                                    ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control" id="horizontal-email-input">
                                                    <span class="text-danger">
                                                        <?php 
                                                          if(isset($errors['email'])){
                                                            echo $errors['email'];  
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                  <input type="password" name="password" class="form-control" id="horizontal-password-input">
                                                  <span class="text-danger">
                                                        <?php 
                                                          if(isset($errors['password'])){
                                                            echo $errors['password'];  
                                                        }
                                                        ?>
                                                  </span>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Confirm Password</label>
                                                <div class="col-sm-9">
                                                  <input type="password" name="confirm_password" class="form-control" id="horizontal-password-input">
                                                  <span class="text-danger">
                                                        <?php 
                                                          if(isset($errors['password'])){
                                                            echo $errors['password'];  
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