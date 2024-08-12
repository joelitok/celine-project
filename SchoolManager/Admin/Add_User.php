<?php
require('../Includes/Connection.php');
session_start();


    if (isset($_REQUEST['submit'])){
	
	
	
	
		// upload image
  if ($_FILES['image']['error']) {
           switch ($_FILES['image']['error']) {
            case 1: // UPLOAD_ERR_INI_SIZE
                echo "Le fichier dépasse la taille autorisée par le serveur";
                break;
              
            case 2: // UPLOAD_ERR_FORM_SIZE
                echo "Le fichier dépasse la limite autorisée dans le formulaire HTML";
                break;
  
            case 3: // UPLOAD_ERR_PARTIAL
                echo "L'envoi du fichier à été intérrompu pendant le transfert";
                break;
            case 4: // UPLOAD_ERR_NO_FILE
              echo "Le fichier que vous avez uploadé a une taille nulle";
               break;
        }
    } else {
        if ((isset($_FILES['image']['tmp_name'])&&($_FILES['image']['error'] == UPLOAD_ERR_OK))) {    
            $chemin_destination = '../profiles/';
            $name = $_FILES['image']['name'];    
            move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination.$name);
            echo "L'image à été uploadé !";  
        } else {
            echo "L'image n'as pas été uploadé";
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$image =basename($_FILES['image']['name']);
	
      // récupérer le nom d'utilisateur 
      $name = stripslashes($_REQUEST['name']);
      $name = mysqli_real_escape_string($conn, $name); 
      // récupérer l'email 
      $email = stripslashes($_REQUEST['email_address']);
      $email = mysqli_real_escape_string($conn, $email);
      // récupérer le mot de passe 
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      
       // récupérer le mot de numéro de compte
       $num_account = rand(5,15);
       
       // récupérer letype
       $type_user = stripslashes($_REQUEST['user_type']);
       $type_user = mysqli_real_escape_string($conn, $type_user);
       
      $query = "INSERT into `user` (name, account_number,password, user_type, email_address,photo)
            VALUES ('$name', '$num_account','".hash('sha256', $password)."','$type_user', '$email','$image')";
      $res = mysqli_query($conn, $query);
        if($res){
            //echo 'le mot de passe '.$password;
             header('location: Admin_Space.php');
        }
		
		
		
		
		
		
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    }
?>








<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	

<!-- link to modal-->	
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
	
	
	
	
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
	
	
	<!--  modal css -->
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 325px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}	
	.modal-confirm .icon-box {
		color: #fff;		
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #82ce34;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-confirm .icon-box i {
		font-size: 58px;
		position: relative;
		top: 3px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #82ce34;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #6fb32b;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
	
	
	
	
	
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="./index.php"><img id="image" class="logo-img" width="100px" height="100px" src="../assets/images/person-icon.png" alt="logo" style="border-radius:10%"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="POST" action=""  enctype="multipart/form-data">
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

               <select name="user_type" id="user_type" class="form-control form-control-lg">

                    <option> Admin </option>
                    <option>Student </option>
                    <option> Teacher </option>
                </select>

    

                    </div>

		<div class="form-group">		
          <input type="file" id="files" name="image"/>
        </div>
   <script>
   document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>

		 
                    <button href="#myModal" data-toggle="modal"  type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Add User</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="Admin_Space.php" class="footer-link">Back</a>
                </div>
                
            </div>
        </div>
		
		
		
		<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title">Utilisateur ajouter!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center"> vous avez bien ajouter un nouvelle utilisateur a votre listes</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>  

<script>
setTimeout(function() {$('#myModal').modal('hide');}, 4000);
</script>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>
          








