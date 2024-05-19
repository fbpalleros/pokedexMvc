<?php
$config = parse_ini_file('configBD.ini');

// Conexión a la base de datos
$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener el ID del Pokémon a eliminar
$pokemon_id = $_POST['pokemon_id'];

// Eliminar el Pokémon de la base de datos
$sql = "DELETE FROM pokemon WHERE id = '$pokemon_id'";

if (mysqli_query($conn, $sql)) {
    echo "El Pokémon ha sido eliminado correctamente.";
    header("Location: index.php");
} else {
    echo "Error al eliminar el Pokémon: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>