<<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


function eliminarTarea($indice) {
    if (isset($_SESSION['tareas'][$indice])) {
        unset($_SESSION['tareas'][$indice]);
        $_SESSION['tareas'] = array_values($_SESSION['tareas']);
    }
}

function obtenerTareas() {
    if (isset($_SESSION['tareas'])) {
        return $_SESSION['tareas'];
    } else {
        return [];
    }
}
?>
