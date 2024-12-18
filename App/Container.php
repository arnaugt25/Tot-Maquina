<?php

namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {

    public function __construct($config){
        parent::__construct($config);

        // Definir la conexiÃ³n a la base de datos
        $this["db"] = function($c) {
            $config = $c->get("config");
            $dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset=utf8mb4";
            return(new \App\Models\Db(
                $c->get("config")["db"]["user"],
                $c->get("config")["db"]["pass"],
                $c->get("config")["db"]["name"],
                $c->get("config")["db"]["host"]));
        };

        $this["Machines"] = function($container) { 
            return new \App\Models\Machine(
                $container->get("config")["db"]["user"],
                $container->get("config")["db"]["pass"],
                $container->get("config")["db"]["name"],
                $container->get("config")["db"]["host"]
            );
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

        $this["Maintenances"] = function ($c) {
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
        $this["Notification"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $notification = new \App\Models\Notification($db->getConnection());
            return $notification;

        };    
    }

}