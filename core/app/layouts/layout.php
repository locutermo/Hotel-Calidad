<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>HOTEL </title>
    <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/animate.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
    <link rel="stylesheet" href="assets/js/vendor/summernote/summernote.css">
    <link rel="stylesheet" href="assets/css/vendor/weather-icons.min.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <script src="assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body id="minovate" class="<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?> appWrapper sidebar-sm-forced <?php else:?>appWrapper<?php endif; ?>"  >
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- ============ Content =================== -->
    <div id="wrap" class="animsition">
        <!-- ============ HEADER Content ==================== -->
        <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
        <section id="header">
            <header class="clearfix">
                <!-- Branding -->
                <div class="branding">
                    <a class="brand" href="./">
                        <span><strong>HOTEL</strong></span>
                    </a>
                    <a href="#" class="offcanvas-toggle visible-xs-inline"><span class="fa fa-bars"></span></a>
                </div>
                <!-- Branding end -->
                <!-- Left-side navigation -->
                <ul class="nav-left pull-left list-unstyled list-inline">
                    <li class="sidebar-collapse divided-right">
                        <a href="#" class="collapse-sidebar">
                            <em class="fa fa-outdent"></em>
                        </a>
                    </li>
                </ul>
                <!-- Left-side navigation end -->
                <!-- Search -->
                <div class="search" id="main-search">
                    <form action="index.php?view=cliente" method="get">
                        <input type="hidden" name="view" value="recepcion">
                        <input type="text" class="form-control underline-input" name="buscar" placeholder="Buscar Cliente...">
                    </form>
                </div>
                <!-- Search end -->
                <!-- Right-side navigation -->
                <ul class="nav-right pull-right list-inline">
                    <li class="dropdown nav-profile">
                        <a href class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/images/profile-photo.jpg" alt="" class="img-circle size-30x30">
                            <span><?php if(isset($_SESSION["user_id"])) { echo UserData::getById($_SESSION["user_id"])->name; }?><span class="fa fa-angle-down"></span></span>
                        </a>

                        <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                            <li>
                                <a href="./logout.php">
                                    <em class="fa fa-sign-out"></em>Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fa fa-comments"></em>
                        </a>
                    </li>
                </ul>
                <!-- Right-side navigation end -->
            </header>
        </section>
        <div id="controls">
            <aside id="sidebar">
                <div id="sidebar-wrap">
                    <div class="panel-group slim-scroll" role="tablist">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#sidebarNav">
                                        Navegación <span class="fa fa-angle-up"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <?php
                                        $u=null;
                                        $u = UserData::getById(Session::getUID());
                                    ?>
                                    <ul id="navigation">
                                        <li class="<?php if($_GET['view']=='reserva'){ echo 'active';} ?>"><a href="./?view=reserva"><span class="fa fa-calendar"></span> <span>Reserva</span></a></li>
                                        <li class="<?php if($_GET['view']=='recepcion'){ echo 'active';} ?>">
                                            <a href="index.php?view=recepcion"><span class="fa fa-sign-in"></span> <span>Recepción</span> <span class="badge bg-lightred">6</span></a>
                                               
                                        </li>
                                        <li class="<?php if($_GET['view']=='productos' or $_GET['view']=='venta' ){ echo 'active';} ?>">
                                            <a role="button" tabindex="0"><em class="fa fa-arrow-circle-right"></em> <span>Punto de venta</span></a>
                                            <ul>
                                                <li><a href="./?view=venta"><span class="fa fa-caret-right"></span> Vender</a></li>
                                                <li><a href="./?view=productos"><span class="fa fa-caret-right"></span> Productos</a></li>
                                                 <li><a href="./?view=pre_reporte_rango_producto"><span class="fa fa-caret-right"></span> Reporte por rango productos</a></li>
                                                <!--
                                                <li><a href="./?view=proveedores"><span class="fa fa-caret-right"></span> Proveedores</a></li>
                                            -->
                                            </ul>
                                        </li>
                                        <li class="<?php if($_GET['view']=='kardex' or $_GET['view']=='compra' or $_GET['view']=='lista_compra'  ){ echo 'active';} ?> ">
                                            <a role="button" tabindex="0"><span class="fa fa-edit"></span> <span>Inventario</span></a>
                                            <ul>
                                                <li><a href="./?view=kardex"><span class="fa fa-caret-right"></span> Kardex</a></li>
                                                <li><a href="./?view=compra"><span class="fa fa-caret-right"></span> Reabastecer</a></li>
                                                <li><a href="./?view=lista_compra"><span class="fa fa-caret-right"></span> Consulta compra por fecha</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php if($_GET['view']=='apertura_caja'){ echo 'active';} ?>">
                                            <a role="button" tabindex="0"><em class="fa fa-cube"></em> <span>Módulo caja</span></a>
                                            <ul>
                                                <li><a href="./?view=apertura_caja"><span class="fa fa-caret-right"></span> Apertura caja</a></li>
                                                <li><a href="./?view=cierre_caja"><span class="fa fa-caret-right"></span> Cierre caja</a></li>
                                                <li><a href="./?view=reporte_caja"><span class="fa fa-caret-right"></span> Resumen liquidación</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php if($_GET['view']=='egreso' or $_GET['view']=='egresos' or $_GET['view']=='reporte_gasto'){ echo 'active';} ?>">
                                          <a role="button" tabindex="0"><em class="fa fa-table"></em> <span>Egresos</span> </a>
                                          <ul>
                                            <li><a href="index.php?view=egreso"><em class="fa fa-table"></em> <span>Nuevo egreso</span></a></li>
                                            <li><a href="./?view=egresos"> <emclass="fa fa-caret-right"></em>  Lista egresos</a></li>
                                            <li><a href="./?view=reporte_gasto"> <span class="fa fa-caret-right"></span>  Reportes por fechas</a></li>
                                          </ul>
                                        </li>
                                            <!--
                                            <li class="<?php if($_GET['view']=='sueldo'){ echo 'active';} ?>">
                                                <a role="button" tabindex="0"><span class="fa fa-money"></span> <span>Pagos</span></a>
                                                <ul>
                                                    <li><a href="./?view=sueldo"><span class="fa fa-caret-right"></span> Realizar pago</a></li>
                                                </ul>
                                            </li> 
                                            -->
                                        <?php if($u->is_admin):?>
                                            <li class="<?php if($_GET['view']=='habitacion' or $_GET['view']=='categoria' or $_GET['view']=='tarifa'){ echo 'active';} ?>">
                                              <a role="button" tabindex="0"><em class='fa fa-database'></em> <span>Configuración</span> </a>
                                              <ul>
                                                <li><a href="./?view=habitacion"> <span class="fa fa-caret-right"></span>  Habitaciones</a></li>
                                                <li><a href="./?view=categoria"> <span class="fa fa-caret-right"></span>  Categorías</a></li>
                                                <li><a href="./?view=tarifa"> <span class="fa fa-caret-right"></span>  Tarifas</a></li>
                                              </ul>
                                            </li>
                                            <li class="<?php if($_GET['view']=='cliente'){ echo 'active';} ?>">
                                                <a href="index.php?view=cliente"><span class="fa fa-users"></span> <span>Clientes</span></a>
                                            </li>
                                        <?php endif;?>
                                        <!-- <li>
                                            <a  role="button" tabindex="0"><i class='fa fa-file-text-o'></i> <span>Reportes</span></a>
                                            <ul>
                                                <li><a href="./?view=pre_reporte_rango"><span class="fa fa-caret-right"></span> Reporte detallado cliente</a></li>
                                                <li><a href="./?view=reporte_diario"><span class="fa fa-caret-right"></span> Reporte diario</a></li>
                                                <li><a href="./?view=reporte_user"><span class="fa fa-caret-right"></span> Reporte Recepcionista</a></li>
                                                <li><a href="./?view=reporte_caja"><span class="fa fa-caret-right"></span> Reporte de caja</a></li>
                                                <li><a href="./?view=reporte_estado"><span class="fa fa-caret-right"></span> Reporte estado habitación</a></li>
                                                <li><a href="./?view=reporte_mensual"><span class="fa fa-caret-right"></span> Reporte de mensual</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li>
                                            <a  role="button" tabindex="0"><i class='fa fa-bar-chart-o'></i> <span>Gráficos</span></a>
                                            <ul>
                                                <li><a href="./?view=pre_reporte_fecha_barra"><span class="fa fa-caret-right"></span> Reporte por fecha</a></li>
                                                <li><a href="./?view=pre_reporte_fecha_circular"><span class="fa fa-caret-right"></span> Reporte Circular</a></li>
                                                <li><a href="./?view=pre_reporte_anio_barra"><span class="fa fa-caret-right"></span> Reporte Anual</a></li>
                                            </ul>
                                        </li> -->
                                        <?php
                                            $u=null; 
                                            $u = UserData::getById(Session::getUID());
                                        ?>
                                        <?php if($u->is_admin):?>
                                            <li class="<?php if($_GET['view']=='users'){ echo 'active';} ?>">
                                                <a href="#"><em class='fa fa-cog'></em> <span>Administracion</span> </a>
                                                <ul>
                                                    <li><a href="./?view=users"><span class="fa fa-caret-right"></span> Usuarios</a></li>
                                                    <li><a href="./?view=configuracion"><span class="fa fa-caret-right"></span> Configuración</a></li>
                                                    <!-- <li><a href="./?view=backup"><span class="fa fa-database"></span> Respaldo base de datos</a></li> -->
                                                    <!--
                                                     <li><a href="./?view=configuracion"><span class="fa fa-caret-right"></span> Configurar</a></li>
                                                    -->
                                                </ul>
                                            </li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <?php endif;?>
        <!-- ============ CONTENT ============= -->
        <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
            <section id="content">
                <div class="page page-sidebar-xs-layout">
                    <?php View::load("reserva");?>
                </div>
            </section>
        <?php else:?>
            <style type="text/css">
              html,body {
                height: 100%;
                background: #fff;
                overflow: hidden;
              }
            </style>
            <script type="text/javascript" src="css/wow/wow.js"></script>
            <script type="text/javascript">
              wow = new WOW({
                animateClass: 'animated',
                offset: 100
              });
              wow.init();
            </script>
            <div class="page page-core page-login col-md-6">
                <section class="tile container w-420 p-15 mt-40 ">
                    <div class="tile-header dvd dvd-btm">
                        <?php
                            $config = ConfiguracionData::getAllConfiguracion();
                            $configToArray = $config->toArray();
                            if(count($configToArray)>0){
                                $nombre = $configToArray['nombre'];
                                $logo = $configToArray['logo'];
                        ?>
                        <?php } else {
                            $nombre = '';
                            $logo = '';
                        ?>
                        <?php } ?>
                        <div><h1><strong>SISTEMA HOTEL</strong></h1><br><?php if($logo!='') { ?><img alt="Logo" width="50%" src="img/<?php echo $logo; ?>"><?php }; ?></div>
                    </div>
                    <div class="tile-body">
                        <form role="form" action="./?action=processlogin" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="text" class="form-control" required="" id="exampleInputEmail1" placeholder="Ingrese su usuario" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <label class="checkbox checkbox-custom">
                                <input type="checkbox" checked disabled><em></em>
                                Mantener abierto
                            </label>
                            <div class="form-group">
                                <button type="submit" style="background-color: #2fcc71;color: white;" class="btn btn-rounded btn-primary btn form-control">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        <?php endif;?>
    </div>
        <?php if (isset($_GET['view'])) { ?>
        <?php if($_GET['view']!='reserva' && $_GET['view']!='proceso' && $_GET['view']!='proceso_venta' && $_GET['view']!='reporte_fecha_circular') { ?>
            <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        <?php }; ?>
        <?php } else if(!isset($_SESSION["user_id"])) { ?>
            <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        <?php }; ?>
        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
        <script src="assets/js/vendor/summernote/summernote.min.js"></script>
        <script src="assets/js/vendor/coolclock/coolclock.js"></script>
        <script src="assets/js/vendor/coolclock/excanvas.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>

        <script src="assets/js/main.js"></script>
    </body>
</html>
