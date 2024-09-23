<?php
class Clientes extends Controller{
    public function __construct() {
        session_start();
        
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user, 'clientes');
        if (!empty($verificar)|| $id_user == 1) {
            $this->views->getView($this, "index");
        } else {
            header('location: '.base_url.'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model->getClientes();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarCli(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarCli(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                <div/>';
            }else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarCli(' . $data[$i]['id'] . ');"><i class="fas fa-circle"></i></button>
                <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user, 'registrar_clientes');
        if (!empty($verificar)|| $id_user == 1) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $id = $_POST['id'];
            if (empty($dni) || empty($nombre) || empty($telefono) || empty($direccion)) {
                $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
            }else{
                if ($id == "") {
                        $data = $this->model->registrarCliente($dni, $nombre, $telefono, $direccion);
                        if ($data == "ok") {
                            $msg = array('msg' => 'Cliente registrado con éxito', 'icono' => 'success');
                        }else if($data == "existe"){
                            $msg = array('msg' => 'El dni ya existe', 'icono' => 'warning');
                        }else{
                            $msg = array('msg' => 'Error al registrar el Cliente', 'icono' => 'error');
                        }
                }else{
                    $data = $this->model->modificarCliente($dni, $nombre, $telefono, $direccion, $id);
                    if ($data == "modificado") {
                        $msg = array('msg' => 'Cliente modificado con éxito', 'icono' => 'success');
                    }else {
                        $msg = array('msg' => 'Error al modificar el Cliente', 'icono' => 'error');
                    }
                }
            }
        } else {
            $msg = array('msg' => 'NO tienes Permiso para registrar clientes', 'icono' => 'warning');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarCli($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionCli(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Cliente dado de baja', 'icono' => 'success');
        }else{
            $msg = array('msg' => 'Error al eliminar el Cliente', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionCli(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Cliente reingresado con éxito', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el Cliente', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

}
