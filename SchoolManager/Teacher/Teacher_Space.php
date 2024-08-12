<?php
require('../Includes/Connection.php');
session_start();
//echo 'mon id est '.$_SESSION['Teacherid'];
if(isset($_SESSION['Teacherid'])){
$id=$_SESSION['Teacherid'];
$query = "SELECT * FROM cours WHERE id_enseignant='$id' ORDER BY id_course DESC LIMIT 50 ";
$res = mysqli_query($conn, $query);

if($res){
//echo 'notre requete fonctionne sans probleme';

}
}


// pour afficher les etudiants
$query2 = "SELECT * FROM user ORDER BY iduser DESC";
$res2 = mysqli_query($conn, $query2);

// pour afficher la requete final pour les etudiants
$query2a = "SELECT * FROM user ORDER BY iduser DESC";
$res2a = mysqli_query($conn, $query2a);

if($res2){
//echo 'la requete pour afficher les etudiants fonctionne';
$numRows2=0;
//pour la gestion de l'affichage vide
 while($row = mysqli_fetch_array($res2)){ 
 if($row['user_type']=='Student'){
 $numRows2+=1;
 }
}
}





if(isset($_POST['submit'])){

$titlecours=isset($_POST['titlecours'])? $_POST['titlecours']:'';
$debut= isset($_POST['debut'])? $_POST['debut']:'';
$fin= isset($_POST['fin'])? $_POST['fin']:'';
$sessionnumber= isset($_POST['sessionnumber'])? $_POST['sessionnumber']:'';
$idTeacher= isset($_POST['idTeacher'])? $_POST['idTeacher']:'';
$query="INSERT INTO `progression` (`coursetitle`, `pointdebut`, `pointdarret`, `sessionnumber`, `idTeacher`) 
                                    VALUES ('$titlecours', '$debut', '$fin', '$sessionnumber', '$idTeacher');";
$res1 = mysqli_query($conn, $query);
if($res1){

//echo 'sa me suprend';
}else{
//echo 'les chose de fonctionne pas et c est normal';
}
//echo "<script>alert(' votre progression a bien ete prix en compte par le systeme')</script>";
}









?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher space</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/vendors/linericon/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../asset/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../asset/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="../asset/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="../asset/vendors/animate-css/animate.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
	
	

	
	
	
	
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
	
	
    <!-- main css -->
    <link rel="stylesheet" href="../asset/css/style.css">
	
	
	
	
	<!-- link using in table-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<!-- css of modal add bonus-->
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {		
		color: #636363;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-login .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-login .modal-footer a {
		color: #999;
	}		
	.modal-login .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #60c7c1;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-login .avatar img {
		width: 100%;
	}
	.modal-login.modal-dialog {
		margin-top: 80px;
	}
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #45aba6;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>





















<!-- css using in table-->
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #299be4;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>







