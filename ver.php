<?php session_start();

@$id = $_GET['id'];
if (!$id) {
	header('Location: index.php');
}
if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
}

require 'funciones.php';

$conexion = Conexion();
if (!$conexion) {
	header('Location: error.php');
}

// Obtener nota
$notaUsuario = ObtenerNotasUsuario($conexion, $_SESSION['usuario']);
if (!$notaUsuario) {
	header('Location: index.php');
}
// Mostrar nota
$verNota = VerNota($conexion, $_SESSION['usuario'], $id);

$errores = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$idNota = $_POST['id'];
	$titulo = $_POST['tituloNota'];
	$nota = $_POST['nota'];
	if (empty($titulo) OR empty($nota)) {
		$errores .= 'Insira todos os dados.';
	}

	if (!$errores) {
		ModificarNota($conexion, $titulo, $nota, $id);
		header('Location: index.php');
	}

}

require 'views/ver.php';

?>