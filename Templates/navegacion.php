<?php include_once ("./Funciones/sessiones.php"); ?>
<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <div class="pull-left image">
        </div>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <div class="pull-left info">
          <p><?php // echo $_SESSION["Usuario"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if($_SESSION['Usuario']=="Mvillada"){?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ DE ADMINSITRACIÓN</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Entidades Pricipales</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fas fa-archway"></i> Departamentos</a></li>
            <li><a href="#"><i class="fas fa-globe-americas"></i> Paises</a></li>
             <li><a href="./Vista/php/InventarioMateriaPrima/view_inventarioMateriaPrima1.php"><i class="fas fa-users"></i> Inventario MP</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-hand-holding-water"></i>
            <span> Materia Prima</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="./Vista/php/MateriaPrima/view_MateriaPrima.php"><i class="fas fa-book-reader"></i> Gestion Materia Prima</a></li>
          </ul>
        </li>
      <?php }?>

      
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->