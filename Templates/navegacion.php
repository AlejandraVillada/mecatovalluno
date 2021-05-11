<?php include_once ("./Funciones/sessiones.php"); ?>
<style>
.treeview-menu li a{
  font-size: 12px;
}

.treeview a span{
  font-size: 12px;
}

</style>
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
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
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
            <li><a href="adminper.php" style="font-size: 12px;"><i class="fa fa-circle-o"></i><span>Inicio</span></a></li>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Entidades Pricipales</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/Ubicaciones/view_paises.php"><i class="fas fa-globe-asia"></i> Gestion Pais</a></li>
                    <li><a href="./Vista/php/Ubicaciones/view_ciudades.php"><i class="fas fa-city"></i> Gestion Ciudad</a></li>
                    <li><a href="./Vista/php/Ubicaciones/view_sedes.php"><i class="fas fa-flag"></i> Gestion Sede</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-hand-holding-water"></i>
                    <span> Materia Prima</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/MateriaPrima/view_MateriaPrima.php"><i class="fas fa-book-reader"></i>
                            Gestion Materia Prima</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-dolly-flatbed"></i>
                    <span> Inventarios</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/InventarioMateriaPrima/view_inventarioMateriaPrima1.php"><i class="fas fa-clipboard-list"></i> Inventario Materia Prima</a></li>
                    <li><a href="#"><i class="fas fa-clipboard-check"></i> Inventario Producto Terminado</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span> Usuarios</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/Usuarios/view_usuarios.php"><i class="fas fa-users-cog"></i> Gestion
                            Usuarios</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-people-carry"></i>
                    <span> Clientes</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/Clientes/view_clientes.php"><i class="fas fa-street-view"></i> Gestion
                            Clientes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    <span> Empleados</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/Empleados/form_empleados.php"><i class="fas fa-praying-hands"></i> Gestion
                            Empleados</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fas fa-box-open"></i>
                    <span> Proveedores</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="./Vista/php/Proveedor/view_proveedores.php"><i class="fas fa-boxes"></i> Gestion
                            Proveedores</a></li>
                </ul>
            </li>
            <?php }?>



    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->