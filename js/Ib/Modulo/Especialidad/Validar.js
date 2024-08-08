
var agregarEspId = 500;

function validarEspecialidad(){
    let id_cat_especialidad_hraes = document.getElementById('id_cat_especialidad_hraes').value.trim();
    let cedula_espec_ = document.getElementById('cedula_espec_').value.trim();
    let nueva_esp = document.getElementById('nueva_esp').value.trim();

    if (validarData(id_cat_especialidad_hraes,'Especialidad') &&
    validarData(cedula_espec_,'Cédula')
    ){
        if(id_cat_especialidad_hraes == agregarEspId){
            if(validarData(nueva_esp,'Nueva especialidad')){
                guardarCedula();
            }
        } else {
            guardarCedula();
        }
    }
}
                            
//EL CAMBIO DE EEVENTO HABILITA LA OPCION OCULTA DE AGREGAR
document.getElementById("id_cat_especialidad_hraes").addEventListener("change", function() {
    let id_cat_especialidad_hraes = this.value;
    if(id_cat_especialidad_hraes == agregarEspId){
        mostrarContenido('is_new_espe');
    } else {
        ocultarContenido('is_new_espe');
    }
  });
