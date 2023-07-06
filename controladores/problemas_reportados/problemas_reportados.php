<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/problemas_reportados.php';

// Obtener los valores de los parámetros si están presentes
$apli_id = $_GET['apli_id'] ?? '';
$offi_grado = $_GET['offi_grado'] ?? '';
$offi_arma = $_GET['offi_arma'] ?? '';
$offi_nombre = $_GET['offi_nombre'] ?? '';
$offi_apellido = $_GET['offi_apellido'] ?? '';
$asigoff_id = $_GET['asigoff_id'] ?? '';

try {
    $resultados = array();
    $asignacionOficiales = new AsignacionOficiales();
    $resultados = $asignacionOficiales->buscar($apli_id, $offi_grado,$offi_arma, $offi_nombre, $offi_apellido, $asigoff_id);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


$totalProblemas = count($resultados);
$problemasFinalizados = 0;

foreach ($resultados as $resultado) {
    if ($resultado['PROB_ESTADO'] === 'CERRADO') {
        $problemasFinalizados++;
    }
}

if ($totalProblemas > 0) {
    $porcentajeAvance = ($problemasFinalizados / $totalProblemas) * 10;
} else {
    $porcentajeAvance = 0; 
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">BUSCAR PROBLEMAS DE LA APLICACION</h1>
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th colspan="2">Nombre de la Aplicación</th>
                    <td colspan="2"><?= $resultados[0]['APLI_NOMBRE'] ?? '' ?></td>
                </tr>
                <tr>
                    <th colspan="2">Oficial Asignado</th>
                    <td colspan="2"><?= $resultados[0]['OFFI_GRADO'] ?? ''?> <?= $resultados[0]['OFFI_ARMA'] ?? '' ?> <?= $resultados[0]['Offi_NOMBRE'] ?? '' ?> <?= $resultados[0]['Offi_APELLIDO'] ?? '' ?></td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">PROBLEMAS REPORTADOS</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>PROBLEMA REPORTADO</th>
                    <th>Fecha </th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resultados)) : ?>
                    <?php foreach ($resultados as $key => $resultado) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $resultado['PROB_DESCRIPCION'] ?></td>
                            <td><?= $resultado['PROB_FECHA'] ?></td>
                            <td><?= $resultado['PROB_ESTADO'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">SIN PROBLEMAS REPORTADOS</td>
                    </tr>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">CANTIDAD DE PROBLEMAS REPORTADOS</th>
                    <td colspan="2"><?= $porcentajeAvance ?>%</td>
                </tr>
            </tfoot>
        </table>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/alvarado_recuperacion/vistas/problemas_reportados/problemas_reportados.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
