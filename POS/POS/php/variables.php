<?php 
$result = $mysqli->query("SELECT COUNT(*) as total FROM ventas");
$row = mysqli_fetch_assoc($result);
$totalVentas = $row['total'];

mysqli_free_result($result);

$result = $mysqli->query("SELECT COUNT(*) as total FROM categorias");
$row = mysqli_fetch_assoc($result);
$totalCategorias = $row['total'];

mysqli_free_result($result);

$result = $mysqli->query("SELECT COUNT(*) as total FROM clientes");
$row = mysqli_fetch_assoc($result);
$totalClientes = $row['total'];

mysqli_free_result($result);

$result = $mysqli->query("SELECT COUNT(*) as total FROM productos");
$row = mysqli_fetch_assoc($result);
$totalProductos = $row['total'];

mysqli_free_result($result);

$result = $mysqli->query("SELECT total_compra, total_venta, motivo FROM movimientos WHERE motivo='venta' OR motivo='compra'");
$gananciasEstimadas = 0;
$totalCompras = 0;
while($row = mysqli_fetch_assoc($result)) {
  if(strcmp($row['motivo'], 'venta') == 0){
    $gananciasEstimadas += $row['total_venta'];
  }else{
    $gananciasEstimadas -= $row['total_compra'];
    $totalCompras += $row['total_compra'];
  }
}

mysqli_free_result($result);

$result = $mysqli->query("SELECT COUNT(*) as total FROM usuarios");
$row = mysqli_fetch_assoc($result);
$totalUsuarios = $row['total'];

mysqli_free_result($result);

$result = $mysqli->query("SELECT COUNT(*) as total FROM proveedores");
$row = mysqli_fetch_assoc($result);
$totalProveedores = $row['total'];

mysqli_free_result($result);

?>