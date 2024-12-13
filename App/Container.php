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
            return new \PDO($dsn, $config['db']['user'], $config['db']['pass']);
        };

        $this["Machine"] = function($c) {
            $config = $c->get("config");
            return new \App\Models\Machine(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
        };

        $this["Users"] = function ($c) {
            $config = $c->get("config");
            return new \App\Models\Users(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
        };

        $this["Maintenances"] = function ($c) {
            $config = $c->get("config");
            return new \App\Models\Maintenances(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
        };
    }
}