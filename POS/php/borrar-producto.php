<?php require 'conexion.php';

$query = "DELETE FROM productos WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $var);

$int = (int) $_GET['id'];
$var = mysqli_real_escape_string($mysqli, $int);
$stmt->execute();

$_SESSION['message'] = "Producto removido exitosamente.";
$_SESSION['type-message'] = "success";
header("Location: ../productos.php");

 ?>