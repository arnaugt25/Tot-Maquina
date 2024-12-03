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

        $this["Technician"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $technician = new \App\Models\Technician(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
            return $technician;
        };

        $this["maintenance"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $technician = new \App\Models\Maintenances(
                $config["db"]["user"],
                $config["db"]["pass"],
                $config["db"]["name"],
                $config["db"]["host"]
            );
            return $technician;

        };
    }

}