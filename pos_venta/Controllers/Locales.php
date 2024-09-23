<?php
class Locales extends Controller{
    public function __construct() {
        session_start();
        
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION['id_usuario'];
       //$verificar = $this->model->verificarPermiso($id_user, 'clientes');
        if (!empty($verificar)|| $id_user == 1) {
            $this->views->getView($this, "index");
        } else {
            header('location: '.base_url.'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model->getLocales();
        for ($i=0; $i < count($data); $i++) { 
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarLoc(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarLoc(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                <div/>';
            }else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarLoc(' . $data[$i]['id'] . ');"><i class="fas fa-circle"></i></button>
                <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user, 'registrar_locales');
        if (!empty($verificar)|| $id_user == 1) {
            $dnii = $_POST['dnii'];
            $nombree = $_POST['nombree'];
            $telefonoo = $_POST['telefonoo'];
            $direccionn = $_POST['direccionn'];
            $id = $_POST['id'];
            if (empty($dnii) || empty($nombree) || empty($telefonoo) || empty($direccionn)) {
                $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
            }else{
                if ($id == "") {
                        $data = $this->model->registrarLocal($dnii, $nombree, $telefonoo, $direccionn);
                        if ($data == "ok") {
                            $msg = array('msg' => 'Local registrado con éxito', 'icono' => 'success');
                        }else if($data == "existe"){
                            $msg = array('msg' => 'El rut ya existe', 'icono' => 'warning');
                        }else{
                            $msg = array('msg' => 'Error al registrar el Local', 'icono' => 'error');
                        }
                }else{
                    $data = $this->model->modificarLocal($dnii, $nombree, $telefonoo, $direccionn, $id);
                    if ($data == "modificado") {
                        $msg = array('msg' => 'Local modificado con éxito', 'icono' => 'success');
                    }else {
                        $msg = array('msg' => 'Error al modificar el Local', 'icono' => 'error');
                    }
                }
            }
        } else {
            $msg = array('msg' => 'NO tienes Permiso para registrar Local', 'icono' => 'warning');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarLoc($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionLoc(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Local dado de baja', 'icono' => 'success');
        }else{
            $msg = array('msg' => 'Error al eliminar el Local', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionLoc(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Local reingresado con éxito', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el Local', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

}
