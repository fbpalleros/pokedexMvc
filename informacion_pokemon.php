<?php

// Configurar el .ini 
$config = parse_ini_file('configBD.ini');

$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = isset($_GET['id']) ? $_GET['id'] : '0';

$query = "SELECT * FROM pokemon Where id = " . $id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0){
    mysqli_close($conn);
    header("location:index.php?error=6");
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informacion Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="logo" width="60" height="60">
            </a>
            <a class="navbar-brand">Pokedex</a>
            <div></div>
        </div>

    </nav>

    <div class="container-fluid d-flex justify-content-center">
        <div class="card my-3" style="max-width: 1080px" ;>
            <div class="row g-0">
                <div class="col-md-4 d-flex  align-items-center">

                    <?php echo '<img class="img-fluid rounded start" src="img_pokemon/' . $row['imagen'] . '.png" alt="' . $row['imagen'] . '">';?>

                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div><?php echo $row['nombre']; ?> </div>
                        </h5>
                        <p class="card-text">
                        <div> Numero Identificador: <?php echo $row['numero_identificador']; ?></div><br />
                        <div> Tipo: <?php echo $row['tipo']; ?> </div><br />
                        <div> Descripción: <?php echo $row['descripcion'];?> </div><br />
                        <div> Información: <?php echo $row['informacion'];?> </div><br /></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php mysqli_close($conn);?>