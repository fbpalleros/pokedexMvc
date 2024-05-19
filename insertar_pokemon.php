<?php
$config = parse_ini_file('configBD.ini');

// Conexión a la base de datos
$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$numero_identificador = $_POST['numero_identificador'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$imagen_nombre = $_FILES['imagen']['name'];
$imagen = pathinfo($imagen_nombre, PATHINFO_FILENAME);
$imagen_temporal = $_FILES['imagen']['tmp_name'];
$ruta_imagen = "img_pokemon/" . $imagen_nombre;

// Mover la imagen al servidor
move_uploaded_file($imagen_temporal, $ruta_imagen);

// Insertar los datos en la base de datos
$sql = "INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
        VALUES ('$numero_identificador', '$imagen', '$nombre', '$tipo', '$descripcion')";

if (mysqli_query($conn, $sql)) {
    echo "Nuevo Pokémon insertado correctamente.";
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: index.php");
}

// Cerrar la conexión
mysqli_close($conn);
?>