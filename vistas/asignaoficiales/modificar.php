<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Oficiales.php';
require '../../modelos/Aplicacion.php';
require '../../modelos/asigna_oficiales.php';

try {
    $oficiales = new Oficiales($_GET);
    $oficiales = $oficiales->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {
    $asignacionoficiales = new AsignacionOficiales($_GET);
    $asignacionoficiales = $asignacionoficial->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();

    
}
//  var_dump($asignacionoficiales);
//  exit;


try {
    $aplicacion = new Aplicacion($_GET);
    $aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar Oficialesy Aplicaciones</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/asigna_oficiales/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="asigoff_id" value="<?= $asignacionoficiales[0]['ASIGOFF_ID'] ?>" >
            <div class="row mb-3">
                <div class="col">
                    <label for="asigoff_apli_id">Aplicación</label>
                    <select name="asigoff_apli_id" id="asigoff_apli_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['APLI_ID'] ?>"><?= $aplicacion['APLI_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="asigoff_offi_id">Oficial</label>
                    <select name="asigoff_offi_id" id="asigoff_offi_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($oficiales as $key => $oficiales) : ?>
                            <option value="<?= $oficiales['OFFI_ID'] ?>"><?= $oficiales['OFFI_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
