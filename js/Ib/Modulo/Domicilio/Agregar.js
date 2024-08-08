

function addDomiclio(){
    $("#agregar_domicilio").find("input,textarea,select").val("");
    $("#agregar_domicilio").modal("show");
}

function closeDomicilio(){
    $("#agregar_domicilio").modal("hide");
}

function isValidarDomicilio(){
    let is_cp = document.getElementById('is_cp').value;
    let is_cp_fiscal = document.getElementById('is_cp_fiscal').value;
    let is_colonia = document.getElementById('is_colonia').value;
    let is_calle = document.getElementById('is_calle').value;
    let is_num_exterior = document.getElementById('is_num_exterior').value;
    let is_num_interior = document.getElementById('is_num_interior').value;

    if(validarData(is_cp,'Código postal') &&
    validarData(is_cp_fiscal,'Código postal fiscal') &&
    validarData(is_colonia,'Colonia') &&
    validarData(is_calle,'Calle') &&
    validarData(is_num_exterior,'Núm. Exterior') &&
    validarData(is_num_interior,'Núm. Interior') &&
    validateCp(is_cp,'Código postal') &&
    validateCp(is_cp_fiscal,'Código postal fiscal')
    ){
        agregarNuevoDomicilio();
    }
}


function agregarNuevoDomicilio(){
    $.post("../../../../App/Controllers/Central/DomicilioC/AgregarNuevo.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes,
        codigo_postal1: $("#is_cp").val(),
        codigo_postal2: $("#is_cp_fiscal").val(),
        colonia1: $("#is_colonia").val(),
        calle1: $("#is_calle").val(),
        num_exterior1: $("#is_num_exterior").val(),
        num_interior1: $("#is_num_interior").val(),
    },
        function (data) {
            console.log(data);
            if (data){
                notyf.success('Domicilio agregado con éxito');
            }  else {
                notyf.error(mensajeSalida);
            }
            closeDomicilio();
            iniciarDomicilio();
        }
    );
}

function validateCp(cp, text){
    let bool = true;

    if (cp < 0){
        notyf.error(text + '* no valido');
        bool = false;
    } else if (cp.length != 5){
        notyf.error(text + '* debe tener 5 caracteres');
        bool = false;
    }

    return bool;
}