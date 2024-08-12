<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Video Stream 2.0</title>
        <script src="jquery.js"></script>
        <script src="peer.js"></script>
        <script src='socket.io.js'></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  
 </head>
    <body>
	<div class="alert alert-success" style="text-align:center; font-size:40px"><p style="font-family: 'Pacifico', cursive;" >Online User:</p>
     <ul id='ulUser'>
    </ul>
	</div>
        
        
		
		
		<div class="container">
		<div class="row">
		<div class="col">
		 <video id="localStream" width="300" controls style="border-radius: 1em/5em;"></video>
        <br /><br />
		</div>
		<div class="col">
		  <video id="remoteStream" width="300" controls style="border-radius: 1em/5em;"></video>
        <br /><br/>
		</div>
		
		
		
		</div>
		<!-- <h3 id='my-peer'>Your id: </h3> -->
        <input type='text' id='remoteId' placeholder="Remote ID">
        <button id='btnCall'>Call</button>

        <input type='text' id='txtUsername' placeholder="Enter your username">
        <button id='btnSignUp'>Signup</button>
		</div>
		
			
    </body>
    <script src="main.js"></script>
</html>
