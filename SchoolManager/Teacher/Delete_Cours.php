<?php
include('../Includes/Connection.php');
session_start();

$id = $_GET['id'];
//$id_user=$_SESSION['id_user'];
$query = "DELETE  FROM cours WHERE id_course=$id";
$res = mysqli_query($conn, $query);
if($res){
echo ' la requete fonctionne ';
header('location:Teacher_Space.php');
}else{
echo ' verifier le fonctionnement de votre application';
}
?>