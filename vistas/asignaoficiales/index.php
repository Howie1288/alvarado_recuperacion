<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../modelos/Aplicacion.php';
require_once '../../modelos/Oficiales.php';

try {
    $aplicacion = new Aplicacion($_GET);
    $aplicaciones = $aplicacion->buscar();

    $oficiales = new Oficiales($_GET);
    $oficiales = $oficiales->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container">
    <h1 class="text-center">Formulario de ingreso de Oficiales y aplicaciones</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/asigna_programadores/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
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
                    <label for="asigoff_offi_id">Oficiales</label>
                    <select name="asigoff_offi_id" id="asigoff_offi_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($oficiales as $key => $oficiales) : ?>
                            <option value="<?= $oficiales['OFFI_ID'] ?>"><?= $oficiles['OFFI_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-info w-100">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php'?>
