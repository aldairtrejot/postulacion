var agregarCarreraId = 500;

function validarEstudio(){
    let id_cat_nivel_estudios = document.getElementById('id_cat_nivel_estudios').value.trim();
    let id_cat_carrera_hraes = document.getElementById('id_cat_carrera_hraes').value.trim();
    let cedula_es_ = document.getElementById('cedula_es_').value.trim();
    let nueva_carrera = document.getElementById('nueva_carrera').value.trim();

    if (validarData(id_cat_nivel_estudios,'Nivel de estudio') &&
    validarData(id_cat_carrera_hraes,'Carrera') &&
    validarData(cedula_es_,'Cédula') 
    ){
        if(id_cat_carrera_hraes == agregarCarreraId){
            if(validarData(nueva_carrera,'Nueva carrera')){
                guardarEstudio();
            }
        } else {
            guardarEstudio();
        }
    }
}


document.getElementById("id_cat_carrera_hraes").addEventListener("change", function() {
    let id_cat_carrera_hraes = this.value;
    if(id_cat_carrera_hraes == agregarCarreraId){
        mostrarContenido('is_new_carrera');
    } else {
        ocultarContenido('is_new_carrera');
    }
  });
                            

