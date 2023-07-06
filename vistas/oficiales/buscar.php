<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="container">
    <h1 class="text-center">Buscar Oficiales</h1>
    <div class="row justify-content-center">
        <form action="/alvarado_recuperacion/controladores/oficiales/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="offi_grado">Grado del Oficiales</label>
                    <input type="text" name="offi_grado" id="offi_grado" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="offi_arma">Arma del Oficiales</label>
                    <input type="text" name="offi_arma" id="offi_arma" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="offi_nombre">Nombre del Oficiales</label>
                    <input type="text" name="offi_nombre" id="offi_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="offi_apellido">Apellido delOficiales</label>
                    <input type="text" name="offi_apellido" id="offi_apellido" class="form-control">
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
<?php include_once '../../includes/footer.php' ?>