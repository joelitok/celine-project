<?php
session_start();
  require('Includes/Connection.php');
if(isset($_GET['iduserE'])){
$_SESSION['id']=$_GET['iduserE'];	
}
if(isset($_GET['iduserT'])){
$_SESSION['id']=$_GET['iduserT'];	
}

$id=isset($_GET['id'])?$_GET['id']:'';
if($id){
 $query = "DELETE  FROM messagerie WHERE id =$id";
    $res = mysqli_query($conn, $query);
	
	if($res){
	//echo 'la suppression fonction';
	}else{
	//echo 'la suppression ne fonction pas'; 
	}


}

  
    if (isset($_POST['submit'])){
      // récupérer le nom d'utilisateur 
      $idUser=$_SESSION['id'];
     
      // récupérer le message
      $message = stripslashes($_POST['message']);
      $message = mysqli_real_escape_string($conn, $message);
     
       
      $query = "INSERT into `messagerie` (idUser, message) VALUES ('$idUser','$message')";
	 
      $res = mysqli_query($conn, $query);
        if($res){
            
         //   echo 'la messagerie fonction';
        }else{
		//echo 'verifier le fonctionnement de votre requete';
		}
    }
	

    
//$query = "SELECT * FROM messagerie order by id desc";
 $query2="SELECT * FROM messagerie, user WHERE messagerie.idUser= user.iduser ORDER BY id DESC";

$resMessage = mysqli_query($conn, $query2);

$numMessage=mysqli_num_rows($resMessage);
	  
	  if($resMessage){
      //      echo 'la selection fonction';   
	  
	  }
	
	?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
  <!--<link rel="stylesheet" href="asset/css/bootstrap.css">-->
    <link rel="stylesheet" href="asset/vendors/linericon/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="asset/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="asset/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="asset/vendors/animate-css/animate.css">
    <!-- main css  -->
    <link rel="stylesheet" href="asset/css/style.css">
	
	
	
	
	
	
	
	
	
	<!-- plugin pour la messagerie -->
	 <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->
	<!-- plugin pour la messagerie -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	
	
	<!-- plugin pour la messagerie 2-->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<!-- css pour la messagerie 2-->
<style type="text/css">
	
body { padding-top:30px; }
 .panel-body { padding:0px; }
 .list-group { margin-bottom: 0; }
.panel-title { display:inline }
 .label-info { float: right; }
 li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
 li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
 .mic-info { color: #666666;font-size: 11px; }
.action { margin-top:5px; }
 .comment-text { font-size: 12px; }
.btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
</style>
	
	
	<style type="text/css">
body {
	font-family: "Open Sans", sans-serif;
}
h2 {
	color: #000;
	font-size: 26px;
	font-weight: 300;
	text-align: center;
	text-transform: uppercase;
	position: relative;
	margin: 30px 0 70px;
}
h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	border-radius: 1px;
	background: #1c47e3;
	left: 0;
	right: 0;
	bottom: -20px;
}
.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .item {
	color: #999;
	overflow: hidden;
    min-height: 120px;
	font-size: 13px;
}
.carousel .media img {
	width: 80px;
	height: 80px;
	display: block;
	border-radius: 50%;
}
.carousel .testimonial {
	padding: 0 15px 0 60px ;
	position: relative;
}
.carousel .testimonial::before {
	content: '\93';
	color: #e2e2e2;
	font-weight: bold;
	font-size: 68px;
	line-height: 54px;
	position: absolute;
	left: 15px;
	top: 0;
}
.carousel .overview b {
	text-transform: uppercase;
	color: #1c47e3;
}
.carousel .carousel-indicators {
	bottom: -40px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 18px;
    height: 18px;
	border-radius: 50%;
	margin: 1px 3px;
}
.carousel-indicators li {	
    background: #e2e2e2;
    border: 4px solid #fff;
}
.carousel-indicators li.active {
	color: #fff;
    background: #1c47e3;    
    border: 5px double;    
}
</style>



