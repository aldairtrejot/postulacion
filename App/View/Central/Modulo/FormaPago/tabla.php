<?php
include '../../../../../conexion.php';
include '../../../../Model/Central/FormaPagoM/FormaPagoM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];

$modelFormaPagoM = new ModelFormaPagoM();
$listado = $modelFormaPagoM->listarById($id_tbl_empleados_hraes, $paginador);
if (isset($_POST['busqueda'])) {
    $listado = $modelFormaPagoM->listarByBusqueda($id_tbl_empleados_hraes, $_POST['busqueda'], $paginador);
}

$data =
    '<table class="table table-bordered" id="modulo_telefono" style="width:100%">
    <thead class="text-center">
        <tr>
            <th class="col-wide-action">Acciones</th>
            <th class="col-wide">Clabe</th>
            <th class="col-wide">Banco</th>
            <!--
            <th>Forma de pago</th>
            -->
            <th class="col-wide">Estatus</th>
        </tr>
    </thead>';

if (pg_num_rows($listado) > 0) {
    while ($row = pg_fetch_row($listado)) {
        $data .=
           '<tbody class="text-center">
                        <tr>
                        <td>
                        <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icono-pequeno-tabla"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarFormaPago(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit icon-edit-table"></i> Modificar</button>
                                <button onclick="eliminarFormaPago(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt icon-delete-table"></i> Eliminar</button>  
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                            <!--
                            <td>
                                ' . $row[3] . '
                            </td>
                            --> 
                            <td>
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;
