<?php require 'conexion.php';

$stmt = $mysqli->prepare("INSERT INTO categorias (nombre_categoria) VALUES (?)");
$stmt->bind_param("s", $nombre_categoria);

$nombre = $_POST['nombre'];
$nombre_categoria = mysqli_real_escape_string($mysqli, $nombre);
$stmt->execute();

$_SESSION['message'] = "Categoría agregada exitosamente.";
$_SESSION['type-message'] = "success";
header("Location: ../categorias.php");
# Done ...
 ?>