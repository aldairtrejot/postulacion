<?php

class AsistenciaM
{
    function listarById($id_object, $paginator)
    {
        $listado = pg_query("SELECT 
                                central.ctrl_asistencia.id_ctrl_asistencia,
                                TO_CHAR(central.ctrl_asistencia.hora, 'HH:MI AM'),
                                TO_CHAR(central.ctrl_asistencia.fecha, 'DD-MM-YYYY'),
                                central.cat_asistencia.nombre,
                                central.cat_estatus_asistencia.nombre,
                                central.ctrl_asistencia.observaciones
                            FROM central.ctrl_asistencia
                            INNER JOIN central.cat_asistencia
                                ON central.ctrl_asistencia.id_cat_asistencia =
                                    central.cat_asistencia.id_cat_asistencia
                            LEFT JOIN central.cat_estatus_asistencia
                                ON central.ctrl_asistencia.id_cat_estatus_asistencia =
                                    central.cat_estatus_asistencia.id_cat_estatus_asistencia
                            WHERE central.ctrl_asistencia.id_tbl_empleados_hraes = $id_object
                            ORDER BY central.ctrl_asistencia.id_ctrl_asistencia DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarByBusqueda($id_object, $busqueda,$paginator)
    {
        $listado = pg_query("SELECT 
                                central.ctrl_asistencia.id_ctrl_asistencia,
                                TO_CHAR(central.ctrl_asistencia.hora, 'HH:MI AM'),
                                TO_CHAR(central.ctrl_asistencia.fecha, 'DD-MM-YYYY'),
                                central.cat_asistencia.nombre,
                                central.cat_estatus_asistencia.nombre,
                                central.ctrl_asistencia.observaciones
                            FROM central.ctrl_asistencia
                            INNER JOIN central.cat_asistencia
                                ON central.ctrl_asistencia.id_cat_asistencia =
                                    central.cat_asistencia.id_cat_asistencia
                            LEFT JOIN central.cat_estatus_asistencia
                                ON central.ctrl_asistencia.id_cat_estatus_asistencia =
                                    central.cat_estatus_asistencia.id_cat_estatus_asistencia
                            WHERE central.ctrl_asistencia.id_tbl_empleados_hraes = $id_object
                            AND (
                                TO_CHAR(central.ctrl_asistencia.hora, 'HH:MI AM')::TEXT LIKE '%$busqueda%' OR
                                TO_CHAR(central.ctrl_asistencia.fecha, 'DD-MM-YYYY')::TEXT LIKE '%$busqueda%' OR
                                UPPER(TRIM(UNACCENT(central.cat_asistencia.nombre))) LIKE '%$busqueda%' OR
                                UPPER(TRIM(UNACCENT(central.cat_estatus_asistencia.nombre))) LIKE '%$busqueda%' OR
                                UPPER(TRIM(UNACCENT(central.ctrl_asistencia.observaciones))) LIKE '%$busqueda%'
                            )
                            ORDER BY central.ctrl_asistencia.id_ctrl_asistencia DESC 
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarByEdit($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM central.ctrl_asistencia
                            WHERE central.ctrl_asistencia.id_ctrl_asistencia = $id_object");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_asistencia' => null,
            'hora' => null,
            'fecha' => null,
            'observaciones' => null,
            'id_tbl_empleados_hraes' => null,
            'id_cat_estatus_asistencia' => null,
            'id_cat_asistencia' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_asistencia', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_asistencia', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'central.ctrl_asistencia', $condicion);
        return $pgs_delete;
    }

    public function addOnlyAsist($idEmployee){
        $isQuery = pg_query("INSERT INTO central.ctrl_asistencia 
                                        (fecha, hora, id_tbl_empleados_hraes, id_cat_asistencia)
                                VALUES (CURRENT_DATE, CURRENT_TIME, $idEmployee, 1);");
        return $isQuery;
    }


    ///IS CAT ESTATUS
    public function asistencia(){
        $isQuery = pg_query("SELECT 
                                    central.cat_asistencia.id_cat_asistencia,
                                    UPPER(central.cat_asistencia.nombre)
                                FROM central.cat_asistencia
                                ORDER BY central.cat_asistencia.nombre ASC;");
        return $isQuery;
    }

    public function asistenciaEdit($isId){
        $isQuery = pg_query("SELECT 
                                    central.cat_asistencia.id_cat_asistencia,
                                    UPPER(central.cat_asistencia.nombre)
                                FROM central.cat_asistencia
                                WHERE central.cat_asistencia.id_cat_asistencia = $isId;");
        return $isQuery;
    }

    public function estatusAsistencia(){
        $isQuery = pg_query("SELECT 
                                central.cat_estatus_asistencia.id_cat_estatus_asistencia,
                                UPPER(central.cat_estatus_asistencia.nombre)
                            FROM central.cat_estatus_asistencia
                            ORDER BY central.cat_estatus_asistencia.nombre ASC;");
        return $isQuery;
    }

    public function estatusEdit($isId){
        $isQuery = pg_query("SELECT 
                                central.cat_estatus_asistencia.id_cat_estatus_asistencia,
                                UPPER(central.cat_estatus_asistencia.nombre)
                            FROM central.cat_estatus_asistencia
                            WHERE central.cat_estatus_asistencia.id_cat_estatus_asistencia = $isId;");
        return $isQuery;
    }
}
