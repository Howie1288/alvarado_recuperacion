<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/asigna_oficiales.php';

try {
    $resultados = array();
    $asignacionOficiales = new AsignacionOficiales($_GET);
    $resultados = $asignacionOficiales->buscar();
    // var_dump($resultados);
    // exit;
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultado de asignación de Oficiales</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>NOMBRE DE LA APLICACION</th>
                            <th>GRADO DEL OFICIAL</th>
                            <th>ARMA DEL OFICIAL</th>
                            <th>NOMBRE DEL OFICIAL</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($resultados) > 0) : ?>
                            <?php foreach ($resultados as $key => $resultado) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $resultado['APLI_NOMBRE'] ?></td>
                                    <td><?= $resultado['OFFI_GRADO'] ?></td>
                                    <td><?= $resultado['OFFI_ARMA'] ?></td>
                                    <td><?= $resultado['OFFI_NOMBRE'] ?></td>
                                    <td><a class="btn btn-warning w-100" href="/alvarado_recuperacion/vistas/asigna_oficiales/modificar.php?asigoff_id=<?= $resultado['ASIGOFF_ID'] ?>">Modificar</a></td>
                                    <td><a class="btn btn-danger w-100" href="/alvarado_recuperacion/controladores/asigna_oficiales/eliminar.php?asigoff_id=<?= $resultado['ASIGOFF_ID'] ?>">Eliminar</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/alvarado_recuperacion/vistas/asigna_oficiales/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
