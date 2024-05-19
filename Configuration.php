<?php
include_once('helpers/Database.php');

include_once ('controllers/PokemonController.php');

include_once ('models/PokemonModel.php');
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
        return new PokemonController(self::getPokemonModel());
    }

    private static function getPokemonModel()
    {
        return new PokemonModel(self::getDatabase());
    }
}