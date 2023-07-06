<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Oficiales.php';
try {
    $oficiales = new Oficiales($_GET);

    $oficiales = $oficiales->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar Oficiales</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/programadores/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="offi_id" value="<?= $oficiales[0]['OFFI_ID'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label for="offi_grado">Grado del Oficiales</label>
                    <input type="text" name="offi_grado" id="offi_grado" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="offi_arma">Arma del Oficial</label>
                    <input type="text" name="offi_arma" id="offi_arma" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="offi_nombre">Nombre del Oficial</label>
                    <input type="text" name="offi_nombre" id="offi_nombre" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="offi_apellido">Apellido del Oficial</label>
                    <input type="text" name="offi_apellido" id="offi_apellido" class="form-control" required>
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