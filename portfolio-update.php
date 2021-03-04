<?php 
session_start();
include 'database.php';
?>

<?php 
if(isset($_GET['update'])){
	$id = $_GET['update'];

	$query = "SELECT * FROM portfolio WHERE ID = $id";
	$result = mysqli_query($connection, $query);

     $row = mysqli_fetch_assoc($result);
     
     $id = $row['ID'];
     $portfolio_name = $row['name'];
     $portfolio_details = $row['details'];
     $portfolio_link  = $row['link'];
     $portfolio_image = $row['image'];

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
                                        <h4 class="card-title mb-4">Update Your Portfolio</h4>
                                        <form method="post" action="portfolioUpdate.php" enctype="multipart/form-data">
                                        <?php 

                                        ?>
                                        <input type="hidden" name="id" value="<?= $row['ID'] ?>">

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                  <input type="hidden" name="oldimage" value="<?= $portfolio_image; ?>">	
                                                  <input type="file" name="portfolio_image" value="<?= $portfolio_image ?>">
                                                  <img src="<?= $portfolio_image ?>" class="img-thumbnail" alt="">
                                                  <span class="text-danger">

                                                    </span>
                                                </div>
                                            </div>                                        

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Portfolio Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="portfolio_name" class="form-control" id="horizontal-firstname-input" value="<?= $portfolio_name ?>">
                                                  <span class="text-danger">

                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Link</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="portfolio_link" class="form-control" id="horizontal-firstname-input" value="<?= $portfolio_link?>">
                                                  <span class="text-danger">

                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Portfolio Details</label>
                                                <div class="col-sm-9">
                                              <textarea name="portfolio_details" id="service_details" cols="30" rows="10" style="width:100%;"><?= $portfolio_details ?></textarea>
                                                  <span class="text-danger">

                                                    </span>
                                                </div>
                                            </div>                                            
                                             



                                            <div class="form-group row justify-content-end"> 
                                                <div class="col-sm-9">                                       
                                                     <input type="submit" name="update_portfolio" class="btn btn-primary w-md" value="Update">
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