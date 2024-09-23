let tblUsuarios, tblClientes, tblLocales, tblCajas, tblMedidas, tblCategorias, tblProductos, 
t_h_c, t_h_v, t_h_b, t_arqueo;
document.addEventListener("DOMContentLoaded", function(){
    $('#cliente').select2();
    $('#local').select2();
    const buttons = [{
            extend: 'excelHtml5',
            footer: true,
            title: 'Archivo',
            filename: 'Export_File',
            text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
        },
        {
            extend: 'pdfHtml5',
            download: 'open',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        {
            extend: 'copyHtml5',
            footer: true,
            title: 'Reporte de usuarios',
            filename: 'Reporte de usuarios',
            text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
            exportOptions: {
                columns: [0, ':visible']
            }
        },
        {
            extend: 'print',
            footer: true,
            filename: 'Export_File_print',
            text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
        },
        {
            extend: 'csvHtml5',
            footer: true,
            filename: 'Export_File_csv',
            text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
        }, {
            extend: 'colvis',
            text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
            postfixButtons: ['colvisRestore']
        }
    ]
    const dom = "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'i><'col-sm-7'p>>";
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'usuario'},
            {'data': 'nombre'},
            {'data': 'caja'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla usuarios

    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'dni'},
            {'data': 'nombre'},
            {'data': 'telefono'},
            {'data': 'direccion'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla Clientes

    tblLocales = $('#tblLocales').DataTable({
        ajax: {
            url: base_url + "Locales/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'dni'},
            {'data': 'nombre'},
            {'data': 'telefono'},
            {'data': 'direccion'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla Locales

    tblCajas = $('#tblCajas').DataTable({
        ajax: {
            url: base_url + "Cajas/listar",
            dataSrc: ''
        },
        columns: [
            {'data': 'id'},
            {'data': 'caja'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla Cajas

    tblMedidas = $('#tblMedidas').DataTable({
        ajax: {
            url: base_url + "Medidas/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'nombre'},
            {'data': 'nombre_corto'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla Medidas

    tblCategorias = $('#tblCategorias').DataTable({
        ajax: {
            url: base_url + "Categorias/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'nombre'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla Categorias

    tblProductos = $('#tblProductos').DataTable({
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'imagen'},
            {'data': 'codigo'},
            {'data': 'descripcion'},
            {'data': 'precio_venta'},
            {'data': 'cantidad'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    }); //Fin de la tabla Productos

    t_h_c = $('#t_historial_c').DataTable({
        ajax: {
            url: base_url + "Compras/listar_historial",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'total'},
            {'data': 'fecha'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la historial compras

    t_h_v =$('#t_historial_v').DataTable({
        ajax: {
            url: base_url + "Compras/listar_historial_venta",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'nombre'},
            {'data': 'total'},
            {'data': 'fecha'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la historial ventas
    
    t_h_b =$('#t_historial_b').DataTable({
        ajax: {
            url: base_url + "Compras/listar_historial_cambio",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'nombre'},
            {'data': 'total'},
            {'data': 'fecha'},
            {'data': 'estado'},
            {'data': 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la historial ventas
    

    t_arqueo = $('#t_arqueo').DataTable({
        ajax: {
            url: base_url + "Cajas/listar_arqueo",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data': 'monto_inicial'},
            {'data': 'monto_final'},
            {'data': 'fecha_apertura'},
            {'data': 'fecha_cierre'},
            {'data': 'total_ventas'},
            {'data': 'monto_total'},
            {'data': 'estado'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom,
        buttons
    });//Fin de la tabla Medidas
    
})
function frmCambiarPass(e) {
    e.preventDefault();
    const actual = document.getElementById('clave_actual');
    const nueva = document.getElementById('clave_nueva');
    const confirmar = document.getElementById('confirmar_clave');
    if (actual.value == '' || nueva.value == '' || confirmar.value == '') {
        alertas('Todos los campos son obligatorios', 'warning');
        return false;
    }else{
        if (nueva != confirmar) {
            alertas('Las contraseñas No Coinciden', 'warning');
            return false;
        }else{
            const url = base_url + "Usuarios/cambiarPass";
            const frm = document.getElementById("frmCambiarPass");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    $("#cambiarPass").modal("hide");
                    alertas(res.msg, res.icono);
                    frm.reset;
                }
            }
        }
    }
}
function frmUsuario() {
    document.getElementById("title").textContent = "Nuevo Usuario";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    document.getElementById("id").value = "";
    $('#nuevo_usuario').modal('show');
}
function registrarUser(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const caja = document.getElementById("caja");
    if (usuario.value == "" || nombre.value == "" || caja.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                $("#nuevo_usuario").modal("hide");
                alertas(res.msg, res.icono);
                tblUsuarios.ajax.reload();
            }
        }
    }
}
function btnEditarUser(id) {
    document.getElementById("title").innerHTML = "Actualizar usuario";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Usuarios/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("caja").value = res.id_caja;
            document.getElementById("claves").classList.add("d-none");
            $('#nuevo_usuario').modal('show');
        }
    }
}
function btnEliminarUser(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El usuario no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblUsuarios.ajax.reload();
                }
            }
            
        }
    })
}
function btnReingresarUser(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}

//Fin Usuarios

function frmCliente() {
    document.getElementById("title").innerHTML = "Nuevo Cliente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();
    $('#nuevo_cliente').modal('show');
    document.getElementById("id").value = "";
}
function registrarCli(e) {
    e.preventDefault();
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");

    if (dni.value == "" || nombre.value == "" || telefono.value == "" || direccion.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                $("#nuevo_cliente").modal("hide");
                alertas(res.msg, res.icono);
                tblClientes.ajax.reload();
            }
        }
    }
}
function btnEditarCli(id) {
    document.getElementById("title").innerHTML = "Actualizar cliente";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Clientes/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            $('#nuevo_cliente').modal('show');
        }
    }
}
function btnEliminarCli(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Cliente no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblClientes.ajax.reload();
                }
            }
            
        }
    })
}
function btnReingresarCli(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblClientes.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}

//fin Clientes

function frmLocal() {
    document.getElementById("title").innerHTML = "Nuevo Local";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmLocal").reset();
    $('#nuevo_local').modal('show');
    document.getElementById("id").value = "";
}
function registrarLoc(e) {
    e.preventDefault();
    const dnii = document.getElementById("dnii");
    const nombree = document.getElementById("nombree");
    const telefonoo = document.getElementById("telefonoo");
    const direccionn = document.getElementById("direccionn");

    if (dnii.value == "" || nombree.value == "" || telefonoo.value == "" || direccionn.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Locales/registrar";
        const frm = document.getElementById("frmLocal");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                $("#nuevo_local").modal("hide");
                alertas(res.msg, res.icono);
                tblLocales.ajax.reload();
            }
        }
    }
}
function btnEditarLoc(id) {
    document.getElementById("title").innerHTML = "Actualizar Local";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Locales/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("dnii").value = res.dni;
            document.getElementById("nombree").value = res.nombre;
            document.getElementById("telefonoo").value = res.telefono;
            document.getElementById("direccionn").value = res.direccion;
            $('#nuevo_local').modal('show');
        }
    }
}
function btnEliminarLoc(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Local no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Locales/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblLocales.ajax.reload();
                }
            }
            
        }
    })
}
function btnReingresarLoc(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Locales/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblLocales.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}

