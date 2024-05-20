<?php
include_once('helpers/Database.php');

include_once ('controllers/PokemonController.php');

include_once ('models/PokemonModel.php');

include_once ('helpers/MustachePresenter.php');
include_once ('helpers/Presenter.php');
include_once('vendor/mustache/src/Mustache/Autoloader.php');

class Configuration
{

    public static function getDatabase()
    {
        $config = self::getConfig();
        return new Database($config['host'], $config['username'], $config['password'], $config['database']);
    }

    private static function getConfig()
    {
        // Configurar el .ini
        return parse_ini_file('config/configBD.ini');
    }

    public static function getPokemonController()
    {
        return new PokemonController(self::getPokemonModel(), self::getPresenter());
    }

    private static function getPokemonModel()
    {
        return new PokemonModel(self::getDatabase());
    }

    private static function getPresenter()
    {
        return new MustachePresenter("");
    }
}