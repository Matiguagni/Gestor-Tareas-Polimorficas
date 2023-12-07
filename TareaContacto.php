<?php

include_once 'TareaBase.php'; // Asegúrate de incluir TareaBase.php aquí

class TareaContacto extends TareaBase {
    // Propiedades específicas de TareaContacto
    protected $nombre;
    protected $razon;
    protected $telefono;
    protected $correo;

    // Constructor
    public function __construct($nombre, $razon, $telefono, $correo) {
        $this->nombre = $nombre;
        $this->razon = $razon;
        $this->telefono = $telefono;
        $this->correo = $correo;
    }

    // Implementación del método abstracto agregar() de TareaBase
    public function agregar() {
        // Lógica para agregar una tarea de contacto
        // Aquí puedes usar la lógica de sesiones para almacenar la tarea
    }

    // Implementación del método abstracto eliminar() de TareaBase
    public function eliminar($indice) {
        // Lógica para eliminar una tarea de contacto
        // Aquí puedes usar la lógica de sesiones para eliminar la tarea en el índice dado
    }
    

    // Implementación del método abstracto mostrarDetalles() de TareaBase
    public static function mostrarTareas($tareas) {
        if (!empty($tareas)) {
            echo '<h2>Lista de Tareas de Contacto</h2>';
            echo '<ul>';
            foreach ($tareas as $tarea) {
                echo '<li>';
                echo 'Nombre: ' . $tarea['nombre'] . '<br>';
                echo 'Razón: ' . $tarea['razon'] . '<br>';
                echo 'Teléfono: ' . $tarea['telefono'] . '<br>';
                echo 'Correo: ' . $tarea['correo'] . '<br>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay tareas de contacto.</p>';
        }
    }
    public function mostrarDetalles() {
        echo 'Nombre: ' . $this->nombre . '<br>';
        echo 'Razón: ' . $this->razon . '<br>';
        echo 'Teléfono: ' . $this->telefono . '<br>';
        echo 'Correo: ' . $this->correo . '<br>';
    }
}
?>
