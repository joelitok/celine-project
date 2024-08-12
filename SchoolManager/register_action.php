<?php
    require('Includes/Connection.php');
    if (isset($_REQUEST['submit'])){
      // récupérer le nom d'utilisateur 
      $name = stripslashes($_REQUEST['name']);
      $name = mysqli_real_escape_string($conn, $name); 
      // récupérer l'email 
      $email = stripslashes($_REQUEST['email_address']);
      $email = mysqli_real_escape_string($conn, $email);
      // récupérer le mot de passe 
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      
       // récupérer le mot de numéro de compte
       $num_account =rand(5, 15);
       
       
       // récupérer letype
       $type_user = stripslashes($_REQUEST['user_type']);
       $type_user = mysqli_real_escape_string($conn, $type_user);
       
      $query = "INSERT into `user` (name, account_number,password, user_type, email_address)
            VALUES ('$name', '$num_account','".hash('sha256', $password)."','$type_user', '$email')";
      $res = mysqli_query($conn, $query);
        if($res){
            //echo 'le mot de passe '.$password;
             header('location: login.php');
        }
    }
    ?>