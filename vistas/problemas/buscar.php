<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/Problemas.php';
require_once '../../modelos/Aplicacion.php';

try {
    $problema = new Problemas();
    $aplicacion = new Aplicacion();
    $problemas = $problema->buscar();
    $aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container">
    <h1 class="text-center">Formulario de búsqueda de Problemas</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/problemas/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
            <input type="hidden" name="tarea_id">
                <div class="col">
                    <label for="prob_apli_id">Aplicación</label>
                    <select name="prob_apli_id" id="prob_apli_id" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($aplicaciones as $key => $aplicacion) : ?>
                            <option value="<?= $aplicacion['APLI_ID'] ?>"><?= $aplicacion['APLI_NOMBRE'] ?></option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_descripcion">Descripción del Problema</label>
                    <input type="text" name="prob_descripcion" id="prob_descripcion" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_estado">Estado del Problema</label>
                    <select name="prob_estado" id="prob_estado" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <option value="CERRADO">CERRADO</option>
                        <option value="ABIERTO">ABIERTO</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_fecha">Fecha deL Problema</label>
                    <input type="datetime" value="<?= date('Y-m-d') ?>" name="prob_fecha" id="prob_fecha" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-info w-100">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php'?>