//fin Locales

function frmCaja() {
    document.getElementById("title").textContent = "Nuevo Caja";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmCaja").reset();
    document.getElementById("id").value = "";
    $('#nuevoCaja').modal('show');

}
function registrarCaja(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if (nombre.value == "") {
        alertas('El nombre es requerido', 'warning');
    } else {
        const url = base_url + "Cajas/registrar";
        const frm = document.getElementById("frmCaja");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                $('#nuevoCaja').modal('hide');
                tblCajas.ajax.reload();
            }
        }
    }
}
function btnEditarCaja(id) {
    document.getElementById("title").textContent = "Actualizar caja";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Cajas/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.caja;
            $('#nuevoCaja').modal('show');
        }
    }
}
function btnEliminarCaja(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "La caja no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Cajas/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblCajas.ajax.reload();
                }
            }
        }
    })
}
function btnReingresarCaja(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Cajas/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblCajas.ajax.reload();
                }
            }
        }
    })
}
//Fin Cajas

function alertas(mensaje, icono) {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    })
}

//Fin Alertas

function frmMedida() {
    document.getElementById("title").innerHTML = "Nuevo Medida";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmMedida").reset();
    $('#nuevo_medida').modal('show');
    document.getElementById("id").value = "";
}
function registrarMed(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const nombre_corto = document.getElementById("nombre_corto");

    if (nombre.value == "" || nombre_corto.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Medidas/registrar";
        const frm = document.getElementById("frmMedida");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                $("#nuevo_medida").modal("hide");
                alertas(res.msg, res.icono);
                tblMedidas.ajax.reload();
            }
        }
    }
}
function btnEditarMed(id) {
    document.getElementById("title").innerHTML = "Actualizar Medidas";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Medidas/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("nombre_corto").value = res.nombre_corto;
            $('#nuevo_medida').modal('show');
        }
    }
}
function btnEliminarMed(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Cliente no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblMedidas.ajax.reload();
                }
            }
            
        }
    })
}
function btnReingresarMed(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblMedidas.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}

