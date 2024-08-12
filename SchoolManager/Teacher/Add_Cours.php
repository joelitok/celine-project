
<?php
session_start();
include('../Includes/Connection.php');
if(isset($_POST['submit'])){

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
            $chemin_destination = 'images/';
            $name = $_FILES['image']['name'];    
            move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination.$name);
            echo "L'image à été uploadé !";  
        } else {
            echo "L'image n'as pas été uploadé";
        }
    }
	
	// upload document
  if ($_FILES['document']['error']) {
        switch ($_FILES['document']['error']) {
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
        if ((isset($_FILES['document']['tmp_name'])&&($_FILES['document']['error'] == UPLOAD_ERR_OK))) {    
            $chemin_destination = 'pdffiles/';
            $name = $_FILES['document']['name'];    
            move_uploaded_file($_FILES['document']['tmp_name'], $chemin_destination.$name);
            echo "L'image à été uploadé !";  
        } else {
            echo "L'image n'as pas été uploadé";
        }
    }
	
// upload document
  if ($_FILES['application']['error']) {
        switch ($_FILES['application']['error']) {
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
        if ((isset($_FILES['application']['tmp_name'])&&($_FILES['application']['error'] == UPLOAD_ERR_OK))){
		$application_type=$_FILES['application']['type'];
if ($application_type=="application/exe" || $application_type=="application/ow" || $application_type=="application/im"|| $application_type=="application/dll"){
            $chemin_destination = 'applications/';
            $name = $_FILES['application']['name'];    
            move_uploaded_file($_FILES['application']['tmp_name'], $chemin_destination.$name);
            echo "L'image à été uploadé !";}		
           
        } else {
            echo "L'image n'as pas été uploadé";
        }
    }
	

$id_enseignant= $_SESSION['Teacherid'];
$title =$_POST['title'];
$filiere =$_POST['filiere'];
$description = $_POST['description'];
$document = basename($_FILES['document']['name']);
$image =basename($_FILES['image']['name']);
$application = basename($_FILES['application']['name']);
        

$query = "INSERT into `cours` (title, description, document, image, application, filiere,id_enseignant)
   VALUES ('$title', '$description', '$document', '$image', '$application', '$filiere','$id_enseignant')";
$res = mysqli_query($conn, $query);
if($res){
    echo 'insertion ok';
}


header('location:Teacher_Space.php');



}




if(isset($_POST['submit1'])){
header('location:Teacher_Space.php');
}
?>


<?php
//modifer un course
if(isset($_GET['id'])){
$id=$_GET['id'];
$query = "SELECT * FROM cours WHERE id_course='$id'";
$res = mysqli_query($conn, $query);
if($res){
while($row = mysqli_fetch_array($res)){ 
$_SESSION['title']=$row['title'];
$_SESSION['description']=$row['description'];
$_SESSION['filiere']=$row['filiere'];
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
    <title>Document</title>
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
<?php include('../Includes/Header.php')?>
  <!--================Home Banner Area =================-->
  <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
            
                <div class="row justify-content-center">
                    <div class="">
                   
                        <div class="banner_content text-center">
                        <h2>  Nouveau cours </h2>
                            <div class=" text-center">
                            
                                <form class="row contact_form" action="#" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                                   
								   
                                    <div class="col-md-10 text-center">
                                        <div class="form-group">
										<?php if(isset($_SESSION['title'])){ ?>
										<label>Titre</label>
										<input type="text" class="form-control" id="title" name="title"  style="border-radius:5px 7px 7px 5px"  value="<?php echo $_SESSION['title']?>">
                                        <?php }else{ ?>
                                           <label>Titre</label>
                                            <input type="text" class="form-control" id="title" name="title"  style="border-radius:5px 7px 7px 5px"  placeholder="Enter the name of courses">
                                        <?php } ?>
										</div>
                                        <div style="padding-bottom:20px">
										<?php if(isset($_SESSION['description'])){ ?>
										<label>Description</label>
                                            <textarea type="text"  height="400px"style="border-radius:5px 7px 7px 5px" class="form-control" id="description" name="description"><?php echo $_SESSION['description']?> </textarea>
                                       
										<?php }else{ ?>
										  <label>Description</label>
                                            <textarea type="text"  height="130px" style="border-radius:5px 7px 7px 5px" class="form-control" id="description" name="description"> </textarea>
                                        <?php } ?>
										</div >
                                       <div class="form-group">
									   
									   
									    <div class="row">
										<div class="col">
										
										<label>filiere</label>
                                            </div>
									<div class="col">
											  
									   <select name="filiere" id="filiere" class="form-control" width="100%">
									   <?php if(isset($_SESSION['filiere'])){ ?>
                                         <option selected> <?php echo $_SESSION['filiere'] ?> </option>
									<?php }else{ ?>	
                                         <option selected>   genie informatique</option>
                                              <?php } ?>											
                                                   <option selected>genie civil</option>
                                                   <option selected>genie electrique</option>
                                                   <option selected>genie chimie</option>
                                                   <option selected>TEchnique Administrative</option>
                                                   <option selected>genie forestier</option>
                                           </select>
                                              </div>
                                              </div>
										  
										  
                                          
										   
                                         </div>
										 
                                        <div class="form-group">
                                            <label>votre document</label>
                                            <input type="file" class="form-control"  style="border-radius:5px 7px 7px 5px" id="document" name="document">
                                        </div>
                                        <div class="form-group">
                                        <label>votre image</label>
                                            <input type="file" class="form-control"  style="border-radius:5px 7px 7px 5px" id="image" name="image">
                                        </div>
										
										
										
										
										
										
                                        <div class="form-group">
                                        <label>votre application</label>
                                            <input type="file" class="form-control"  style="border-radius:5px 7px 7px 5px" id="application" name="application">
                                        </div>
                                        
                                       
                                        <div class="form-group text-center">
                                            <button type="submit" name="submit" class="btn primary-btn">Ajouter</button>
											  <button type="submit" name="submit1" class="btn primary-btn">Retour</button>
                                        </div>
										
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

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