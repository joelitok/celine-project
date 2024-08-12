


<?php
include('../Includes/Connection.php');
session_start();

$id = $_GET['id'];
//$id_user=$_SESSION['id_user'];
$query = "DELETE  FROM user WHERE iduser=$id";
$res = mysqli_query($conn, $query);
if($res){
echo ' la  suppression a fonctionné ';
header('location:Admin_Space.php');
}else{
echo ' la requete ne fonctionne pas';
}
?>












