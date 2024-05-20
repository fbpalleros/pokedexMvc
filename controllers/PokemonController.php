<?php

class PokemonController
{

    private $model;
    private $presenter;

    public function __construct($model, $presenter)
    {
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function listPokemon()
    {
        $pokemones = $this->model->getPokemones();
        $this->presenter->render("views/listar.mustache", ["pokemones" => $pokemones]);
    }
}