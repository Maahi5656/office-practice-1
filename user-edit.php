<?php 

session_start();
include 'database.php';

if(isset($_POST['edit_profile'])){
	// $id = $_GET['update'];
	$sql = "SELECT * from profile where ID = 1";
	$result = mysqli_query($connection, $sql);

}
else{
$sql = "SELECT * from profile where ID = 1";
    $result = mysqli_query($connection, $sql);
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
                       
<!--                     <div class="row">
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
                        </div> -->

                        <!-- end page title -->

                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Update Your Profile</h4>

                                        <?php if(isset($_SESSION['outcome']) && isset($_SESSION['type']) ){ ?>
                                            <span class="text-<?php echo $_SESSION['type'] ?>">
                                                <?php echo $_SESSION['outcome'] ?>
                                            </span>
                                        <?php }unset($_SESSION['outcome']) ?>                                        
                                        
                                        <form method="post" action="user-update.php">

                                              <?php $row = mysqli_fetch_assoc($result); ?>

                                             <input type="hidden" name="id" value="<?= $row['ID'] ?>">

                                             <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="firstname" class="form-control" id="horizontal-firstname-input" value="<?= $row['firstname'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lastname" class="form-control" id="horizontal-firstname-input" value="<?= $row['lastname'] ?>">
                                                </div>
                                            </div>   

                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control" id="horizontal-firstname-input" value="<?= $row['email'] ?>">
                                                </div>
                                            </div>
                                          
                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Your Occpation & Experience</label>
                                                <div class="col-sm-9">
                                                    <textarea name="occupation" id="occupation" cols="10" rows="5" style="width:100%;"><?= $row['occupation'] ?></textarea>
                                                </div>
                                            </div>  

                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Your Description</label>
                                                <div class="col-sm-9">
                                                   <textarea name="description" id="description" cols="20" rows="10" style="width:100%;"><?= $row['description'] ?></textarea>
                                                </div>
                                            </div>                                            
                                        
                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Facebook Link</label>
                                                <div class="col-sm-9">
                                                   <input type="url" name="facebook" class="form-control" id="horizontal-firstname-input" value="<?= $row['fb_link'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">LinkedIn Link</label>
                                                <div class="col-sm-9">
                                                    <input type="url" name="linkedin" class="form-control" id="horizontal-firstname-input" value="<?= $row['linkedin_link'] ?>">
                                                </div>
                                            </div>
             
                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Instagram Link</label>
                                                <div class="col-sm-9">
                                                  <input type="url" name="instagram" class="form-control" id="horizontal-firstname-input" value="<?= $row['instagram_link'] ?>">
                                                </div>
                                            </div>  

                                            <div class="form-group row mb-3 align-items-center">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Twitter Link</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="twitter" class="form-control" id="horizontal-firstname-input" value="<?= $row['twitter_link'] ?>">
                                                </div>
                                            </div>  

                                            <div class="form-group row justify-content-end"> 
                                                <div class="col-sm-9">                                       
                                                     <input type="submit" name="update_profile" class="btn btn-primary w-md" value="Submit">
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