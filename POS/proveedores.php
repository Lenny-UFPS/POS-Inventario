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
    <div class="container-fluid">
      <div class="row mb-2 mt-3">
          <div class="col-12">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalProveedor">
              Agregar proveedor
            </button>
          </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar proveedores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Proveedores</li>
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
              <th>Nombre</th>
              <th>Correo electrónico</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <?php 
              $query = "SELECT * FROM proveedores";
              $result = $mysqli->query($query);
              while($row = mysqli_fetch_assoc($result)) { ?>
             <tr>
               <td><?php echo $row['id']?></td>
               <td><?php echo $row['nombre']?></td>
               <td><?php echo $row['email']?></td>
               <td><?php echo $row['telefono']?></td>
               <td><?php echo $row['direccion']?></td>
               <td>
                 <form>
                    <a href="editar-proveedor.php?id=<?php echo $row['id']?>" class="btn btn-warning mr-1">
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
        <!-- /.table -->
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
          location.href = "php/borrar-proveedor.php?id="+id;
        } else {
          swal("Operación cancelada", {
            icon: "success",
          });
        }
      });
    }
  </script>

<!-- Modal -->
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="modalProveedorLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body bg-light">
        <div class="card">
          <div class="card-body login-card-body bg-light">
            <form action="php/nuevo-proveedor.php" method="post">
              <p class="login-box-msg">Nuevo proveedor</p>
              <div class="form-group mb-3">
                  <label for="">Proveedor</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nombre" required="required">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="">Correo electrónico</label>
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" required="required">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="">Teléfono</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="telefono" required="required" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="">Dirección</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="direccion" required="required" maxlength="100">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
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