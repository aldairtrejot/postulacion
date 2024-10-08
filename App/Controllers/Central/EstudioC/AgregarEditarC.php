<?php
include '../librerias.php';

$modelEstudioM = new ModelEstudioM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_estudios_hraes' => $_POST['id_object']
];

$nueva_carrera = null;
if($_POST['id_cat_carrera_hraes'] == 500){
    $nueva_carrera = $_POST['nueva_carrera'];
}

$datos = [
    'id_cat_nivel_estudios' => $_POST['id_cat_nivel_estudios'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    'id_cat_carrera_hraes' => $_POST['id_cat_carrera_hraes'],
    'cedula' => $_POST['cedula'],
    'nueva_carrera' => $nueva_carrera
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelEstudioM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_estudios_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelEstudioM->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_estudios_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'add';
    }
}

