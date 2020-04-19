<?php require 'conexion.php';

$var3 = $_POST['nombre'];
$var4 = $_POST['email'];
$var5 = $_POST['telefono'];
$var6 = $_POST['direccion'];

$result = $mysqli->query("SELECT COUNT(*) as total FROM proveedores WHERE nombre='{$var3}'");
$row = mysqli_fetch_assoc($result);
$num_rows = $row['total'];

if($num_rows != 0){
	mysqli_free_result($result);
	$_SESSION['message'] = "El proveedor ya se encuentra registrado";
	$_SESSION['type-message'] = "danger";
	header("Location: ../proveedores.php");
}else{
	$stmt = $mysqli->prepare("INSERT INTO proveedores (nombre, email, telefono, direccion) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $nombre, $email, $telefono, $direccion);

	$nombre = mysqli_real_escape_string($mysqli, $var3);
	$email = mysqli_real_escape_string($mysqli, $var4);
	$telefono = mysqli_real_escape_string($mysqli, $var5);
	$direccion = mysqli_real_escape_string($mysqli, $var6);

	$stmt->execute();

	$_SESSION['message'] = "Proveedor agregado exitosamente.";
	$_SESSION['type-message'] = "success";
	header("Location: ../proveedores.php");
}


# Done ...
 ?>