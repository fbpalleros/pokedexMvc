<?php
include_once("Configuration.php");
$database = Configuration::getDatabase();

include_once('views/templates/header.php');
$path = $_GET["path"] ? $_GET["path"] : "";
switch ($path) {
    case "listar":

        $pokemonController = Configuration::getPokemonController();
        $pokemonController->listPokemon();

        break;
    case "crear":
        break;
    default:
        break;
}

?>
