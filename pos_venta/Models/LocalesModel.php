<?php
class LocalesModel extends Query{
    private $dnii, $nombree, $telefonoo, $direccionn, $id, $estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getLocales()
    {
        $sql = "SELECT * FROM locales";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarLocal(string $dnii, string $nombree, string $telefonoo, string $direccionn)
    {
        $this->dnii = $dnii;
        $this->nombree = $nombree;
        $this->telefonoo = $telefonoo;
        $this->direccionn = $direccionn;
        $verificar = "SELECT * FROM locales WHERE dni = '$this->dnii'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
            $sql = "INSERT INTO locales(dni, nombre, telefono, direccion) VALUES (?,?,?,?)";
            $datos = array($this->dnii, $this->nombree, $this->telefonoo, $this->direccionn);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }
    public function modificarLocal(string $dnii, string $nombree, string $telefonoo, string $direccionn, int $id)
    {
        $this->dnii = $dnii;
        $this->nombree = $nombree;
        $this->telefonoo = $telefonoo;
        $this->direccionn = $direccionn;
        $this->id = $id;
        $sql = "UPDATE locales SET dni = ?, nombre = ?, telefono = ?, direccion = ? WHERE id = ?";
        $datos = array($this->dnii, $this->nombree,$this->telefonoo, $this->direccionn, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function editarLoc(int $id)
    {
        $sql = "SELECT * FROM locales WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function accionLoc(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE locales SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    public function verificarPermiso(int $id_user, string $nombree)
    {
        $sql = "SELECT p.id, p.permiso, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.permiso = '$nombree'";
        $data = $this->selectAll($sql);
        return $data;
    }
}
?>