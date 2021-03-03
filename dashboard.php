<?php 

session_start();

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