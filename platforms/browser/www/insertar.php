<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php


	$servidor="localhost";
	$nombre_usuario="root";
	$contra="";
	$db="team_atack";

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