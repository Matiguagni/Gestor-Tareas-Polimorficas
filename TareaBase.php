<?php
include_once 'Tarea.php'; 

abstract class TareaBase implements Tarea {
    abstract public function agregar();
    abstract public function eliminar($indice);
    abstract public function mostrarDetalles();
}