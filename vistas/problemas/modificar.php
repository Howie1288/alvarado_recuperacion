<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Problemas.php';
require '../../modelos/Aplicacion.php';


try {
    $problema = new Problemas($_GET);

    $problemas = $problema->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

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
    <h1 class="text-center">Modificar Problemas</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/problemas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="prob_id" value="<?= $problemas[0]['PROB_ID'] ?>" >
            <div class="row mb-3">
                <div class="col">
                    <label for="problema">Aplicación</label>
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
                    <label for="prob_descripcion">Descripción de la problema</label>
                    <textarea name="prob_descripcion" id="prob_descripcion" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_estado">Estado de la problema</label>
                    <select name="prob_estado" id="prob_estado" class="form-control" required>
                        <option value="CERRADO">CERRADO</option>
                        <option value="ABIERTO">ABIERTO</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="prob_fecha">Fecha del Problema</label>
                    <input type="date" value="<?= date('Y-m-d') ?>" name="prob_fecha" id="prob_fecha" class="form-control" required>
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