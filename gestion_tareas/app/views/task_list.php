<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>
    <form method="POST" action="index.php?controller=TaskController&action=crear">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="descripcion" placeholder="Descripcion">
        <button type="submit">Crear Tarea</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?php echo $task['nombre']; ?></strong> - <?php echo !empty($task['descripcion']) ? $task['descripcion'] : 'No hay descripción'; ?> -<strong> Estado</strong> : <?php echo $task['estado'];?> 
                <a href="index.php?controller=TaskController&action=editar&id=<?php echo $task['id']; ?>">Editar</a>
                <a href="index.php?controller=TaskController&action=<?php echo $task['estado'] === 'completada' ? 'pendiente' : 'completar'; ?>&id=<?php echo $task['id']; ?>">
                   <?php echo $task['estado'] === 'completada' ? 'Pendiente' : 'Completar'; ?>
                </a>
                <a href="index.php?controller=TaskController&action=eliminar&id=<?php echo $task['id']; ?>" onclick="return confirm('¿Estas seguro?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?controller=TaskController&action=generarPDF">Generar Reporte</a>
</body>
</html>