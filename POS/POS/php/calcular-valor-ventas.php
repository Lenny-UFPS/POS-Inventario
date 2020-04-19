<?php 
$today = date('Y-m-d H:i:s');
$month5 = date('Y-m-d 00:00:00', strtotime($today . '- 5 months'));
$month4 = date('Y-m-d 00:00:00', strtotime($today . '- 4 months'));
$month3 = date('Y-m-d 00:00:00', strtotime($today . '- 3 months'));
$month2 = date('Y-m-d 00:00:00', strtotime($today . '- 2 months'));
$month1 = date('Y-m-d 00:00:00', strtotime($today . '- 1 month'));

$result = $mysqli->query("SELECT total_venta FROM movimientos WHERE motivo='venta' AND fecha_movimiento BETWEEN '{$month5}' AND '{$month4}'");

$res1 = 0;
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $res1 += $row['total_venta'];
  }
}

mysqli_free_result($result);
$res2 = 0;
$month_4 = date("Y-m-d H:i:s", strtotime($month4 . '+ 1 second'));

$result = $mysqli->query("SELECT total_venta FROM movimientos WHERE motivo='venta' AND fecha_movimiento BETWEEN '{$month_4}' AND '{$month3}'");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $res2 += $row['total_venta'];
  }
}

mysqli_free_result($result);
$res3 = 0;
$month_3 = date("Y-m-d H:i:s", strtotime($month3 . '+ 1 second'));

$result = $mysqli->query("SELECT total_venta FROM movimientos WHERE motivo='venta' AND fecha_movimiento BETWEEN '{$month_3}' AND '{$month2}'");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $res3 += $row['total_venta'];
  }
}

mysqli_free_result($result);
$res4 = 0;
$month_2 = date("Y-m-d H:i:s", strtotime($month2 . '+ 1 second'));

$result = $mysqli->query("SELECT total_venta FROM movimientos WHERE motivo='venta' AND fecha_movimiento BETWEEN '{$month_2}' AND '{$month1}'");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $res4 += $row['total_venta'];
  }
}

mysqli_free_result($result);
$res5 = 0;
$month_1 = date("Y-m-d H:i:s", strtotime($month1 . '+ 1 second'));

$result = $mysqli->query("SELECT total_venta FROM movimientos WHERE motivo='venta' AND fecha_movimiento BETWEEN '{$month_1}' AND '{$today}'");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $res5 += $row['total_venta'];
  }
}

mysqli_free_result($result);

$lbl = [substr(date('F', strtotime('- 5 months')),0,3) . " - " . substr(date('F', strtotime('- 4 months')),0,3), substr(date('F', strtotime('- 4 months')),0,3) . " - " . substr(date('F', strtotime('- 3 months')),0,3), substr(date('F', strtotime('- 3 months')),0,3) . " - " . substr(date('F', strtotime('- 2 months')),0,3), substr(date('F', strtotime('- 2 months')),0,3) . " - " . substr(date('F', strtotime('- 1 month')),0,3), substr(date('F', strtotime('- 1 month')),0,3) . " - " . substr(date('F'),0,3)];

$data = [$res1, $res2, $res3, $res4, $res5];
?>