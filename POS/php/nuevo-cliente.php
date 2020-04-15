<?php require 'conexion.php';

$stmt = $mysqli->prepare("INSERT INTO clientes (tipo_documento, num_documento, nombre, email, telefono, tipo_cliente) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $tipo_documento, $num_documento, $nombre, $email, $telefono, $tipo_cliente);

$var1 = $_POST['doctype'];
$var2 = (int)$_POST['docnum'];
$var3 = $_POST['nombre'];
$var4 = $_POST['email'];
$var5 = $_POST['telefono'];
$var6 = $_POST['tipo_cliente'];

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
# Done ...
 ?>