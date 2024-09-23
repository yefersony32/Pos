<?php
class ComprasModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }
    public function getClientes()
    {
        $sql ="SELECT * FROM clientes WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getLocal()
    {
        $sql ="SELECT * FROM locales WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproCod(string $cod)
    {
        $sql ="SELECT * FROM productos WHERE codigo = '$cod'";
        $data = $this->select($sql);
        return $data;
    }
    public function getProductos(int $id)
    {
        $sql ="SELECT * FROM productos WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalle(string $table, int $id_producto, int $id_usuario, string $precio, int $cantidad, int $sub_total)
    {
        $sql = "INSERT INTO  $table (id_producto, id_usuario, precio, cantidad, sub_total) VALUES(?,?,?,?,?)";
        $datos = array($id_producto,  $id_usuario,  $precio,  $cantidad,  $sub_total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getDetalle(string $table, int $id)
    {
        $sql = "SELECT d.*, p.id AS id_pro, p.descripcion FROM $table d INNER JOIN productos p ON d.id_producto = p.id WHERE d.id_usuario = $id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function calcularCompra(string $table, int $id_usuario)
    {
        $sql = "SELECT sub_total, SUM(sub_total) AS total FROM $table WHERE id_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }
    public function deleteDetalle(string $table, int $id)
    {
        $sql = "DELETE FROM $table WHERE id = ?";
        $datos =array($id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    } 
    public function consultarDetalle(string $table, int $id_producto, int $id_usuario)
    {
        $sql = "SELECT * FROM $table WHERE id_producto = $id_producto AND id_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }
    public function actualizarDetalle(string $table, string $precio, int $cantidad, int $sub_total, int $id_producto, int $id_usuario)
    {
        $sql = "UPDATE $table SET precio = ?, cantidad = ?, sub_total = ? WHERE id_producto = ? AND id_usuario =?";
        $datos = array($precio, $cantidad, $sub_total, $id_producto, $id_usuario);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function registraCompra(string $total)
    {
        $sql = "INSERT INTO compras (total) VALUES (?)";
        $datos = array($total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getId(string $table)
    {
        $sql = "SELECT MAX(id) AS id FROM $table";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalleCompra(int $id_compra, int $id_pro, int $cantidad, string $precio, string $sub_total)
    {
        $sql = "INSERT INTO detalle_Compras (id_compra, id_producto, cantidad, precio, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_compra, $id_pro ,$cantidad, $precio, $sub_total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function registrarDetalleVenta(int $id_venta, int $id_pro, int $cantidad, string $desc, string $precio, string $sub_total)
    {
        $sql = "INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, descuento, precio, sub_total) VALUES (?,?,?,?,?,?)";
        $datos = array($id_venta, $id_pro, $cantidad, $desc, $precio, $sub_total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function registrarDetalleCambio(int $id_cambio, int $id_pro, int $cantidad, string $precio, string $sub_total)
    {
        $sql = "INSERT INTO detalle_cambios (id_cambio, id_producto, cantidad, precio, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_cambio, $id_pro, $cantidad, $precio, $sub_total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getEmpresa()
    {
        $sql = "SELECT * FROM configuracion";
        $data = $this->select($sql);
        return $data;
    }
    public function vaciarDetalle(string $table, int $id_usuario)
    {
        $sql = "DELETE FROM $table WHERE id_usuario = ?";
        $datos = array($id_usuario);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getProCompra(int $id_compra)
    {
        $sql ="SELECT c.*, d.*, p.id, p.codigo ,p.descripcion FROM compras c INNER JOIN detalle_compras d ON c.id = d.id_compra INNER JOIN productos p ON p.id = d.id_producto WHERE c.id = $id_compra";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getProVenta(int $id_venta)
    {
        $sql ="SELECT v.*, d.*, p.id, p.codigo ,p.descripcion FROM ventas v INNER JOIN detalle_ventas d ON v.id = d.id_venta INNER JOIN productos p ON p.id = d.id_producto WHERE v.id = $id_venta";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getProCambio(int $id_cambio)
    {
        $sql ="SELECT c.*, d.*, p.id, p.codigo ,p.descripcion FROM cambios c INNER JOIN detalle_cambios d ON c.id = d.id_cambio INNER JOIN productos p ON p.id = d.id_producto WHERE c.id = $id_cambio";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getHistorialcompras()
    {
        $sql ="SELECT * FROM compras";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getHistorialVentas()
    {
        $sql ="SELECT c.id, c.nombre, v.* FROM clientes c INNER JOIN ventas v ON v.id_cliente = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getHistorialCambios()
    {
        $sql ="SELECT c.id, c.nombre, v.* FROM locales c INNER JOIN cambios v ON v.id_cliente = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function atcualizarStock(int $cantidad, int $id_pro)
    {
        $sql = "UPDATE productos SET cantidad = ? WHERE id = ?";
        $datos = array($cantidad, $id_pro);
        $data = $this->save($sql, $datos);
        return $data;
    }
    public function registraVenta(int $id_user, string $id_cliente, string $total)
    {
        $sql = "INSERT INTO ventas (id_usuario, id_cliente, total) VALUES (?,?,?)";
        $datos = array($id_user, $id_cliente, $total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function registraCambio(string $id_cliente, string $total)
    {
        $sql = "INSERT INTO cambios (id_cliente, total) VALUES (?,?)";
        $datos = array($id_cliente, $total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function clientesVenta(int $id)
    {
        $sql ="SELECT v.id, v.id_cliente, c.* FROM ventas v INNER JOIN clientes c ON c.id = v.id_cliente WHERE v.id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function cambioLocal(int $id)
    {
        $sql ="SELECT c.id, c.id_cliente, l.* FROM cambios c INNER JOIN locales l ON l.id = c.id_cliente WHERE c.id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function verificarDescuento(int $id)
    {
        $sql ="SELECT * FROM detalle_temp WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function actualizarDescuento(string $desc, string $sub_total, int $id)
    {
        $sql = "UPDATE detalle_temp SET descuento = ?, sub_total = ? WHERE id= ?";
        $datos = array($desc, $sub_total, $id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getDescuento(int $id_venta)
    {
        $sql = "SELECT descuento, SUM(descuento) AS total FROM detalle_ventas WHERE id_venta = $id_venta";
        $data = $this->select($sql);
        return $data;
    }
    public function getAnularCompra(int $id_compra)
    {
        $sql ="SELECT c.*, d.* FROM compras c INNER JOIN detalle_compras d ON c.id = d.id_compra WHERE c.id = $id_compra";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getAnularVenta(int $id_venta)
    {
        $sql ="SELECT v.*, d.* FROM ventas v INNER JOIN detalle_ventas d ON v.id = d.id_venta  WHERE v.id = $id_venta";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getAnularCambio(int $id_cambio)
    {
        $sql ="SELECT c.*, d.* FROM cambios c INNER JOIN detalle_cambios d ON c.id = d.id_venta  WHERE v.id = $id_cambio";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getAnular(int $id_compra)
    {
        $sql = "UPDATE compras SET estado = ? WHERE id = ?";
        $datos = array(0, $id_compra);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getAnularV(int $id_venta)
    {
        $sql = "UPDATE ventas SET estado = ? WHERE id = ?";
        $datos = array(0, $id_venta);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getAnularCa(int $id_cambio)
    {
        $sql = "UPDATE cambios SET estado = ? WHERE id = ?";
        $datos = array(0, $id_cambio);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function verificarCaja(int $id)
    {
        $sql ="SELECT * FROM cierre_caja WHERE id_usuario = $id AND estado = 1";
        $data = $this->select($sql);
        return $data;
    } 
}
?>