//fin Medidas

function frmCategoria() {
    document.getElementById("title").innerHTML = "Nuevo Categoria";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCategoria").reset();
    $('#nuevo_categoria').modal('show');
    document.getElementById("id").value = "";
}
function registrarCat(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");

    if (nombre.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Categorias/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                $("#nuevo_categoria").modal("hide");
                alertas(res.msg, res.icono);
                tblCategorias.ajax.reload();
            }
        }
    }
}
function btnEditarCat(id) {
    document.getElementById("title").innerHTML = "Actualizar Categoria";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Categorias/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            $('#nuevo_categoria').modal('show');
        }
    }
}
function btnEliminarCat(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Cliente no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblCategorias.ajax.reload();
                }
            }
            
        }
    })
}
function btnReingresarCat(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblCategorias.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}

//fin Categorias

function frmProducto() {
    document.getElementById("title").innerHTML = "Nuevo Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();
    document.getElementById("id").value = "";
    $('#nuevo_producto').modal('show');
    delateImg();
}
function registrarPro(e) {
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const nombre = document.getElementById("nombre");
    const precio_compra = document.getElementById("precio_compra");
    const precio_venta = document.getElementById("precio_venta");
    const id_medida = document.getElementById("medida");
    const id_Cat = document.getElementById("categoria");


    if (codigo.value == "" || nombre.value == "" || precio_compra.value == "" || precio_venta.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Productos/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {                
                const res = JSON.parse(this.responseText);
                $("#nuevo_producto").modal("hide");
                alertas(res.msg, res.icono);
                tblProductos.ajax.reload();
            }
        }
    }
}
function btnEditarPro(id) {
    document.getElementById("title").innerHTML = "Actualizar Producto";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Productos/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("nombre").value = res.descripcion;
            document.getElementById("precio_compra").value = res.precio_compra;
            document.getElementById("precio_venta").value = res.precio_venta;
            document.getElementById("medida").value = res.id_medida;
            document.getElementById("categoria").value = res.id_categoria;
            document.getElementById("img-preview").src = base_url + 'Assets/img/'+ res.foto;
            document.getElementById("icon-cerrar").innerHTML = `
            <button class="btn btn-danger" onclick="delateImg()">
            <i class="fas fa-times"></i></button>`;
            document.getElementById("icon-image").classList.add("d-none");
            document.getElementById("foto_actual").value = res.foto;

            $('#nuevo_producto').modal('show');
        }
    }
}
function btnEliminarPro(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Producto no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblProductos.ajax.reload();
                }
            }
            
        }
    })
}
function btnReingresarPro(id) {
    Swal.fire({
        title: 'Esta seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblProductos.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
function preview(e){
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src= urlTmp;  
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `
    <button class="btn btn-danger" onclick="delateImg()"><i class="fas fa-times"></i></button>
    ${url['name']}`;
}
function delateImg(){
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src= '';  
    document.getElementById("imagen").value ='';
    document.getElementById("foto_actual").value ='';


}
//Fin Pro

function buscarCodigo(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if (e.which == 13) {
            const url = base_url + "Compras/buscarCodigo/" + cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res) {
                        document.getElementById("nombre").value =  res.descripcion;
                        document.getElementById("precio").value =  res.precio_compra;
                        document.getElementById("id").value =  res.id;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();

                    } else {
                        alertas('El producto NO existe', 'warning');
                        document.getElementById("codigo").value ='';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{
        alertas('Ingrese el Codigo', 'warning');
    }
}
function buscarCodigoVenta(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if (e.which == 13) {
            const url = base_url + "Compras/buscarCodigo/" + cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res) {
                        document.getElementById("nombre").value =  res.descripcion;
                        document.getElementById("precio").value =  res.precio_venta;
                        document.getElementById("id").value =  res.id;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();

                    } else {
                        alertas('El Producto NO Existe','warning');
                        document.getElementById("codigo").value ='';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{
        alertas('Ingrese El Codigo','warning');
    }
}
function buscarCodigoCambio(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if (e.which == 13) {
            const url = base_url + "Compras/buscarCodigo/" + cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res) {
                        document.getElementById("nombre").value =  res.descripcion;
                        document.getElementById("precio").value =  res.precio_venta;
                        document.getElementById("id").value =  res.id;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();

                    } else {
                        alertas('El Producto NO Existe','warning');
                        document.getElementById("codigo").value ='';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{
        alertas('Ingrese El Codigo','warning');
    }
}
function calcularPrecio(e) {
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if (cant > 0) {
            const url = base_url + "Compras/ingresar";
            const frm = document.getElementById("frmCompra");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargarDetalle();
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                    document.getElementById('codigo').focus();
                }
            }
        }
    }
}
function calcularPrecioVenta(e) {
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if (cant > 0) {
            const url = base_url + "Compras/ingresarVenta";
            const frm = document.getElementById("frmVenta");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg ,res.icono);
                    frm.reset();
                    cargarDetalleVenta();
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                    document.getElementById('codigo ').focus();
                }
            }
        }
    }
}
function calcularPrecioCambio(e) {
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if (cant > 0) {
            const url = base_url + "Compras/ingresarCambio";
            const frm = document.getElementById("frmCambio");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg ,res.icono);
                    frm.reset();
                    cargarDetalleCambio();
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                    document.getElementById('codigo ').focus();
                }
            }
        }
    }
}
if (document.getElementById('tblDetalle')) {
    cargarDetalle();
}
if (document.getElementById('tblDetalleVenta')) {
    cargarDetalleVenta();
}
if (document.getElementById('tblDetalleCambio')) {
    cargarDetalleCambio();
}
function cargarDetalle() {
    const url = base_url + "Compras/listar/detalle";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr>
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 1)">
                <i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`
            });
            document.getElementById("tblDetalle").innerHTML = html;
            document.getElementById("total").value = res.total_pagar.total;

        }
    }    
}
function cargarDetalleVenta() {
    const url = base_url + "Compras/listar/detalle_temp";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr>
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td><input class="form-control" placeholder="Desc" type="text" onkeyup="calcularDescuento(event, ${row['id']})"></td>
                <td>${row['descuento']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 2)">
                <i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`
            });
            document.getElementById("tblDetalleVenta").innerHTML = html;
            document.getElementById("total").value = res.total_pagar.total;

        }
    }    
}
function cargarDetalleCambio() {
    const url = base_url + "Compras/listar/detalle_tempC";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr>
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 3)">
                <i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`
            });
            document.getElementById("tblDetalleCambio").innerHTML = html;
            document.getElementById("total").value = res.total_pagar.total;

        }
    }    
}
function calcularDescuento(e, id) {
    e.preventDefault();
    if (e.target.value == '') {
        alertas('Ingrese el Descuento', 'warning');
    }else{
        if (e.which == 13) { 
            const url = base_url + "Compras/calcularDescuento/" + id + "/" + e.target.value;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    cargarDetalleVenta();    
                }
            } 
        }
    }
}
function deleteDetalle(id, accion){
    let url;
    if (accion == 1) {
        url = base_url + "Compras/delete/"+ id;
    }else if (accion == 2){
        url = base_url + "Compras/deleteVenta/"+ id;
    }else{
        url = base_url + "Compras/deleteCambio/"+ id;
    }
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res == 'ok') {
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Producto Eliminado',
                showConfirmButton: false,
                timer: 2000
            })}else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error al EliminarProducto',
                    showConfirmButton: false,
                    timer: 2000
                })
            }          
            if (accion == 1) {
                url = base_url + "Compras/delete/"+ id;
                cargarDetalle();
            }else if(accion == 2){
                cargarDetalleVenta();
            }else{
                cargarDetalleCambio();
            }        
        }
    } 
}

function procesar(accion) {
    Swal.fire({
        title: 'Esta seguro de realizar la Operacion?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            let url;
            if (accion == 0) {
                const $id_cliente =document.getElementById('cliente').value;
                url = base_url + "Compras/registrarVenta/"+ $id_cliente;
            }else if (accion == 1){
                url = base_url + "Compras/registrarCompra";
            }else {
                const $id_local =document.getElementById('local').value;
                url = base_url + "Compras/registrarCambio/"+ $id_local;
            }
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Operacion Generada',
                            'success'
                        )
                        let ruta;
                        if (accion == 0) {
                            ruta = base_url + 'Compras/generarPdfVenta/' + res.id_venta;
                            cargarDetalleVenta();
                        }else if(accion == 1){
                            ruta = base_url + 'Compras/generarPdf/' + res.id_compra;
                            cargarDetalle();
                        }else{
                            ruta = base_url + 'Compras/generarPdfCambio/' + res.id_cambio;
                            cargarDetalleCambio();
                        }
                        window.open(ruta);
                        setTimeout(() => {
                            window.location.reload;
                        }, 300);
                    }else {
                        Swal.fire(
                            'La Caja Esta Cerrada',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function ModificarEmpresa() {
    const frm = document.getElementById("frmEmpresa");
    const url = base_url + "Administracion/modificar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res == 'ok') {
                alertas('Datos Modificados', 'success');
            }

        }
    }
}/////
if (document.getElementById('stockMinimo')) {
    reporteStock();
    productosVendidos();
}
function reporteStock() {
    const url = base_url + "Administracion/reporteStock";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            var ctx = document.getElementById("stockMinimo");
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['cantidad']);
            }
            var myPieChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: nombre,
                datasets: [{
                  data: cantidad,
                  backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#581845', '#C70039','#08F1B8',
                                    '#827717', '#004D40', '#01579B', '#311B92', '#42A5F5', '#66BB6A', '#F57F17',
                                    '#263238', '#212121', '#3E2723', '#BF360C', '#B71C1C', '#C70039'],
                }],
              },
            });
        }
    }
}
function productosVendidos() {
    const url = base_url + "Administracion/productosVendidos";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['total']);
            }
            var ctx = document.getElementById("productosVendidos");
            var myPieChart = new Chart(ctx, {
              type: 'polarArea',
              data: {
                labels: nombre,
                datasets: [{
                  data: cantidad,
                  backgroundColor:['#007bff', '#66BB6A', '#820000', '#dc3545', '#ffc107', '#28a745', '#08F1B8',
                                   '#827717', '#004D40', '#01579B', '#311B92', '#42A5F5', '#581845', '#F57F17',
                                   '#263238', '#212121', '#3E2723', '#BF360C', '#B71C1C', '#C70039'],
                }],
              },
            });
        }
    }
}
function btnAnularC(id) {
    Swal.fire({
        title: 'Esta seguro de Anular la  Compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Compras/anularCompra/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Compra Anulada',
                            'success'
                        )
                        t_h_c.ajax.reload();
                    }else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                        t_h_c.ajax.reload();
                    }
                }
            }
        }
    })
}
function btnAnularV(id) {
    Swal.fire({
        title: 'Esta seguro de Anular la  Venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Compras/anularVenta/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Venta Anulada',
                            'success'
                        )
                        t_h_v.ajax.reload();
                    }else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                        t_h_v.ajax.reload();
                    }
                    
                }
            }
        }
    })
}
function btnAnularCa(id) {
    Swal.fire({
        title: 'Esta seguro de Anular el Cambio?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Compras/anularCambio/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                            'Mensaje!',
                            'Cambio Anulado',
                            'success'
                        )
                        t_h_b.ajax.reload();
                    }else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                        t_h_b.ajax.reload();
                    }
                    
                }
            }
        }
    })
}



function arqueoCaja() {
    document.getElementById('ocultar_campos').classList.add('d-none'); 
    document.getElementById('monto_inicial').value = ''; 
    document.getElementById('btnAccion').textContent = 'Abrir caja'; 

    $('#abrir_caja').modal('show');   
}
function abrirArqueo(e) {
    e.preventDefault();
    const monto_inicial =  document.getElementById('monto_inicial').value;
    if (monto_inicial == '') {
        alertas('Ingrese el Monto Inicial', 'warning');
    }else{
        const frm =  document.getElementById('frmAbrirCaja');
        const url = base_url + "Cajas/abrirArqueo";
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                t_arqueo.ajax.reload();
                $('#abrir_caja').modal('hide');   
            }
        }
    }
}
function cerrarCaja() {
    const url = base_url + "Cajas/getVentas";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            //alertas(res.msg, res.icono);
            document.getElementById('monto_final').value = res.monto_total.total;
            document.getElementById('total_ventas').value = res.total_ventas.total;
            document.getElementById('monto_inicial').value = res.inicial.monto_inicial; 
            document.getElementById('monto_general').value = res.monto_general; 
            document.getElementById('id').value = res.inicial.id; 
            document.getElementById('ocultar_campos').classList.remove('d-none'); 
            document.getElementById('btnAccion').textContent = 'Cerrar caja'; 

            $('#abrir_caja').modal('show');   
        }
    }
}
function registrarPermisos(e) {
    e.preventDefault();
    const url = base_url + "Usuarios/registrarPermiso";
    const frm = document.getElementById('formulario');
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res != '') {
                alertas(res.msg, res.icono);            
            }else{
                alertas('Error no Identificado ', 'error');  
            }
        }
    }
}


