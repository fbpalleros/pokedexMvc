<?php
include_once ("Configuration.php");
$database = Configuration::getDatabase();



echo '<div class="container-fluid">';
echo '<table class="table table-hover">';

if (isset($_SESSION["usuario"]))
    echo '<thead><tr><th scope="col">Identificador</th><th scope="col">Imagen</th><th scope="col">Nombre</th><th scope="col">Tipo</th><th scope="col">Descripcion</th><th scope="col">Acciones</th></tr></thead>';
else
    echo '<thead><tr><th scope="col">Identificador</th><th scope="col">Imagen</th><th scope="col">Nombre</th><th scope="col">Tipo</th><th scope="col">Descripcion</th></tr></thead>';

foreach ($pokemones as $pokemon) {
    echo '<tbody>';
    echo '<tr onclick="window.location.href=\'informacion_pokemon.php?id=' . $pokemon['id'] . '\'">';

    echo '<td>' . $pokemon['numero_identificador'] . '</td>';
    echo '<td>' . '<img src="img_pokemon/' . $pokemon['imagen'] . '.png" alt="' . $pokemon['imagen'] . '" width="100" height="90">' . '</td>';
    echo '<td>' . $pokemon['nombre'] . '</td>';
    echo '<td>' . '<img src="img_tipo/' . $pokemon['tipo'] . '.png" alt="' . $pokemon['tipo'] . '" width="80" height="20">' . '</td>';
    echo '<td>' . $pokemon['descripcion'] . '</td>';

    if (isset($_SESSION["usuario"])) {
        echo '<td><div class="d-flex justify-content-between">
                <form action="modificar_pokemon.php" method="post"><input type="hidden" name="pokemon_id" value="' . $pokemon['id'] . '"><button class="btn btn-outline-primary" type="submit">Modificar</button></form>
                <form action="eliminar_pokemon.php" method="post"><input type="hidden" name="pokemon_id" value="' . $pokemon['id'] . '"><button class="btn btn-outline-danger" type="submit">Baja</button></form>
            </div></td>';
    }

    echo '</tr>';
}
echo '</tbody></table>';
echo '</div>';

if (isset($_SESSION["usuario"])) {

    echo '<form class="d-flex justify-content-center" role="search" action="nuevoPokemon.html" method="post">';
    echo '<div class="d-grid gap-3 w-100 m-3">';
    echo '<button class="btn btn-outline-success " type="submit">Nuevo Pokemon</button>';
    echo '</div>';
    echo '</form>';

}
