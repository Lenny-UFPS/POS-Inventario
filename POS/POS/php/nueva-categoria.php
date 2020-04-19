<?php require 'conexion.php';

$nombre = $_POST['nombre'];
$result = $mysqli->query("SELECT COUNT(*) as total FROM categorias WHERE nombre_categoria='{$nombre}'");
$row = mysqli_fetch_assoc($result);
$num_rows = $row['total'];

if($num_rows != 0){
	$_SESSION['message'] = "La categoría ya se encuentra registrada";
	$_SESSION['type-message'] = "danger";
	header("Location: ../categorias.php");
}else{
	$stmt = $mysqli->prepare("INSERT INTO categorias (nombre_categoria) VALUES (?)");
	$stmt->bind_param("s", $nombre_categoria);

	$nombre_categoria = mysqli_real_escape_string($mysqli, $nombre);
	$stmt->execute();

	$_SESSION['message'] = "Categoría agregada exitosamente.";
	$_SESSION['type-message'] = "success";
	header("Location: ../categorias.php");
}


# Done ...
 ?>