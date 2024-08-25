<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="?action=edit&id=<?php echo $usuario['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
        <label for="nombreUsuario">Nombre de Usuario:</label>
        <input type="text" name="nombreUsuario" value="<?php echo $usuario['nombreUsuario']; ?>" required><br>
        <label for="celular">Celular:</label>
        <input type="text" name="celular" value="<?php echo $usuario['celular']; ?>" required><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>
        <input type="submit" value="Actualizar">
    </form>
    <a class="button" href="?action=list">Volver a la lista</a>
</body>
</html>
