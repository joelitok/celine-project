<?php
include('../Includes/Connection.php');
session_start();

$id = $_GET['id'];
//$id_user=$_SESSION['id_user'];
$query = "SELECT * FROM cours WHERE id_course=$id";
$res = mysqli_query($conn, $query);
if($res){
echo ' la requete fonctionne ';
}else{
echo ' verifier le fonctionnement de votre application';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!-- main css -->
    <link rel="stylesheet" href="../asset/css/style.css">
</head>
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
                                <span class="text">+953012 3654 896</span>
                            </span>
                        </a>
                        <a href="mailto:support@colorlib.com">
                            <span class="lnr lnr-envelope"></span>
                            <span class="text">
                                <span class="text">support@colorlib.com</span>
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
                        <a href="#" class="text-uppercase">Login</a>
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
 

<div class="container"> 
<?php   while($row = mysqli_fetch_array($res)){ ?>
<div class="card mb-3">
  <img class="card-img-top" src="images/<?php echo $row['image']?>" height="300px" width="500px">
  <div class="card-body">
    <h5 class="card-title" style="font-family: 'Anton', sans-serif;"><?php echo ucfirst($row['title']) ?></h5>
    <p class="card-text"><?php echo ucfirst($row['description']) ?></p>
    <p class="card-text"><small class="text-muted"><?php echo $row['date']?></small></p>
	
  </div>
 
  </div>
  <a class="btn btn-primary" href="Add_Cours.php?id=<?php echo $row['id_course'] ?>"> modifier<a>

 <a href="Teacher_Space.php" class="btn btn-success"> back</a>
 <?php }?>
 </div> 
 
	
      <!--================ Start Popular Courses Area =================-->
   
   
      <div class="popular_courses lite_bg">
	  <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center ">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon6.png" alt="">
                            </div>
                            <h4>Languages</h4>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon7.png" alt="">
                            </div>
                            <h4>Notes de cours</h4>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon3.png" alt="">
                            </div>
                            <h4>Statistiques</h4>
                        </div>
                    </div>
                    <!-- single course -->
                </div>
        </div>
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