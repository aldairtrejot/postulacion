var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarFalta(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_fa);
    let buscarlenth = lengthValue(buscarNew);
    if (buscarlenth == 0){
        iniciarTabla_fa(null, iniciarBusqueda_fa(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_fa(buscarNew, iniciarBusqueda_fa(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_fa(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Central/Modulo/Falta/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_falta").html(data); 
        }
    );
}

function agregarEditarFalta(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_falta");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_falta").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Central/FaltaC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let entity = jsonData.response;  

            $("#fecha_desde").val(entity.fecha_desde);
            $("#fecha_hasta").val(entity.fecha_hasta);
            $("#fecha_registro").val(entity.fecha_registro);
            $("#codigo_certificacion").val(entity.codigo_certificacion);
            $("#Observaciones_falta").val(entity.observaciones);
        }
    );

    $("#agregar_editar_falta").modal("show");
}

function salirAgregarEditarFalta_(){
    $("#agregar_editar_falta").modal("hide");
}


function guardarFalta() {

    $.post("../../../../App/Controllers/Central/FaltaC/AgregarEditarC.php", {
        id_object: $("#id_object").val(),
        fecha_desde: $("#fecha_desde").val(),
        fecha_hasta:$("#fecha_hasta").val(),
        fecha_registro:$("#fecha_registro").val(),
        codigo_certificacion:$("#codigo_certificacion").val(),
        observaciones:$("#Observaciones_falta").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                notyf.success('Falta agregada con éxito');
            } else if (data == 'add') {
                notyf.success('Falta modificada con éxito');  
            } else {
                notyf.error(mensajeSalida);
            }
            $("#agregar_editar_falta").modal("hide");
            buscarFalta();
        }
    );
}

function eliminarFalta(id_object) {//ELIMINAR USUARIO
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#235B4E",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Central/FaltaC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    notyf.success('Falta eliminada con éxito')
                } else {
                    notyf.error(mensajeSalida);
                }
                buscarFalta();
            }
        );
    }
    });
}
