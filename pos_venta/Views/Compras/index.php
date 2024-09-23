<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header bg-danger text-white">
        <h4>Nuevo Ingreso</h4>
    </div>
    <div class="card-body">
        <form id="frmCompra">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigo"><i class="fas fa-barcode"></i> Codigo del Producto</label>
                        <input type="hidden" id="id" name="id"></input>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo del Producto" onkeyup="buscarCodigo(event)"></input>
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
                        <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecio(event)" disabled></input>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="text" name="precio" placeholder="Ingrese el Precio" disabled></input>
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
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Sub Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tblDetalle">
                </tbody>
    </table>
</div>

<div class="row bg-dark">
    <div class="col-md-4"style="color: white;">
        <div class="form-group">
            <br>
            <label for="total" class="font-weight-bold"><i class="fas fa-dollar-sign"></i> Total</label>
            <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled ></input>
        </div>
    </div>
    <div class="col-md-2"style="color: white;">
        <div class="form-group">
            <br>
            <br>
            <button class="btn btn-danger btn-block" type="button" onclick="procesar(1)">Generar Ingreso</button>
        </div>
    </div>
</div>
<div class="row bg-dark">
    <div class="col-md-4">
        <div class="form-group">
            <label class="font-weight-bold"></label>
        </div>
    
</div>
<?php include "Views/Templates/footer.php"; ?>