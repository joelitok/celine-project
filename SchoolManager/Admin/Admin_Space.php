
<?php
include('../Includes/Connection.php');
session_start();

//pour afficher les administrateurs
$query = "SELECT * FROM user ORDER BY iduser DESC";
$res = mysqli_query($conn, $query);

if($res){
//echo 'la requete pour afficher les administrateurs fonctionne';
}



// pour afficher les enseignant
$query1 = "SELECT * FROM user ORDER BY iduser DESC";
$res1 = mysqli_query($conn, $query1);

//la requete qui sera affichier au final pour les enseignants
$query1a = "SELECT * FROM user ORDER BY iduser DESC";
$res1a = mysqli_query($conn, $query1a);

if($res1){
//echo 'la requete pour afficher les enseignants fonctionne';
$numRows1=0;


//pour la gestion de l'affichage vide
 while($row = mysqli_fetch_array($res1)){ 
 if($row['user_type']=='Teacher'){
 $numRows1+=1;
 }
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

?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/vendors/linericon/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../asset/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../asset/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="../asset/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="../asset/vendors/animate-css/animate.css">
    <!-- main css -->
<link rel="stylesheet" href="../asset/css/style.css">

<!-- link to  modal confirmation-->
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
</head>
<body> 
















<!-- modal css-->
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
                                <span class="text">  cabenset@yahoo.fr</span>
                            </span>
                        </a>
                    </div>
                   <?php
					if(isset($_SESSION['Admin'])){
					
					?>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <a href="#" class="text-uppercase"> <?php echo $_SESSION['Admin'] ?></a> &nbsp;
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
                            
                            <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link search" id="search">
                                    <i class="lnr lnr-magnifier"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->
  <!--================Home Banner Area =================-->
 

      <!--================ Start Popular Courses Area =================-->
   

        <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center ">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon6.png" alt="">
                            </div>
                          <a href="Add_User.php"><h4>Creer un compte</h4></a>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon7.png" alt="">
                            </div>
                           <a href="#"> <h4>Modifier une Information </h4></a>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon3.png" alt="">
                             </div>
                          <a href="../Statistiques.php">  <h4>Statistiques</h4></a>
                        </div>
                    </div>
                    <!-- single course -->
                </div>
        </div>
		
		
		
<!--    pour afficher les compte deja creer -->		
<div class="container">

<div class="table-wrapper">
<div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2><b style="color:white;">Listes des Administrateurs</b></h2>
					</div>
					<div class="col-sm-7">
						<a href="Add_User.php" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ajouter</span></a>
												
					</div>
                </div>
</div>
<table class="table justify-container-center">
    <thead>
    <tr>   
 <th scope="col">#</th>
 <th scope="col">profiles</th>
      <th scope="col">nom </th>
      <th scope="col"> email</th>
      <th scope="col">type</th>
	  <th scope="col">date de creation</th>
	  <th colspan="2" style="text-align:center">Action</th>
    </tr>
  </thead>
<?php $num=0 ?>
<?php while($row = mysqli_fetch_array($res)){ ?>
<?php if($row['user_type']=='Admin'){ $num+=1  ?>

 <tbody>
    <tr>
      <th scope="row"><?php echo $num ?> </th>
	  <td><img src="../profiles/<?php if($row['photo']){ echo $row['photo']; } else { echo 'person.jpg'; } ?>" 
	 class="avatar" height="50px" width="50px"></td>
      <td><?php echo ucfirst($row['name']);  ?></td>
      <td><?php echo ucfirst($row['email_address']); ?></td>
      <td><?php echo ucfirst($row['user_type']); ?></td>
	  <td><?php echo $row['date']; ?></td>
	 <td><a href="#myModaladmin<?php echo $row['iduser'] ?>" <?php $row['iduser'] ?> data-toggle="modal" class="fas fa-trash-alt"></a></td>  <!--     -->
	 
	 <td><a href="Detail_User.php?id=<?php echo $row['iduser'] ?>"  class="fas fa-eye"></a>
     
     
     
     
     </td>
    </tr>
	
	
	
	
	
	
	
<!-- Modal HTML  to delete user-->
<div id="myModaladmin<?php echo $row['iduser'] ?>" class="modal fade"> <!-- -->
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title"> Vous etes sur?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p> voulez vous vraiment supprimer l'utilisateur  <b style="font-size:20px"><?php echo ucfirst($row['name']);  ?></b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="Delete_User.php?id=<?php echo $row['iduser'] ?>"  style="color:white"  class="btn btn-danger">Delete</a>
			</div>
		</div>                      
        </div> 
  </div> 
  
   
    

 </tbody>
<?php } ?>

<?php } ?>
</table>












</div>
</div>


<?php if($numRows1==0){ ?>

<div class="container alert alert-warning">
Vous pouvez ajouter un nouveau compte enseignant car  il n'existe aucun compte enseignant
 <a href="Add_User.php" class="click-btn btn btn-default"> <span>Creer</span></a>
</div>

<?php }else {?>


<div class="container">
<div class="table-wrapper">
<div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2><b style="color:white;">Listes des Enseignants</b></h2>
					</div>
					<div class="col-sm-7">
						<a href="Add_User.php" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ajouter</span></a>
												
					</div>
                </div>
</div>
<table class="table justify-container-center">
    <thead >
    <tr>
      <th scope="col">#</th>
	  <th scope="col">profiles</th>
      <th scope="col">nom </th>
      <th scope="col"> email</th>
      <th scope="col">type</th>
	  <th scope="col">date de creation</th>
	  <th colspan="2" style="text-align:center">Action</th>
    </tr>
  </thead>

<?php $num1=0 ?>
<?php while($row1 = mysqli_fetch_array($res1a)){  ?>
<?php if($row1['user_type']=='Teacher'){ $num1+=1 ?>



 <tbody>
    <tr>
      <th scope="row"><?php echo $num1 ?> </th>
	  <?php if($row1['photo']){ ?>
     <td><img src="../profiles/<?php echo $row1['photo'];  ?>" 
	 class="avatar" height="50px" width="50px"></td>
	<?php }else{?>
	<td><img src="../profiles/person.jpg" class="avatar" height="50px" width="50px"></td>
	 <?php }?>
	 
	   <td><?php echo ucfirst($row1['name']);  ?></td>
      <td><?php echo ucfirst($row1['email_address']); ?></td>
      <td><?php echo ucfirst($row1['user_type']); ?></td>
	  <td><?php echo $row1['date']; ?></td>
      <td><a  href="#myModalteacher<?php echo $row1['iduser'] ?>" data-toggle="modal" class="fas fa-trash-alt"></a></td>
	 
	 <td><a href="Detail_User.php?id=<?php echo $row1['iduser'] ?>" class="fas fa-eye"></a></td>
    </tr>
	
	
	
	
	<!-- Modal HTML  to delete user-->
<div id="myModalteacher<?php echo $row1['iduser'] ?>" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title"> Vous etes sur?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p> voulez vous vraiment supprimer l'utilisateur <b style="font-size:20px"><?php echo ucfirst($row1['name']);  ?></b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="Delete_User.php?id=<?php echo $row1['iduser'] ?>"  style="color:white"  class="btn btn-danger">Delete</a>
			</div>
		</div>                      
        </div> 
  </div> 
   
    

 </tbody>
<?php } ?>
<?php } ?>
</table>

</div>
</div>
<?php } ?>



<?php if($numRows2==0){ ?>

<div class="container alert alert-warning">
Vous pouvez ajouter un nouveau compte etudiant car il n'existe aucun compte etudiant
 <a href="Add_User.php" class="click-btn btn btn-default"> <span>Creer</span></a>
</div>

<?php }else {?>


		
<div class="container">
<div class="table-wrapper">
<div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
						<h2><b style="color:white;">Listes des Etudiants</b></h2>
					</div>
					<div class="col-sm-7">
						<a href="Add_User.php" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ajouter</span></a>
												
					</div>
                </div>
</div>
<table class="table justify-container-center">

    <thead class="thead-secondary">
    <tr>
      <th scope="col">#</th>
	  <th scope="col">profiles</th>
      <th scope="col">nom </th>
      <th scope="col"> email</th>
      <th scope="col">type</th>
	  <th scope="col">date de creation</th>
	  <th colspan="2" style="text-align:center">Action</th>
    </tr>
  </thead>

<?php $num2=0 ?>
<?php while($row2 = mysqli_fetch_array($res2a)){  ?>
<?php if($row2['user_type']=='Student'){ $num2+=1 ?>



 <tbody>
    <tr>
      <th scope="row"><?php echo $num2 ?> </th>
      
	  <td><img src="../profiles/<?php if($row2['photo']){ echo $row2['photo']; } else { echo 'person.jpg'; } ?>" 
	  
	  class="avatar" height="50px" width="50px"></td>
	    
	  
      <td><?php echo ucfirst($row2['name']);  ?></td>
	  <td><?php echo ucfirst($row2['email_address']); ?></td>
      <td><?php echo ucfirst($row2['user_type']); ?></td>
	  <td><?php echo $row2['date']; ?></td>
      <td><a href="#myModalstudent<?php echo $row2['iduser'] ?>" data-toggle="modal" class="fas fa-trash-alt"></a></td>
	 
<td><a href="Detail_User.php?id=<?php echo $row2['iduser'] ?>" class="fas fa-eye"></a></td>

<!-- Modal HTML  to delete user-->
<div id="myModalstudent<?php echo $row2['iduser'] ?>" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title"> Vous etes sur?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p> voulez vous vraiment supprimer l'utilisateur<b style="font-size:20px"> <?php echo ucfirst($row2['name']);  ?></b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="Delete_User.php?id=<?php echo $row2['iduser'] ?>"  style="color:white"  class="btn btn-danger">Delete</a>
			</div>
		</div>                      
        </div> 
  </div>    
</tr>
 </tbody>
 
<?php } ?>

<?php } ?>
</table>
</div>
</div>
<?php } ?>






		
		
		
		
		
    <!--================ End Popular Courses Area =================-->
<?php include('../Includes/Footer.php')?>

    

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

