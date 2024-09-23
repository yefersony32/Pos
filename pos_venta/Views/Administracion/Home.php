<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-dark text-white">
        Tablero de Admistracion
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body fs-6"><i class="fas fa-shopping-cart mr-3 fa-2x"></i>     -Nueva Venta</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo base_url; ?>Compras/ventas">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body"><i class="fas fa-users fa-2x mx-auto"></i> -Clientes</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo base_url;?>Clientes">Ver Detalles</a>
                        <span class="text-white ms-auto"><?php echo  $data['clientes']['total'];?></span>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fab fa-product-hunt fa-2x .right-*"></i> -Productos</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo base_url;?>Productos">Ver Detalles</a>
                        <span class="text-white ms-auto"><?php echo  $data['productos']['total'];?></span>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><i class="fas fa-cash-register fa-2x ms-auto"></i> -Ventas por Dia</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo base_url;?>Compras/historial_ventas">Ver Detalles</a>
                        <span class="text-white ms-auto"><?php echo  $data['ventas']['total'];?></span>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-chart-area mr-1"></i>
                        Productos con Stock Minimo a 15
                    </div>
                    <div class="card-body bg-dark text-white font-weight-bold">
                        <canvas id="stockMinimo" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Productos Mas Vendidos
                    </div>
                    <div class="card-body bg-dark  text-black font-weight-bold">
                        <canvas id="productosVendidos" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>
