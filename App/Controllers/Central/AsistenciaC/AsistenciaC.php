 <?php
include '../librerias.php';

$asistenciaM = new AsistenciaM();
$bitacoraM = new BitacoraM();

$idEmployee = $_POST['id_object'];

$result = $asistenciaM->addOnlyAsist($idEmployee);

$datos = [
    'id_tbl_empleados_hraes' => $idEmployee,
];

$var = [
    'datos' => $datos,
];

$dataBitacora = [
    'nombre_tabla' => 'central.ctrl_asistencia',
    'accion' => 'AGREGAR',
    'valores' => json_encode($var),
    'fecha' => $timestamp,
    'id_users' => $_SESSION['id_user']
];
$bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');

echo $result;
/*
$condicion = [
    'id_ctrl_asistencia' => $_POST['id_object']
];


if($_POST['id_cat_asistencia'] == 1){//on delete value is
    $id_cat_estatus_asistencia = null;
    $observaciones = '';
} else {
    $id_cat_estatus_asistencia = $_POST['id_cat_estatus_asistencia'];
    $observaciones = $_POST['observaciones'];
}


$datos = [
    'fecha' => $_POST['fecha'],
    'hora' => $_POST['hora'],
    'id_cat_asistencia' => $_POST['id_cat_asistencia'],
    'observaciones' => $observaciones,
    'id_cat_estatus_asistencia' => $id_cat_estatus_asistencia,
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($asistenciaM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_asistencia',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 1;//'edit';
    }

} else { //Agregar
    if ($asistenciaM->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_asistencia',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 2;//'add';
    }
}
*/