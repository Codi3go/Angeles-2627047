<?php
// Inicia la sesión
session_start();

// Incluye el encabezado de la página
include_once "includes/header.php";
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                No tienes Permisos
            </div>
            <div class="card-body text-center">
                El administrador no te asignó permiso a este módulo
                <br>
                <a class="btn btn-danger" href="./">Atras</a>
            </div>
        </div>
    </div>
</div>
<?php
// Incluye el pie de página
include_once "includes/footer.php";
?>
