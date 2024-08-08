<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$asistenciaM = new AsistenciaM();
$catSelectC = new CatSelectC();
$row = new Row();


if ($id_object != null) {

    $entity = $row->returnArray($asistenciaM->listarByEdit($id_object));
    //$lengua = $catSelectC->selectByEditCatalogo($catLenguaM->listbyAll(),$row->returnArrayById($catLenguaM->listOfId($response['id_cat_lengua'])));
    $asistencia = $catSelectC->selectByEditCatalogo($asistenciaM->asistencia(),$row->returnArrayById($catLenguaM->listOfId($response['id_cat_lengua'])));

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


/*
$catLenguaM = new CatLenguaM();
$lenguaM = new LenguaM();
if ($id_object != null){
    $response = $row->returnArray($lenguaM->listarByIdEdit($id_object));
    $lengua = $catSelectC->selectByEditCatalogo($catLenguaM->listbyAll(),$row->returnArrayById($catLenguaM->listOfId($response['id_cat_lengua'])));
    $var = [
        'lengua' => $lengua,
    ];
    echo json_encode($var);
} else {
    $lengua = $catSelectC->selectByAllCatalogo($catLenguaM->listbyAll());
    $var = [
        'lengua' => $lengua,
    ];
    echo json_encode($var);
}
*/