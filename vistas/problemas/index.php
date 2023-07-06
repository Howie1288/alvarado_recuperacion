<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../../modelos/Aplicacion.php';

try {
    $aplicacion = new Aplicacion($_GET);
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
    <h1 class="text-center">Formulario de ingreso de problemas por aplicaciones</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/problemas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="problemas">Aplicación</label>
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
                    <label for="prob_descripcion">Descripción del problema</label>
                    <input type="text" name="prob_descripcion" id="prob_descripcion" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_estado">Estado del problema</label>
                    <select name="prob_estado" id="prob_estado" class="form-select">
                        <option value="CERRADO">CERRADO</option>
                        <option value="ABIERTO">ABIERTO</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_fecha">Fecha del Problema</label>
                    <input type="date"  name="prob_fecha" id="prob_fecha" class="form-control">
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
``
