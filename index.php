<?php
    // Iniciar la sesión
    session_start();

    // Verificar si ya hay una sesión activa
    if (!empty($_SESSION['active'])) {
        // Si hay una sesión activa, redirigir al usuario a la página principal
        header('location: src/');
    } else {
        // Si no hay una sesión activa y se envió un formulario
        if (!empty($_POST)) {
            // Inicializar variable para alertas
            $alert = '';

            // Verificar si se proporcionaron el nombre de usuario y la contraseña
            if (empty($_POST['usuario']) || empty($_POST['clave'])) {
                // Mostrar alerta si no se proporcionaron ambos datos
                $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Ingrese usuario y contraseña
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            } else {
                // Si se proporcionaron ambos datos, procesar inicio de sesión

                // Incluir archivo de conexión a la base de datos
                require_once "conexion.php";

                // Escapar y obtener los datos del formulario
                $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
                $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));

                // Consultar la base de datos para verificar las credenciales del usuario
                $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$clave'");
                
                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);

                // Contar el número de resultados de la consulta
                $resultado = mysqli_num_rows($query);

                if ($resultado > 0) {
                    // Si las credenciales son correctas, establecer variables de sesión y redirigir al usuario
                    $dato = mysqli_fetch_array($query);
                    $_SESSION['active'] = true;
                    $_SESSION['idUser'] = $dato['idusuario'];
                    $_SESSION['nombre'] = $dato['nombre'];
                    $_SESSION['user'] = $dato['usuario'];
                    header('Location: src/');
                } else {
                    // Si las credenciales son incorrectas, mostrar alerta de error y destruir la sesión
                    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Contraseña incorrecta
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                    session_destroy();
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Club Ángeles</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/css/material-dashboard.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" />
</head>

<body class="bg">
    <div class="col-md-4 mx-auto">
        <?php echo (isset($alert)) ? $alert : '' ; ?>
        <div class="card">
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Bienvenido a la web oficial del club de baloncesto Ángeles</h4>
                <img class="img-thumbnail" src="assets/img/logo.png" width="150"/>
            </div>
            <div class="card-body">
                <?php echo isset($alert) ? $alert : ''; ?>
                <form action="" method="post" class="p-3">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg text-center" id="exampleInputEmail1" placeholder="Usuario" name="usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg text-center" id="exampleInputPassword1" placeholder="Clave" name="clave">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/js/material-dashboard.js"></script>
    <!-- endinject -->
</body>

</html>
