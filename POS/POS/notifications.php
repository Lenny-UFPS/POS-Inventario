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
    	$query = "SELECT * FROM productos WHERE stock <= 20";
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
      <div class="row mb-2 mt-3">
        <div class="col-12">
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalProducto">
            Agregar producto
          </button>
        </div>
      </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar productos con baja existencia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
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
              <th>Categoría</th>
              <th>Precio compra</th>
              <th>Precio venta</th>
              <th>Stock</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <?php 
              while($row = mysqli_fetch_assoc($result)) { ?>
             <tr>
               <td><?php echo $row['id']?></td>
               <td><?php echo $row['cod_producto']?></td>
               <td><?php echo $row['nombre_producto']?></td>
               <td><?php echo $row['nombre_categoria']?></td>
               <td><?php echo $row['precio_compra']?></td>
               <td><?php echo $row['precio_venta']?></td>
               <td><?php echo $row['stock']?></td>
               <td>
                 <form>
                    <a href="editar-producto.php?id=<?php echo $row['id']?>" class="btn btn-warning mr-1">
                      <i class="fas fa-edit nav-icon"></i>
                    </a>

                    <button class="btn btn-danger" type="button" onclick="myFunction(<?php echo $row['id']?>)">
                      <i class="fas fa-trash-alt nav-icon"></i>
                    </button>
                 </form>
               </td>
             </tr>
           <?php } ?>
          </tbody>
        </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer mt-3">
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
    // swal("Good job!", "You clicked the button!", "success");
    function myFunction(id){
      swal({
        title: "¿Desea eliminar este registro?",
        icon: "error",
        buttons: true,
        dangerMode: true,
        buttons: ["Cancelar", "Si, eliminar"],
      })
      .then((willDelete) => {
        if (willDelete) {
          location.href = "php/borrar-producto.php?id="+id;
        } else {
          swal("Operación cancelada", {
            icon: "success",
          });
        }
      });
    }
  </script>

  <!-- Modal -->
<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="modalProductoLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body bg-light">
        <div class="card">
          <div class="card-body login-card-body bg-light">
            <form action="php/nuevo-cliente.php" method="post">
              <p class="login-box-msg">Nuevo producto</p>
              <div class="form-group mb-3">
                  <label for="">Producto</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nombre_producto" required="required">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fab fa-product-hunt"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="">Categoría</label>
                  <select name="categoria_producto" required="required" class="form-control">
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                      <option value="<?php echo $row['nombre_categoria'];?>"><?php echo $row['nombre_categoria'];?>
                      </option>
                      <?php }
                      mysqli_free_result($result); ?>
                  </select>
                </div>

                <div class="form-group mb-3">
                  <label for="">Precio de compra</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="precio_compra" required="required" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="9">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-dollar-sign"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="">Precio de venta</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="precio_venta" required="required" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="9">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-dollar-sign"></span>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="row float-right">
                <button type="button" class="btn btn-default mt-3 mr-3" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary mt-3">Agregar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->

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