<style type="text/css">    
    body {
        color: #333;
        background: #fafafa;
        font-family: "Patua One", sans-serif;
    }
    .contact-form {
        padding: 50px;
        margin: 30px 0;
    }
    .contact-form h1 {
        color: #19bc9d;
        font-weight: bold;
        margin: 0 0 15px;
    }
    .contact-form .form-control, .contact-form .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .contact-form .form-control:focus {
        border-color: #19bc9d;
    }
    .contact-form .btn-primary {
        color: #fff;
        min-width: 150px;
        font-size: 16px;
        background: #19bc9d;
        border: none;
    }
    .contact-form .btn-primary:hover {
        background: #15a487; 
    }
    .contact-form .btn i {
        margin-right: 5px;
    }
    .contact-form label {
        opacity: 0.7;
    }
    .contact-form textarea {
        resize: vertical;
    }
    .hint-text {
        font-size: 15px;
        padding-bottom: 20px;
        opacity: 0.6;
    }
</style>



	
	<script>
	
	function clean(){
	document.getElementById('nom').innerHTML="";
	document.getElementById('message').innerHTML="";
	
	}
</script>
	
	
	
	
	
	
	
	
	
	
	
	
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
                                <span class="text">+237 675877845</span>
                            </span>
                        </a>
                        <a href="mailto:support@colorlib.com">
                            <span class="lnr lnr-envelope"></span>
                            <span class="text">
                                <span class="text">celinewijamda@gmail.com</span>
                            </span>
                        </a>
                    </div>
					
					<div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <a href="#" class="text-uppercase">messagerie</a>
                    </div>
					
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

            
        </div>
    </header>
    <!--================ End Header Menu Area =================-->
<div class="container"  style="height:100px;margin-top:15px;">
<a href='javascript:history.back(1);' style="float:right;color:blue;" class="btn btn-primary"> <h3  style="color:blue;"> back porsonal page</h3></a>
</div>
<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Recent Comments</h3>
                <span class="label label-info" style="font-size:20px;">
				 <?php echo $numMessage; ?>
                    </span>
				 	
            </div>
            <div class="panel-body">
                <ul class="list-group">
				<?php while($row = mysqli_fetch_array($resMessage)){ ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                             <img src="profiles/<?php if($row['photo']) {echo $row['photo'];}else {echo 'user-image.png';} ?>" class="img-circle img-responsive" alt="" height="75px;" width="75px" /></div>
							 
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="#">
                                      By:   <?php echo $row['name'] ?></a>
                                    <div class="mic-info">
                                        <a href="#" style="font-size:15px;"> <?php echo $row['date'] ?></a>
                                    </div>
                                </div>
                                <div class="comment-text" style="font-size:20px;">
                                   <?php echo $row['message'] ?>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <a href="messagerie.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
					<?php } ?> 
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
    </div>
</div>







<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 m-auto">
            <div class="contact-form">
                <h1>Votre preocuppation</h1>
                <p class="hint-text" style="font-size:20px">Posez vos question , Donnez vos suggestions nous sommes a  votre écoute</p>       
                <form action=" " method="post" onsubmit="return clean()">
                    <div class="form-group">
                        <label for="inputMessage" >Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>










  <!--================Home Banner Area =================-->
          <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center ">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon6.png" alt="">
                            </div>
                            <h4>Messagerie</h4>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon7.png" alt="">
                            </div>
                            <h4>Suivre le cours</h4>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon3.png" alt="">
                            </div>
                            <h4>Telechargement</h4>
                        </div>
                    </div>
                    <!-- single course -->
                </div>
        </div>
  
  
  

  

      <!--================ Start Popular Courses Area =================-->
   
      

    <!--================ End Popular Courses Area =================-->
<?php include('Includes/Footer.php')?>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asset/js/jquery-3.2.1.min.js"></script>
    <script src="asset/js/popper.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/stellar.js"></script>
    <script src="asset/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="asset/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="asset/js/owl-carousel-thumb.min.js"></script>
    <script src="asset/js/jquery.ajaxchimp.min.js"></script>
    <script src="asset/vendors/counter-up/jquery.counterup.js"></script>
    <script src="asset/js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="asset/js/gmaps.min.js"></script>
    <script src="asset/js/theme.js"></script>
    
</body>
</html>








