<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left">
                        <a href="tel:+9530123654896">
                            <span class="lnr lnr-phone"></span>
                            <span class="text">
                                <span class="text">(+237) 233 40 42 98</span>
                            </span>
                        </a>
                        <a href="mailto:support@colorlib.com">
                            <span class="lnr lnr-envelope"></span>
                            <span class="text">
                                <span class="text">cabenset@yahoo.fr;</span>
                            </span>
                        </a>
                    </div>
					<?php
					if(isset($_SESSION['name_teacher'])){
					
					?>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <a href="#" class="text-uppercase"> <?php echo $_SESSION['name_teacher'] ?></a> &nbsp;
						<a href="../logout.php" class="text-uppercase">logout</a>
                    </div>
					
                        
                   
					<?php }else{ ?>
					<div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <a href="../login.php" class="text-uppercase">Login</a>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>

        <div class="main_menu">
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between" method="" action="">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link search" id="search">
                                    <i class="lnr lnr-magnifier"></i>
                                </a>
                            </li>
						</ul>
<select name="cars" id="cars"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option value="Progression.php"><a class="nav-link" href=""><li class="nav-item">Progressions</li></a></option>
 
  <option value="mercedes"> <li class="nav-item"><a href="#" class="nav-link">Statistiques</a></li></option>
  <option value="audi"><li class="nav-item"><a class="nav-link" href="#">Infos personel</a></li></option>
</select>
 <a href="#myModal" class="nav-link" data-toggle="modal">Evolution</a>
<a href="../audio/index.php" target="_blank" class="btn btn-primary">Audio</a>		  
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->
  <!--================Home Banner Area =================-->
  <div height="400px">  </div>
  <div class="container">
    <div class="row" style="background-image:url('../asset/img/user.jpg'); width:100%;height:500px;opacity:0.5">
                    
					<div class="col-md-4 text-center ">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon6.png" alt="">
                            </div>
                            <h4> <a href="../messagerie.php?iduserE=<?php echo $_SESSION['Teacherid'];?>">Messagerie</a></h4>
                        </div>
                    </div>
                    <!-- single course -->
                     <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon3.png" alt="">
                            </div>
                        <h4> <a href="Add_Cours.php">   Patager un cours </a></h4>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon3.png" alt="">
                            </div>
                            <h4><a href="../../ScreenTask/ScreenTask/WebServer/index.php" target="_blank">Patager l'ecran</a></h4>
                        </div>
                    </div>
					
					
					
					
					
					
				 
					
					
                    <!-- single course -->
                </div>
				
				
				
				
				
				
				
				
				
				
				
				
				
        </div>
		
 <div class="container">
 <h2 style="text-align:center;"> Ma liste des cours</h2>
 </div>
<div class="container"> 
<?php   if(mysqli_num_rows($res)>0){ ?>
	<table class="table justify-container-center">

  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre du cours</th>
      <th scope="col"> Filiere</th>
      <th scope="col">Date et heurs</th>
	  <th colspan="3" style="text-align:center">Action</th>
    </tr>
  </thead>


 <?php $num=0; ?>
  <tbody>
  <?php while($row = mysqli_fetch_array($res)){ $num+=1 ?>
    <tr>
      <th scope="row"><?php echo $num ?> </th>
      <td><?php echo ucfirst($row['title']);  ?></td>
      <td><?php echo ucfirst($row['filiere']); ?></td>
      <td><?php echo $row['date'] ?></td>
	 <td><a  href="#myModal<?php echo $row['id_course'] ?>"  data-toggle="modal" class="fas fa-trash-alt"></a></td>
	  <td><a href="pdffiles/<?php echo $row['document']?>"><i class="fas fa-download"></i></a></td>
	  
	  <td><a href="Detail_Cours.php?id=<?php echo $row['id_course'] ?>" class="fas fa-eye"></a></td>
    </tr>
	
	
	<!-- Modal HTML -->
<div id="myModal<?php echo $row['id_course'] ?>" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Vous etes </h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p> Vous voulez supprimer le cours de<b style="font-size:20px;"> <?php echo ucfirst($row['title']);  ?></b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="Delete_Cours.php?id=<?php echo $row['id_course'] ?>" class="btn btn-danger" style="color:white">Delete</a>
			</div>
		</div>
	</div>
</div> 

	
	
   
    
	  <?php } ?>
  </tbody>

 
</table>
 
 
  
 <?php   }else{ ?>
 
 <div class="container alert alert-warning"> 
 La liste de vos cours des vide pour le moment
 <a href="Add_Cours.php" class="btn btn-success"> Commencer </a>
 </div>
 <?php  } ?>
</div>
	
      <!--================ Start Popular Courses Area 
	  
<!--================ debut formulaire pour entrer les information du cours cest a dire ou on c'est arreter =================-->

<div class="container">
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Salut Mr  <?php if(isset($_SESSION['name_teacher'] )){ echo $_SESSION['name_teacher'];} ?> </h4>
                </div>
        <div class="modal-body"> 
                    <p>info par rapport a la fin du cours:</p>
                    <p> </p>
            
		<form method="post" action="#">
		
		
          <div class="form-group">
		  <label> Nom du cours:</label>
           <input class="form-control" id="debut" name="titlecours"/>
		  </div>
          <div class="form-group">
		  <label> debut du cours:</label>
           <textarea class="form-control" id="debut" name="debut"></textarea> 
		  </div>
			
			<div class="form-group">
			 <label> fin du cours:</label>
           <textarea class="form-control" id="fin" name="fin"></textarea>
			</div>
			
		   <div class="form-group">
		  <label> nombre de session:</label>
           <input class="form-control" id="sessionnumber" name="sessionnumber"/> 
		  </div>
		<input type="hidden" name="idTeacher" value="<?php if(isset($_SESSION['Teacherid'])){ echo $_SESSION['Teacherid'];} ?>" />
          
          
			<button type="submit" name="submit" class="btn btn-secondary">send</button>
        </form>
                </div>
				
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>











		  
<!--================ fin du formulaire pour entrer a quel niveau on c"est arreter avec un cours=================-->  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<!-- liste des etudiants-->
<?php ///if($numRows2==0){ ?>

<div class="container alert alert-warning">
Vous pouvez ajouter un nouveau compte etudiant car il n'existe aucun compte etudiant
 <a href="Add_User.php" class="click-btn btn btn-default"> <span>Creer</span></a>
</div>

<?php// }else {?>


		
<div class="container">
<div class="table-wrapper">

       <table class="table table-striped table-bordered">
<thead>
               <tr>
                  <th width="5%">#</th>
				  <th width="5%">profiles</th>
                  <th width="80%">Name</th>
                  <th width="10%">Status</th>
             </tr>
</thead>
 <tbody id="user_grid">

 <?php 
  $time=time();
			   $i=1;
			   while($row=mysqli_fetch_assoc($res2a)){
			   $status='Offline';
			   $class="btn-danger";
			   if($row['last_login']>$time){
				$status='Online';
				$class="btn-success";
			   }
			   
			   
			   ?>	
			   <?php if($row['user_type']=='Student'){?>
               <tr>
                  <th scope="row"><?phpecho $i?></th>
				  <td><img src="../profiles/<?php if($row['photo']){ echo $row['photo']; } else { echo 'person.jpg'; } ?>" class="avatar" height="50px" width="50px"></td>
                  <td><?php echo $row['name']?></td>
                  <td><button type="button" class="btn <?php echo $class ?>"><?php echo $status ?></button></td>
               </tr>
			   
			   <?php } ?>
			   <?php  $i++; } ?>
            </tbody>
         </table>
</div>
</div>

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
   
   
     
	 
    <!--================ End Popular Courses Area =================-->
<?php include('../Includes/Footer.php')?>



<script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'update_user_status.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'get_user_status.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},3000);
		
		setInterval(function(){
			getUserStatus();
		},7000);
</script>




    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/popper.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/stellar.js"></script>
    <script src="../asset/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../asset/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../asset/js/owl-carousel-thumb.min.js"></script>
    <script src="../asset/js/jquery.ajaxchimp.min.js"></script>
    <script src="../asset/vendors/counter-up/jquery.counterup.js"></script>
    <script src="../asset/js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="../asset/js/gmaps.min.js"></script>
    <script src="../asset/js/theme.js"></script>
    
</body>
</html>


















