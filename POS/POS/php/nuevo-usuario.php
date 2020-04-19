<?php require 'conexion.php';

$var1 = $_POST['doctype'];
$var2 = $_POST['docnum'];
$var3 = $_POST['nombre'];
$var4 = $_POST['email'];
$var5 = $_POST['telefono'];
$var6 = $_POST['direccion'];
$var7 = $_POST['username'];
$var8 = $_POST['password'];

$result = $mysqli->query("SELECT COUNT(*) as total FROM usuarios WHERE num_documento='{$var2}' OR nombre='{$var3}' OR email='{$var4}'");
$row = mysqli_fetch_assoc($result);
$num_rows = $row['total'];

if($num_rows != 0){
	mysqli_free_result($result);
	$_SESSION['message'] = "El usuario ya se encuentra registrado";
	$_SESSION['type-message'] = "danger";
	header("Location: ../usuarios.php");
}else{
	$stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, tipo_documento, num_documento, email, username, password, telefono, direccion, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssissssss", $nombre, $tipo_documento, $num_documento, $email, $username, $password, $telefono, $direccion, "user");

	$tipo_documento = mysqli_real_escape_string($mysqli, $var1);
	$num_documento = mysqli_real_escape_string($mysqli, $var2);
	$nombre = mysqli_real_escape_string($mysqli, $var3);
	$email = mysqli_real_escape_string($mysqli, $var4);
	$telefono = mysqli_real_escape_string($mysqli, $var5);
	$direccion = mysqli_real_escape_string($mysqli, $var6);
	$username = mysqli_real_escape_string($mysqli, $var7);
	$password = mysqli_real_escape_string($mysqli, $var8);

	$stmt->execute();

	$_SESSION['message'] = "Usuario agregado exitosamente.";
	$_SESSION['type-message'] = "success";
	header("Location: ../usuarios.php");
}

# Done ...
 ?>