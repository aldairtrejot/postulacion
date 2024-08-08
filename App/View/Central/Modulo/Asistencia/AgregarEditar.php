<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_asistencia">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../../../assets/sirh/logo_asistencia.png"
                                style="max-width: 350%;margin-top: 20px;">
                        </div>
                        <div class="col-10">
                            <h1 class="text-tittle-card"><label id="titulo_asistencia"></label>
                                asistencia.
                            </h1>
                            <p class="color-text-white">Espacio para registrar la asistencia de los empleados. En caso
                                de cumplir o no cumplir con la documentación, seleccione la opción correspondiente en
                                'Asistencia por Documentos', donde podrá elegir el estatus adecuado y añadir las
                                observaciones pertinentes.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6 ">
                            <label for="campo" class="form-label input-text-form text-input-rem">Fecha</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control custom-input" id="fecha_"
                                placeholder="Correo electrónico" maxlength="40">
                            <div class="line"></div>
                        </div>
                        <div class="col-6">
                            <label for="campo" class="form-label input-text-form text-input-rem">Hora</label><label
                                class="text-required">*</label>
                            <input type="time" class="form-control custom-input" id="hora_"
                                placeholder="Correo electrónico" maxlength="40">
                            <div class="line"></div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="campo" class="form-label input-text-form text-input-rem">Tipo de
                                        asistencia</label>
                                    <label class="text-required">*</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control custom-select selectpicker"
                                        data-style="input-select-selectpicker" aria-label="Default select example"
                                        data-live-search="true" id="id_cat_asistencia"
                                        data-none-results-text="Sin resultados">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="campo" class="form-label input-text-form text-input-rem">Estatus de
                                        asistencia</label>
                                    <label class="text-required"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control custom-select selectpicker"
                                        data-style="input-select-selectpicker" aria-label="Default select example"
                                        data-live-search="true" id="id_cat_estatus_asistencia"
                                        data-none-results-text="Sin resultados">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-12">
                            <label for="campo"
                                class="form-label input-text-form text-input-rem">Observaciones</label><label
                                class="text-required"></label>
                            <input type="text" class="form-control custom-input" id="observaciones_"
                                placeholder="Observaciones" maxlength="40"
                                onkeyup="convertirAMayusculas(event,'observaciones_')">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarAsistencia();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarAsistencia();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>