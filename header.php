<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="logo" width="60" height="60">
            </a>
            <a class="navbar-brand">Pokedex</a>

            <?php  
                    session_start();
                    
                    if (!isset($_SESSION["usuario"])) {
                        include_once('header-login.html');
                    }else{
                        include_once('header-logon.php');
                   
                    }
            ?>


            <?php
                if( isset($_GET["error"]) ){
                    switch ($_GET["error"]){
                        case 1:
                            echo "<div style='background-color: rgb(0, 0, 0);color:rgb(255, 72, 0);padding:5px' >Usuario y contraseña invalidos </div> ";
                            break;
                        case 2:
                            echo "<div style='background-color: rgb(0, 0, 0);color:rgb(255, 72, 0);padding:5px' >Debe completar los datos </div> ";
                            break;
                        case 3:
                            echo "<div style='background-color: rgb(84, 235, 232);color:rgb(255, 72, 0);padding:5px' >Opps </div> ";
                            break;
                    }
                }
            ?>
        </div>
    </nav>



    <div class="container-fluid">
        <form class="row" role="search" method="GET">
            <div class="input-group mb-3 ">
                <input class="form-control" type="search" placeholder="Buscar por nombre o tipo o numero identificador"
                    name="search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">¿Quien es este pokemon?</button>
            </div>
        </form>
    </div>
</body>

</html>