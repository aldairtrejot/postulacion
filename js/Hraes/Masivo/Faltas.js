var notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    },
    dismissible: true, // Permite que las notificaciones sean cerrables
    duration: 6000, // Duración predeterminada de las notificaciones en milisegundos (opcional)
});

function updateFileName(input) {
    let fileName = input.files[0].name;
    let fileNameContainer = input.parentElement.querySelector('.custom-file-name');
    fileNameContainer.innerText = fileName;
  }

  function ocultarModalFalta(){
    //updateFileName(null);
    $("#modal_carga_masiva_falta").modal("hide");
}

function mostrarModalCargaFalta(){
    $('.custom-file-name').text('');
    $('#customFile').val(null);
    $("#modal_carga_masiva_falta").modal("show");
}

function validarCargaFalta(){

    let bool = false;
    let maxMB = 5;
    let fileInput = document.getElementById('customFile');
    let file = fileInput.files[0];
    if (file) {
      let fileSize = file.size;
      let fileSizeKB = fileSize / 1024;
      let fileMb = fileSizeKB/1024;
      let fileExtension = file.name.split('.').pop();

      if (fileMb >= maxMB){
        notyf.error('El archivo debe tener un peso máximo de ' + maxMB + ' MB');
        //mensajeError('El archivo debe tener un peso máximo de ' + maxMB + ' MB');
      } else if (fileExtension != 'xlsx') {
        notyf.error('La extensión del archivo debe terminar .xlsx');
        //mensajeError('La extensión del archivo debe terminar .xlsx');
      } else {
        processDataFalta(file);
      }
    } else {
        notyf.error('Campo seleccione un archivo no puede estar vacio');
    }
    return bool;
  }


  function fadeIn(){
    $('#overlay').fadeIn();
  }

  function fadeOut(){
    $('#overlay').fadeOut();
  }

  function processDataFalta(file){
    ocultarModalFalta(); 
    fadeIn(); 
    let data = new FormData();
    data.append('file',file);

    $.ajax({
    url:"../../../../App/Controllers/Hrae/FaltaC/CargaC.php",
    type:'POST',
    contentType:false,
    data:data,
    processData:false,
    cache:false, 
    success: function (data) {
        let jsonData = JSON.parse(data);
        let bool = jsonData.bool; 
        let message = jsonData.message; 
        
        if (bool){
            getFileFalta();
        } else {
            fadeOut();
            notyf.error(message);
        }
}
});
}
function getFileFalta() {
    $.ajax({
        url: "../../../../App/Controllers/Hrae/FaltaC/DescargaC.php",
        type: 'POST',
        xhrFields: {
            responseType: 'blob' // Configura la respuesta esperada como un blob (archivo binario)
        },
        success: function (data) {
            if (data.size > 0) {
                var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = 'Faltas_respuesta_.xlsx'; // Nombre del archivo que se descargará
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
                notyf.success('El proceso se llevó a cabo con éxito');
            } else {
                notyf.error('Error al ejecutar la acción');
            }
            fadeOut();
        },
        error: function (xhr, status, error) {
            notyf.error('Error al ejecutar la acción');
            fadeOut();
        }
    });
}



    /*
  function processDataFalta(file) {
    let data = new FormData();
    data.append('archivo', file);

    $.ajax({
        url: "../../../../App/Controllers/Hrae/FaltaC/CargaC.php",
        type: 'POST',
        data: data,
        xhrFields: {
            responseType: 'blob' // Configura la respuesta esperada como un blob (archivo binario)
        },
        success: function (data) {
            console.log(data);
            // Verifica que la respuesta no esté vacía
            if (data.size > 0) {
                var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = 'archivo_excel.xlsx'; // Nombre del archivo que se descargará
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            } else {
                console.error('Error: El archivo recibido está vacío.');
            }

            ocultarModalFalta();
        },
        error: function (xhr, status, error) {
            // Manejar errores si es necesario
            console.error('Error al descargar el archivo: ' + error);
        }
    });
}


function processDataFalta(file){
        let data = new FormData();
        data.append('archivo',file);

        $.ajax({
        url:"../../../../App/Controllers/Hrae/FaltaC/CargaC.php",
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        cache:false, 
        success: function (response) {
            var archivo = response.archivo;

        // Crear un enlace temporal para descargar el archivo
        var link = document.createElement('a');
        link.href = archivo;
        link.download = archivo;
        link.style.display = 'none';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    },
    error: function(xhr, status, error) {
        // Manejar errores si ocurriera alguno
        console.error('Error al descargar el archivo Excel', error);
    }
    });
}
*/

/*
$.ajax({
    url: 'generar_excel.php', // Ruta al script PHP que genera el archivo Excel
    method: 'GET', // Método de solicitud
    dataType: 'json', // Tipo de datos que se espera del servidor
    success: function(response) {
        // Obtener la ruta del archivo desde la respuesta
        var archivo = response.archivo;

        // Crear un enlace temporal para descargar el archivo
        var link = document.createElement('a');
        link.href = archivo;
        link.download = 'archivo.xlsx'; // Nombre de archivo para descargar
        link.style.display = 'none';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    },
    error: function(xhr, status, error) {
        // Manejar errores si ocurriera alguno
        console.error('Error al descargar el archivo Excel', error);
    }
});

*/