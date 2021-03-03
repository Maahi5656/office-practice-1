<?php 
session_start();
include 'database.php';

if(isset($_SESSION['admin'])){
    header('location: dashboard.php');
}


?>


<?php 

    function test_input($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
         return $value;
    }

if(isset($_POST['logIn'])){

    $username = test_input($_POST['name']);
    $password = test_input($_POST['password']);

    $query = "select * from admin where username='$username' and password='$password'";

    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);

    if($result){
        if($row == 1){

            $_SESSION['admin'] = true;
            $_SESSION['username'] = $username;

            header('location: dashboard.php');
        }
        else{
            $inputError = "Wrong Username or Password!";
        }
    }



}

?>


<?php include 'inc/head.php'; ?>


<body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <form method="post" action="">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue to Skote.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="post" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                       <span class="text-danger"><?php 
                                            if(isset($inputError)) {
                                                echo $inputError;
                                            }
                                       ?></span>
                                              
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="name" placeholder="Enter username">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                                        </div>

                                        <div class="mt-3">
                                            <input  type="submit" name="logIn" class="btn btn-primary btn-block waves-effect waves-light" value="Log In" >
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

<?php include 'inc/script.php'; ?>
    </body>
