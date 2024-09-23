<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-dark text-white">
        Datos de la Empresa
    </div>
    <div class="card-body bg-dark text-white">
        <form id="frmEmpresa">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $data['id']?>" >
                    <label for="ruc"><i class="fas fa-cogs"></i> NIT</label>
                    <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Ingrese El Nit" value="<?php echo $data['ruc']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $data['id']?>" >
                    <label for="nombre"><i class="fas fa-list"></i> Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese Nombre" value="<?php echo $data['nombre']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono"><i class="fas fa-phone"></i> Telefono</label>
                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese Telefono" value="<?php echo $data['telefono']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="direccion"><i class="fas fa-directions"></i> Direccion</label>           
                    <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Ingrese Direccion" value="<?php echo $data['direccion']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mensaje"><i class="fas fa-sms"></i> Mensaje</label>
                    <textarea id="mensaje" class="form-control" name="mensaje" rows="3"  placeholder="Ingrese un Mensaje"><?php echo $data['mensaje']?></textarea>
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="s"></label>
                </div>
            </div>
            <button class="btn btn-primary" type="button" onclick="ModificarEmpresa(event)">Modificado</button>
        </form>
    </div>
</div>


<?php include "Views/Templates/footer.php"; ?>
