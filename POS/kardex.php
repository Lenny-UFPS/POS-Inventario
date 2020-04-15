<?php require 'header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php 
  # if(!isset($_SESSION['name']) || empty($_SESSION['name'])) header("Location: login.php");
   ?>
  }
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
    	$query = "SELECT nombre_producto FROM productos WHERE stock <= 20";
    	$result = $mysqli->query($query);
    	$rows = mysqli_num_rows($result);
     ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $rows ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php if($rows > 0) { ?>
			<span class="dropdown-item dropdown-header">Notificaciones</span>
	        <div class="dropdown-divider"></div>
	        <a href="productos.php?id=<?php echo $rows?>" class="dropdown-item">
	        	<i class="fas fa-exclamation-triangle mr-2"></i> Productos que requieren atención
	        </a>
	        <div class="dropdown-divider"></div>
	        <a href="productos.php?id=<?php echo $rows?>" class="dropdown-item dropdown-footer">Ver todo</a>
          <?php } else { ?>
          	<span class="dropdown-item dropdown-header">Notificaciones</span>
          	<div class="dropdown-divider"></div>
          	<a href="#" class="dropdown-item">
          	 	<img src="dist/img/notifications.png" alt="Empty notifications" class="ml-5">
          	</a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item">
       <!-- <a class="nav-link"> -->
          <form action="php/logout.php" method="post" class="nav-link">
          	<button type="submit" class="btn btn-sm btn-default">
	          	Salir
	          	<i class="fas fa-sign-out-alt nav-icon ml-1"></i>
	          </button>
          </form>
        <!-- </a> -->
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<?php require 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <?php if(isset($_SESSION['message'])) { 
        $message = $_SESSION['message'];
        $type = $_SESSION['type-message'];
        echo "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>
        {$message}
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>";

        unset($_SESSION['message']);
        unset($_SESSION['type-message']);
      } ?>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar Kardex</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Kardex</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <table class="table table-bordered table-striped" id="myTable">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Id producto</th>
              <th>Producto</th>
              <th>Encargado</th>
              <th>Ingreso</th>
              <th>Egreso</th>
              <th>Stock</th>
              <th>Motivo</th>
              <th>Fecha</th>
            </tr>
          </thead>

          <tbody>
            <?php 
              $query = "SELECT * FROM movimientos";
              $result = $mysqli->query($query);
              while($row = mysqli_fetch_assoc($result)) { ?>
             <tr>
               <td><?php echo $row['id']?></td>
               <td><?php echo $row['cod_producto']?></td>
               <td><?php echo $row['nombre_producto']?></td>
               <td><?php echo $row['encargado']?></td>
               <td><?php echo $row['ingreso']?></td>
               <td><?php echo $row['egreso']?></td>
               <td><?php echo $row['stock']?></td>
               <td><?php echo $row['motivo']?></td>
               <td><?php echo $row['fecha_movimiento']?></td>
             </tr>
           <?php } ?>
          </tbody>
        </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script><a href="#"> Lenny</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Web developer</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php require 'footer.php'; ?>

<script>
	$(document).ready(function(){
		$('#myTable').DataTable({
			"processing": true,
			"lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
			"language": {
				"lengthMenu": "Mostrar _MENU_ registros",
				"search": "Buscar: ",
				"paginate": {
					"first": "Primero",
					"last": "Último",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	});
</script>
</body>
</html>