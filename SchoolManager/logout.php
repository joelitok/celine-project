<?php
session_start();
include('Includes/Connection.php');
if(isset($_SESSION['name_teacher'])){
unset($_SESSION['name_teacher']);
}else if (isset($_SESSION['Admin'])){
unset($_SESSION['Admin']);
}else{
//verifier la mise a jour du status au moment de la déconnection
unset($_SESSION['user']);
unset($_SESSION['name_student']);
unset($_SESSION['Studentid']);
	
}
header('location:../SchoolManager/course/index.php');
?>