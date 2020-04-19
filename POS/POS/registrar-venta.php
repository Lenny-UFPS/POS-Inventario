<?php require 'header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php # if(!isset($_SESSION['username'])) header("Location: login.php"); # Validación del login --> username && password?> 
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
      $result = $mysqli->query("SELECT id FROM productos WHERE stock <= 20");  // Notifications bell info
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
            <h1 class="m-0 text-dark">Registrar venta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Compras</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <div class="card mt-4">
            	<div class="card-header border-transparent">
            		<h3 class="card-title">
            			<i class="fas fa-file-invoice-dollar mr-1"></i>
            			Factura
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

            	<div class="card-body factura-content-card">
            		<div class="row mb-3">
            			<div class="col-6 table-bordered">Producto</div>
            			<div class="col-2 table-bordered">Cantidad</div>
            			<div class="col-4 table-bordered">Precio</div>
            		</div>

            	</div>

            	<div class="card-footer bg-white">
            		<div class="dropdown-divider mb-3"></div>
            		<div class="row mb-1">
            			<div class="col-6">
            				
            			</div>

            			<div class="col-6">
            				<h5>Total</h5>
            			</div>
            		</div>

            		<div class="row mb-3">
            			<div class="col"></div>
            			<div class="col">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text bg-light">
            							<i class="fas fa-dollar-sign"></i>
            						</span>
            					</div>
            					<input type="text" class="form-control" value="0.00" readonly id="totalFactura">
            				</div>
            			</div>
            		</div>

            		<div class="dropdown-divider mb-3"></div>

            		<div class="row">
            			<button type="button" id="btnCompra" class="btn btn-success btn-block btn-lg btn-flat">Registrar compra</button>
            		</div>
            	</div>
            </div>
          </section>
          <!-- /.Left col -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card mt-4">
              <div class="card-header border-transparent">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-2"></i>
                  Productos
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
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table m-0 table-bordered" id="tableProductos">
                    <thead>
                    <tr>
                        <th style="width: 20px;">Tools</th>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Precio venta</th>
                        <th>Stock</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT nombre_producto, cod_producto, precio_venta, stock FROM productos";
                    $result = $mysqli->query($query);
                    while($row = mysqli_fetch_assoc($result)){ ?>	
                      <tr>
                      	<td>
                      		<button type="button" class="btn btn-default" id="<?php echo $row['cod_producto']?>"data-name="<?php echo $row['nombre_producto']?>" 
                      		data-price="<?php echo $row['precio_venta']?>" 
                      		onclick="addItem(<?php echo $row['cod_producto']?>)">
                      			<i class="fas fa-reply nav-icon"></i>
                      		</button>
                      	</td>
                      	<td><?php echo $row['cod_producto'];?></td>
                      	<td><?php echo $row['nombre_producto']; ?></td>
                      	<td><?php echo '$ ' . number_format($row['precio_venta']); ?></td>
                      	<td><?php if($row['stock'] == 0){
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
  <footer class="main-footer mt-3">
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

<script type="text/javascript" src="js/registrar-venta.js"></script>

</body>
</html>