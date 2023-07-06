<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Oficiales.php';
try {
    $oficiales = new Oficiales($_GET);
    
    $oficiales = $oficiales->buscar();
    // echo "<pre>";
    // var_dump($oficiales);
    // echo "</pre>";
    // exit;
    $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
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
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>GRADO</th>
                            <th>ARMA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($oficiales) > 0):?>
                        <?php foreach($oficiales as $key => $oficiales) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $oficiales['OFFI_GRADO'] ?></td>
                            <td><?= $oficiales['OFFI_ARMA'] ?></td>
                            <td><?= $oficiales['OFFI_NOMBRE'] ?></td>
                            <td><?= $oficiales['OFFI_APELLIDO'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/alvarado_recuperacion/vistas/oficiales/modificar.php?offi_id=<?= $oficiales['OFFI_ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/alvarado_recuperacion/controladores/oficiales/eliminar.php?offi_id=<?= $oficiales['OFFI_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="6">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/alvarado_recuperacion/vistas/oficiales/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
