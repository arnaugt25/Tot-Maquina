<?php

namespace App\Controllers;


class ctrlListinci {


    public function index($request, $response, $container){
        $maintenances = $container->get('maintenance');
        $maintenance = $maintenances->getMaintenances();
        $response->set("maintenances", $maintenance);
        $response->setTemplate("listinci.php");

        return $response;
    }
    public function create($request, $response, $container){

        $hola = $_POST;

        $maintenanceModel = $container->get("maintenance");

        $maintenanceModel-> addMaintenance($hola);

        $response->redirect("location: /listinci");
        return $response;
    }
}