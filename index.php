
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
    </div>
</body>
</html>
