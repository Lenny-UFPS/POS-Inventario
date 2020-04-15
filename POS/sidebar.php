  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/diamond.svg" alt="Diamond logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="opacity: .9">POS Inventario</span> 
    </a>

	<!-- Acomodar imagen-->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          <!-- Acomodar imagen para todos los usuarios en general -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="fas fa-home nav-icon"></i>
              <p>Inicio</p>
            </a>
          </li>

          <li class="nav-item">
          	<a href="categorias.php" class="nav-link">
          		<i class="fas fa-th-list nav-icon"></i>
          		<p>Categorías</p>
          	</a>
          </li>

          <li class="nav-item">
          	<a href="clientes.php" class="nav-link">
          		<i class="fas fa-users nav-icon"></i>
          		<p>Clientes</p>
          	</a>
          </li>

          <li class="nav-item">
            <a href="compras.php" class="nav-link">
              <i class="fas fa-cubes nav-icon"></i>
              <p>Compras</p>
            </a>
          </li>

          <li class="nav-item">
          	<a href="kardex.php" class="nav-link">
          		<i class="fas fa-cube nav-icon"></i>
          		<p>Kardex</p>
          	</a>
          </li>

          <li class="nav-item">
          	<a href="productos.php" class="nav-link">
          		<i class="fab fa-product-hunt nav-icon"></i>
          		<p>Productos</p>
          	</a>
          </li>

          <li class="nav-item">
          	<a href="proveedores.php" class="nav-link">
          		<i class="fas fa-address-book nav-icon"></i>
          		<p>Proveedores</p>
          	</a>
          </li>

          <li class="nav-item">
          	<a href="usuarios.php" class="nav-link">
          		<i class="fas fa-user-friends nav-icon"></i>
          		<p>Usuarios</p>
          	</a>
          </li>

          <li class="nav-item">
            <a href="ventas.php" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Ventas</p>
            </a>
          </li>

          <li class="nav-header">EXTRAS</li>
		  <!-- Menú reportes -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reporte-compras.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reporte-ventas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- ./ Menú reportes -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>