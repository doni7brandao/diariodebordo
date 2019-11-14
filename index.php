<?php session_start();

if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
}

require 'funciones.php';

$conexion = Conexion();
if (!$conexion) {
	header('Location: error.php');
}

$obtenerNotaUsuario = ObtenerNotasUsuario($conexion, $_SESSION['usuario']);

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	DeleteNota($conexion, $id, $_SESSION['usuario']);
	header('Location: index.php');
}

require 'views/index.php';

?>