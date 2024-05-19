<?php
$config = parse_ini_file('configBD.ini');

// Conexión a la base de datos
$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Obtener los datos del formulario
$pokemon_id = $_POST['pokemon_id'];
$numero_identificador = $_POST['numero_identificador'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];

// Actualizar los datos en la base de datos
$sql = "UPDATE pokemon 
        SET numero_identificador = '$numero_identificador', 
            nombre = '$nombre', 
            tipo = '$tipo', 
            descripcion = '$descripcion' 
        WHERE id = '$pokemon_id'";

if (mysqli_query($conn, $sql)) {
    // Redirigir al usuario a index.php
    header("Location: index.php");
    exit();
} else {
    echo "Error al guardar la modificación: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>