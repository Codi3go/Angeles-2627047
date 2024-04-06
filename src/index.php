<?php
require "../conexion.php";
$profesores = mysqli_query($conexion, "SELECT * FROM usuario");
$total['profesores'] = mysqli_num_rows($profesores);
$clientes = mysqli_query($conexion, "SELECT * FROM cliente");
$total['clientes'] = mysqli_num_rows($clientes);
$productos = mysqli_query($conexion, "SELECT * FROM producto");
$total['productos'] = mysqli_num_rows($productos);
$ventas = mysqli_query($conexion, "SELECT * FROM ventas WHERE fecha > CURDATE()");
$total['ventas'] = mysqli_num_rows($ventas);
session_start();
include_once "includes/header.php";
?>


<video width="320" height="240"  autoplay controls>
    <source src="assets/img/[freemake.com LOGO] NBAPau.ogv" type="video/ogg">

</video>

<?php include_once "includes/footer.php"; ?>
