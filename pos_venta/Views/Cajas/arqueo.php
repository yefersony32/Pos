<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-dark text-white">
       Arqueo de Caja
    </div>
    <div class="card-body">
        <button class="btn btn-primary mb-2" type="button" onclick="arqueoCaja();"><i class="fas fa-plus"></i></button>
        <button class="btn btn-warning mb-2" type="button" onclick="cerrarCaja();">Cerrar Caja</button>
        <div class="table-responsive">
            <table class="table table-active table-striped" id="t_arqueo">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Monto Inicial</th>
                        <th>Monto Final</th>
                        <th>Fecha Apertura</th>
                        <th>Fecha Cierre</th>
                        <th>Total Ventas</th>
                        <th>Monto Total</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="abrir_caja" tabindex="-1" aria-labelledby="my_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="title"> Arqueo de Caja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmAbrirCaja" onsubmit="abrirArqueo(event);">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="id" name="id"></input>
                            <input id="monto_inicial" class="form-control" type="text" name="monto_inicial" placeholder="Monto Inicial" >
                            <label for="monto_inicial">Monto Inicial</label>
                        </div>
                        <div id="ocultar_campos">
                            <div class="form-group">
                                <label for="monto_final">Monto Final</label>
                                <input id="monto_final" class="form-control" type="text" disabled>
                            </div>
                            <div class="form-group">
                                <label for="total_ventas">Total Ventas</label>
                                <input id="total_ventas" class="form-control" type="text" disabled>
                            </div>

                            <div class="form-group  mb-3">
                                <label for="monto_general">Monto Total</label>
                                <input id="monto_general" class="form-control" type="text" disabled>
                            </div>
                        </div>
                  
                        <button class="btn btn-primary" type="submit" id="btnAccion">Abrir</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>