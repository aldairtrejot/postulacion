<div class="div-spacing">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xl-2 mb-2">
            <div class="div-spacing"></div>
            <div class="card font-size-modulo shadow-lg">
                <h6 class="card-header text-center background-modal color-text-tittle">Tipo de incidencia</h6>
                <div class="nav flex-column nav-pills text-tittle-card-nav-x" id="v-tabs-tab" role="tablist"
                    aria-orientation="vertical">
                    <a onclick="buscarRetardo();" class="nav-link-mod active" id="v-tabs-home-tab" data-toggle="pill"
                        href="#v-tabs-home" role="tab" aria-controls="v-tabs-home" aria-selected="true">
                        <i class="fa fa-folder-open mr-2"></i> Retardos</a>
                    <a onclick="buscarFalta();" class="nav-link-mod" id="v-tabs-profile-tab" data-toggle="pill"
                        href="#v-tabs-profile" role="tab" aria-controls="v-tabs-profile" aria-selected="false">
                        <i class="fa fa-folder-open mr-2"></i> Faltas</a>
                    <a onclick="buscarLicencia();" class="nav-link-mod" id="v-tabs-messages-tab" data-toggle="pill" href="#v-tabs-messages"
                        role="tab" aria-controls="v-tabs-messages" aria-selected="false">
                        <i class="fa fa-folder-open mr-2"></i> Licencias</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12 col-xl-10 mb-10">
            <div class="tab-content" id="v-tabs-tabContent">
                <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel"
                    aria-labelledby="v-tabs-home-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card font-size-modulo shadow-lg">
                                    <h5 class="card-header text-center background-modal color-text-tittle">Retardos</h5>
                                    <div class="card-body">
                                        <?php include 'Retardo/index.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-tabs-profile" role="tabpanel" aria-labelledby="v-tabs-profile-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card font-size-modulo shadow-lg">
                                    <h5 class="card-header text-center background-modal color-text-tittle">Faltas</h5>
                                    <div class="card-body">
                                        <?php include 'Falta/index.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel" aria-labelledby="v-tabs-messages-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card font-size-modulo shadow-lg">
                                    <h5 class="card-header text-center background-modal color-text-tittle">Licencias</h5>
                                    <div class="card-body">
                                        <?php include 'Licencias/index.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>