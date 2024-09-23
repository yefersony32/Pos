<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-warning text-black">
        <h4>Nueva Cambio</h4>
    </div>
    <div class="card-body">
        <form id="frmCambio">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigo"><i class="fas fa-barcode"></i> Codigo del Producto</label>
                        <input type="hidden" id="id" name="id"></input>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo del Producto" onkeyup="buscarCodigoCambio(event)"></input>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Descripcion de Producto" disabled></input>                        
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cantidad">Cant</label>
                        <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecioCambio(event)" disabled></input>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio de Venta" disabled></input>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="sub_total">Sub Total</label>
                        <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="Sub Total" disabled ></input>
                    </div>
                </div>
            </div>
        </form>
    </div>    
</div>
<div class="table-responsive">
    <table class="table table-dark table-bordered table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Sub Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tblDetalleCambio">
                </tbody>
    </table>
</div>
<div class="row  bg-dark">
    <div class="col-md-5"style="color: white;">
        <div class="form-group">
            <br>
            <label for="local"><i class="fas fa-store"></i> Selecionar Local</label>
            <select id="local" class="form-control" name="local">
                <?php foreach ($data as $row) { ?> 
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"style="color: white;">
            <br>
            <label for="total" class="font-weight-bold"><i class="fas fa-dollar-sign"></i> Total</label>
            <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled ></input>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group"style="color: white;">
            <br>
            <br>
            <button class="btn btn-warning btn-block" type="button" onclick="procesar(2)">Generar Cambio</button>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="cliente"></label>
        </div>
    </div>
    
</div>
<?php include "Views/Templates/footer.php"; ?>

