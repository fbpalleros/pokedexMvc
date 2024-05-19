<?php

class PokemonController
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function listPokemon()
    {
        $pokemones = $this->model->getPokemones();
        include_once("views/listar.php");
    }
}