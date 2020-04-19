<?php require 'conexion.php';

$query = "DELETE FROM proveedores WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $var);

$int = (int) $_GET['id'];
$var = mysqli_real_escape_string($mysqli, $int);
$stmt->execute();

$_SESSION['message'] = "Proveedor removido exitosamente.";
$_SESSION['type-message'] = "success";
header("Location: ../proveedores.php");

 ?>