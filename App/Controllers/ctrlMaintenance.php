<?php

namespace App\Controllers;

class ctrlMaintenances {

    public function maintenance($request, $response, $container){

        
        $response->setTemplate("maintenance.php");

        return $response;
    }
    public function create($request, $response, $container){

        $hola = $_POST;
        //var_dump($hola);
        //die();

            $maintenanceModel = $container->get("maintenance");

            $maintenanceModel-> addMaintenance($hola);

    }
}