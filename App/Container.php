<?php

namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {

    public function __construct($config){
        parent::__construct($config);
        
        // Definir la conexión a la base de datos
        $this["db"] = function($c) {
            $config = $c->get("config");
            $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset=utf8mb4";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];
            try {
                return new \PDO($dsn, $config['db']['user'], $config['db']['pass'], $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        };

        $this["Users"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $users = new \App\Models\Users(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
            return $users;
        };
    }
}