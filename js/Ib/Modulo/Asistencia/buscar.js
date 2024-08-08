var valorInicial_as = 1;
var idtable_as = document.getElementById('idtable_as');
var buscar_as = document.getElementById("buscar_as");

function siguienteValor_as(){
    valorInicial_as++;
    idtable_as.textContent = valorInicial_as;
    buscarAsistencia();
}

function anteriorValor_as(){
    valorInicial_as--;
    if(valorInicial_as < 1){
        valorInicial_as = 1;
    }
    idtable_as.textContent = valorInicial_as;
    buscarAsistencia();
}

function iniciarBusqueda_as(){
    let valorInicialAux = valorInicial_as;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
