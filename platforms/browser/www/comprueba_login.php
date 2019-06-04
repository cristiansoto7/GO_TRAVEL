<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

try{

	$base=new PDO("mysql:host=localhost; dbname=team_atack", "root", "");
	// uso libreria PDO (direccion bd; nombre bd; usuario bd; contraseña bd) y asigno los datos de la conexion;

	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//propiedades de la conexion
	$sql="SELECT * FROM USUARIOS_PASS WHERE CORREO= :login AND PASSWORD= :password";//instruccion sql para ver si ususario existe o no
	$resultado=$base->prepare($sql);//la variable resultado es igual a la conexion llamando a la funcion prepare y esta funcion se encarga de preparar la instruccion sql

	$login=htmlentities(addslashes($_POST["login"]));//rescatamos el login que se ingreso en el login con $_POST
	$password=htmlentities(addslashes($_POST["password"]));
	$resultado->bindValue(":login", $login);//indica que el marcador login corresponde con lo que esta almacenado en la variable login
	$resultado->bindValue(":password", $password);
	$resultado->execute();

	$numero_registro=$resultado->rowCount();//devuelve 0 o 1 depende si enceuntra al usuario

	if ($numero_registro!=0) {

		session_start();//crea una sesion
		$_SESSION["nombre"]=$_POST["login"];//guarda el login en una sesion para poder usarla en otra secciondel navegador

		header("location:principal.php");//nos dirige a la principal
		//echo "<h2>Adelante!!</h2>";

	}else{
		header("location:login.php");//nos redirige al login
	}

}catch(exception $e){

	die("ERROR: ". $e->getMessage());
}

?>

</body>
</html>