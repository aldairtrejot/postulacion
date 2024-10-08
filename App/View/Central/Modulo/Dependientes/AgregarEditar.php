<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_dependiente">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../../../assets/sirh/logo_dependientes.png" style="max-width: 150%;margin-top: 0px;">
                        </div>
                        <div class="col-10">
                            <h1 class="text-tittle-card"><label id="titulo_dependiete"></label>
                                dependiente econ&oacutemico.
                            </h1>
                            <p class="color-text-white">Área para añadir o actualizar los dependientes económicos del empleado.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">Nombre</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'nombre_d')" type="text"
                                class="form-control custom-input" id="nombre_d" placeholder="Nombre" maxlength="20">
                            <div class="line"></div>
                        </div>

                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">CURP</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'curp_d')" type="text"
                                class="form-control custom-input" id="curp_d" placeholder="Curp" maxlength="28">
                            <div class="line"></div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">Apellido
                                paterno</label><label class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'apellido_paterno_d')" type="text"
                                class="form-control custom-input" id="apellido_paterno_d" placeholder="Apellido paterno"
                                maxlength="20">

                            <div class="line"></div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="campo" class="form-label input-text-form text-input-rem">Tipo
                                        dependiente</label>
                                    <label class="text-required">*</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control custom-select selectpicker"
                                        data-style="input-select-selectpicker" aria-label="Default select example"
                                        data-live-search="true" id="id_cat_dependientes_economicos_d"
                                        data-none-results-text="Sin resultados">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">Apellido
                                materno</label><label class="text-required"></label>
                            <input onkeyup="convertirAMayusculas(event,'apellido_materno_d')" type="text"
                                class="form-control custom-input" id="apellido_materno_d" placeholder="Apellido materno"
                                maxlength="20">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarDependiente();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarDependienteD();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>
