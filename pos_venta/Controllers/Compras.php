<?php
class Compras extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this,"index");
    }
    public function ventas()
    {
        $data = $this->model->getClientes();
        $this->views->getView($this,"ventas", $data);
    }
    public function cambios()
    {
        $data = $this->model->getLocal();
        $this->views->getView($this,"cambios",$data);
    }
    public function historial_ventas()
    {
        $this->views->getView($this,"historial_ventas");
    }
    public function historial_cambios()
    {
        $this->views->getView($this,"historial_cambios");
    }
    public function buscarCodigo($cod)
    {
        $data = $this->model->getproCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die;
    }
    public function ingresar()
    {
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_compra'];
        $cantidad = $_POST['cantidad'];
        $comprobar = $this->model->consultarDetalle('detalle', $id_producto, $id_usuario);
        if (empty($comprobar)) {
            $sub_total = $precio * $cantidad;
            $data = $this->model->registrarDetalle('detalle', $id_producto, $id_usuario, $precio, $cantidad, $sub_total);    
            if ($data == "ok") {
                $msg = array('msg' => 'Producto Ingresado a la Compra', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al Ingresar El Producto', 'icono' => 'warning');

            }
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            $data = $this->model->actualizarDetalle('detalle', $precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);    
            if ($data == "modificado") {
                $msg = array('msg' => 'Producto Modificado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al modificar Producto', 'icono' => 'warning');
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresarVenta()
    {
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_venta'];
        $cantidad = $_POST['cantidad'];
        $comprobar = $this->model->consultarDetalle('detalle_temp', $id_producto, $id_usuario);
        if (empty($comprobar)) {
            if($datos['cantidad'] >= $cantidad) {
                $sub_total = $precio * $cantidad;
                $data = $this->model->registrarDetalle('detalle_temp', $id_producto, $id_usuario, $precio, $cantidad, $sub_total);    
                if ($data == "ok") {
                    $msg = array('msg' => 'Producto Ingresado a la Venta', 'icono' => 'success');
    
                }else{
                    $msg = array('msg' => 'Error al Ingresar El Producto a la Compra', 'icono' => 'warning');
                }
            }else {
                $msg = array('msg' => 'Stock NO Disponible : '. $datos['cantidad'], 'icono' => 'warning');
            }
            
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            if ($datos['cantidad'] < $total_cantidad) {
                $msg = array('msg' => 'Stock NO Disponible ', 'icono' => 'warning');
            }else {
                $data = $this->model->actualizarDetalle('detalle_temp', $precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);    
                if ($data == "modificado") {
                    $msg = array('msg' => 'Producto Modificado', 'icono' => 'success');
                }else{
                    $msg = array('msg' => 'Error al modificar Producto', 'icono' => 'warning');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresarCambio()
    {
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_venta'];
        $cantidad = $_POST['cantidad'];
        $comprobar = $this->model->consultarDetalle('detalle_tempC', $id_producto, $id_usuario);
        if (empty($comprobar)) {
            if($datos['cantidad'] >= $cantidad) {
                $sub_total = $precio * $cantidad;
                $data = $this->model->registrarDetalle('detalle_tempC', $id_producto, $id_usuario, $precio, $cantidad, $sub_total);    
                if ($data == "ok") {
                    $msg = array('msg' => 'Producto Ingresado al Cambio', 'icono' => 'success');
    
                }else{
                    $msg = array('msg' => 'Error al Ingresar El Producto al Cambio', 'icono' => 'warning');
                }
            }else {
                $msg = array('msg' => 'Stock NO Disponible : '. $datos['cantidad'], 'icono' => 'warning');
            }
            
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            if ($datos['cantidad'] < $total_cantidad) {
                $msg = array('msg' => 'Stock NO Disponible ', 'icono' => 'warning');
            }else {
                $data = $this->model->actualizarDetalle('detalle_tempC', $precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);    
                if ($data == "modificado") {
                    $msg = array('msg' => 'Producto Modificado', 'icono' => 'success');
                }else{
                    $msg = array('msg' => 'Error al modificar Producto', 'icono' => 'warning');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar($table)
    {
        $id_usuario = $_SESSION['id_usuario'];
        $data['detalle'] = $this->model->getDetalle($table, $id_usuario);
        $data['total_pagar'] = $this->model->calcularCompra($table, $id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    } 
    public function delete($id)
    {
        $data = $this->model->deleteDetalle('detalle',$id);
        if ($data == "ok") {
            $msg = "ok";
        }else{
            $msg ="Error";
        }
        echo json_encode($msg);
        die();
    }  
    public function deleteVenta($id)
    {
        $data = $this->model->deleteDetalle('detalle_temp',$id);
        if ($data == "ok") {
            $msg = "ok";
        }else{
            $msg ="Error";
        }
        echo json_encode($msg);
        die();
    } 
    public function deleteCambio($id)
    {
        $data = $this->model->deleteDetalle('detalle_tempC',$id);
        if ($data == "ok") {
            $msg = "ok";
        }else{
            $msg ="Error";
        }
        echo json_encode($msg);
        die();
    } 
    public function registrarCompra()
    {
        $id_usuario = $_SESSION['id_usuario'];
        $total = $this->model->calcularCompra('detalle', $id_usuario);
        $data = $this->model->registraCompra($total['total']);
        if ($data == 'ok') {
            $detalle = $this->model->getDetalle('detalle', $id_usuario);
            $id_compra = $this->model->getId('compras'); 
            foreach($detalle as $row){
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $id_pro = $row['id_producto'];
                $sub_total = $cantidad * $precio;
                $this->model->registrarDetalleCompra($id_compra['id'], $id_pro, $cantidad, $precio, $sub_total);
                $stock_actual=$this->model->getProductos($id_pro);
                $stock = $stock_actual['cantidad'] + $cantidad;
                $this->model->atcualizarStock($stock, $id_pro);
            }
            $vaciar = $this->model->vaciarDetalle('detalle', $id_usuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'id_compra' => $id_compra['id']);
            }
            
        }else{
            $msg = 'Error al Realizar la Compra';
        }
        echo json_encode($msg);
        die();
    }
    public function registrarVenta($id_cliente)
    {
        $id_usuario = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarCaja($id_usuario);
        if (empty($verificar)) {
            $msg = array('msg' => 'La Caja Esta cerrada', 'icono' => 'warning');
        }else {
            $total = $this->model->calcularCompra('detalle_temp', $id_usuario);
            $data = $this->model->registraVenta($id_usuario, $id_cliente, $total['total']);
            if ($data == 'ok') {
                $detalle = $this->model->getDetalle('detalle_temp', $id_usuario);
                $id_venta = $this->model->getId('ventas'); 
                foreach($detalle as $row){
                    $cantidad = $row['cantidad'];
                    $desc = $row['descuento'];
                    $precio = $row['precio'];
                    $id_pro = $row['id_producto'];
                    $sub_total = ($cantidad * $precio) - $desc;
                    $this->model->registrarDetalleVenta($id_venta['id'], $id_pro, $cantidad, $desc, $precio, $sub_total);
                    $stock_actual=$this->model->getProductos($id_pro);
                    $stock = $stock_actual['cantidad'] - $cantidad;
                    $this->model->atcualizarStock($stock, $id_pro);
                }
                $vaciar = $this->model->vaciarDetalle('detalle_temp',$id_usuario);
                if ($vaciar == 'ok') {
                    $msg = array('msg' => 'ok', 'id_venta' => $id_venta['id']);
                }
                
            }else{
                $msg = 'Error al Realizar la Venta';
            }
        }
        echo json_encode($msg);
        die();
    }
    public function registrarCambio($id_cliente)
    {
        $id_usuario = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarCaja($id_usuario);
        if (empty($verificar)) {
            $msg = array('msg' => 'La Caja Esta cerrada', 'icono' => 'warning');
        }else {
            $total = $this->model->calcularCompra('detalle_tempC', $id_usuario);
            $data = $this->model->registraCambio($id_cliente, $total['total']);
            if ($data == 'ok') {
                $detalle = $this->model->getDetalle('detalle_tempC', $id_usuario);
                $id_cambio = $this->model->getId('cambios'); 
                foreach($detalle as $row){
                    $cantidad = $row['cantidad'];
                    $precio = $row['precio'];
                    $id_pro = $row['id_producto'];
                    $sub_total = ($cantidad * $precio);
                    $this->model->registrarDetalleCambio($id_cambio['id'], $id_pro, $cantidad, $precio, $sub_total);
                    $stock_actual=$this->model->getProductos($id_pro);
                    $stock = $stock_actual['cantidad'] - $cantidad;
                    $this->model->atcualizarStock($stock, $id_pro);
                }
                $vaciar = $this->model->vaciarDetalle('detalle_tempC',$id_usuario);
                if ($vaciar == 'ok') {
                    $msg = array('msg' => 'ok', 'id_cambio' => $id_cambio['id']);
                }
                
            }else{
                $msg = 'Error al Realizar el Cambio';
            }
        }
        echo json_encode($msg);
        die();
    }
    public function generarPdf($id_compra)
    {
        $empresa = $this->model->getEmpresa();
        $productos = $this->model->getProCompra($id_compra);
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P','mm',array(58, 200));
        $pdf->AddPage();
        
        $pdf->setMargins(4, 0, 0);
        $pdf->SetTitle('Reporte de Venta');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(39,10, utf8_decode($empresa['nombre']), 0, 0, 'C');
        $pdf->Image(base_url.'Assets/img/Pingresado.png', 18, 16, 25, 25);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Cell(18, 5, 'Nit: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['ruc'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Telefono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['telefono'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Direccion: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, utf8_decode($empresa['direccion']), 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, 'Folio: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $id_compra, 0, 1, 'L');
        $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
        $pdf->Ln();
        //Encabezado P
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Datos de Ingreso.', 0 ,1, 'C');

        $pdf->SetFont('Arial','',9);
        $total = 0.00;
        foreach ($productos as $row) {
            $total = $total + $row['sub_total'];

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Cantidad: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(9, 5, $row['cantidad'], 0 , 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Codigo: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20, 5, $row['codigo'], 0 ,1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, utf8_decode('Producto: '), 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(27, 5, utf8_decode($row['descripcion']), 0 ,1, 'L');
            
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Precio: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(16.3, 5, number_format($row['precio'], 0,'.','.'), 0 ,1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Sub Total: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(16.3, 5, number_format($row['sub_total'], 0,'.','.'), 0 ,1, 'L');
            $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
            $pdf->Ln();
        }
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Producto Ingresado!.', 0 ,1, 'C');
        $pdf->Output();
    }
    public function historial()
    {
        $this->views->getView($this,"historial");
    }
    public function listar_historial()
    {
        $data = $this->model->getHistorialcompras();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Completado</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-warning" onclick="btnAnularC('. $data[$i]['id'] .')"><i class="fas fa-ban"></i></button>
                <a class="btn btn-danger" href="'.base_url."Compras/generarPdf/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                <div/>';
            }else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Anulado</span>';
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-danger" href="'.base_url."Compras/generarPdf/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                <div/>';
            } 
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die;
    }
    public function listar_historial_venta()
    {
        $data = $this->model->getHistorialVentas();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Completado</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-warning" onclick="btnAnularV('. $data[$i]['id'] .')"><i class="fas fa-ban"></i></button>
                <a class="btn btn-danger" href="'.base_url."Compras/generarPdfVenta/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                <div/>';
        }else {
            $data[$i]['estado'] = '<span class="badge bg-danger">Anulado</span>';
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="'.base_url."Compras/generarPdfVenta/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
            <div/>';
            }    
        } 
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die;
    }
    public function listar_historial_cambio()
    {
        $data = $this->model->getHistorialCambios();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Completado</span>';
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-danger" href="'.base_url."Compras/generarPdfCambio/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                <div/>';
        }else {
            $data[$i]['estado'] = '<span class="badge bg-danger">Anulado</span>';
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="'.base_url."Compras/generarPdfCambio/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
            <div/>';
            }    
        } 
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die;
    }
    public function generarPdfVenta($id_venta)
    {
        $empresa = $this->model->getEmpresa();
        $descuento = $this->model->getDescuento($id_venta);
        $productos = $this->model->getProVenta($id_venta);
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P','mm',array(58, 210));
        $pdf->AddPage();
        
        $pdf->setMargins(4, 0, 0);
        $pdf->SetTitle('Reporte de Venta');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(39,10, utf8_decode($empresa['nombre']), 0, 0, 'C');
        $pdf->Image(base_url.'Assets/img/logo.png', 18, 16, 25, 25);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Cell(18, 5, 'Nit: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['ruc'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Telefono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['telefono'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Direccion: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, utf8_decode($empresa['direccion']), 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, 'Folio: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $id_venta, 0, 1, 'L');

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');

        $pdf->Ln();
        //Encabezado Clientes
        $clientes = $this->model->clientesVenta($id_venta);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Datos del Cliente.', 0 ,1, 'C');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Cedula: '), 0 ,0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $clientes['dni'], 0 ,1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, 'Nombre: ', 0 ,0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $clientes['nombre'], 0 ,1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Teléfono: '), 0 ,0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $clientes['telefono'], 0 ,1, 'L');


        $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
        
        $pdf->Ln();
        //Encabezado Productos
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Datos de Compra.', 0 ,1, 'C');

        $pdf->SetFont('Arial','',9);
        $total = 0.00;
        foreach ($productos as $row) {
            $total = $total + $row['sub_total'];

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Cantidad: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(9, 5, $row['cantidad'], 0 , 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Codigo: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20, 5, $row['codigo'], 0 ,1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, utf8_decode('Producto: '), 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(27, 5, utf8_decode($row['descripcion']), 0 ,1, 'L');
            
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Precio: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(16.3, 5, number_format($row['precio'], 0,'.','.'), 0 ,1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Sub Total: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(16.3, 5, number_format($row['sub_total'], 0,'.','.'), 0 ,1, 'L');
            $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
            $pdf->Ln();
        }
        

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30, 5, ' Descuento Total: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(25, 5,number_format($descuento['total'], 0,'.','.'), 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30, 5, ' Total a Pagar: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9); 
        $pdf->Cell(25, 5,number_format($total, 0,'.','.'), 0, 1, 'L');

        $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');

        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Gracias por apoyar', 0 ,1, 'C');
        $pdf->Cell(0, 5, 'la empresa tolimense.', 0 ,1, 'C');



        $pdf->Output();

        
    }
    public function generarPdfCambio($id_cambio)
    {
        $empresa = $this->model->getEmpresa();
        $productos = $this->model->getProCambio($id_cambio);
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P','mm',array(58, 200));
        $pdf->AddPage();
        
        $pdf->setMargins(4, 0, 0);
        $pdf->SetTitle('Reporte de Venta');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(39,10, utf8_decode($empresa['nombre']), 0, 0, 'C');
        $pdf->Image(base_url.'Assets/img/CambioZ.png', 18, 16, 25, 25);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Cell(18, 5, 'Nit: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['ruc'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Telefono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['telefono'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Direccion: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, utf8_decode($empresa['direccion']), 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, 'Folio: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $id_cambio, 0, 1, 'L');
        $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
        $pdf->Ln();


        //Encabezado Locales
        
        $locales = $this->model->cambioLocal($id_cambio);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Datos del local.', 0 ,1, 'C');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 5, 'Nom:', 0 ,0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $locales['nombre'], 0 ,1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 5, utf8_decode('Tel:'), 0 ,0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $locales['telefono'], 0 ,1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 5, utf8_decode('Dir:'), 0 ,0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $locales['direccion'], 0 ,1, 'L');

        $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
        
        $pdf->Ln();
        //Encabezado Productos
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Datos del Cambio.', 0 ,1, 'C');

        $pdf->SetFont('Arial','',9);
        $total = 0.00;
        foreach ($productos as $row) {
            $total = $total + $row['sub_total'];

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Cantidad: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(9, 5, $row['cantidad'], 0 , 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Codigo: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20, 5, $row['codigo'], 0 ,1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, utf8_decode('Producto: '), 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(27, 5, utf8_decode($row['descripcion']), 0 ,1, 'L');
            
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Precio: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(16.3, 5, number_format($row['precio'], 0,'.','.'), 0 ,1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Sub Total: ', 0 ,0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(16.3, 5, number_format($row['sub_total'], 0,'.','.'), 0 ,1, 'L');
            $pdf->Cell(18, 5, '----------------------------------------------', 0 ,0, 'L');
            $pdf->Ln();
        }
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0, 5, 'Producto de Cambio.', 0 ,1, 'C');

        $pdf->Output();

        
    }
    public function calcularDescuento($datos)
    {
        $array = explode(",", $datos);
        $id = $array[0];
        $desc = $array[1];
        if (empty($id) || empty($desc)) {
            $msg = array('msg' => 'error', 'icono' => 'error');
        }else {
            $descuento_actual = $this->model->verificarDescuento($id);
            $descuento_total = $descuento_actual['descuento'] + $desc;
            $sub_total = ($descuento_actual['cantidad'] * $descuento_actual['precio']) - $descuento_total;
            $data = $this->model->actualizarDescuento($descuento_total, $sub_total, $id);
            if ($data == 'ok') {
                $msg = array('msg' => 'Descuento Aplicado', 'icono' => 'success');
            }else {
                $msg = array('msg' => 'Erro al Aplicar Descuento', 'icono' => 'error');
            }
        }
        echo json_encode($msg);
        die();
    }
    public function anularCompra($id_compra)
    {
        $data = $this->model->getAnularCompra($id_compra);
        $anular = $this->model->getAnular($id_compra);
        foreach ($data as $row) {
            $stock_actual=$this->model->getProductos($row['id_producto']);
            $stock = $stock_actual['cantidad'] - $row['cantidad'];
            $this->model->atcualizarStock($stock, $row['id_producto']);
        }
        if ($anular == 'ok') {
            $msg = array('msg' => 'Compra Anulada', 'icono' => 'success');
        }else {
            $msg = array('msg' => 'Error al Anular la Compra', 'icono' => 'error');
        }
        echo json_encode($msg);
        die();
    }
    public function anularVenta($id_venta)
    {
        $data = $this->model->getAnularVenta($id_venta);
        $anularV = $this->model->getAnularV($id_venta);
        foreach ($data as $row) {
            $stock_actual=$this->model->getProductos($row['id_producto']);
            $stock = $stock_actual['cantidad'] + $row['cantidad'];
            $this->model->atcualizarStock($stock, $row['id_producto']);
        }
        if ($anularV == 'ok') {
            $msg = array('msg' => 'Venta Anulada', 'icono' => 'success');
        }else {
            $msg = array('msg' => 'Error al Anular la Venta', 'icono' => 'error');
        }
        echo json_encode($msg);
        die();
    }
    public function anularCambio($id_cambio)
    {
        $data = $this->model->getAnularCambio($id_cambio);
        $anularV = $this->model->getAnularCa($id_cambio);
        foreach ($data as $row) {
            $stock_actual=$this->model->getProductos($row['id_producto']);
            $stock = $stock_actual['cantidad'] + $row['cantidad'];
            $this->model->atcualizarStock($stock, $row['id_producto']);
        }
        if ($anularV == 'ok') {
            $msg = array('msg' => 'Cambio Anulado', 'icono' => 'success');
        }else {
            $msg = array('msg' => 'Error al Anular el Cambio', 'icono' => 'error');
        }
        echo json_encode($msg);
        die();
    }

}   
