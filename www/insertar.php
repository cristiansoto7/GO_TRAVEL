<!DOCTYPE html>
<html lang="en" >
<html>
<head>
	<title></title>
</head>
<body>

<?php


	$servidor="gotravelunab.000webhostapp.com";
	$nombre_usuario="id9745597_go_travel_db_username";
	$contra="12345678";
	$db="id9745597_go_travel_db_name";

	$conexion=new mysqli($servidor,$nombre_usuario,$contra,$db);

	if ($conexion->connect_error) {
		die("conexion fallida ".$conexion->connect_error);
	}

	if(isset($_POST['apellido'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$rut=$_POST['rut'];
		$correo=$_POST['correo'];
		$password=$_POST['password'];

		$sql="INSERT INTO USUARIOS_PASS(nombre,apellido,rut,correo,password) VALUES ('$nombre','$apellido','$rut','$correo','$password')";

		if ($conexion->query($sql)===true) {
			echo "ingresado";
		}else{
			die("error al ingresar datos". $conexion->error);
		}
	}
	header("location:login.php");//redirige al login

?>

</body>
</html>