<?php require 'conexion.php';

$var1 = $_POST['doctype'];
$var2 = $_POST['docnum'];
$var3 = $_POST['nombre'];
$var4 = $_POST['email'];
$var5 = $_POST['telefono'];
$var6 = $_POST['tipo_cliente'];

$result = $mysqli->query("SELECT COUNT(*) as total FROM clientes WHERE num_documento='{$var2}' OR nombre='{$var3}' OR email='{$var4}'");
$row = mysqli_fetch_assoc($result);
$num_rows = $row['total'];

if($num_rows != 0){
	mysqli_free_result($result);
	$_SESSION['message'] = "El cliente ya se encuentra registrado";
	$_SESSION['type-message'] = "danger";
	header("Location: ../clientes.php");
}else{
	$stmt = $mysqli->prepare("INSERT INTO clientes (tipo_documento, num_documento, nombre, email, telefono, tipo_cliente) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssss", $tipo_documento, $num_documento, $nombre, $email, $telefono, $tipo_cliente);

	$tipo_documento = mysqli_real_escape_string($mysqli, $var1);
	$num_documento = mysqli_real_escape_string($mysqli, $var2);
	$nombre = mysqli_real_escape_string($mysqli, $var3);
	$email = mysqli_real_escape_string($mysqli, $var4);
	$telefono = mysqli_real_escape_string($mysqli, $var5);
	$tipo_cliente = mysqli_real_escape_string($mysqli, $var6);

	$stmt->execute();

	$_SESSION['message'] = "Cliente agregado exitosamente.";
	$_SESSION['type-message'] = "success";
	header("Location: ../clientes.php");
}


# Done ...
 ?>