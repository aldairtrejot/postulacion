
///IS VALUE TYPE OF ASIST
var id_cat_asistencia_is_value = 1; //central.cat_asistencia.id_cat_asistencia = 1, is ASISTENCIA

function validarAsistencia(){
    let fecha_ = document.getElementById('fecha_').value.trim();
    let hora_ = document.getElementById('hora_').value.trim();
    let id_cat_asistencia = document.getElementById('id_cat_asistencia').value.trim();
    let id_cat_estatus_asistencia = document.getElementById('id_cat_estatus_asistencia').value.trim();
    let observaciones_ = document.getElementById('observaciones_').value.trim();

    if (validarData(fecha_,'Fecha') &&
        validarData(hora_,'Hora') &&
        validarData(id_cat_asistencia,'Tipo de asistencia') 
    ){
        if (id_cat_asistencia == id_cat_asistencia_is_value){
            guardarAsistencia();    
        } else {
            if(validarData(id_cat_estatus_asistencia,'Estatus de asistencia')){
            guardarAsistencia();  
            }
        }
        
    }
}
                            

