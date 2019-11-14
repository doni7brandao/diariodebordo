<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

require 'funciones.php';

$conexion = Conexion();
if (!$conexion) {
	header('Location: error.php');
}

$errores = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Obtener los datos de los input
	$usuario = LimpiarDatos($_POST['usuario']);
	$pass = $_POST['pass'];
	$pass = md5($pass);

	$obtenerLogin = Login($conexion, $usuario, $pass);
	// var_dump($obtenerLogin);
	if(empty($usuario) OR empty($pass)){
		$errores .= 'Insira seus dados!';
	}

	if($obtenerLogin != false){
		$_SESSION['usuario'] = $usuario;
		header('Location: index.php');
	} else {
		$errores .= ' Os dados estão incorretos';

	}

}

require 'views/login.php';

?>