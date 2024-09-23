<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-dark text-white">
        Medidas
    </div>
    <div class="card-body">
        <button class="btn btn-primary mb-2" type="button" onclick="frmMedida();"><i class="fas fa-plus"></i></button>
        <div class="table-responsive">    
            <table class="table table-active table-striped" id="tblMedidas">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Nombre_Corto</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>     
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="nuevo_medida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="title">Nueva Medida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmMedida">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de la medida">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nombre_corto" class="form-control" type="text" name="nombre_corto" placeholder="Nombre_corto">
                        <label for="nombre_corto">Nombre_Corto</label>
                    </div>
                    
                    <button class="btn btn-primary" type="button" onclick="registrarMed(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>