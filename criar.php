<?php session_start();

if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
}

require 'funciones.php';

$conexion = Conexion();
if (!$conexion) {
	header('Location: error.php');
}

$errores = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = $_POST['tituloNota'];
	$nota = $_POST['nota'];

	if (empty($titulo) OR empty($nota)) {
		$errores .= 'Você não inseriu todos os dados';
	}

	if(!$errores){
		NuevaNota($conexion, $titulo, $nota, $_SESSION['usuario']);
	}

}

require 'views/criar.php';

?>