<?php
require('Includes/Connection.php');
session_start();
?>



<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="./index.php"><img class="logo-img" witdh="100px" height="100px" src="assets/images/person-icon.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="POST" action="register_action.php"    enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="name" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" name=" email_address" type="email" placeholder="email" autocomplete="off">
                    </div>
                   
                 
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Password"  autocomplete="off">
                    </div>

                    <div class="form-group">

               
        <input type="hidden" name="user_type" id="user_type"  class="form-control form-control-lg" value="Student">
    

                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="login.php" class="footer-link">login</a>
                </div>
                
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>