<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>
    <form method="POST" action="index.php?controller=TaskController&action=actualizar">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="nombre" value="<?php echo $task['nombre']; ?>" required>
        <input type="text" name="descripcion" value="<?php echo $task['descripcion']; ?>">
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="index.php?controller=TaskController&action=listar">Volver</a>
</body>
</html>
