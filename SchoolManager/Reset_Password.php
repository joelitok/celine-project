<?php
session_start();
require('Includes/Connection.php');
if(isset($_POST['submit'])){
 
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
	echo 'votre email est '.$email.'et votre nouveau mots de passse'.$password;
    $query = "UPDATE user SET password='".hash('md5', $password)."' WHERE email_address ='$email'";
	//UPDATE `user` SET `iduser` = NULL, `name` = '', `account_number` = '', `password` = '', `user_type` = '', `email_address` = '', `date` = '' WHERE `user`.`iduser` = 69
    $result = mysqli_query($conn, $query);
	
	if($result){
		echo' votre modification fonction';
	}
    header('location:login.php');
}else{
    $_SESSION['message']=' <p style="color:red"> votre email n existe pas  </p>';
}
   
}

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
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/vendors/linericon/style.css">
    
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
            <div class="card-header text-center"><a href="index.php"><img class="logo-img" width="100px" height="100px" src="assets/images/person-icon.png" alt="logo"></a><span class="splash-description">Reset password</span></div>
            <?php   if(isset( $_SESSION['message'])) { ?>
    <div class="card-header">
              <?php 
                echo ;
				if(isset($_SESSION['message'])){
					   echo  $_SESSION['message'];
						
					$time=time();
						if($time+2000){
					unset( $_SESSION['message']);
						}
						}
						header("refresh:100");
				
				
				
				
				
				
                ?>
     </div>
    <?php  } ?>
            <div class="card-body">
                
                <form method="POST" action=""  enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" type="email" name="email" placeholder="your email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="cpassword" type="cpassword" name="cpassword" placeholder="Comfirme Password">
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-lg btn-block"  name="submit">update</button>
					<a href="login.php"> back<a>
                </form>
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