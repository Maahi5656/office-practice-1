<?php 

session_start();
include 'database.php';



if(isset($_GET['update'])){
	$id = $_GET['update'];

	$sql = "SELECT * from skill where ID = $id";
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
                                        <h4 class="card-title mb-4">Add Your Skill</h4>
 
                                        
                                        <form method="post" action="skillUPdate.php" enctype="multipart/form-data">
                                          
                                          <?php 

                                          		$row = mysqli_fetch_assoc($result); 
                                                
                                                $id = $row['ID'];
                                                $name = $row['name'];
                                                $percent = $row['percent'];
                                          	?>
                                             
                                             <input type="hidden" name="id" value="<?= $row['ID'] ?>">

                                            <div class="form-group row mb-2">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Skill</label>
                                                <div class="col-sm-9">
                                                  <select name="skill" id="skill" class="form-control" value="<?php echo $name; ?>" >
                                                      <option value="<?php echo $name; ?>" ><?php echo $name; ?> </option>
                                                      <option value="HTML">HTML</option>
                                                      <option value="CSS">CSS</option>
                                                      <option value="JavaScript">JavaScript</option>
                                                      <option value="PHP">PHP</option>
                                                  </select>
  
                                                </div>
                                            </div>                                             


                                            <div class="form-group row mb-2">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Percent</label>
                                                <div class="col-sm-9">
                                                  <input type="number" min="1" max="100" name="percent" class="form-control" id="horizontal-firstname-input" value="<?php  echo $percent; ?>">

                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-end"> 
                                                <div class="col-sm-9">                                       
                                                     <input type="submit" name="update_skill" class="btn btn-primary w-md" value="Submit">
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