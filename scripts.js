function agregarTarea() {
  const nombre = document.getElementById("nombre").value;
  const razon = document.getElementById("razon").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;

  if (nombre && razon && telefono && correo) {
    fetch("agregar_tarea.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        nombre: nombre,
        razon: razon,
        telefono: telefono,
        correo: correo,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          document.getElementById("nombre").value = "";
          document.getElementById("razon").value = "";
          document.getElementById("telefono").value = "";
          document.getElementById("correo").value = "";

          mostrarTareas(data.tareas);
        } else {
          alert("Error al agregar la tarea.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Error al agregar la tarea.");
      });
  } else {
    alert("Por favor, complete todos los campos.");
  }
}

function eliminarTarea(index) {
  fetch("eliminar_tarea.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      index: index,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        mostrarTareas(data.tareas);
      } else {
        alert("Error al eliminar la tarea.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Error al eliminar la tarea.");
    });
}

document
  .getElementById("tareaForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    agregarTarea();
  });

fetch("obtener_tareas.php?action=getTasks").then((response) => {
  if (!response.ok) {
    throw new Error("Network response was not ok");
  }
  const contentType = response.headers.get("content-type");
  if (contentType && contentType.indexOf("application/json") !== -1) {
    return response.json();
  } else {
    throw new TypeError("La respuesta no es de tipo JSON");
  }
});
