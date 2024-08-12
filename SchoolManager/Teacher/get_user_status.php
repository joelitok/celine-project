<?php
session_start();
include('../Includes/Connection.php');
$_SESSION['Studentid'];
$time=time();
$student='Student';
//pour afficher les etudiants
$query = "SELECT * FROM user ORDER BY iduser DESC";
$res = mysqli_query($conn, $query);

if($res){
}else{
//echo 'sa ne fonction pas';
}
$i=1;
$html='';

while($row=mysqli_fetch_assoc($res)){
if($row['user_type']=='Student'){
$_GET['photo']=$row['photo'];
	$status='Offline';
	$class="btn-danger";
	
	if($row['last_login']>$time){
		$status='Online';
		$class="btn-success";
	}
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
				   <td><img src="../profiles/"'.$_GET['photo'].'/></td>
                  <td>'.$row['name'].'</td>
				 <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
            </tr>';
	$i++;
	}
}
echo $html;
?>