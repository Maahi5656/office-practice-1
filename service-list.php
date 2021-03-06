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
                                                 <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                           <?php 

                                                $query = "select * from service";

                                                $result = mysqli_query($connection, $query);

                                            ?>                                        
        
                                        <h4 class="card-title">Default Datatable</h4>
                                        <p class="card-title-desc">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p>
                                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="datatable_length">
                                                    <label>Show 
                                                        <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm" style="display:inline-block;width:auto;margin:5px 10px;">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> 
                                                    entries
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="datatable_filter" class="dataTables_filter">
                                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable" style="display:inline-block;width:auto;margin:5px 10px;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if(isset($_SESSION['outcome'])){ ?>
                                            <span class="text-<?php echo $_SESSION['type'] ?>">
                                                <?php echo $_SESSION['outcome'] ?>
                                            </span>
                                        <?php }unset($_SESSION['outcome']) ?>                                        

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th class="w-25">Image</th>
                                                    <th class="w-25">Service Name</th>
                                                    <th class="w-25">Service Details</th>
                                                    <th class="w-25">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php 
                                                    $i = 1;
                                                    foreach ($result as  $row): 

                                                ?>

                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td class="w-25"><img src="<?php echo $row['image']; ?>" alt=""></td>
                                                        <td class="w-25"><?php echo $row['service_name']; ?></td>
                                                        <td class="w-25"><?php echo $row['service_details']; ?></td>
                                                        <td class="w-25">
                                                            <a href="service-edit.php?edit=<?php echo $row['ID'] ?>" class="btn btn-warning">Update</a>
                                                            <a href="service-delete.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $i = $i +1;
                                                    endforeach; 
                                                 ?>

                                            </tbody>
                                        </table>
                                     </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                    </div>
            </div>        
                <!-- end modal --> 
                <?php include 'inc/footer.php'; ?>
    
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