<?php
session_start();

class TareaDeContacto {
    public $nombre;
    public $razon;
    public $telefono;
    public $correo;
}

function obtenerTareas() {
    if (isset($_SESSION['tareas'])) {
        return $_SESSION['tareas'];
    } else {
        return [];
    }
}

// Manejar la petición y devolver los datos en formato JSON
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'getTasks') {
        $tareas = obtenerTareas();
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'tareas' => obtenerTareas()]);
        exit;
                
    }
}

// Agregar una nueva tarea a la sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
        if (
            isset($_POST['nombre'], $_POST['razon'], $_POST['telefono'], $_POST['correo'])
        ) {
            $nombre = $_POST['nombre'];
            $razon = $_POST['razon'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            agregarTarea($nombre, $razon, $telefono, $correo);
            echo json_encode(['success' => true, 'tareas' => obtenerTareas()]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;
    }
}

function agregarTarea($nombre, $razon, $telefono, $correo) {
    $tarea = new TareaDeContacto();
    $tarea->nombre = $nombre;
    $tarea->razon = $razon;
    $tarea->telefono = $telefono;
    $tarea->correo = $correo;

    if (!isset($_SESSION['tareas'])) {
        $_SESSION['tareas'] = [];
    }

    $_SESSION['tareas'][] = $tarea;
}
?>
