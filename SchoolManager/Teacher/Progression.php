<?php
session_start();
require_once('../Includes/Connection.php'); 
$query="SELECT * FROM progression, user WHERE progression.idTeacher= user.iduser ORDER BY id DESC";
$res = mysqli_query($conn, $query);
$num=mysqli_num_rows($res);	  
if($res){
       //     echo 'la selection fonction';   
	    }
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher</title>
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
 <!--================Home Banner Area =================-->
          <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center ">
                        <div class="single_department">
                            <div class="dpmt_icon">
                                <img src="asset/img/dpmt/icon6.png" alt="">
                            </div>
							 <h4> <a href='javascript:history.back(1);'>retour</a></h4>
                        </div>
                    </div>
                    
                    <!-- single course -->
                </div>
        </div>
  
  
  
  <div class="container"> 
<?php   if(mysqli_num_rows($res)>0){ ?>
	<table class="table justify-container-center">

  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre du cours</th>
      <th scope="col"> nombre de seance</th>
      <th scope="col">Date et heurs</th>
	  <th scope="col">nom prof</th>
	  <th scope="col">debut</th>
	  <th scope="col">fin</th>
    </tr>
  </thead>
 <?php $num=0; ?>
  <tbody>
  <?php while($row = mysqli_fetch_array($res)){ $num+=1 ?>
    <tr>
      <th scope="row"><?php echo $num ?> </th>
      <td><?php echo ucfirst($row['coursetitle']);  ?></td>
      <td><?php echo ucfirst($row['sessionnumber']); ?></td>
      <td><?php echo $row['date'] ?></td>
	<td> <?php  echo ucfirst($row['name']) ?></td>
	<td><?php echo ucfirst($row['pointdebut']) ?></td>
	<td> <?php  echo ucfirst($row['pointdarret']) ?></td>
    </tr>
   
    
	  <?php } ?>
  </tbody>

 
</table>
 
 <?php   }else{ ?>
 
 <div class="container alert alert-warning"> 
 aucun seace deja fait
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










    
</body>
</html>









































