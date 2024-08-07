<?php

///INCLUDE CONEXION
include '../../../../conexion.php';
include '../../../View/validar_sesion.php';

///MODEL
include '../../../Model/Hraes/DatosEmpleadoM/DatosEmpleadoM.php';
include '../../../Model/Catalogos/CatGeneroM/CatGeneroM.php';
include '../../../Model/Catalogos/CatEstadoCivilM/CatEstadoCivilM.php';
include '../../../Model/Catalogos/CatEstatusM/CatEstatusM.php';
include '../../../Model/Central/CamposPersM/CamposPersM.php';
include '../../../Model/Central/TelefonoM/TelefonoM.php';
include '../../../Model/Central/CedulaM/CedulaM.php';
include '../../../Model/Central/DependientesM/DependientesM.php';
include '../../../Model/Central/ContactoEmergenciaM/ContactoEmergenciaM.php';
include '../../../Model/Central/FormaPagoM/FormaPagoM.php';
include '../../../Model/Catalogos/CatFormatoPagoM/CatFormatoPagoM.php';
include '../../../Model/Catalogos/CatBancoM/CatBancoM.php';
include '../../../Model/Catalogos/CatDependientesM/CatDependientesM.php';
include '../../../Model/Central/Catalogos/CatDependientesM/CatDependientesM.php';
include '../../../Model/Central/JuguetesM/JuguetesM.php';
include '../../../Model/Catalogos/CatFechaJuguetesM/CatFechaJuguetesM.php';
include '../../../Model/Catalogos/CatEstatusJuguetesM/CatEstatusJuguetesM.php';
include '../../../Model/Central/RetardoM/RetardoM.php';
include '../../../Model/Central/DomicilioM/DomicilioM.php';
include '../../../Model/Central/EspecialidadM/EspecialidadM.php';
include '../../../Model/Catalogos/CatSepomexM/CatSepomexM.php';
include '../../../Model/Catalogos/CatMovimientoM/CatMovimientoM.php';
include '../../../Model/Central/MovimientosM/MovimientosM.php';
include '../../../Model/Central/PlazasM/PlazasM.php';
include '../../../Model/Central/BitacoraM/BitacoraM.php';
include '../../../Model/Central/EmpleadosM/EmpleadosM.php';
include '../../../Model/Central/AdicionalM/AdicionalM.php';
include '../../../Model/Central/Catalogos/CatEspecialidadM/CatEspecialidadM.php';
include '../../../Model/Central/EstudioM/EstudioM.php';
include '../../../Model/Central/JefeM/JefeM.php';
include '../../../Model/Central/CorreoM/CorreoM.php';
include '../../../Model/Catalogos/CatEstudioM/CatEstudioM.php';
include '../../../Model/Hraes/Catalogos/CatGeneroM/CatGeneroM.php';
include '../../../Model/Central/PercepcionesM/PercepcionesM.php';
include '../../../Model/Central/QuinquenioM/QuinquenioM.php';
include '../../../Model/Catalogos/CatConceptoM/CatConceptoM.php';
include '../../../Model/Catalogos/CatValoresM/CatValoresM.php';
include '../../../Model/Catalogos/CatQuinquenioM/CatQuinquenioM.php';
include '../../../Model/Catalogos/CatNombramientoM/CatNombramientoM.php';
include '../../../Model/Hraes/Catalogos/CatCarrerasM/CatCarrerasM.php';
include '../../../Model/Catalogos/CatPaisM/CatPaisM.php';
include '../../../Model/Catalogos/CatEstadoM/CatEstadoM.php';
include '../../../Model/Hraes/Catalogos/CatCapacidadM/CatCapacidadM.php';
include '../../../Model/Central/CapacidadesDifM/CapacidadesDifM.php';
include '../../../Model/Central/CentroTrabajoM/CentroTrabajoM.php';
include '../../../Model/Catalogos/CatRegionM/CatRegionM.php';
include '../../../Model/Catalogos/CatEntidadM/CatEntidadM.php';

