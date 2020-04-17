<?php require 'conexion.php';

$var1 = $_POST['nombre_producto'];
$var2 = $_POST['categoria_producto'];
$var3 = $_POST['precio_compra'];
$var4 = $_POST['precio_venta'];

$result = $mysqli->query("SELECT COUNT(*) as total FROM productos WHERE nombre_producto='{$var1}'");
$row = mysqli_fetch_assoc($result);
$num_rows = $row['total'];

if($num_rows != 0){
	mysqli_free_result($result);
	$_SESSION['message'] = "El producto ya se encuentra registrado";
	$_SESSION['type-message'] = "danger";
	header("Location: ../productos.php");
}else{
	$stmt = $mysqli->prepare("INSERT INTO productos (nombre_producto, nombre_categoria, precio_compra, precio_venta) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssii", $nombre_producto, $nombre_categoria, $precio_compra, $precio_venta);

	$nombre_producto = mysqli_real_escape_string($mysqli, $var1);
	$nombre_categoria = mysqli_real_escape_string($mysqli, $var2);
	$precio_compra = mysqli_real_escape_string($mysqli, $var3);
	$precio_venta = mysqli_real_escape_string($mysqli, $var4);

	$stmt->execute();

	$_SESSION['message'] = "Producto agregado exitosamente.";
	$_SESSION['type-message'] = "success";
	header("Location: ../productos.php");
}


# Done ...
 ?>