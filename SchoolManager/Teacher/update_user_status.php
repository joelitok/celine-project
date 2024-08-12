<?php
session_start();
include('../Includes/Connection.php');
$uid= isset($_SESSION['Studentid']) ? $_SESSION['Studentid']:'';
$time=time()+10;
$res=mysqli_query($conn,"UPDATE `user` SET `last_login` = $time WHERE iduser = $uid");
?>