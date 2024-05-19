<?php
session_start();

if ( isset($_POST["usuario"]) &&  isset($_POST["pass"]) ){
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $esValido = consultarBD($usuario, $pass);

    if($esValido){
        $_SESSION["usuario"] = $usuario;

        header("location:index.php");
        exit();
    } else {
        header("location:index.php?error=1");
        exit();
    }

} else {
    header("location:index.php?error=2");
    exit();
}

function consultarBD($usuario, $pass)
{
    //Crear conexion
    $config = parse_ini_file('configBD.ini');

    $conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

    // Verificar la conexión
    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Realizar consulta
    $sql = "SELECT * FROM login WHERE usuario = '" . $usuario . "' && pass = '" . $pass . "'";
    $result = mysqli_query($conn, $sql);

    return mysqli_num_rows($result) == 1;
}