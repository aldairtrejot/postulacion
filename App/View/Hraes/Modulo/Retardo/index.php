<div class="row font-size-modulo">
    <div class="col-9">
        <div class="form-inline">
            <div class="btn-group">
                <button onclick="agregarEditarRetardo(null)" type="button" class="btn btn-light" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus icono-pequeno-tabla"></i>
                    <span class="hide-menu text-button-add">&nbsp;Agregar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="col-3 search-container">
        <input onkeyup="buscarRetardo();" id="campoFecha" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input-small">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>

<br>
<div class="row">
    <div class="col">
        <div class="text-center">
            <table class="table table-bordered" id="tabla_retardo" style="width:100%">
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-right">
            <button onclick="anteriorValor_re()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                <span class="hide-menu" style="font-weight: bold;"></span>
            </button>
            <label id="idtable_re">1</label>
            <button onclick="siguienteValor_re()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                <span class="hide-menu" style="font-weight: bold;"></span>
            </button>
        </div>
    </div>
</div>

<?php include 'AgregarEditar.php' ?>


<!--

<div class="row">
    <div class="col-1">
        <div class="form-inline">
            <button onclick="agregarEditarRetardo(null)" class=" btn btn-light boton-con-imagen_table" id="button_agregar_all">
            <img src="../../../../assets/icons/agregar.png" alt="Imagen del botón">
            </button>

        </div>
    </div>

    <div class="col-5 search-container">
        <input onkeyup="buscarRetardo();" id="campoFecha" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>



<p></p>

<p></p>
<table class="table table-sm" id="tabla_retardo" style="width:100%">
</table>
<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_re()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_re">1</label>
    <button onclick="siguienteValor_re()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>
<br>
<br>
<?php //include 'AgregarEditar.php' ?>

-->