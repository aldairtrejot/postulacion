<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$asistenciaM = new AsistenciaM();
$catSelectC = new CatSelectC();
$row = new Row();


if ($id_object != null) {

    $entity = $row->returnArray($asistenciaM->listarByEdit($id_object));
    $asistencia = $catSelectC->selectByEditCatalogo($asistenciaM->asistencia(), $row->returnArrayById($asistenciaM->asistenciaEdit($entity['id_cat_asistencia'])));

    $estatus = $catSelectC->selectByAllCatalogo($asistenciaM->estatusAsistencia());
    if (isset($entity['id_cat_estatus_asistencia'])) {
        $estatus = $catSelectC->selectByEditCatalogo($asistenciaM->estatusAsistencia(), $row->returnArrayById($asistenciaM->estatusEdit($entity['id_cat_estatus_asistencia'])));
    }

    $var = [
        'entity' => $entity,
        'asistencia' => $asistencia,
        'estatus' => $estatus,
    ];
    echo json_encode($var);
} else {

    $entity = $asistenciaM->listarByNull();
    $asistencia = $catSelectC->selectByAllCatalogo($asistenciaM->asistencia());
    $estatus = $catSelectC->selectByAllCatalogo($asistenciaM->estatusAsistencia());
    $var = [
        'entity' => $entity,
        'asistencia' => $asistencia,
        'estatus' => $estatus,
    ];
    echo json_encode($var);
}


