<?php
session_start();
include_once 'TareaContacto.php';

// Verificar si se envió un formulario de tarea de contacto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['nombre'], $_POST['razon'], $_POST['telefono'], $_POST['correo'])
    ) {
        $nombre = $_POST['nombre'];
        $razon = $_POST['razon'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

         // Crear una nueva instancia de TareaContacto
$nuevaTareaContacto = new TareaContacto($nombre, $razon, $telefono, $correo);

// Obtener las tareas actuales o inicializar un array vacío
$tareas = isset($_SESSION['tareas']) ? $_SESSION['tareas'] : [];

// Agregar la nueva tarea al final del array
$tareas[] = $nuevaTareaContacto;

// Guardar las tareas actualizadas en la sesión
$_SESSION['tareas'] = $tareas;
    }
}

// Eliminar tarea según su índice y redireccionar a index.php
if (isset($_GET['eliminar'])) {
    $indice = $_GET['eliminar'];
    if (isset($_SESSION['tareas'][$indice])) {
        unset($_SESSION['tareas'][$indice]);
        // Reindexar el array para eliminar el índice vacío
        $_SESSION['tareas'] = array_values($_SESSION['tareas']);
    }
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea de Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="procesar_tarea_contacto.php" method="post">
            <!-- Tu formulario para agregar tarea -->
            <div class="container mt-5">
        <h1>Agregar Tarea de Contacto</h1>
        <form action="procesar_tarea_contacto.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la persona a contactar</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="razon" class="form-label">Razón para contactar</label>
                <input type="text" class="form-control" id="razon" name="razon" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Número de teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Tarea</button>
        </form>

        <!-- Mostrar la lista de tareas -->
        <?php
        if (isset($_SESSION['tareas'])) {
            echo '<h2>Lista de Tareas de Contacto</h2>';
            foreach ($_SESSION['tareas'] as $indice => $tarea) {
                if ($tarea instanceof TareaContacto) {
                    echo '<div>';
                    $tarea->mostrarDetalles();
                    echo "<a href='procesar_tarea_contacto.php?eliminar=$indice' onclick='return confirm(\"¿Estás seguro de eliminar esta tarea?\")'>Eliminar</a>";
                    echo '</div>';
                }
            }
        } else {
            echo "<p>No hay tareas guardadas.</p>";
        }
        ?>
    </div>
</body>
</html>
