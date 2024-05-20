<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link <?php echo isset($seccion) && $seccion === '/inicio' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/guardados" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mostrar Guardados
              </p>
            </a>
          </li>                   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->