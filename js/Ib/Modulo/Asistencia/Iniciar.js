var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarAsistencia(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_as);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_as(null, iniciarBusqueda_as(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_as(buscarNew, iniciarBusqueda_as(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_as(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Central/Modulo/Asistencia/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_asistencia").html(data); 
        }
    );
}

function agregarEditarAsistencia(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_asistencia");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_asistencia").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Central/AsistenciaC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let entity = jsonData.entity; 

            $("#fecha_").val(entity.fecha);
            $("#hora_").val(entity.hora);
            $("#observaciones_").val(entity.observaciones);

            $('#id_cat_estatus_asistencia').empty();
            $('#id_cat_estatus_asistencia').html(jsonData.estatus); 
            $('#id_cat_asistencia').empty();
            $('#id_cat_asistencia').html(jsonData.asistencia); 
            $('#id_cat_estatus_asistencia').selectpicker('refresh');
            $('#id_cat_asistencia').selectpicker('refresh');
            $('.selectpicker').selectpicker();
            
        }
    );

    $("#agregar_editar_asistencia").modal("show");
}

function salirAgregarEditarAsistencia(){
    $("#agregar_editar_asistencia").modal("hide");
}


function guardarAsistencia() {
    $.post("../../../../App/Controllers/Central/AsistenciaC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        fecha: $("#fecha_").val(),
        hora: $("#hora_").val(),
        id_cat_asistencia: $("#id_cat_asistencia").val(),
        id_cat_estatus_asistencia: $("#id_cat_estatus_asistencia").val(),
        observaciones: $("#observaciones_").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 1){
                notyf.success('Asistencia modificada con éxito');
            } else if (data == 2) {
                notyf.success('Asistencia agregada con éxito');  
            } else {
                notyf.error(mensajeSalida);
            }
            $("#agregar_editar_asistencia").modal("hide");
            buscarAsistencia();
        }
    );
}

function eliminarAsistencia(id_object) {//ELIMINAR USUARIO
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar",
        confirmButtonColor: '#235B4E', 
        cancelButtonColor:'#6c757d',
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Central/AsistenciaC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    notyf.success('Asistencia eliminada con éxito')
                } else {
                    notyf.error(mensajeSalida);
                }
                buscarAsistencia();
            }
        );
    }
    });
}
