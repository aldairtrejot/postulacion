<?php

class FaltaModelM
{
    function listarById($id_object, $paginator)
    {
        $listado = pg_query("SELECT 
                                    id_ctrl_faltas_hraes,
                                    fecha_desde,
                                    fecha_hasta,
                                    fecha_registro,
                                    codigo_certificacion,
                                    observaciones
                                FROM central.ctrl_faltas_hraes
                                WHERE id_tbl_empleados_hraes = $id_object
                                ORDER BY id_ctrl_faltas_hraes DESC
                                LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM central.ctrl_faltas_hraes
                            WHERE id_ctrl_faltas_hraes = $id_object
                            LIMIT 5;");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_retardo_hraes' => null,
            'fecha' => null,
            'hora_entrada' => null,
            'minuto_entrada' => null,
            'hora_salida' => null,
            'minuto_salida' => null,
            'id_tbl_empleados_hraes' => null,
        ];
    }

    function listarByBusqueda($id_object, $busqueda, $paginator)
    {
        $listado = pg_query("SELECT 
                                    id_ctrl_faltas_hraes,
                                    fecha_desde,
                                    fecha_hasta,
                                    fecha_registro,
                                    codigo_certificacion,
                                    observaciones
                                FROM central.ctrl_faltas_hraes
                                WHERE id_tbl_empleados_hraes = $id_object
                                AND (
                                    fecha_desde::TEXT LIKE '%$busqueda%' OR
                                    fecha_hasta::TEXT LIKE '%$busqueda%' OR
                                    fecha_registro::TEXT LIKE '%$busqueda%' OR
                                    TRIM(UPPER(UNACCENT(codigo_certificacion))) LIKE '%$busqueda%' OR
                                    TRIM(UPPER(UNACCENT(observaciones))) LIKE '%$busqueda%'
                                )
                                ORDER BY id_ctrl_faltas_hraes DESC
                                LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_faltas_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_faltas_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'central.ctrl_faltas_hraes', $condicion);
        return $pgs_delete;
    }
}
