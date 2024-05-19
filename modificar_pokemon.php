<?php
$config = parse_ini_file('configBD.ini');

// Conexión a la base de datos
$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener el ID del Pokémon a modificar
$pokemon_id = $_POST['pokemon_id'];

// Obtener los datos del Pokémon de la base de datos
$sql = "SELECT * FROM pokemon WHERE id = '$pokemon_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Formulario de modificación
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modificar Pokémon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Modificar Pokémon</h2>
        <form action="guardar_modificacion.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pokemon_id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="numero_identificador" class="form-label">Número Identificador</label>
                <input type="text" class="form-control" id="numero_identificador" name="numero_identificador"
                    value="<?php echo $row['numero_identificador']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                <img src="img_pokemon/<?php echo $row['imagen']; ?>.png" alt="Imagen actual" width="100" height="90">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="Fuego" <?php if ($row['tipo'] == 'Fuego') echo 'selected'; ?>>Fuego</option>
                    <option value="Agua" <?php if ($row['tipo'] == 'Agua') echo 'selected'; ?>>Agua</option>
                    <option value="Electrico" <?php if ($row['tipo'] == 'Electrico') echo 'selected'; ?>>Electrico
                    </option>
                    <option value="Planta" <?php if ($row['tipo'] == 'Planta') echo 'selected'; ?>>Planta</option>
                    <option value="Normal" <?php if ($row['tipo'] == 'Normal') echo 'selected'; ?>>Normal</option>
                    <option value="Fantasma" <?php if ($row['tipo'] == 'Fantasma') echo 'selected'; ?>>Fantasma</option>
                    <option value="Psiquico" <?php if ($row['tipo'] == 'Psiquico') echo 'selected'; ?>>Psiquico</option>
                    <option value="Dragon" <?php if ($row['tipo'] == 'Dragon') echo 'selected'; ?>>Dragon</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                    required><?php echo $row['descripcion']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Modificación</button>
        </form>
    </div>
</body>

</html>