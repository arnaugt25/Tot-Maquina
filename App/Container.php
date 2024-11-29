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

        $this["Machine"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $machine = new \App\Models\Machine(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
            return $machine;
        };
    }
}