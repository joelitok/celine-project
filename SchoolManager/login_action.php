<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
require('Includes/Connection.php');

if (isset($_POST['submit'])){
  session_start();
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
 
  $query =  "SELECT * FROM `user` WHERE email_address='$email' 
      and password='".hash('sha256', $password)."'";
// if($query){echo'la requete fonctionne';}
  $result = mysqli_query($conn,$query);
  $rowsNumber = mysqli_num_rows($result);

  
  if ($rowsNumber==1){
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['user_type'] == 'Admin') {
      $name = $user['name'];
	   $_SESSION['Admin']=$name;
	   
	   //id qui je doit utiliser dans admin page
	  
	   $_SESSION['Adminid']= $user['iduser']; 
	   
	  unset( $_SESSION['verif']);
	 
      header('location: Admin/Admin_Space.php');      
    }else if($user['user_type'] == 'Teacher'){
        $_SESSION['name_teacher'] = $user['name'];
		$_SESSION['Teacherid']= $user['iduser'];
		
		 unset( $_SESSION['verif']);
      header('location: Teacher/Teacher_Space.php');
    }else{
	
	$name = $user['name'];
	$_SESSION['name_student']=$name;
	$_SESSION['Studentid']= $user['iduser'];
	
	//operation au moment de la connection d'un utilisateur
	$time=time()+10;
	$queryStudent="UPDATE `user` SET `last_login` = $time WHERE iduser ='".$_SESSION['Studentid']."'";
	$resultStudent = mysqli_query($conn,$queryStudent);
	if($resultStudent){
	//fin des operation au moment de la connection d'un utilisateur
	 unset($_SESSION['verif']);
    header('location: Student/Student_Space.php');
	}else{
	echo 'la requete ne fonctionne pas';
	}
	
    }
    
  }else{
 
 $_SESSION['verif']='<p style="font-size:18px">verifier votre email ou mots de passe</p>';
 //session_destroy();
  header('location:login.php');
  
  }

}
?>
