<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel Adminstrativo</title>
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet"/>
    <script src="<?php echo base_url; ?>Assets/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url; ?>Administracion/home">Zapateria</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

        <ul class="navbar-nav ms-auto ">               
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                <button class="btn btn-link btn-sm " href="#"><i class="fas fa-user fa-2x" style="color: gold;"></i></button>
            </a>
           <!-- <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cambiarPass">Perfil</a>
                </nav>
            </div>-->
            <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?php echo base_url; ?>Usuarios/salir">Cerrar</a>
                </nav>
            </div>
        </ul>

        
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="<?php echo base_url; ?>Cajas/arqueo">
                            <div class="sb-nav-link-icon"><i class="fas fa-box fa-2x"  style="color: white;"></i></div>
                            Arqueo de Caja
                        </a>
                            <!--<a class="nav-link" href="<?php echo base_url; ?>Cajas"><i class="fas fa-box mr-3"></i> Cajas</a>-->
                        <a class="nav-link " href="<?php echo base_url;?>Clientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users fa-2x text-secondary"></i></div>
                            Clientes
                        </a>                      
                        <a class="nav-link " href="<?php echo base_url;?>Productos">
                            <div class="sb-nav-link-icon"><i class="fab fa-product-hunt fa-2x text-primary"></i></div>
                            Productos
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Compras">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt mr-2 fa-2x text-danger"></i></div>
                            Ingresar
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Compras/ventas">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart mr-3 fa-2x  text-success"></i></div>
                            Vender
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Compras/cambios">
                            <div class="sb-nav-link-icon"><i class="fas fa-sync mr-3 fa-2x text-warning"></i></div>
                            Cambiar
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHistorial" aria-expanded="false" aria-controls="collapseHistorial">
                            <div class="sb-nav-link-icon"><i class="fa fa-list mr-2 fa-2x"></i></div>
                            Historial
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseHistorial" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Compras/historial">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list mr-3 fa-2x  text-danger"></i></div>
                                    Historial de Compras
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Compras/historial_ventas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list mr-3 fa-2x text-success"></i></div>
                                    Historial de Ventas
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Compras/historial_cambios">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list mr-3 fa-2x text-warning"></i></div>
                                    Historial de Cambios
                                </a>
                        </nav>
                        </div>
                
                        <a class="nav-link " href="<?php echo base_url;?>Medidas">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale fa-2x"  style="color: #CFE60C;"></i></div>
                            Medidas
                        </a>
                        <a class="nav-link " href="<?php echo base_url;?>Categorias">
                            <div class="sb-nav-link-icon"><i class="far fa-bookmark	fa-2x"  style="color: #19A3AF;"></i></div>
                            Categorias
                        </a>
                        <a class="nav-link " href="<?php echo base_url;?>Locales">
                            <div class="sb-nav-link-icon"><i class="fas fa-store fa-2x" style="color: maroon;"></i></div>
                            Locales
                        </a>
                        
                        <a class="nav-link" href="<?php echo base_url; ?>Administracion">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools mr-3 fa-2x" style="color: gray;"></i></div>
                            Administración
                        </a>
                            <!--<a class="nav-link" href="<?php echo base_url; ?>Usuarios"><i class="fas fa-user  mr-3"></i> Usuarios</a>-->
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Yefferson Castiblanco:</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid  mt-4">