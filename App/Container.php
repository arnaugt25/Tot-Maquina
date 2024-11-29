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
            return new \App\Models\Users(
                $c->get("config")["db"]["user"],
                $c->get("config")["db"]["pass"],
                $c->get("config")["db"]["name"],
                $c->get("config")["db"]["host"]
            );
        };
    }
}