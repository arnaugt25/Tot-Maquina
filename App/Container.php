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
            $db = $c->get("db");
            $config = $c->get("config");
            $Users = new \App\Models\Users($db->getConnection());
            return $Users;
        };

        $this["Machine"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $Machine = new \App\Models\Machine($db->getConnection());
            return $Machine;
        };


        $this["Maintenances"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $maintenance = new \App\Models\Maintenances($db->getConnection());
            return $maintenance;
        };
        
        $this["Notification"] = function ($c) {
            $db = $c->get("db");
            $config = $c->get("config");
            $notification = new \App\Models\Notification($db->getConnection());
            return $notification;

        
        };
    }


}