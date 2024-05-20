<?php
include_once("Configuration.php");
$database = Configuration::getDatabase();

include_once('views/templates/header.php');

$pokemonController = Configuration::getPokemonController();
$pokemonController->listPokemon();


?>
