<?php 
session_start();
include 'database.php';

if(!$_SESSION['admin']){
	header('location: login.php');
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
                                <!-- <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Form Layouts</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Form Layouts</li>
                                        </ol>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Profile</h4>

                                        <form method="post" action="user-edit.php">
                                            <!---
                                            <div class="form-group row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Profile Picture</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image">

                                                  
                                                </div>
                                            </div> 
                                            -->          
                                            <?php 
                                                $sql = "SELECT * FROM profile WHERE ID = 1";
                                                $result = mysqli_query($connection, $sql);
                                            ?> 
                                            <div>
                                            <?php foreach($result as $row){ ?>                            	
                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['firstname'] ?>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['lastname'] ?>
                                                </div>
                                            </div>   

                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['email'] ?>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Your Occpation & Experience</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['occupation'] ?>
                                                </div>
                                            </div>  

                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Your Description</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['description'] ?>
                                                </div>
                                            </div>                                            
                                        
                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Facebook Link</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['fb_link'] ?>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">LinkedIn Link</label>
                                                <div class="col-sm-9">
                                                  <?php echo $row['linkedin_link'] ?>
                                                </div>
                                            </div>
             
                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Instagram Link</label>
                                                <div class="col-sm-9">
                                                  <?php echo $row['instagram_link'] ?>
                                                </div>
                                            </div>  

                                            <div class="form-group row mb-2 align-items-center border-bottom">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Twitter Link</label>
                                                <div class="col-sm-9">
                                                   <?php echo $row['twitter_link'] ?>
                                                </div>
                                            </div>                                                                                      
                                         <?php } ?>    

                                            <div class="form-group row justify-content-end"> 
                                                <div class="col-sm-9">                                   
                                                     <input type="submit" name="edit_profile" class="btn btn-primary w-md" value="Update Profile">
                                                </div>
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