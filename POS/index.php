<?php require 'header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php # if(!isset($_SESSION['username'])) header("Location: login.php"); ?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contact.html" class="nav-link">Contact</a>
      </li>
    </ul>
    <?php 
      $result = $mysqli->query("SELECT id FROM productos WHERE stock <= 20");
      $rows = mysqli_num_rows($result);
      mysqli_free_result($result);
     ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $rows?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notificaciones</span>
          <div class="dropdown-divider"></div>
          <?php if($rows > 0) { ?>
            <a href="notifications.php" class="dropdown-item">
              <i class="fas fa-exclamation-circle mr-2"></i> Productos con baja existencia
            </a>
            <div class="dropdown-divider"></div>
            <a href="notifications.php" class="dropdown-item dropdown-footer">Ver todo</a>
          <?php }else { ?>
            <a href="#" class="dropdown-item text-center">
              <img src="dist/img/notifications.png" alt="Empty notifications">
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Ver todo</a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item">
        <form action="php/logout.php" class="nav-link">
          <button class="btn btn-default btn-sm">
            Cerrar sesión
            <i class="fas fa-sign-out-alt pull-right ml-1"></i>
          </button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php require 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tablero</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Tablero</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php require 'php/variables.php'; ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totalVentas; ?></h3>
                <p>Ventas realizadas</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalCategorias; ?></h3>
                <p>Categorías</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalClientes; ?></h3>
                <p>Clientes </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalProductos; ?></h3>
                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right ml-1"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ganancias estimadas</span>
                <span class="info-box-number"><?php echo $gananciasEstimadas; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inversión por compras</span>
                <span class="info-box-number"><?php echo $totalCompras; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Usuarios</span>
                <span class="info-box-number"><?php echo $totalUsuarios; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-friends"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Proveedores</span>
                <span class="info-box-number"><?php echo $totalProveedores; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <?php include 'php/calcular-valor-ventas.php'; ?>
            <?php 
            $result = $mysqli->query("SELECT total_venta FROM movimientos WHERE motivo='venta'");
            $total = 0;
            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)){
                $total += $row['total_venta'];
              }
            } ?>
            <div class="card mt-4">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Histórico de ventas</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"><?php echo $total; ?></span>
                    <span>Total por ventas</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-4">
                    <i class="fas fa-square" style="color: rgb(0, 99, 132);"></i> Ventas por mes
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card mt-4">
              <div class="card-header border-transparent">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-2"></i>
                  Productos añadidos recientemente
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive table-bordered">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th class="text-center">Producto</th>
                      <th class="text-center">Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT id, nombre_producto, stock FROM productos ORDER BY id DESC LIMIT 10";
                    $result = $mysqli->query($query);
                    while($row = mysqli_fetch_assoc($result)){ ?>
                      <tr>
                      <td class="text-center"><?php echo $row['nombre_producto']; ?></td>
                      <td class="text-center"><?php if($row['stock'] == 0){
                        echo '<span class="badge badge-danger">0</span>';
                      }elseif ($row['stock'] >= 1 && $row['stock'] <= 20){
                        echo '<span class="badge badge-warning">' . $row['stock'] . '</span>';
                      }else{
                        echo '<span class="badge badge-success">' . $row['stock'] . '</span>';
                      } ?></td>
                    </tr>
                  <?php } 
                  mysqli_free_result($result); ?>
                     
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix text-center">
                <a href="productos.php">Ver todos los productos</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy <script type="text/javascript">document.write(new Date().getFullYear())</script><a href="#" target="_blank"> Lenny</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Web developer</b>
    </div>
  </footer>

  <!-- Control Sidebar # Can be deleted -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php require 'footer.php'; ?>

<?php  $arr2 = [date('F', strtotime('- 5 months')), date('F', strtotime('- 4 months')), date('F', strtotime('- 3 months')), date('F', strtotime('- 2 months')), date('F', strtotime('- 1 month')), date('F')];
 ?>
  <script>
    var lbl = <?php echo json_encode($lbl);?>;
    var datas = <?php echo json_encode($data);?>;
    var ctx = document.getElementById('sales-chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',

      // Data 
      data: {
        labels: lbl,
        datasets: [{
          label: 'Promedio ventas últimos 5 meses',  // Junto al badge de color
          backgroundColor: 'rgb(0, 99, 132)',   // Color del tipo de gráfico
          borderColor: 'rgb(0, 99, 132)',  // Supongo que lo mismo xd 
          data: [5, 10, 15, 20, 25]  // Valores que va a mostrar el chart --> Solo acepta números (CREO)
        }]
      },

      options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true  // Arrancar el chart desde 0
                }
            }]
        }
      }
    });
  </script>
</body>
</html>