///CONTROLLERS
include '../../../Controllers/Hrae/GlobalC/ArrayC.php';
include '../../../Controllers/Central/BitacoraC/BitacoraC.php';
include '../../../Controllers/Catalogos/CatGeneroC/CatGeneroC.php';
include '../../../Controllers/Catalogos/CatEstadoCivilC/CatEstadoCivilC.php';
include '../../../Controllers/Catalogos/CatEstatusC/CatEstatusC.php';
include '../../../Controllers/Catalogos/CatFormatoPagoC/CatFormatoPagoC.php';
include '../../../Controllers/Catalogos/CatDependientesC/CatDependientesC.php';
include '../../../Controllers/Central/Catalogos/CatDependientesC/CatDependientesC.php';
include '../../../Controllers/Catalogos/CatFechaJuguetesC/CatFechaJuguetesC.php';
include '../../../Controllers/Catalogos/CatEstatusJuguetesC/CatEstatusJuguetesC.php';
include '../../../Controllers/Catalogos/CatSepomexC/CatSepomexC.php';
include '../../../Controllers/Catalogos/CatSelectC/CatSelectC.php';
include '../../../Controllers/Hrae/Catalogos/CatEspecialidadC/CatEspecialidadC.php';
include '../../../Controllers/Catalogos/CatEstudioC/CatEstudioC.php';
include '../../../Controllers/Hrae/Catalogos/CatGeneroC/CatGeneroC.php';
include '../../../Controllers/Catalogos/CatConceptoC/CatConceptoC.php';
include '../../../Controllers/Catalogos/CatValoresC/CatValoresC.php';
include '../../../Controllers/Catalogos/CatQuinquenioC/CatQuinquenioC.php';
include '../../../Controllers/Catalogos/CatNombramientoC/CatNombramientoC.php';
include '../../../Controllers/Hrae/Catalogos/CatCarrerasC/CatCarrerasC.php';
include '../../../Controllers/Catalogos/CatPaisC/CatPaisC.php';
include '../../../Controllers/Catalogos/CatEstadoC/CatEstadoC.php';
include '../../../Controllers/Catalogos/CatNacionalidadC/CatNacionalidadC.php';
include '../../../Controllers/Hrae/Catalogos/CatCapacidadC/CatCapacidadC.php';


include '../../../Model/Central/FaltaM/FaltaM.php';
include '../../../Model/Central/LenguaM/LenguaM.php';
include '../../../Model/Catalogos/CatLenguaM/CatLenguaM.php';
include '../../../Model/Central/LicenciasM/LicenciasM.php';
include '../../../Model/Catalogos/CatLicenciaM/CatLicenciaM.php';
include '../../../Model/Catalogos/CatDiasM/CatDiasM.php';
include '../../../Model/Catalogos/CatEstatusIncideciasM/CatEstatusIncideciasM.php';


include '../../../Model/Catalogos/CatPlazasM/CatPlazasM.php';
include '../../../Controllers/Catalogos/CatPlazasC/CatPlazasC.php';
include '../../../Controllers/Hrae/Catalogos/CatTipoContratacionC/CatTipoContratacionC.php';
include '../../../Model/Hraes/Catalogos/CatTipoContratacionM/CatTipoContratacionM.php';
include '../../../Model/Catalogos/CatUnidadResponsableM/CatUnidadResponsableM.php';
include '../../../Controllers/Catalogos/CatUnidadResponsableC/CatUnidadResponsableC.php';
include '../../../Controllers/Hrae/Catalogos/CatPuestoC/CatPuestosC.php';
include '../../../Controllers/Hrae/Catalogos/CatTabularesC/CatTabularesC.php';
include '../../../Model/Hraes/Catalogos/CatTabularesM/CatTabularesM.php';
include '../../../Controllers/Hrae/Catalogos/CatNivelesC/CatNivelesC.php';
include '../../../Model/Hraes/Catalogos/CatNivelesM/CatNivelesM.php';
include '../../../Controllers/Hrae/Catalogos/CatZonasPagoC/CatZonasPagoC.php';
include '../../../Model/Hraes/Catalogos/CatZonasPagoM/CatZonasPagoM.php';
include '../../../Model/Catalogos/CatUnidadAdM/CatUnidadAdM.php';