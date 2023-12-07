<?php
session_start();

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
        echo json_encode(['tareas' => $tareas]);
        exit;
    }
}
?>
