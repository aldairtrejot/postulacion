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
            console.log(data);
            
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


function guardarLengua() {
    $.post("../../../../App/Controllers/Central/LenguaC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        id_cat_lengua: $("#id_cat_lengua").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                notyf.success('Lengua modificada con éxito');
            } else if (data == 'add') {
                notyf.success('Lengua agregada con éxito');  
            } else {
                notyf.error(mensajeSalida);
            }
            $("#agregar_editar_asistencia").modal("hide");
            buscarLengua();
        }
    );
}

function eliminarLengua(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Central/LenguaC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    notyf.success('Lengua eliminada con éxito')
                } else {
                    notyf.error(mensajeSalida);
                }
                buscarLengua();
            }
        );
    }
    });
}
