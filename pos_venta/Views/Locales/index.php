<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-dark text-white">
        Locales
    </div>
    <div class="card-body">
        <button class="btn btn-primary mb-2" type="button" onclick="frmLocal();"><i class="fas fa-plus"></i></button>
        <div class="table-responsive"> 
            <table class="table table-active table-striped" id="tblLocales">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
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
<div class="modal fade" id="nuevo_local" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="title">Nuevo Local</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmLocal">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="dnii" class="form-control" type="text" name="dnii" placeholder="Documento del Local">
                        <label for="dnii">Rut</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nombree" class="form-control" type="text" name="nombree" placeholder="Nombre del Local">
                        <label for="nombree">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="telefonoo" class="form-control" type="text" name="telefonoo" placeholder="Teléfono">
                        <label for="telefonoo">Teléfono</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="direccionn" class="form-control" type="text" name="direccionn" placeholder="Dirección">
                        <label for="direccionn">Dirección</label>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarLoc(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>