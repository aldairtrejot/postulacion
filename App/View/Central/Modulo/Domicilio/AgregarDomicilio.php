<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_domicilio">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../../../assets/sirh/logo_casa.png" style="max-width: 150%;margin-top: 0px;">
                        </div>
                        <div class="col-10">
                            <h1 class="text-tittle-card"><label id=""></label>
                                Agregar domicilio.
                            </h1>
                            <p class="color-text-white">Espacio para registrar domicilios que no están en el sistema.
                                Completa los siguientes campos:</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">

                    <div class="alert alert-warning" role="alert">
                        Agrega un nuevo domicilio que no esté registrado en el sistema completando los campos
                        requeridos. En los campos de entidad y municipio aparecerá la leyenda 'GENÉRICO'. Ten en cuenta
                        que, para corregir un domicilio agregado mediante este proceso, es necesario registrar el
                        domicilio nuevamente. El sistema eliminará automáticamente el domicilio anterior asignado al
                        empleado para permitir el registro del nuevo.
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="campo" class="text-input-rem form-label input-text-form">C&oacutedigo
                                postal</label><label class="text-required">*</label>
                            <input oninput="validarNumero(this)" type="number" class="form-control custom-input"
                                id="is_cp" placeholder="Código postal" maxlength="25">
                            <div class="line"></div>
                        </div>
                        <div class="col-6">
                            <label for="campo" class="text-input-rem form-label input-text-form">C&oacutedigo
                                postal fiscal</label><label class="text-required">*</label>
                            <input oninput="validarNumero(this)" type="number" class="form-control custom-input"
                                id="is_cp_fiscal" placeholder="Código postal fiscal" maxlength="25">
                            <div class="line"></div>
                        </div>
                    </div>


                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">Colonia</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'is_colonia')" maxlength="60" type="text"
                                class="form-control div-spacing custom-input" id="is_colonia" placeholder="Colonia">
                            <div class="line"></div>
                        </div>
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">Calle</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'is_calle')" maxlength="60" type="text"
                                class="form-control div-spacing custom-input" id="is_calle" placeholder="Calle">
                            <div class="line"></div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">N&uacutem.
                                Exterior</label><label class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'is_num_exterior')" maxlength="20" type="text"
                                class="form-control div-spacing custom-input" id="is_num_exterior"
                                placeholder="Núm exterior">
                            <div class="line"></div>
                        </div>
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">N&uacutem.
                                Interior</label><label class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'is_num_interior')" maxlength="20" type="text"
                                class="form-control div-spacing custom-input" id="is_num_interior"
                                placeholder="Núm interior">
                            <div class="line"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="closeDomicilio();" type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return isValidarDomicilio();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>