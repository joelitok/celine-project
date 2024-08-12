
<?php
include('../Includes/Connection.php');
session_start();
$_SESSION['status']=false;
//$query = "SELECT * FROM cours ORDER BY id_course DESC LIMIT 50";

$q="SELECT * FROM cours,user WHERE cours.id_enseignant=user.iduser ORDER BY id_course DESC";

//$res = mysqli_query($conn, $query);

$res2 = mysqli_query($conn, $q);

if($res2){
//echo 'votre requet fonctionne';
}else{
//echo 'verifier votre requete';
}



if(isset($_POST['submit'])){

    $reponse = (isset($_POST['reponse'])) ? $_POST['reponse'] :'' ;
    $idStudent=(isset($_POST['Student'])) ? $_POST['Student'] :'';
    $idQuestion=(isset($_POST['Question'])) ? $_POST['Question'] :'' ;
    $idTeacher=(isset($_POST['Teacher'])) ? $_POST['Teacher'] :'';
   
    
    $queryR = "INSERT into `reponse` (reponse,idStudent,idQuestion,idTeacher)
    VALUES ('$reponse','$idStudent','$idQuestion','$idTeacher')";
    $resR = mysqli_query($conn, $queryR);
    
    if($resR){
  //      echo 'insertion Response is ok';
    }
    
}
header("refresh:1800");

?>



<script> 
$(document).ready(
function() {
setInterval(function() {

<?php 
//pour le formulaire de question
$question="SELECT * FROM question ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $question);
?>";
           
        }, 2000);
    });

</script>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/vendors/linericon/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../asset/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../asset/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="../asset/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="../asset/vendors/animate-css/animate.css">
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
                                <span class="text"> (+237) 233 40 42 98</span>
                            </span>
                        </a>
                        <a href="mailto:support@colorlib.com">
                            <span class="lnr lnr-envelope"></span>
                            <span class="text">
                                <span class="text"> cabenset@yahoo.fr</span>
                            </span>
                        </a>
                    </div>
					<?php
					if(isset($_SESSION['name_student'])){
					
					?>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <a href="#" class="text-uppercase"> <?php echo $_SESSION['name_student'] ?></a> &nbsp;
						<?php $_SESSION['status']=true; ?>
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
          <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center ">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon6.png" alt="">
                            </div>
							 <h4> <a href="../messagerie.php?iduserE=<?php echo $_SESSION['Studentid'];?>">Messagerie</a></h4>
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon7.png" alt="">
                            </div>
							
							 <h4><a href="http://<?php echo $_SERVER['HTTP_HOST'].':7070';?>" target="_blank">Suivre le cours</a></h4>
                            <!-- single course /../../ScreenTask/ScreenTask/WebServer/index.php-->
                        </div>
                    </div>
                    <!-- single course -->
                    <div class="col-md-4 text-center">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon3.png" alt="">
                            </div>
                            <h4><a href="../audio/index.php" target="_blank" class="btn btn-primary">Audio</a></h4>
                        </div>
                    </div>
                    <!-- single course -->
                </div>
        </div>
  
  
  
  <div class="container"> 
<?php   if(mysqli_num_rows($res2)>0){ ?>
	<table class="table justify-container-center">

  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre du cours</th>
      <th scope="col"> Filiere</th>
      <th scope="col">Date et heurs</th>
	  <th scope="col">nom prof</th>
	  <th colspan="2" style="text-align:center;">Action</th>
    </tr>
  </thead>


 <?php $num=0; ?>
  <tbody>
  <?php while($row2 = mysqli_fetch_array($res2)){ $num+=1 ?>
    <tr>
      <th scope="row"><?php echo $num ?> </th>
      <td><?php echo ucfirst($row2['title']);  ?></td>
      <td><?php echo ucfirst($row2['filiere']); ?></td>
      <td><?php echo $row2['date'] ?></td>
	<td> <?php  echo ucfirst($row2['name']) ?></td>
	
	<td><a href="../Teacher/pdffiles/<?php echo $row2['document']?>"><i class="fas fa-download"></i></a></td>
	<td><a href="../Teacher/applications/<?php echo $row2['application']?>" alt="logiciel"><i class="fa fa-rocket"></i></a></td>

    </tr>
   
    
	  <?php } ?>
  </tbody>

 
</table>
 
 <?php   }else{ ?>
 
 <div class="container alert alert-warning"> 
 La liste des cours est vide aucun cours n'es disponible
 </div>
 <?php  } ?>
</div>

 

      <!--================ Start Popular Courses Area =================-->
   
      

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





<script>
setInterval(function(){ $('#myModal').modal('show');
    //location.reload();
 }, 900000);
</script>
	
	<div class="container">
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Salut Mr  <?php if(isset($_SESSION['name_student'])){ echo $_SESSION['name_student'];} ?> </h4>
                </div>
        <div class="modal-body"> 
                    <p>la question du prof est:</p>
                    <p><?php while($rowR = mysqli_fetch_array($result)){  ?>
                    <?php  echo $rowR['question']; ?>
                   
                    </p>
            
		<form method="post" action="#">
		
		
          
          <div class="form-group">
           <textarea class="form-control" id="reponse" name="reponse"></textarea>
			</div>
           <input type="hidden" name="Student" id="Student" value="<?php  echo $_SESSION['Studentid']; ?>">
           <input type="hidden" name="Question" id="Question" value="<?php  echo $rowR['id']; ?>">
           <input type="hidden" name="Teacher"  id="Teacher" value="<?php  echo $rowR['idTeacher']; ?>">	
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
<?php } ?>






    
</body>
</html>