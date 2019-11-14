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
	$nombre = LimpiarDatos($_POST['nombre']);
	$apellido = LimpiarDatos($_POST['apellido']);
	$usuario = LimpiarDatos($_POST['usuario']);
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$pass = md5($pass);
	$pass2 = md5($pass2);
	$obtenerUsuario = ObtenerUsuario($conexion, $usuario);

	if(empty($nombre) OR empty($apellido) OR empty($usuario) OR empty($pass) OR empty($pass2)){
		$errores .= 'Digite todos os dados.';
	} else {
		if($pass != $pass2){
			$errores .= 'As senhas não coincidem!';
		}
	}

	if($obtenerUsuario != false){
		$errores .= 'O Usuário já existe!';
	}

	if (!$errores) {
		NuevoUsuario($conexion, $nombre, $apellido, $usuario, $pass);
		header('Location: index.php');
	}

}

require 'views/registro.php';

?>