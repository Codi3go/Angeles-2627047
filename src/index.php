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

<?php
$consulta = "SELECT * FROM misvideos";
$resultados = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_array($resultados)) {
    $nombre = $fila['nombre'];
    $sinopsis = $fila['sinopsis'];
    $url = $fila['url'];

    echo "<h1>$nombre</h1>";
    echo "<video src='$url' controls autoplay muted width='450' height='450'></video>";
}
?>

</script>

<?php include_once "includes/footer.php"; ?>

