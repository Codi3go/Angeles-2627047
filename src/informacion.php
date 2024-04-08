<?php
// Inicia la sesión
session_start();

// Incluye el archivo de conexión a la base de datos
require_once "../conexion.php";

// Obtiene el ID de usuario de la sesión
$id_user = $_SESSION['idUser'];

// Define el permiso necesario
$permiso = "info";

// Consulta para verificar el permiso del usuario
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);

// Si no tiene el permiso y no es un usuario administrador, redirecciona a la página de permisos
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}

// Consulta para obtener la información básica
$query = mysqli_query($conexion, "SELECT * FROM info");
$data = mysqli_fetch_assoc($query);

// Si se enviaron datos mediante el formulario
if ($_POST) {
    $alert = '';
    // Si algún campo está vacío, muestra una alerta
    if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todos los campos son obligatorios
                    </div>';
    } else {
        // Recupera los datos del formulario
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $id = $_POST['id'];
        // Actualiza los datos en la base de datos
        $update = mysqli_query($conexion, "UPDATE info SET nombre = '$nombre', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE id = $id");
        // Si la actualización fue exitosa, muestra una alerta
        if ($update) {
            $alert = '<div class="alert alert-success" role="alert">
                        Datos Actualizados
                    </div>';
        }
    }
}

// Incluye el encabezado de la página
include_once "includes/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="card-title">Información Básica</h4>
                </div>
                <div class="card-body">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <form action="" method="post" class="p-3">
                        <div class="mb-3">
                            <label for="txtNombre" class="form-label">Nombre:</label>
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            <input type="text" name="nombre" class="form-control" value="<?php echo $data['nombre']; ?>" id="txtNombre" placeholder="Nombre de la Empresa" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtTelEmpresa" class="form-label">Teléfono:</label>
                            <input type="number" name="telefono" class="form-control" value="<?php echo $data['telefono']; ?>" id="txtTelEmpresa" placeholder="Teléfono de la Empresa" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtEmailEmpresa" class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" id="txtEmailEmpresa" placeholder="Correo de la Empresa" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtDirEmpresa" class="form-label">Dirección:</label>
                            <input type="text" name="direccion" class="form-control" value="<?php echo $data['direccion']; ?>" id="txtDirEmpresa" placeholder="Dirección de la Empresa" required>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Modificar Datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>
