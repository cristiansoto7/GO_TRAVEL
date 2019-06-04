<!DOCTYPE html>
<html lang="en" >
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	session_start();//reanuda una session
	session_destroy();//destruye sesion
	header("location:login.php");//redirige al login
 ?>


</body>
</html>